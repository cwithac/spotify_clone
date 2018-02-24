<?php

  class Account {

      public function __construct() {

      }

      public function register() {
        $this->validateUsername($registerUsername);
        $this->validateFirstName($registerFirstName);
        $this->validateLastName($registerLastName);
        $this->validateEmails($registerEmail, $registerEmailConfirm);
        $this->validatePasswords($password, $passwordconfirm);
      }

      //Data Validation Functions
      private function validateUsername($username) {

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
