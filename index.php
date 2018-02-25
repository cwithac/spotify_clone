<?php
  //Require Session/Active Login for page
  include('includes/config.php');

//TEMPORARY SESSION DEACTIVATE
  // session_destroy();


  if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header('Location: register.php');
  }

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Slotify</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <div id="nowPlayingBarContainer">
      <div id="nowPlayingBar">
        <div id="nowPlayingLeft">

        </div>
        <div id="nowPlayingCenter">

        </div>
        <div id="nowPlayingRight">

        </div>
      </div>
    </div>

  </body>
</html>
