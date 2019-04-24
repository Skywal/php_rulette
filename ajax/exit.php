<?php
  setcookie('login', "", time() - 3600 * 24 * 30, "/"); // kill cookie for whole web-site
  unset($_COOKIE['login']); // delete value in array
  echo true;
?>
