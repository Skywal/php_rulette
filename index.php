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
            <table>
              <tbody>
                <tr>
                  <td>dfsd</td>
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

         </div>
       </div>
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
