<!-- Checking part -->
<!-- Valid data will be printed here -->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $c = 0;

  $_SESSION["uname"] = $_POST["uname"];

  if($_SESSION["uname"] != "arkadeepto") {
    $_SESSION["unameErr"] = "Enter correct username";
    ++$c;
  }

  $_SESSION["pwd"] = $_POST["pwd"];

  if($_SESSION["pwd"] != "arka123") {
    $_SESSION["pwdErr"] = "Enter correct password";
    ++$c;
  }

}

if($c>0) {
  header("Location: index.php");
}

elseif(isset($_SESSION["tasknum"])) {

  if($_SESSION["tasknum"]==1) {
    header("Location: phptasks/task-1/index.php");
  }

  elseif($_SESSION["tasknum"]==2) {
    header("Location: phptasks/task-2/index.php");
  }

  elseif($_SESSION["tasknum"]==3) {
    header("Location: phptasks/task-3/index.php");
  }

  elseif($_SESSION["tasknum"]==4) {
    header("Location: phptasks/task-4/index.php");
  }

  elseif($_SESSION["tasknum"]==5) {
    header("Location: phptasks/task-5/index.php");
  }

  elseif($_SESSION["tasknum"]==6) {
    header("Location: phptasks/task-6/index.php");
  }

}

else {
  header("Location: tasks.php");
}
?>
</div>
</body>
</html>