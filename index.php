<?php
include './page-templates/page_header.php';
include './page-templates/navbar.php';
include './includes/classes/User.php';
include './includes/classes/Event.php';

if(isset($_POST['submit_event'])){
  $post = new Event($conn, $userLoggedIn);
  $post->submitEvent($_POST['event_type'], $_POST['event_title'], $_POST['event_description'], $_POST['event_location'], $_POST['event_date'], $_POST['event_time'], $_POST['event_invited'], $_POST['event_pic']);
}

 ?>
 <div class="container">
   <div class="col-xs-12">
     <div class="col-sx-2 collumn side_bar">
       <div class="profile_pic">
         <a href="<?php echo $userLoggedIn ?>"><img src="<?php echo $user['profile_picture'] ?>" alt="" ></a>
       </div>
       <div class="user_info">
          <a href="<?php echo $userLoggedIn ?>"><?php echo $user['username'] ?></a><br>
         <em><?php echo $user['city'] . ' - ' . $user['country']?></em><br>
         <?php echo $user['num_likes'] ?> likes
       </div>
     </div>
     <div class="col-xs-10 main_collumn collumn">
       <div class="col-xs-12">
         <a href="#" id="newEventFlip">
           <div class="col-xs-6 text-center main_collumn_header ">
              <i class="fa fa-leaf" aria-hidden="true"></i> New Event
           </div>
         </a>
         <a href="#" id=>
           <div class="col-xs-6 text-center main_collumn_header">
             <i class="fa fa-trophy" aria-hidden="true"></i> Achievements
           </div>
         </a>
       </div>
       <div class="col-xm-12 formSlider" id="newEventPanel">
         <form class="post-form" action="index.php" method="post">
           <label class="app-label">Event Type</label><br>
           <select class="form-control" name="event_type">
             <option value="public">&#xf0ac; Create public event</option>
             <option value="private">&#xf023; Create private event</option>
           </select> <br>
           <label class="app-label">Event Title</label>
           <input type="text" name="event_title" class="form-control" required="true" placeholder="Add a short, clear title" value=""><br>
           <label class="app-label">Description</label>
           <textarea name="event_description" rows="3" class="form-control" required="true" placeholder="Tell people more about this event"></textarea><br>
           <label class="app-label">Location</label>
           <input type="text" name="event_location" class="form-control" required="true" placeholder="Include a place and address" value=""><br>
           <div class="form-group col-xs-6 nopaddingleft">
             <label class="app-label">Date</label>
             <input type="date" class="form-control" placeholder="dd/mm/yyyy" required="true" name="event_date" value="">
           </div>
           <div class="form-group col-xs-6 nopaddingright">
             <label class="app-label">Time</label>
             <input type="time" name="event_time" class="form-control" placeholder="16:00" required="true" value="">
           </div><br>
           <label class="app-label">Invite Buddies</label>
           <input type="text" class="form-control" name="event_invited" placeholder="Tag friends" value=""><br>
           <label class="app-label">Event Picture</label>
           <input type="file" name="event_pic" class="from-control"><br>
           <input type="submit" class="btn btn-default col-xs-12" name="submit_event" value="Create Event">
         </form>
       </div>
     </div>
   </div>
 </div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

 <?php include './page-templates/footer.php'; ?>
