<?php

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

  //password encrypting
  $hash = "alk453qehjauhe"; // adding to password
  $password = md5($pass . $hash); //crypting password using function md5 and our $hash variable

  // connect_database(); // connect to database
  require_once '../mysql_connect.php';

  $sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `password` = :password;';

  $query = $pdo->prepare($sql);
  $query->execute(['login' => $login, 'password' => $password]);

  $user = $query->fetch(PDO::FETCH_OBJ);
  if(is_object($user))
    echo 'Something is going wrong. Pleace check your login and password.';
  else {
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");  // save cookie for this user for one month for whole web-site "/"
    echo 'Done';
  }

 ?>
