<?php
  //Require Session/Active Login for page
  include('includes/config.php');

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
  </head>
  <body>
    Hello
  </body>
</html>
