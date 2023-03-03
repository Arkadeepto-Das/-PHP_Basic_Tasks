<!-- Checking part -->

<?php
  session_start();
?>

<?php

  require 'SendMail.php';
  
  //Checking whether form data is submitted in POST method.
  if($_SERVER["REQUEST_METHOD"] = "POST") {
    
    //Storing Email-ID.
    $email = $_POST["email"];
    //Creating object of the class SendMail.
    $value = new SendMail();
    //Calling emailCheck() method and passing $email in the parameter.
    $validate = $value->emailCheck($email);

    //Send message if Email-ID is incorrect.
    if($validate == false) {
      
      //Storing error message and forwarding it to index.php.
      $_SESSION["emailErr"] = "Enter your Email-ID in proper format";
      header('Location: index.php');

    }

    else {

      //Calling sendMail() method to send mail.
      $value->sendMail($email);
      
    }
  }

?>