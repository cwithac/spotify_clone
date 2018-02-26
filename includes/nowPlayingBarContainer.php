<?php

$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
  array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

 ?>

 <script type="text/javascript">


   $(document).ready(function() {

     currentPlaylist = <?php echo $jsonArray; ?>;
     audioElement = new Audio();
     setTrack(currentPlaylist[0], currentPlaylist, false);

   });

   function setTrack(trackId, newPlaylist, play) {
     audioElement.setTrack('assets/music/bensound-tomorrow.mp3');

     if(play) {
      // audioElement.play();
     }
   }

 </script>

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
      <div class="volumeBar">
        <button class="controlButton volume" title="Volume">
          <img src="assets/images/icons/volume.png" alt="Volume">
        </button>
        <div class="progressBar">
          <div class="progressBarBg"><div class="progress"></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
