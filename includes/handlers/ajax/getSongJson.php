<?php

  include('../../config.php');

  if(isset($_POST['songId'])) {
    $songId = $_POST['songId'];
    $query = mysqli_query($con, "SELECT * FROM songs WHERE id='$songId'");

    $resultsArray = mysqli_fetch_array($query);

    echo json_encode($resultsArray);

  }

 ?>
