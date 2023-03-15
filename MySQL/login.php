<!-- Backend part of the login page. -->

<?php

  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require 'SendQuery.php';

    $_SESSION["userName"] = $_POST["user"];
    $_SESSION["password"] = $_POST["pwd"];

    $query = new SendQuery();
    $user = $query->select($_SESSION["userName"]);

    if(isset($user) && $user->fetch_assoc()["Username"] == $_SESSION["userName"]) {

      $pwd = $query->select($_SESSION["userName"], $_SESSION["password"]);

      if(isset($pwd) && $pwd->fetch_assoc()["Password"] == $_SESSION["password"]) {

        $task = $query->selectTask($_SESSION["userName"]);
        $_SESSION["tasknum"] = $task->fetch_assoc()["TaskNum"];
        
        if(isset($_SESSION["tasknum"])) {
  
          if($_SESSION["tasknum"] == 1) {
            header("Location: phptasks/task-1_oops/index.php");
          }
        
          elseif($_SESSION["tasknum"] == 2) {
            header("Location: phptasks/task-2_oops/index.php");
          }
        
          elseif($_SESSION["tasknum"] == 3) {
            header("Location: phptasks/task-3_oops/index.php");
          }
        
          elseif($_SESSION["tasknum"] == 4) {
            header("Location: phptasks/task-4_oops/index.php");
          }
        
          elseif($_SESSION["tasknum"] == 5) {
            header("Location: phptasks/task-5_oops/index.php");
          }
        
          elseif($_SESSION["tasknum"] == 6) {
            header("Location: phptasks/task-6_oops/index.php");
          }
  
        }
  
        else {
          header('Location: tasks.php');
        }
  
      }

      else {
        $_SESSION["pwdErr"] = "Incorrect Password";
        header ("Location: index_login.php");
      }

    }
  
    else {
      $_SESSION["userErr"] = "You don't have any account under this username.";
      header ("Location: index_login.php");
    }

  }

?>