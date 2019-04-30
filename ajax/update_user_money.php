<?php
  require_once '../mysql_connect.php';

  $sql = "SELECT `money` FROM `users` WHERE `login` = :login";
  $query = $pdo->prepare($sql);
  $query->execute(['login'=>$_COOKIE['login']]);
  $user_money = $query->fetch(PDO::FETCH_OBJ);

  if(is_object($user_money)){
    echo "Your money is: " . $user_money->money;
  }
?>
