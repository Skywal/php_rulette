<?php
  require '../casino_logick/rulette_logick.php';
  require '../casino_logick/award.php';

  $userHours = trim(filter_var($_POST['userHours'],  FILTER_VALIDATE_INT));
  $userMinutes = trim(filter_var($_POST['userMinutes'],  FILTER_VALIDATE_INT));
  $userSeconds = trim(filter_var($_POST['userSeconds'],  FILTER_VALIDATE_INT));

  $time_gap = [0, 1, 0]; // time gap between spins (in hours, minutes and seconds)

  $min_db_time = array(); //minimal time on databse (used as start point of game)
  $max_db_time = array();

  $is_spin = false;

  $error ='';

  if(!isset($userHours) || $userHours < 0)
    $error = 'Wrong hour';
  elseif(!isset($userMinutes) || $userMinutes < 0)
    $error = 'Wrong minutes';
  elseif(!isset($userSeconds) || $userSeconds < 0)
    $error = 'Wrong seconds';

  if($error != ''){
    echo $error;
    exit();
  };
  // connect to database
  require_once '../mysql_connect.php';
  //=============================================================================================================
  //== refactor into different functions
  //=============================================================================================================
  $sql = "SELECT MIN(`currentTime`) AS `minTime` FROM `game`"; // getting minimal time from the 'game' table
  $query = $pdo->prepare($sql);
  $query->execute();
  $first_bet_time = $query->fetch(PDO::FETCH_OBJ);
  //==============================================================================================================
  $sql = "SELECT MAX(`currentTime`) AS `maxTime` FROM `game`"; // getting minimal time from the 'game' table
  $query = $pdo->prepare($sql);
  $query->execute();
  $last_bet_time = $query->fetch(PDO::FETCH_OBJ);
  //=============================================================================================================

  if(is_object($first_bet_time) && is_object($last_bet_time)){
    if($first_bet_time->minTime != "" && $last_bet_time->maxTime != ""){
      convert_min_db_time($first_bet_time->minTime);
      convert_max_db_time($last_bet_time->maxTime);
      update_rulette();
    }
  } else {
    echo 'Something is going wrong. Pleace check your login and password.';
    exit();
  }

  function convert_min_db_time($tm_str_convertable_min, $db_time_format = 'Y-m-d H:i:s'){
    // after returning from this function value became string not an object
    global $min_db_time;

    $min_db_time[] = DateTime::createFromFormat($db_time_format, $tm_str_convertable_min)->format('H');
    $min_db_time[] = DateTime::createFromFormat($db_time_format, $tm_str_convertable_min)->format('i');
    $min_db_time[] = DateTime::createFromFormat($db_time_format, $tm_str_convertable_min)->format('s');
  }

  function convert_max_db_time($tm_str_convertable_max, $db_time_format = 'Y-m-d H:i:s'){
    // after returning from this function value became string not an object
    global $max_db_time;

    $max_db_time[] = DateTime::createFromFormat($db_time_format, $tm_str_convertable_max)->format('H');
    $max_db_time[] = DateTime::createFromFormat($db_time_format, $tm_str_convertable_max)->format('i');
    $max_db_time[] = DateTime::createFromFormat($db_time_format, $tm_str_convertable_max)->format('s');
  }

  function get_difference(){
    global $min_db_time;
    global $max_db_time;

    $hour_diff = abs($max_db_time[0] - $min_db_time[0]);
    $minute_diff = abs($max_db_time[1] - $min_db_time[1]);
    $seconds_diff = abs($max_db_time[2] - $min_db_time[2]);
    return [$hour_diff, $minute_diff, $seconds_diff];
  }

  function conver_time_arr_in_secs($in_arr){
    return $in_arr[0] * 3600 + $in_arr[1] * 60 + $in_arr[2];
  }

  function compare_difference(){
    global $time_gap;
    global $is_spin;

    $diference_in_secs = conver_time_arr_in_secs(get_difference());
    $time_gap_in_secs = conver_time_arr_in_secs($time_gap);

    if($diference_in_secs != 0 && $diference_in_secs >= $time_gap_in_secs)
      return true;
    elseif($time_gap_in_secs == 0)
      return true;
    else false;
  }

  function update_rulette(){
    global $is_spin;
    global $winers;

    $is_spin = compare_difference();

    if($is_spin){
      compare_database();
      award_winers($winers); // викликаємо змінну із файлу rulette_logick.php
      erase_game_database();
      $is_spin = false;
      var_dump($is_spin);
    } else {

    }
  }

  function erase_game_database(){
    global $pdo;

    $sql = "DELETE FROM `game`";
    $query = $pdo->prepare($sql);
    $query->execute();
  }
?>
