<?php

//Database Query
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
  array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

 ?>

 <script type="text/javascript">


   $(document).ready(function() {
     //Generate New Playlist
     var newPlaylist = <?php echo $jsonArray; ?>;
     audioElement = new Audio();
     setTrack(newPlaylist[0], newPlaylist, false);
     updateVolumeProgressBar(audioElement.audio);

     //Playback and volume sliders
     $('#nowPlayingBarContainer').on('mousedown touchstart mousemove touchmove', function(e) {
       e.preventDefault();
     });
     $('.playbackBar .progressBar').mousedown(function() {
       mouseDown = true;
     });
     $('.playbackBar .progressBar').mousemove(function(e) {
       if(mouseDown) {
         timeFromOffset(e, this);
       }
     });
     $('.playbackBar .progressBar').mouseup(function(e) {
       timeFromOffset(e, this);
     });
     $('.volumeBar .progressBar').mousedown(function() {
       mouseDown = true;
     });
     $('.volumeBar .progressBar').mousemove(function(e) {
       if(mouseDown) {
         var percentage = e.offsetX / $(this).width();
         if(percentage => 0 && percentage <= 1) {
           audioElement.audio.volume = percentage;
         }
       }
     });
     $('.volumeBar .progressBar').mouseup(function(e) {
       var percentage = e.offsetX / $(this).width();
       if(percentage >= 0 && percentage <= 1) {
         audioElement.audio.volume = percentage;
       }
     });
     $(document).mouseup(function() {
       mouseDown = false;
     });

   }); //documentready

   //Slider visual functionality
   function timeFromOffset(mouse, progressBar) {
     var percentage = mouse.offsetX / $(progressBar).width() * 100;
     var seconds = audioElement.audio.duration * (percentage / 100);
     audioElement.setTime(seconds);
   }

   function prevSong() {
     //Restart song if greater than 3 seconds duration, or first song in playlist, else previous song
     if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
       audioElement.setTime(0);
     } else {
       currentIndex = currentIndex - 1;
       setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
     }
   };

   function nextSong() {
     if(repeat) {
       audioElement.setTime(0);
       playSong();
       return;
     }
     if(currentIndex == currentPlaylist.length - 1) {
       currentIndex = 0;
     } else {
       currentIndex++;
     }
     //Current playlist if shuffle off, shuffle playlist if shuffle on
     var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
     setTrack(trackToPlay, currentPlaylist, true);
   };

   //Button functoinality for repeat, mute and shuffle
   function setRepeat() {
     repeat = !repeat;
     var imageName = repeat ? 'repeat-active.png' : 'repeat.png';
     $('.controlButton.repeat img').attr('src', 'assets/images/icons/' + imageName);
   };

   function setMute() {
     audioElement.audio.muted = !audioElement.audio.muted;
     var imageName = audioElement.audio.muted ? 'volume-mute.png' : 'volume.png';
     $('.controlButton.volume img').attr('src', 'assets/images/icons/' + imageName);
   };

   function setShuffle() {
     shuffle = !shuffle;
     var imageName = shuffle ? 'shuffle-active.png' : 'shuffle.png';
     $('.controlButton.shuffle img').attr('src', 'assets/images/icons/' + imageName);

     if(shuffle) {
       //Relates index of currently playing song to new index in shuffled playlist
       shuffleArray(shufflePlaylist);
       currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
     } else {
       currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
     }
   };

    function shuffleArray(array) {
      //Durstenfeld Shuffle / Fisher Yates
      for (var i = array.length - 1; i > 0; i--) {
          var j = Math.floor(Math.random() * (i + 1));
          var temp = array[i];
          array[i] = array[j];
          array[j] = temp;
      }
    };

   function setTrack(trackId, newPlaylist, play) {

     if(newPlaylist != currentPlaylist) {
       currentPlaylist = newPlaylist;
       shufflePlaylist = currentPlaylist.slice();
       shuffleArray(shufflePlaylist);
     }
     //Relates index of currently playing song to new index in shuffled playlist
     if(shuffle == true) {
       currentIndex = shufflePlaylist.indexOf(trackId);
     } else {
       currentIndex = currentPlaylist.indexOf(trackId);
     }
     pauseSong();
     //AJAX call from Database
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
       if(play) {
            playSong();
       }
     });

   };
   //Play and pause functionality
   function playSong() {
     if(audioElement.audio.currentTime == 0) {
       $.post('includes/handlers/ajax/updatePlays.php', { songId: audioElement.currentlyPlaying.id });
     }
     $('.controlButton.play').hide();
     $('.controlButton.pause').show();
     audioElement.play();
   };

   function pauseSong() {
     $('.controlButton.pause').hide();
     $('.controlButton.play').show();
     audioElement.pause();
   };

 </script>
<!-- BEGIN HTML -->
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
          <button class="controlButton shuffle" onclick=setShuffle()><img src="assets/images/icons/shuffle.png" title="Shuffle" alt="Shuffle"></button>
          <button class="controlButton previous" onclick=prevSong()><img src="assets/images/icons/previous.png" title="Previous" alt="Previous"></button>
          <button class="controlButton play" onclick="playSong()"><img src="assets/images/icons/play-filled.png" title="Play" alt="Play"></button>
          <button class="controlButton pause" onclick="pauseSong()" style="display: none;"><img src="assets/images/icons/pause.png" title="Pause" alt="Pause"></button>
          <button class="controlButton next" onclick="nextSong()"><img src="assets/images/icons/next.png" title="Next" alt="Next"></button>
          <button class="controlButton repeat" onclick="setRepeat()"><img src="assets/images/icons/repeat.png" title="Repeat" alt="Repeat"></button>
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
        <button class="controlButton volume" title="Volume" onclick=setMute()>
          <img src="assets/images/icons/volume.png" alt="Volume">
        </button>
        <div class="progressBar">
          <div class="progressBarBg"><div class="progress"></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
