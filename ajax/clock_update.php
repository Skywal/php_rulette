<?php
  $lastHour = '';
  $lastMinutes = '';
  $lastSeconds = '';

  $timeGap = 300; // time gap between spins (in seconds)

  $userHours = trim(filter_var($_POST['userHours'],  FILTER_VALIDATE_INT));
  $userMinutes = trim(filter_var($_POST['userMinutes'],  FILTER_VALIDATE_INT));
  $userSeconds = trim(filter_var($_POST['userSeconds'],  FILTER_VALIDATE_INT));

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

  // function
  echo 'Done';
?>
