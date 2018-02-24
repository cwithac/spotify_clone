<?php

  class Account {

      private $errorArray;

      public function __construct() {
        $this->errorArray = array();
      }

      public function register($registerUsername, $registerFirstName, $registerLastName, $registerEmail, $registerEmailConfirm, $password, $passwordconfirm) {
        $this->validateUsername($registerUsername);
        $this->validateFirstName($registerFirstName);
        $this->validateLastName($registerLastName);
        $this->validateEmails($registerEmail, $registerEmailConfirm);
        $this->validatePasswords($password, $passwordconfirm);
      }

      //Data Validation Functions
      private function validateUsername($username) {
        if(strlen($username) > 25 || strlen($username) < 5) {
          array_push($this->errorArray, 'Your username must be between 5 and 25 characters.');
          return;
        }
        //TO DO: Check against user table for username.
      }

      private function validateFirstName($firstName) {
        if(strlen($firstName) > 25 || strlen($firstName) < 2) {
          array_push($this->errorArray, 'Your first name must be between 2 and 25 characters.');
          return;
        }
      }

      private function validateLastName($lastName) {
        if(strlen($lastName) > 25 || strlen($lastName) < 2) {
          array_push($this->errorArray, 'Your last name must be between 2 and 25 characters.');
          return;
        }
      }

      private function validateEmails($email, $emailconfirm) {
        if($email != $emailconfirm) {
          array_push($this->errorArray, 'Your emails do not match.');
          return;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          array_push($this->errorArray, 'Email address is invalid.');
          return;
        }
        //TO DO: Check against table for existing email.
      }

      private function validatePasswords($password, $passwordconfirm) {

      }

  }

 ?>
