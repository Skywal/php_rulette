<?php
  //local database
  $db_user = 'root';
  $db_pasword = '';
  $db = 'rulette';
  $host = 'localhost';

  $dsn = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
  $pdo = new PDO($dsn, $db_user, $db_pasword);

  // function form_dsn(){
  //   global $dsn;
  //   $dsn = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
  // }
  //
  // function make_pdo(){
  //   global $pdo;
  // }
  //
  // function connect_database(){
  //   form_dsn();
  //   make_pdo();
  // }
?>
