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
    <div class="d-flex">
      <form action="#" method="post" name="casino_form">
        <div class="d-flex flex-row">
          <div class="p-2">
            <table class="casino-table">
              <tbody>
                <tr>
                  <td class="left-additional  additional-cell">
                    <div onclick="makeBet(this)">1-18</div>
                  </td>
                  <td class="left-additional  additional-cell" rowspan="2">
                    <div onclick="makeBet(this)">1 st Dozen</div>
                  </td>
                </tr>
                <tr>
                  <td class="left-additional  additional-cell">
                    <div onclick="makeBet(this)">EVEN</div>
                  </td>
                </tr>
                <tr>
                  <td class="left-additional left-black  additional-cell">
                    <div onclick="makeBet(this)">Black</div>
                  </td>
                  <td class="left-additional  additional-cell" rowspan="2">
                    <div onclick="makeBet(this)">2 nd Dozen</div>
                  </td>
                </tr>
                <tr>
                  <td class="left-additional left-red  additional-cell">
                    <div onclick="makeBet(this)">Red</div>
                  </td>
                </tr>
                <tr>
                  <td class="left-additional  additional-cell">
                    <div onclick="makeBet(this)">ODD</div>
                  </td>
                  <td class="left-additional  additional-cell" rowspan="2">
                    <div onclick="makeBet(this)">3 rd Dozen</div>
                  </td>
                </tr>
                <tr>
                  <td class="left-additional  additional-cell">
                    <div onclick="makeBet(this)">19-36</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="p-2">
            <table class = "casino-table">
             <thead>
               <tr>
                 <!-- <td></td> -->
               </tr>
             </thead>
             <tbody>
               <?php
                 require_once 'casino_table/main_grid.php';
               ?>

             </tbody>
           </table>
           <table class="casino-table additional-cell">
             <tbody>
               <tr>
                 <td class="additional-cell">
                   <div class="bottom-cell" onclick="makeBet(this)">2 to 1</div>
                 </td>
                 <td class="additional-cell">
                   <div class="bottom-cell" onclick="makeBet(this)">2 to 1</div>
                 </td>
                 <td class="additional-cell">
                   <div class="bottom-cell" onclick="makeBet(this)">2 to 1</div>
                 </td>
               </tr>
             </tbody>
           </table>
         </div>
       </div>
       <input type="text" name="bet" id="bet" class="form-control">
       <button type="button" id="reg_user" class="btn btn-success mt-3">Make bet</button>
     </form>
   </div>
  </div>
  <?php require_once 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script language="JavaScript">
    var bet_id = '';
   function makeBet(element){
      alert(element.id);
      bet_id = element.id;
    }

    $('#reg_user').click(function () {
      var username = $('#username').val();
      var email = $('#email').val();
      var login = $('#login').val();
      var password = $('#password').val();

      $.ajax({
        url: '/ajax/registration.php',
        type: 'POST',
        cache: false,
        data: {'username' : username, 'email' : email, 'login' : login, 'password' : password},
        dataType: 'html',
        success: function(data) {
          if(data == 'Done'){
            $('#reg_user').text('All done');
            $('#error_block').hide();
          } else {
            $('#error_block').show();
            $('#error_block').text(data);
          }
        }
      });
    });
  </script>
</body>
</html>
