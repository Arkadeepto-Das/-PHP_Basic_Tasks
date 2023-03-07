<!-- OOPS and checking Part -->

<?php
  class Check {

    public $firstName;
    public $lastName;
    public $c = 0;

    function __construct($firstName, $lastName) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
    }

    function firstNamecheck() {
      
      if(!preg_match("/^[A-Z]{1}[a-z]+$/",$this->firstName)) {
        
        $fnameErr = "First name should start with capital letter and should contain only alphabets";
        ++$this->c;
        return $fnameErr;
        
      }
    
    }

    function lastNameCheck() {

      if(!preg_match("/^[A-Z]{1}[a-z]+$/",$this->lastName)) {
          
        $lnameErr = "Last name should start with capital letter and should contain only alphabets";
        ++$this->c;
        return $lnameErr;
        
      }

    }

    function fullName() {
      
      if($this->c == 0) {
        return $this->firstName . " " . $this->lastName;
      }

    }

    public static function input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  }