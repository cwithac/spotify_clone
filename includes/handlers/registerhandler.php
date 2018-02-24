<?php
//Data Sanitize
function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
  //Removes Non-String Content
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
  //Removes Non-String Content and Spaces
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
  //Removes Non-String Content, Spaces, Upcase first letter of string
}

//Register button was pressed
if(isset($_POST['registerButton'])) {
  //variables match html name field
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

	if($wasSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username; //Persisting Session
		header("Location: index.php");
	}

}


?>
