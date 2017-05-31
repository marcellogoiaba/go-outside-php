<?php include './page-templates/header.php' ?>
<?php include './db/db_connect.php' ?>
<?php include './page-templates/navbar.php' ?>

<?php
session_start();
$fname = "";
$lname = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = "";

if(isset($_POST['reg_button'])){
  //first name
  $fname = strip_tags($_POST['reg_fname']);
  $fname = str_replace(' ', '',$fname);
  $fname = ucfirst(strtolower($fname));
  $_SESSION['reg_fname'] = $fname;

  //last name
  $lname = strip_tags($_POST['reg_lname']);
  $lname = str_replace(' ', '',$lname);
  $lname = ucfirst(strtolower($lname));
  $_SESSION['reg_lname'] = $lname;

  //email
  $email = strip_tags($_POST['reg_email']);
  $email = str_replace(' ', '',$email);
  $email = strtolower($email);
  $_SESSION['reg_email'] = $email;

  //email2
  $email2 = strip_tags($_POST['reg_email2']);
  $email2 = str_replace(' ', '',$email2);
  $email2 = strtolower($email2);
  $_SESSION['reg_email2'] = $email2;

  //password
  $password = strip_tags($_POST['reg_password']);
  $password2 = strip_tags($_POST['reg_password2']);

  $date= date("Y-m-d");

  if($email == $email2){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      //check if email already exists
      $e_check = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
      $num_rows = mysqli_num_rows($e_check);
      if($num_rows > 0 ){
        echo "Email already in use";
      }
    }
    else {
      echo "Invalid email format";
    }
  }
  else {
    echo "Emails don't match";
  }
  if(strlen($fname) > 25 || strlen($fname) < 2){
    echo "Your first name must be between 2 and 25 characters";
  }
  if(strlen($lname) > 25 || strlen($lname) < 2){
    echo "Your last name must be between 2 and 25 characters";
  }
  if(strlen($password) > 30 || strlen($password) < 8){
    echo "Your last name must be between 8 and 30 characters";
  }
  if($password != $password2){
    echo "Your passwords don't match";
  }


}
 ?>

<div class="container">
  <div <div class="row">
    <div class="col-md-12">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <legend>Register Form</legend>
        <form class="" action="register.php" method="POST">
          <input type="text" class="form-control" name="reg_fname" placeholder="First Name" minlength="2" maxlength="25" required="true"
          value="<?php if(isset($_SESSION['reg_fname'])){echo $_SESSION['reg_fname'];}?>"><br>
          <input type="text" class="form-control" name="reg_lname" placeholder="Last Name" minlength="2" maxlength="25" required="true"
          value="<?php if(isset($_SESSION['reg_lname'])){echo $_SESSION['reg_lname'];}?>"><br>
          <input type="email" class="form-control" name="reg_email" placeholder="Email" required="true"
          value="<?php if(isset($_SESSION['reg_email'])){echo $_SESSION['reg_email'];}?>"><br>
          <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email" required="true"
          value="<?php if(isset($_SESSION['reg_email2'])){echo $_SESSION['reg_email2'];}?>"><br>
          <input type="password" class="form-control" name="reg_password" placeholder="Password" minlength="8" maxlength="10" required="true"><br>
          <input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" required="true"><br>
          <input type="submit" class="col-sm-12 btn btn-primary" name="reg_button" value="Register">
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</div>
<?php include './page-templates/footer.php' ?>
