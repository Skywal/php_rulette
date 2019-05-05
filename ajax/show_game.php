<?php
  require_once '../mysql_connect.php';

  $sql = "SELECT * FROM `game`";
  $query = $pdo->prepare($sql);
  $query->execute();

  while ($gamers = $query->fetch(PDO::FETCH_OBJ)) {
    echo "<tr><td>" . $gamers->login . "</td>" .
    "<td>" . $gamers->money . "</td>" .
    "<td>" . $gamers->bet . "</td>" .
    "<td>" . $gamers->currentTime . "</td></tr>";
  }
?>
