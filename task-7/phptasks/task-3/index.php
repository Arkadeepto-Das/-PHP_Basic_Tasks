<!-- HTML form part -->

<?php
session_start();
?>

<?php
$_SESSION["tasknum"] = 3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result</title>
  <link rel="stylesheet" href="style-index.css">
</head>
<body>
<div>
  <h1>Form</h1>
  <form method="post" action="check.php" enctype="multipart/form-data" >
    <label for="fname">First Name : </label>
    <input type="text" id="fname" name="fname" onkeyup="generateFullName()" required>
    <span class="error">*
      <?php
      if(isset($_SESSION["fnameErr"])) {
        echo $_SESSION["fnameErr"];
        unset($_SESSION["fnameErr"]);
      }
      ?>
    </span>
    <br><br>
    <label for="lname">Last Name : </label>
    <input type="text" id="lname" name="lname" onkeyup="generateFullName()" required>
    <span class="error">*
      <?php
      if(isset($_SESSION["lnameErr"])) {
        echo $_SESSION["lnameErr"];
        unset($_SESSION["lnameErr"]);
      }
      ?>
    </span>
    <br><br>
    <label for="image">Choose image : </label>
    <input type="file" id="image" name="image" required>
    <br><br>
    <label for="fullname">Full Name : </label>
    <input type="text" id="fullname" name="fullname" disabled>
    <br><br>
    <label for="textarea">Put subject and marks(max 3 digits) here  : </label>
    <span class="error">*
      <?php
      if(isset($_SESSION["marksErr"])) {
        echo $_SESSION["marksErr"];
        unset($_SESSION["marksErr"]);
      }
      ?>
    </span>
    <br><br>
    <textarea id="marks" name="marks" rows="10" cols="30" placeholder="subject|marks" required></textarea>
    <br><br>
    <input type="submit" id="submit" name="submit" value="submit">
  </form>
</div>

<script type="text/javascript">
  function generateFullName() {
    document.getElementById('fullname').value = document.getElementById('fname').value + ' ' + document.getElementById('lname').value;
  }
</script>
</body>
</html>