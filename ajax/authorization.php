<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);


  $login = trim(filter_var($_POST['login'],  FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['password'],  FILTER_SANITIZE_STRING));

  $error = '';

  //minimal requirements
  if (strlen($login) <= 3)
    $error = 'Enter login';
  elseif (strlen($pass) <= 3)
    $error = 'Enter password';

  if($error != ''){
    echo $error;
    exit();
  };

  // connect to database
  require_once '../mysql_connect.php';

  //password encrypting
  $hash = "alk453qehjauhe"; // adding to password
  $password = md5($pass.$hash); //crypting password using function md5 and our $hash variable

  $sql = "SELECT * FROM `users` WHERE `login`=:login AND `password`=:password";
  $query = $pdo->prepare($sql);
  $query->execute(['login' => $login, 'password' => $password]);

  $user = $query->fetch(PDO::FETCH_OBJ);

  if(is_object($user)){
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");  // save cookie for this user for one month for whole web-site "/"
    setcookie('user_money', $user->money, time() + 3600 * 24 * 30, "/");
    echo 'Done';
  } else {
    echo 'Something is going wrong. Pleace check your login and password.';
  }

 ?>
