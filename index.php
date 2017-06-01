<?php
include './page-templates/page_header.php';
include './page-templates/navbar.php';
 ?>
 <div class="container">
   <div class="user_details collumn">
     <div class="profile_pic">
       <a href="#"><img src="<?php echo $user['profile_picture'] ?>" alt=""height="54" width="54"></a>
     </div>
     <div class="user_info">
       <?php echo $user['username'] ?><br>
       <em>Dublin - Ireland</em><br>
       <?php echo $user['num_likes'] ?> likes
     </div>
   </div>
 </div>
 <?php include './page-templates/footer.php'; ?>
