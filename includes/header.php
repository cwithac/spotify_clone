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

    <div id="mainContainer">
      <div id="topContainer">
        <?php include('includes/navBarContainer.php'); ?>
        <div id="mainViewContainer">
          <div id=mainContent>
