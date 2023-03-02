<!-- HTML form part -->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style-index.css">
</head>
<body>
<div>
  <h1>Form</h1>
  <form method="post" action="forward.php" enctype="multipart/form-data">
    <label for="uname">User Name : </label>
    <input type="text" id="uname" name="uname" required>
    <span class="error">*
      <?php
      if(isset($_SESSION["userErr"])) {
        echo $_SESSION["userErr"];
        unset($_SESSION["userErr"]);
      }
      ?>
    </span>
    <br><br>
    <label for="pwd">Password : </label>
    <input type="password" id="pwd" name="pwd" required>
    <span class="error">*
      <?php
      if(isset($_SESSION["pwdErr"])) {
        echo $_SESSION["pwdErr"];
        unset($_SESSION["pwdErr"]);
      }
      ?>
    </span>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</div>