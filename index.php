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
    <form action="#" method="post" name="casino_form">
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

                   echo "<td >
                     <div class=\"number-cell\">
                     $cell_number
                     </div>
                   </td>";
                 } else {
                   echo "<td>
                     <div class=\"w-line-cell\">
                     </div>
                   </td>";
                 }
               }
             }else {
               echo "<tr>";
               for($i = 1; $i < 4; $i++){
                 echo "<td>
                   <div class=\"dot-cell\">
                   </div>
                 </td>";
                 echo "<td>
                   <div class=\"h-line-cell\">
                   </div>
                 </td>";
               }
               echo "<td>
                 <div class=\"dot-cell\">
                 </div>
               </td>";
               echo "</td>";
             }

             echo "</tr>";
           }
         ?>
       </tbody>
     </table>
   </form>
  </div>
  <?php require_once 'blocks/footer.php'; ?>
</body>
</html>
