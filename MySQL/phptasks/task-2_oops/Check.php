<!-- OOPS and checking Part -->

<?php

  class Check {

    public $firstName;
    public $lastName;

    function __construct($firstName, $lastName) {
      $this->firstName = self::input($firstName);
      $this->lastName = self::input($lastName);
    }

    function firstNamecheck() {
      
      if(!preg_match("/^[A-Z]{1}[a-z]+$/",$this->firstName)) {
        
        $fnameErr = "First name should start with capital letter and should contain only alphabets";
        return $fnameErr;
        
      }
    
    }

    function lastNameCheck() {

      if(!preg_match("/^[A-Z]{1}[a-z]+$/",$this->lastName)) {
          
        $lnameErr = "Last name should start with capital letter and should contain only alphabets";
        return $lnameErr;
        
      }

    }

    function fullName() {
      return $this->firstName . " " . $this->lastName;
    }

    function printImage($filename, $tempname) {

      $target_dir = "uploads/";
      $target_file = $target_dir . basename($filename);
      move_uploaded_file($tempname, $target_file);
      $filepath = "uploads/".$filename;
      return $filepath;
    
    }

    public static function input($data) {

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    
    }

  }

?>