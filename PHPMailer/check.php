<?php
  session_start();
?>

<?php

  require 'SendMail.php';
  
  if($_SERVER["REQUEST_METHOD"] = "POST") {
    
    $email = $_POST["email"];
    $value = new SendMail();
    $value->emailCheck($email);

    if(isset($_SESSION["emailErr"])) {

      header('Location: index.php');

    }

    else {

      $value->sendMail($email);
      
    }
  }

?>