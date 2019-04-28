<?php
  require 'grid.php';

  $doubled_rows = 11;
  $doubled_columns = 6;
  $current_number = 0;

  function build_grid(){
    global $doubled_rows;
    global $doubled_columns;

    for ($i=0; $i < $doubled_rows; $i++) {
      echo "<tr>";

      for ($j=0; $j < $doubled_columns; $j++) {
        if($i % 2 == 0 && $j % 2 == 0){
            build_cell_pair_pair($i, $j);
          }
          elseif($i % 2 == 0 && $j % 2 != 0) {
            build_cell_pair_odd($i, $j);
          }
          elseif($i % 2 != 0 && $j % 2 == 0) {
            build_cell_odd_pair($i, $j);
          } else {
            build_cell_odd_odd($i, $j);
          }
        }
    }
    echo "</tr>";

  };

  function build_cell($sign){
    echo "<td class='game-field' onclick=\"makeBet(this)\">".
    $sign
    ."</td>";
  }

  function build_cell_pair_pair($row, $column){
    build_cell("row ". $row . " column " . $column);
  }

  function build_cell_pair_odd($row, $column){
    global $current_number;
    $current_number++;
    build_cell($current_number);
  }

  function build_cell_odd_pair($row, $column){
    build_cell("row ". $row . " column " . $column);
  }

  function build_cell_odd_odd($row, $column){
    build_cell("row ". $row . " column " . $column);
  }

?>
