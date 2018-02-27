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

   }); //documentready

   function setTrack(trackId, newPlaylist, play) {

     $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) {
       var track = JSON.parse(data);
       $('.trackname span').text(track.title);
         $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) {
           var artist = JSON.parse(data);
           $('.artistName span').text(artist.name);
         });
         $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) {
           var album = JSON.parse(data);
           $('.albumLink img').attr('src', album.artworkPath);
         });
       audioElement.setTrack(track);
       playSong();
     });

     if(play) {
      audioElement.play();
     }
   }

   function playSong() {
     if(audioElement.audio.currentTime == 0) {
       $.post('includes/handlers/ajax/updatePlays.php', { songId: audioElement.currentlyPlaying.id });
     }
     $('.controlButton.play').hide();
     $('.controlButton.pause').show();
     audioElement.play();
   }

   function pauseSong() {
     $('.controlButton.pause').hide();
     $('.controlButton.play').show();
     audioElement.pause();
   }

 </script>

<div id="nowPlayingBarContainer">
  <div id="nowPlayingBar">
    <div id="nowPlayingLeft">
      <div class="content">
        <span class="albumLink">
          <img class="albumArtwork" src="" alt="Artwork">
        </span>
        <div class="trackInfo">
          <span class="trackName">
            <span></span>
          </span>
          <span class="artistName">
            <span></span>
          </span>
        </div>
      </div>
    </div>
    <div id="nowPlayingCenter">
      <div class="content playerControls">
        <div class="buttons">
          <button class="controlButton shuffle"><img src="assets/images/icons/shuffle.png" title="Shuffle" alt="Shuffle"></button>
          <button class="controlButton previous"><img src="assets/images/icons/previous.png" title="Previous" alt="Previous"></button>
          <button class="controlButton play" onclick="playSong()"><img src="assets/images/icons/play-filled.png" title="Play" alt="Play"></button>
          <button class="controlButton pause" onclick="pauseSong()" style="display: none;"><img src="assets/images/icons/pause.png" title="Pause" alt="Pause"></button>
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
