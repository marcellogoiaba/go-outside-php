<?php include './page-templates/header.php' ?>
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#"></a></li>

        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"></a></li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div <div class="row">
      <div class="col-md-12">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <legend>Register Form</legend>
          <form class="" action="register.php" method="POST">
            <input type="text" class="form-control" name="reg_fname" placeholder="First Name" required="true"><br>
            <input type="text" class="form-control" name="reg_lname" placeholder="Last Name" required="true"><br>
            <input type="email" class="form-control" name="reg_email" placeholder="Email" required="true"><br>
            <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email" required="true"><br>
            <input type="password" class="form-control" name="reg_password" placeholder="Password" required="true"><br>
            <input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" required="true"><br>
            <input type="submit" class="col-sm-12 btn btn-primary" name="reg_button" value="Register">
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>
  </div>
<?php include './page-templates/footer.php' ?>
