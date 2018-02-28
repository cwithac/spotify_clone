<?php

include('includes/includedFiles.php');

if(isset($_GET['term'])) {
  $term = urldecode($_GET['term']);
} else {
  $term = '';
}

 ?>

<div class="searchContainer">
  <h4>Search for an Artist, Album, or Song</h4>
  <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing..." onfocus="var val=this.value; this.value=''; this.value= val;">
</div>

<script type="text/javascript">
$('.searchInput').focus(); //Retains focus on search field, onfocus="this.value" ... keeps cursor at end
  $(function(){
    var timer;
    $('.searchInput').keyup(function() {
      clearTimeout(timer); //Waits until typing has stopped
      timer = setTimeout(function() {
        var val = $('.searchInput').val();
        openPage('search.php?term=' + val);
      }, 2000);
    })
  })
</script>

<?php

  if($term == '') {
    exit();
  }

 ?>

<div class="trackListContainer borderBottom">
  <h2>Songs</h2>
  <ul class="tracklist">
    <?php
    $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");
    if(mysqli_num_rows($songsQuery) == 0) {
      echo "<span class='noResults'>No songs found matching: " . $term . "</span>";
    }
    $songIdArray = array();
    $i = 1;
    while($row = mysqli_fetch_array($songsQuery)) {
      if ($i > 15) {
        break;
      }
      array_push($songIdArray, $row['id']);
      $albumSong = new Song($con, $row['id']);
      $albumArtist = $albumSong->getArtist();
      echo "
        <li class='tracklistRow'>
          <div class='trackCount'>
            <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
            <span class='trackNumber'>$i</span>
          </div>
          <div class='trackInfo'>
            <span class='trackName'>" . $albumSong->getTitle() . "</span>
            <span class='artistName'>" . $albumArtist->getName() . "</span>
          </div>
          <div class='trackOptions'>
            <img class='optionsButton' src='assets/images/icons/more.png'>
          </div>
          <div class='trackDuration'>
            <span class='duration'>" . $albumSong->getDuration() . "</span>
          </div>
        </li>
      ";

      $i++;
    }
    ?>
    <!-- SONGS OF THE ALBUM PAGE -->
    <script type="text/javascript">
      var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
      tempPlaylist = JSON.parse(tempSongIds)
    </script>
  </ul>
</div>

<div class="artistsContainer borderBottom">
  <h2>Artists</h2>
  <?php
    $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");
    if(mysqli_num_rows($artistsQuery) == 0) {
      echo "<span class='noResults'>No artists found matching: " . $term . "</span>";
    }
    while($row = mysqli_fetch_array($artistsQuery)) {
      $artistFound = new Artist($con, $row['id']);
      echo "<div class='searchResultsRow'>
              <div class='artistName'>
                <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
                  "
                    . $artistFound->getName() .
                  "
                </span>
              </div>
            </div>";
    }
   ?>
</div>

<div class="gridViewContainer">
	<h2>Albums</h2>
    <?php
        $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");

        if(mysqli_num_rows($albumQuery) == 0) {
          echo "<span class='noResults'>No albums found matching: " . $term . "</span>";
        }

        while($row = mysqli_fetch_array($albumQuery)) {
          echo "
          <div class='gridViewItem'>
          <span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
            <img src='" . $row['artworkPath'] . "'>
            <div class='gridViewInfo'>"
              . $row['title'] .
            "</div>
            </span>
          </div>
          ";
        }
     ?>

</div>
