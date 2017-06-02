<?php
class User {
  private $user;
  private $conn;

  public function __constructor($conn, $user){
    $this->conn = $conn;
    $user_details_query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $this->user = mysqli_fetch_array($user_details_query);
  }
  public function getUsername(){
    return $this->user['username'];
  }

  public function getNumEventsCreated(){
    $username = $this->user['username'];
    $query = mysqli_query($this->conn, "SELECT num_events FROM users WHERE username='$username'");
    $row = mysqli_fetch_array($query);
    return $row['num_events'];
  }

  private function getFirstNameAndLastName(){
    $username = $this->user['username'];
    $query = mysqli_query($this->conn, "SELECT first_name, last_name FROM users WHERE username='$username'");
    $row = mysqli_fetch_array($query);
    return $row['first_name'] . " " . $row['last_name'];
  }

}

?>
