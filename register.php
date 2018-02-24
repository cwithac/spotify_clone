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
</head>
<body>
  <div id="background">
    <div id="loginContainer">
      <div id="inputContainer">
     		<form id="loginForm" action="register.php" method="POST">
     			<h2>Login</h2>
     			<p>
             <?php echo $account->getError(Constants::$loginFailed); ?>
     				<label for="loginUsername">Username</label>
     				<input id="loginUsername" name="loginUsername" type="text" required>
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
    </div>

  </div>
</body>
</html>
