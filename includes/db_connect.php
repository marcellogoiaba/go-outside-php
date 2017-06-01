<?php
ob_start(); //turns on output buffering
session_start(); //starts session

$timezone = date_default_timezone_set("Europe/Dublin");
//connection variable
$conn = mysqli_connect("localhost", "root", "", "go-outside");
if(mysqli_connect_errno()){
  echo "Failed to connect: " . mysqli_connect_errno();
}
?>
