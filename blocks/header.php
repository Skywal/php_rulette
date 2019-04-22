<header>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP Blog</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="/">Main page</a>
      <a class="p-2 text-dark" href="/contacts.php">Contacts</a>
      <?php
      // if we logged than show the button
        if(!empty($_COOKIE['login']))
          echo '<a class="p-2 text-dark" href="/article.php">Add article</a>';
      ?>
    </nav>
    <?php
      //end of the statement right after form
      if(empty($_COOKIE['login'])):
    ?>
    <a class="btn btn-outline-primary mr-2 mb-2" href="auth.php">Sign in</a>
    <a class="btn btn-outline-primary mb-2" href="reg">Sign up</a>
    <?php
      else:
    ?>
    <a class="btn btn-outline-primary mb-2" href="auth.php">User cabinet</a>
    <?php
      endif;
    ?>
  </div>
</header>
