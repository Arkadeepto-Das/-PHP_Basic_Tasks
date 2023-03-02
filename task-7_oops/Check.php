<!-- OOPS and checking Part -->

<?php
class Check {

  public $userName;
  public $password;

  function __construct($userName, $password) {
    $this->userName = $userName;
    $this->password = $password;
  }

  function userNamecheck() {
    
    if($this->userName != "arkadeepto") {
      
      $userErr = "Enter correct username";
      return $userErr;
      
    }
  
  }

  function passwordCheck() {

    if($this->password != "arka123") {
        
      $passwordErr = "Enter correct password";
      return $passwordErr;
      
    }

  }

}