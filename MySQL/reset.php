<!-- Here the password of the user is reset. -->

<?php

  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'SendQuery.php';

    $_SESSION["userName"] = $_POST["user"];
    $_SESSION["password"] = $_POST["pwd"];

    $query = new SendQuery();
    $query->resetPassword($_SESSION["userName"], $_SESSION["password"]);
  
    header("Location: index_login.php");
  
  }
?>