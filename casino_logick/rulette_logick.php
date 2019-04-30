<?php
  require_once '../mysql_connect.php';

  $winers = array();
  $win_bet = 5;//randomize_numbers(1, 18);

  // рандом по числах
  function randomize_numbers($min, $max){
    return rand($min, $max);
  }

  function compare_database(){
    global $win_bet;
    global $winers;
    global $pdo;

    var_dump($win_bet);

    $sql = "SELECT * FROM `game`";
    $query = $pdo->prepare($sql);
    $query->execute();

    while ($bets = $query->fetch(PDO::FETCH_ASSOC)) {
      if($bets['bet'] == $win_bet){
        $winers[] = [
          'login' => $bets['login'],
          'money' => $bets['money'],
          'bet' => $bets['bet']
        ];
      }
    }
    var_dump($winers);
  }

?>
