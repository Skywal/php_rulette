<?php
  setcookie('login', "", time() - 3600 * 24 * 30, "/"); // kill cookie for whole web-site
  // setcookie('user_money', "", time() - 3600 * 24 * 30, "/");

  unset($_COOKIE['login']); // delete value in array
  // unset($_COOKIE['user_money']);

  echo true;
?>
