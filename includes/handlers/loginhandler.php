<?php
// Login Button Pressed
if(isset($_POST['loginButton'])) {
  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  $result = $account->login($username, $password);

  if($result) {
    $_SESSION['userLoggedIn'] = $username; //Persisting Session
    header('Location: index.php');
  }
}

?>
