<?php
  $bet_money = trim(filter_var($_POST['betMoney'],  FILTER_VALIDATE_INT));
  // $login = trim(filter_var($_POST['login'],  FILTER_SANITIZE_STRING));
  $betStr = trim(filter_var($_POST['betStr'],  FILTER_SANITIZE_STRING));



  $error = '';

  //minimal requirements
  if (isset($bet_money) && $bet_money == "")
    $error = 'Not enought money';
  // elseif (strlen($login) <= 3)
  //   $error = 'Invalig login ' . $login;
  elseif (isset($betStr) && $betStr == "")
    $error = 'Make your bet';

  if($error != ''){
    echo $error;
    exit();
  };

  $now = new DateTime();
  $date = $now->format('Y-m-d H:i:s');
  // echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
  // echo $now->getTimestamp();

  // connect_database(); // connect to database
  require_once '../mysql_connect.php';

  $sql = 'INSERT INTO game(login, money, bet, currentTime) VALUES (?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$_COOKIE['login'], $bet_money, $betStr, $date]);

  echo 'Done';
?>