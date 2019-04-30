<?php
  $rate = 35; //straight rate

  function award_winers($winers_arr){
    // global $winers;
    // var_dump($winers_arr);
    for ($i = 0; $i < sizeof($winers_arr); $i++) {
      award_the_winner($winers_arr[$i]['login'], $winers_arr[$i]['money']);
    }

  }

  function award_the_winner($winer, $money_bet){
    require_once '../mysql_connect.php';

    global $rate;
    global $pdo;

    $money = ($money_bet * $rate);

    $sql = 'UPDATE `users` SET `money`=`money`+ :money WHERE `login` = :login';
    $query = $pdo->prepare($sql);
    $query->execute(['money' => $money, 'login' => $winer]);
  }
?>
