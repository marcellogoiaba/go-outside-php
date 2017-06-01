<?php
include './page-templates/header.php';
include './includes/db_connect.php';
include './page-templates/navbar.php';
include './includes/forms/register_handler.php';
?>

<div class="container">
  <div <div class="row">
    <div class="col-md-12">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <legend>Registration Form</legend>
        <form class="" action="register.php" method="POST">
          <input type="text" class="form-control" name="reg_fname" placeholder="First Name" minlength="2" maxlength="25" required="true"
          value="<?php if(isset($_SESSION['reg_fname'])){echo $_SESSION['reg_fname'];}?>">
          <?php if(in_array("Your first name must be between 2 and 25 characters<br />", $error_array)) echo "<div class='notifications'>Your first name must be between 2 and 25 characters</div>"; ?>

          <br /><input type="text" class="form-control" name="reg_lname" placeholder="Last Name" minlength="2" maxlength="25" required="true"
          value="<?php if(isset($_SESSION['reg_lname'])){echo $_SESSION['reg_lname'];}?>">
          <?php if(in_array("Your last name must be between 2 and 25 characters<br />", $error_array)) echo "<div class='notifications'>Your last name must be between 2 and 25 characters</div>"; ?>

          <br /><input type="text" class="form-control" name="reg_username" placeholder="Username" minlength="2" maxlength="25" required="true"
          value="<?php if(isset($_SESSION['reg_username'])){echo $_SESSION['reg_username'];}?>">
          <?php if(in_array("Username already in use<br />", $error_array)) echo "<div class='notifications'>Username already in use</div>"; ?>

          <br /><input type="email" class="form-control" name="reg_email" placeholder="Email" required="true"
          value="<?php if(isset($_SESSION['reg_email'])){echo $_SESSION['reg_email'];}?>">
          <?php if(in_array("Email already in use<br />", $error_array)) echo "<div class='notifications'>Email already in use</div>"; ?>
          <?php if(in_array("Invalid email format<br />", $error_array)) echo "<div class='notifications'>Invalid email format</div>"; ?>

          <br /><input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email" required="true"
          value="<?php if(isset($_SESSION['reg_email2'])){echo $_SESSION['reg_email2'];}?>">
          <?php if(in_array("Emails don't match<br />", $error_array)) echo "<div class='notifications'>Emails don't match</div>"; ?>

          <br /><input type="password" class="form-control" name="reg_password" placeholder="Password" minlength="8" maxlength="20" required="true">
          <br /><input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" minlength="8" maxlength="20" required="true">
          <?php if(in_array("Passwords don't match<br />", $error_array)) echo "<div class='notifications'>Passwords don't match</div>"; ?>

          <br /><br /><input type="submit" class="col-sm-12 btn btn-primary" name="reg_button" value="Register">
          <br /><br /><?php if(in_array("User created successfully! Please login!", $error_array)) echo "<span class='notif_success'>User created successfully! Please login!</span><br />"; ?>
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</div>
<?php include './page-templates/footer.php' ?>
