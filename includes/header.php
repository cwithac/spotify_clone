<?php
  //Require Session/Active Login for page
  include('includes/config.php');
  include('includes/classes/Artist.php');
  include('includes/classes/Album.php');
  include('includes/classes/Song.php');

//TEMPORARY SESSION DEACTIVATE
  // session_destroy();

//Login Check
  if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
    echo "<script>userLoggedIn = '$userLoggedIn'; </script>";
  } else {
    header('Location: register.php');
  }

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Slotify</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/script.js" charset="utf-8"></script>
  </head>
  <body>

    <div id="mainContainer">
      <div id="topContainer">
        <?php include('includes/navBarContainer.php'); ?>
        <div id="mainViewContainer">
          <div id=mainContent>
