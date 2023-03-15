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

    function uploadImage($filename, $tempname) {

      $target_dir = "uploads/";
      $target_file = $target_dir . basename($filename);
      move_uploaded_file($tempname, $target_file);
      $filepath = "uploads/".$filename;
      return $filepath;
    
    }

    function result($marksdata) {

      $subject = array();
      $marks = array();
      $lines = explode("\r\n", $marksdata);

      foreach($lines as $val) {
        if(preg_match('/^[a-z]+[|]{1}[0-9]{1,3}$/', $val)) {

          $data = explode("|", $val);
          array_push($subject,$data[0]);
          array_push($marks,$data[1]);
        
        }
        
        else {
          $_SESSION["marksErr"] = "Put in the format subject|marks.";
          break;
        }
      
      }
      
      $result = array_combine($subject,$marks);
      return $result;

    }

    public static function input($data) {

      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    
    }

  }

?>