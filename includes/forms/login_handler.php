<?php
if(isset($_POST['login_button'])){
  //sanitize email
  $email = $_POST['log_email'];
  $username = "@" . $email;

  // hash password to be checked with database
  $password = $_POST['log_password'];
  $salt = "5f4dcc3b5aa765d61d8327deb882cf99";
  $password = $password . $salt;
  $password = hash('sha256', $password);

  $sql_query = "SELECT * FROM users WHERE email='$email' AND password='$password'OR username='$username' AND password='$password'";
  $check_query = mysqli_query($conn, $sql_query);
  $check_row = mysqli_num_rows($check_query);
  if($check_row == 1){
    $row = mysqli_fetch_array($check_query);

    $closed_query = "SELECT * FROM users WHERE (email='$email' AND user_closed='yes') OR (username='$username' AND user_closed='yes')";
    $reopen_query = "SELECT users SET user_closed='no' WHERE email='$email' or username='$username'";
    $user_closed_query = mysqli_query($conn, $closed_query);
    if(mysqli_num_rows($user_closed_query == 1)){
      $reopen_account = mysqli_query($conn, $reopen_query);
    }
    

    $username = $row['username'];
    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
  }
  else {
    array_push($error_array, "Incorrect email or password");
  }
}
?>
