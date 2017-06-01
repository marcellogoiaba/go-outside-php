<?php
  require './includes/db_connect.php';
  if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $userDetailsQuery = mysqli_query($conn, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($userDetailsQuery);
  }
  else {
    header("Location: register.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go Outside</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="./page-templates/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/login-style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./page-templates/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./page-templates/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./page-templates/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./page-templates/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>
    