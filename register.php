<?php
  //Include external files

  include('includes/config.php');

	include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/registerhandler.php");
	include("includes/handlers/loginhandler.php");

  //Value Remain Upon Submission
  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>

<html>
<head>
	<title>Welcome to Slotify!</title>
  <link rel="stylesheet" href="assets/css/register.css">
  <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAAh/8AAAfjAAAHwwAAh8MAAOfjAADn+wAA5/sAAOf7AADn+wAA5/sAAOf7AADn+wAA4AMAAOADAAD//wAA" rel="icon" type="image/x-icon" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/register.js" charset="utf-8"></script>
</head>
<body>

  <?php

  if(isset($_POST['registerButton'])) {
    echo "<script>$(document).ready(function(){
        $('#loginForm').hide();
        $('#registerForm').show();
    });</script>";
  } else {
    echo "<script>$(document).ready(function(){
        $('#loginForm').show();
    });</script>";
  }

   ?>

  <div id="background">
    <div id="loginContainer">
      <div id="inputContainer">
     		<form id="loginForm" action="register.php" method="POST">
     			<h2>Login</h2>
     			<p>
             <?php echo $account->getError(Constants::$loginFailed); ?>
     				<label for="loginUsername">Username</label>
     				<input id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername') ?>"required>
     			</p>
     			<p>
     				<label for="loginPassword">Password</label>
     				<input id="loginPassword" name="loginPassword" type="password" required>
     			</p>
     			<button type="submit" name="loginButton">Login</button>
          <div class="hasAccountText">
            <span id="hideLogin">Don't have an account yet?  Register here.</span>
          </div>
     		</form>

     		<form id="registerForm" action="register.php" method="POST">
     			<h2>Create Account</h2>
     			<p>
     				<?php echo $account->getError(Constants::$usernameCharacters); ?>
             <?php echo $account->getError(Constants::$usernameTaken); ?>
     				<label for="username">Username</label>
     				<input id="username" name="username" type="text" value="<?php getInputValue('username') ?>" required>
     			</p>
     			<p>
     				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
     				<label for="firstName">First Name</label>
     				<input id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName') ?>" required>
     			</p>
     			<p>
     				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
     				<label for="lastName">Last Name</label>
     				<input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName') ?>"required>
     			</p>
     			<p>
     				<?php echo $account->getError(Constants::$emailDoNotMatch); ?>
     				<?php echo $account->getError(Constants::$emailInvalid); ?>
             <?php echo $account->getError(Constants::$emailTaken); ?>
     				<label for="email">E-Mail</label>
     				<input id="email" name="email" type="email" value="<?php getInputValue('email') ?>"required>
     			</p>
     			<p>
     				<label for="email2">Confirm E-Mail</label>
     				<input id="email2" name="email2" type="email" required>
     			</p>
     			<p>
     				<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
     				<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
     				<?php echo $account->getError(Constants::$passwordCharacters); ?>
     				<label for="password">Password</label>
     				<input id="password" name="password" type="password" required>
     			</p>
     			<p>
     				<label for="password2">Confirm Password</label>
     				<input id="password2" name="password2" type="password" required>
     			</p>
     			<button type="submit" name="registerButton">Register</button>
          <div class="hasAccountText">
            <span id="hideRegister">Already have an account?  Log in here.</span>
          </div>
     		</form>
     	</div>
      <div id="loginText">
        <h1>Get great music, right now</h1>
        <h2>Listen to thousands of songs for free.</h2>
        <ul>
          <li>Discover music you'll fall in love with</li>
          <li>Create your own playlists</li>
          <li>Follow artists to keep up to date</li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>
