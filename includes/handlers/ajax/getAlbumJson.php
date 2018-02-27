<?php

  include('../../config.php');

  if(isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];
    $query = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");

    $resultsArray = mysqli_fetch_array($query);

    echo json_encode($resultsArray);

  }

 ?>
