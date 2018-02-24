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
        //TOOD: Check against user table for username.
      }

      private function validateFirstName($firstName) {

      }

      private function validateLastName($lastName) {

      }

      private function validateEmails($email, $emailconfirm) {

      }

      private function validatePasswords($password, $passwordconfirm) {

      }

  }

 ?>
