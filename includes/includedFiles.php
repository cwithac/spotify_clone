<?php
//Verify if page request is AJAX or hard reload
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    //Require Session/Active Login for page
    include("includes/config.php");
    include("includes/classes/User.php");
  	include("includes/classes/Artist.php");
  	include("includes/classes/Album.php");
  	include("includes/classes/Song.php");

    if(isset($_GET['userLoggedIn'])) {
      $userLoggedIn = new User($con, $_GET['userLoggedIn']);
    } else {
      echo 'Username variable was not passed into the page.';
      exit();
    }
  }
  else {
  	include("includes/header.php");
  	include("includes/footer.php");

  	$url = $_SERVER['REQUEST_URI'];
  	echo "<script>openPage('$url')</script>";
  	exit();
  }

  ?>
