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
    <div class="row">
      <div class="d-flex col-8">
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
          <div id="user-money"></div>
          <div id="bet" class ="mt-1"></div>

          <input type="text" name="betMoney" id="betMoney" class="form-control mt-2">

          <button type="button" id="makeBet" class="btn btn-success mt-3">Make bet</button>

          <div class="alert alert-danger mt-2" id="errorBlock"></div>
        <?php endif; ?>
       </form>
     </div>

     <div class="col-4">
       <div class="clock row">
         <p class="col-3">Time is: </p>
         <p class="col" id="rt-clock"></p>
       </div>

       <div id="stack-trace"></div>
       Hello!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     </div>
   </div>
  </div>
  <?php require_once 'blocks/footer.php'; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script language="JavaScript">
    var dt; // current time
    var betStr = ''; // how much money did you bet

    function Timer() {
       dt=new Date()
       document.getElementById('rt-clock').innerHTML=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
       setTimeout("Timer()",1000);
    }
    function sendTimeToServer(){
      var dtSendHours = dt.getHours();
      var dtSendMinutes = dt.getMinutes();
      var dtSendSeconds = dt.getSeconds();

      $.ajax({
        url: '/ajax/clock_update.php',
        type: 'POST',
        cache: false,
        data: {'userHours' : dtSendHours,
               'userMinutes' : dtSendMinutes,
               'userSeconds' : dtSendSeconds
             },
        dataType: 'html',
        success: function(data) {
          document.getElementById('stack-trace').innerHTML=data;
        }
      });

      setTimeout("sendTimeToServer()",10000);
    }
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
          if(data == 'Done'){

            alert("You make your bet on:\nNumber " + betStr + "\nMoney " + betMoney);

            $('#errorBlock').hide();
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
          $('#betMoney').val(0);
          // betStr = 'Non';
        }
      });
    });

    function updateUserMoney(){
      $.ajax({
        url: '/ajax/update_user_money.php',
        type: 'POST',
        cache: false,
        dataType: 'html',
        success: function(data) {
          $('#user-money').show();
          $('#user-money').text(data);
        }
      });
      setTimeout("updateUserMoney()",1000);
    }
    //time update
    Timer();
    sendTimeToServer();
    updateUserMoney();
  </script>
</body>
</html>
