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
          <div class="content">
            <span class="albumLink">
              <img class="albumArtwork" src="https://i.imgur.com/qG34kGH.png" alt="">
            </span>
            <div class="trackInfo">
              <span class="trackName">
                <span>Twinkle Twinkle</span>
              </span>
              <span class="artistName">
                <span>Cathleen Wright</span>
              </span>
            </div>
          </div>
        </div>
        <div id="nowPlayingCenter">
          <div class="content playerControls">
            <div class="buttons">
              <button class="controlButton shuffle"><img src="assets/images/icons/shuffle.png" title="Shuffle" alt="Shuffle"></button>
              <button class="controlButton previous"><img src="assets/images/icons/previous.png" title="Previous" alt="Previous"></button>
              <button class="controlButton play"><img src="assets/images/icons/play-filled.png" title="Play" alt="Play"></button>
              <button class="controlButton pause" style="display: none;"><img src="assets/images/icons/pause.png" title="Pause" alt="Pause"></button>
              <button class="controlButton next"><img src="assets/images/icons/next.png" title="Next" alt="Next"></button>
              <button class="controlButton repeat"><img src="assets/images/icons/repeat.png" title="Repeat" alt="Repeat"></button>
            </div>
            <div class="playbackBar">
              <span class="progressTime current">0:00</span>
              <div class="progressBar">
                <div class="progressBarBg"><div class="progress"></div></div>
              </div>
              <span class="progressTime remaining">0:00</span>
            </div>
          </div>
        </div>
        <div id="nowPlayingRight">

        </div>
      </div>
    </div>

  </body>
</html>
