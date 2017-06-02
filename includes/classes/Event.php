<?php
class Event {
  private $user_obj;
	private $conn;

	public function __construct($conn, $user){
		$this->conn = $conn;
		$this->user_obj = new User($conn, $user);
	}

  public function submitEvent($type, $title, $description, $location, $date, $time, $event_pic, $invited){
    $title = strip_tags($title);
    $title = mysqli_real_escape_string($this->conn, $title);
    $check_title_empty = preg_replace('/\s+/', '', $title);

    $description = strip_tags($description);
    $description = mysqli_real_escape_string($this->conn, $description);
    $check_desc_empty = preg_replace('/\s+/', '', $description);

    if($check_title_empty != "" && $check_desc_empty != ""){
      $date_added = date("Y-m-d H:i:s");
      $created_by = $this->user_obj->getUsername();
      // $created_by = 'Marcelo';
      $dateAndTime = $date . " " . $time;

      //insert post into database
      $theQuery = "INSERT INTO events VALUES ('', '$title', '$description',
        '$created_by', '$date_added', '$dateAndTime', '$location', '', '', '$type',
        '$invited', '', '', '0', '$event_pic' )";
      $query = mysqli_query($this->conn, $theQuery);

      // $returned_id = mysqli_inserted_id($this->conn);

      //Update event count for user
      // $num_events = $this->$user_obj->getNumEventsCreated();
      // $num_events++;
      // $update_query = mysqli_query($this->$conn, "UPDATE users SET num_events='$num_events'
      //   WHERE username='$created_by'");

    }


  }
}

?>
