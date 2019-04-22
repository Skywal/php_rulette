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
     <table class = "table table-borderless ">
       <thead>
         <tr>
           <!-- <td></td> -->
         </tr>
       </thead>
       <tbody>
         <?php
         $cell_number = 0;
         for($j = 1; $j < 13; $j++){
           echo "<tr>";
           for($i = 1; $i < 4; $i++){
             $cell_number += 1;
             echo "<td>$cell_number</td>";
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
