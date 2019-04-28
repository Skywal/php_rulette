<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Rulette';
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php
    require_once 'blocks/header.php';
    require_once 'casino_table/main_grid.php';
  ?>
  <div class="container">
    <div class="d-flex">
      <form action="#" method="post" name="casino_form">
        <table class="game-field">
          <tbody>
            <?php build_grid(); ?>
          </tbody>
        </table>
      <?php if(empty($_COOKIE['login'])): ?>

        <h1>You can make bet only if you are registered!</h1>

      <?php else: ?>
        <input id="login" class ="mt-5" value="<?=$_COOKIE['login'];?>" disabled>
        <div id="bet" class ="mt-1"></div>

        <input type="text" name="betMoney" id="betMoney" class="form-control mt-2">

        <button type="button" id="makeBet" class="btn btn-success mt-3">Make bet</button>

        <div class="alert alert-danger mt-2" id="errorBlock"></div>
      <?php endif; ?>
     </form>
   </div>
  </div>
  <?php require_once 'blocks/footer.php'; ?>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script language="JavaScript">
    var betStr = '';
    function makeBet(element){
       betStr = element.innerHTML;
       $('#bet').text("Your bet is: " + betStr);
     }

    $('#makeBet').click(function () {
      var betMoney = $('#betMoney').val();
      var login = $('#login').val();

      $.ajax({
        url: '/ajax/bet_update.php',
        type: 'POST',
        cache: false,
        data: {'login' : login,
               'betMoney' : betMoney,
               'betStr' : betStr
             },
        dataType: 'html',
        success: function(data) {

          $('#betMoney').val(0);

          if(data == 'Done'){
            $('#makeBet').text('All done');
            $('#errorBlock').hide();
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
</body>
</html>
