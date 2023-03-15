<!-- HTML part for register page-->

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style-index.css">
</head>
<body>
<div>
  <h1>Register</h1>
  <form method="post" action="register.php" enctype="multipart/form-data">
    <label for="user">User Name : </label>
    <input type="text" id="user" name="user" required>
    <span class="error">*</span>
    <br>
    <span class="error">
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
    <span class="error">*</span>
    <br>
    <span class="error">
      <?php
        if(isset($_SESSION["pwdErr"])) {
          echo $_SESSION["pwdErr"];
          unset($_SESSION["pwdErr"]);
        }
      ?>
    </span>
    <br><br>
    <span class="login">Already have an account?
      <a href="index_login.php">Login Here</a>
    </span>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</div>