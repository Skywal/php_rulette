<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Site authorization';
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php require_once 'blocks/header.php' ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
          if(empty($_COOKIE['login']
          )):  //end of the statement right after form
        ?>
        <h4>Authorization form</h4>
        <form action="" method="post">
          <label for="login">Your login</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="password">Your password</label>
          <input type="password" name="password" id="password" class="form-control">

          <div class="alert alert-danger mt-2" id="error_block"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-3">
            Sign in
          </button>
        </form>
        <?php
          else:
        ?>
        <h2><?=$_COOKIE['login']; /*some other html */ ?></h2>
        <h3></h3>
        <button type="button" class="btn btn-danger mt-3" id="exit-btn">Log out</button>
        <?php
          endif;
        ?>
      </div>
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
  <!-- Asynchronous requesting allow not to reboot page -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#exit-btn').click(function () {
      $.ajax({
        url: '/ajax/exit.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function(data) {
          document.location.reload(true);
        }
      });
    });

    $('#auth_user').click(function () {
      var login = $('#login').val();
      var password = $('#password').val();

      $.ajax({
        url: '/ajax/authorization.php',
        type: 'POST',
        cache: false,
        data: {'login' : login, 'password' : password},
        dataType: 'html',
        success: function(data) {
          if(data == 'Done'){
            $('#auth_user').text(data);
            $('#error_block').hide();
            document.location.reload(true);
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
