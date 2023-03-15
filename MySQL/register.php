<!-- Backend part of the registration page. -->

<?php

  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require 'SendQuery.php';

    $_SESSION["userName"] = $_POST["user"];

    $query = new SendQuery();
    $result = $query->select($_SESSION["userName"]);

    if($result === NULL) {

      $_SESSION["password"] = $_POST["pwd"];
      SendQuery::add($_SESSION["userName"], $_SESSION["password"]);
      header('Location: tasks.php');

    }

    else {
      $_SESSION["userErr"] = "This username is already registered.";
      header('Location: index.php');
    }

  }

?>