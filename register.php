<?php
  //Include external files
  include('includes/classes/Account.php');

  $account = new Account();
  $account->register();

  include('includes/handlers/registerhandler.php');
  include('includes/handlers/loginhandler.php');
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <div id="inputContainer">
      <form id="loginForm" action="register.php" method="POST">
        <h2>Login</h2>
        <p>
          <label for="loginUsername">Username</label>
          <input id="loginUsername" type="text" name="loginUsername" required>
        </p>
        <p>
          <label for="loginPassword">Password</label>
          <input id="loginPassword" type="password" name="loginPassword" required>
        </p>
          <button type="submit" name="loginButton">Log In</button>
      </form>
      <form id="registerForm" action="register.php" method="POST">
        <h2>Register</h2>
        <p>
          <label for="registerUsername">Username</label>
          <input id="registerUsername" type="text" name="registerUsername" required>
        </p>
        <p>
          <label for="registerFirstName">First Name</label>
          <input id="registerFirstName" type="text" name="registerFirstName" required>
        </p>
        <p>
          <label for="registerLastName">Last Name</label>
          <input id="registerLastName" type="text" name="registerLastName" required>
        </p>
        <p>
          <label for="registerEmail">E-Mail</label>
          <input id="registerEmail" type="email" name="registerEmail" required>
        </p>
        <p>
          <label for="registerEmailConfirm">Confirm E-Mail</label>
          <input id="registerEmailConfirm" type="email" name="registerEmailConfirm" required>
        </p>
        <p>
          <label for="registerPassword">Password</label>
          <input id="registerPassword" type="password" name="registerPassword" required>
        </p>
        <p>
          <label for="registerPasswordConfirm">Confirm Password</label>
          <input id="registerPasswordConfirm" type="password" name="registerPasswordConfirm" required>
        </p>
          <button type="submit" name="registerButton">Register</button>
      </form>
    </div>
  </body>
</html>
