<!-- Validates username and password and forwards to tasks.php -->

<?php
  session_start();
?>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include("Check.php");
    $userName = $_POST["uname"];
    $password = $_POST["pwd"];
    $value = new Check($userName, $password);
    $_SESSION["userErr"] = $value->userNameCheck();
    $_SESSION["pwdErr"] = $value->passwordCheck();

    if(isset($_SESSION["userErr"]) || isset($_SESSION["pwdErr"])) {
      header("Location: index.php");
    }

    elseif(isset($_SESSION["tasknum"])) {

      if($_SESSION["tasknum"] == 1) {
        header("Location: phptasks/task-1/index.php");
      }

      elseif($_SESSION["tasknum"] == 10) {
        header("Location: phptasks/task-1_oops/index.php");
      }
    
      elseif($_SESSION["tasknum"] == 2) {
        header("Location: phptasks/task-2/index.php");
      }

      elseif($_SESSION["tasknum"] == 20) {
        header("Location: phptasks/task-2_oops/index.php");
      }
    
      elseif($_SESSION["tasknum"] == 3) {
        header("Location: phptasks/task-3/index.php");
      }

      elseif($_SESSION["tasknum"] == 30) {
        header("Location: phptasks/task-3_oops/index.php");
      }
    
      elseif($_SESSION["tasknum"] == 4) {
        header("Location: phptasks/task-4/index.php");
      }

      elseif($_SESSION["tasknum"] == 40) {
        header("Location: phptasks/task-4_oops/index.php");
      }
    
      elseif($_SESSION["tasknum"] == 5) {
        header("Location: phptasks/task-5/index.php");
      }

      elseif($_SESSION["tasknum"] == 50) {
        header("Location: phptasks/task-5_oops/index.php");
      }
    
      elseif($_SESSION["tasknum"] == 6) {
        header("Location: phptasks/task-6/index.php");
      }

      elseif($_SESSION["tasknum"] == 60) {
        header("Location: phptasks/task-6_oops/index.php");
      }
    
    }

    else {
      header("Location: tasks.php");
    }

  }
?>