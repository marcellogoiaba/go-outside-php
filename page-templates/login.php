<?php
include '../page-templates/header.php';
include '../page-templates/navbar.php';
include '../includes/forms/login_handler.php';
?>

<div class="container">
  <div <div class="row">
    <div class="col-md-12">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <legend>Login</legend>
        <form class="" action="register.php" method="post">
          <input type="email" class="form-control" name="log_email" placeholder="Email or Username"><br>
          <input type="password" class="form-control" name="log_password" placeholder="Password"><br>
          <input type="submit" name="login_button" class="btn btn-primary" value="Login">
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</div>
<?php include '../page-templates/footer.php' ?>
