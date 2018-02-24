<?php

//Data Sanitize Functions
function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText); //Removes Non-String
  $inputText = str_replace(" ", "", $inputText); //Removes Spaces
  return $inputText;
}

function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText); //Removes Non-String
  return $inputText;
}

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText); //Removes Non-String
  $inputText = str_replace(" ", "", $inputText); //Removes Spaces
  $inputText = ucfirst(strtolower($inputText)); //Upcase first character
  return $inputText;
}

//Data Validation Functions
function validateUsername($username) {

}

function validateFirstName($firstName) {

}

function validateLastName($lastName) {

}

function validateEmails($email, $emailconfirm) {

}

function validatePasswords($password, $passwordconfirm) {

}

// Register Button Pressed
if(isset($_POST['registerButton'])) {
  $registerUsername = sanitizeFormUsername($_POST['registerUsername']); //Set Variable, Run Sanitize Function
  $registerFirstName = sanitizeFormString($_POST['registerFirstName']); //Set Variable, Run Sanitize Function (String)
  $registerLastName = sanitizeFormString($_POST['$registerLastName']); //Set Variable, Run Sanitize Function (String)
  $registerEmail = sanitizeFormString($_POST['$registerEmail']); //Set Variable, Run Sanitize Function (String)
  $registerEmailConfirm = sanitizeFormString($_POST['$registerEmailConfirm']); //Set Variable, Run Sanitize Function (String)
  $registerPassword = sanitizeFormPassword($_POST['$registerPassword']); //Set Variable, Run Sanitize Function (PW)
  $registerPasswordConfirm = sanitizeFormPassword($_POST['$registerPasswordConfirm']); //Set Variable, Run Sanitize Function (PW)

  validateUsername($registerUsername);
  validateFirstName($registerFirstName);
  validateLastName($registerLastName);
  validateEmails($registerEmail, $registerEmailConfirm);
  validatePasswords($password, $passwordconfirm);
}

?>
