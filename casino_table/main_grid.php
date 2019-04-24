<?php
$cell_number = 0;
for($j = 1; $j < 24; $j++){ // don't touch last table line
  echo "<tr>";
  if(($j % 2) != 0){
    for($i = 1; $i < 8; $i++){
      if(($i % 2) == 0){
        $cell_number += 1;

        echo "<td>
          <div onclick='makeBet(this)' class=\"number-cell\" id='straight $cell_number'>
          $cell_number
          </div>
        </td>";
      } else {
        echo "<td>
          <div onclick='makeBet(this)' class=\"w-line-cell line-cell\" id='street ($j * $i)'>
          </div>
        </td>";
      }
    }
  }else {
    echo "<tr>";
    for($i = 1; $i < 4; $i++){
      echo "<td>
        <div onclick='makeBet(this)' class=\"dot-cell line-cell\" id='corner ($j * $i)'>
        </div>
      </td>";
      echo "<td>
        <div onclick='makeBet(this)' class=\"h-line-cell line-cell\" id='street ($j * $i)'>
        </div>
      </td>";
    }
    echo "<td>
      <div onclick='makeBet(this)' class=\"dot-cell line-cell\" id='corner ($j * $i)'>
      </div>
    </td>";
    echo "</td>";
  }

  echo "</tr>";
}
?>
