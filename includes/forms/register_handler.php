<?php

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
  //check if username is already in use
  $temp_user = "@" . $username;
  $theUser = "";
  $un_check = mysqli_query($conn, "SELECT username FROM users WHERE username ='$temp_user'");
  $rows_check = mysqli_num_rows($un_check);
  if($rows_check > 0){
    array_push($error_array, "Username already in use<br />");
  }
  else{
    $theUser = $temp_user;
  }
  if(empty($error_array)){

    //encrypt password before sending to database
    $salt = "5f4dcc3b5aa765d61d8327deb882cf99";
    $password = $password . $salt;
    $password = hash('sha256', $password);

    //assign default profile pic
    $rand = rand(1,5);
    if($rand == 1)
      $profile_pic = "./assets/images/profile_pics/defaults/default_profile_blue.png";
    if($rand == 2)
      $profile_pic = "./assets/images/profile_pics/defaults/default_profile_yellow.png";
    if($rand == 3)
      $profile_pic = "./assets/images/profile_pics/defaults/default_profile_purple.png";
    if($rand == 4)
      $profile_pic = "./assets/images/profile_pics/defaults/default_profile_red.png";
    if($rand == 5)
      $profile_pic = "./assets/images/profile_pics/defaults/default_profile_green.png";


    $sqlQuery = "INSERT INTO users VALUES ('', '$fname', '$lname', '$theUser', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',' )";
    $query = mysqli_query($conn, $sqlQuery);
    array_push($error_array, "User created successfully! Please login!");
    //clear Session
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_lname'] = "";
    $_SESSION['reg_username'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_email2'] = "";
  }

}

?>
