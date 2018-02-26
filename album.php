<?php include('includes/header.php');

if(isset($_GET['id'])) {
  $albumId = $_GET['id'];
} else {
  header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">
  <div class="leftSection">
    <img src="<?php echo $album->getArtworkPath(); ?>" alt="Artwork">
  </div>
  <div class="rightSection">
    <h2><?php echo $album->getTitle(); ?></h2>
    <p>By <?php echo $artist->getName(); ?></p>
    <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
  </div>
</div>

<div class="trackListContainer">
  <ul class="tracklist">
    <?php
    $songIdArray = $album->getSongIds();
    $i = 1;
    foreach($songIdArray as $songId) {
      $albumSong = new Song($con, $songId);
      $albumArtist = $albumSong->getArtist();
      echo "
        <li class='tracklistRow'>
          <div class='trackCount'>
            <img class='play' src='assets/images/icons/play-white.png'>
            <span class='trackNumber'>$i</span>
          </div>
          <div class='trackInfo'>
            <span class='trackName'>" . $albumSong->getTitle() . "</span>
            <span class='artistName'>" . $albumArtist->getName() . "</span>
          </div>
        </li>
      ";

      $i++;
    }
    ?>
  </ul>
</div>


<?php include('includes/footer.php'); ?>
