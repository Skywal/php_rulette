<?php
  //local database
  $db_user = 'root';
  $db_pasword = '';
  $db = 'rulette';
  $host = '127.0.0.1';

  $dsn = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
  $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
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
