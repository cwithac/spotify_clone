<?php include('includes/header.php');

if(isset($_GET['id'])) {
  $albumId = $_GET['id'];
} else {
  header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();

echo $artist->getName();
echo $album->getTitle();

?>



<?php include('includes/footer.php'); ?>
