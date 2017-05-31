<?php include './page-templates/header.php' ?>
<?php include './db/db_connect.php' ?>
<?php include './page-templates/navbar.php' ?>

<?php
session_start();
$fname = "";
$lname = "";
$username = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();

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

  //username
  $username = strip_tags($_POST['reg_username']);
  $username = str_replace(' ', '',$username);
  $username = strtolower($username);
  $_SESSION['reg_username'] = $username;

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
        array_push($error_array, "Email already in use<br />");
      }
    }
    else {
      array_push($error_array, "Invalid email format<br />");
    }
  }
  else {
    array_push($error_array, "Emails don't match<br />");
  }
  if(strlen($fname) > 25 || strlen($fname) < 2){
    array_push($error_array, "Your first name must be between 2 and 25 characters<br />");
  }
  if(strlen($lname) > 25 || strlen($lname) < 2){
    array_push($error_array, "Your last name must be between 2 and 25 characters<br />");
  }
  if(strlen($password) > 30 || strlen($password) < 8){
    array_push($error_array, "Your last name must be between 8 and 30 characters<br />");
  }
  if($password != $password2){
    array_push($error_array, "Passwords don't match<br />");
  }
  if(empty($error_array)){
    $password = md5($password);//Encrypty password before sending to database
  }
  //check if username is already in use
  $temp_user = "@" . $username;
  $theUser = "";
  $un_check = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
  $rows_check = mysqli_num_rows($un_check);
  if($rows_check > 0){
    array_push($error_array, "Username already in use<br />");
  }
  else{
    $theUser = $temp_user;
  }
  //assign default profile pic
  $rand = rand(1,5);
  if($rand == 1)
    $profile_pic = "./assets/images/profile_pics/defaults/default_profile_blue.png";
  if($rand == 2)
    $profile_pic = "./assets/images/profile_pics/defaults/default_profile_yellow.png.png";
  if($rand == 3)
    $profile_pic = "./assets/images/profile_pics/defaults/default_profile_purple.png.png";
  if($rand == 4)
    $profile_pic = "./assets/images/profile_pics/defaults/default_profile_red.png.png";
  if($rand == 5)
    $profile_pic = "./assets/images/profile_pics/defaults/default_profile_green.png.png";
  $sqlQuery = "INSERT INTO users VALUES ('', '$fname', '$lname', '$theUser', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',' )";
  $query = mysqli_query($conn, $sqlQuery);

}
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

          <br /><input type="password" class="form-control" name="reg_password" placeholder="Password" minlength="8" maxlength="10" required="true">
          <br /><input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" required="true">
          <?php if(in_array("Passwords don't match<br />", $error_array)) echo "<div class='notifications'>Passwords don't match</div>"; ?>

          <br /><br /><input type="submit" class="col-sm-12 btn btn-primary" name="reg_button" value="Register">
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</div>
<?php include './page-templates/footer.php' ?>
