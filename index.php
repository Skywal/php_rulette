<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Rulette';
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php require_once 'blocks/header.php'; ?>
  <div class="container">
     <table class = "casino-table">
       <thead>
         <tr>
           <!-- <td></td> -->
         </tr>
       </thead>
       <tbody>
         <?php
           $cell_number = 0;
           for($j = 1; $j < 24; $j++){ // don't touch last table line
             echo "<tr>";
             if(($j % 2) != 0){
               for($i = 1; $i < 8; $i++){
                 if(($i % 2) == 0){
                   $cell_number += 1;

                   echo "<td>$cell_number</td>";
                 } else {
                   echo "<td></td>";
                 }
               }
             }else {
               echo "<tr>";
               for($i = 1; $i < 8; $i++){
                 echo "<td></td>";
               }
               echo "</td>";
             }

             echo "</tr>";
           }
         ?>
       </tbody>
     </table>
  </div>
  <?php require_once 'blocks/footer.php'; ?>
</body>
</html>
