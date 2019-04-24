<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Site registration';
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php require_once 'blocks/header.php' ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Registration form</h4>
        <form action="" method="post">
          <label for="username">Your name</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="email">Your email</label>
          <input type="text" name="email" id="email" class="form-control">

          <label for="login">Your login</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="money">Money amount</label>
          <input type="text" name="money" id="money" class="form-control">

          <label for="password">Your password</label>
          <input type="password" name="password" id="password" class="form-control">

          <div class="alert alert-danger mt-2" id="error_block"></div>

          <button type="button" id="reg_user" class="btn btn-success mt-3">
            Register
          </button>
        </form>
      </div>
      
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
  <!-- Asynchronous requesting allow not to reboot page -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#reg_user').click(function () {
      var username = $('#username').val();
      var email = $('#email').val();
      var login = $('#login').val();
      var money = $('#money').val();
      var password = $('#password').val();

      $.ajax({
        url: '/ajax/registration.php',
        type: 'POST',
        cache: false,
        data: {'username' : username,
              'email' : email,
              'login' : login,
              'money' : money,
              'password' : password
            },
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
