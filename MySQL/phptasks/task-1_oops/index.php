<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Register</title>
</head>
<body>
  
  <?php

    $_SESSION["tasknum"] = 1;

    require '../../SendQuery.php';

    SendQuery::saveTask($_SESSION["userName"], $_SESSION["tasknum"]);

    $fullName = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

      include("Check.php");
      $firstName = $_POST["fname"];
      $lastName = $_POST["lname"];  
      $value = new Check($firstName, $lastName);
      $fnameErr = $value->firstNameCheck();
      $lnameErr = $value->lastNameCheck();
      $fullName = $value->fullname();
    }

  ?>

  <div>
    <ul>
      <li>
        <a href="../task-1_oops/index.php">task-1_oops</a>
      </li>
      <li>
        <a href="../task-2_oops/index.php">task-2_oops</a>
      </li>
      <li>
        <a href="../task-3_oops/index.php">task-3_oops</a>
      </li>
      <li>
        <a href="../task-4_oops/index.php">task-4_oops</a>
      </li>
      <li>
        <a href="../task-5_oops/index.php">task-5_oops</a>
      </li>
      <li>
        <a href="../task-6_oops/index.php">task-6_oops</a>
      </li>
      <li>
        <a href="../../logout.php">Logout</a>
      </li>
    </ul>
    <h1>Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="fname">First Name : </label>
      <input type="text" id="fname" name="fname" onkeyup="generateFullName()" required>
      <span class="error">* 
        <?php
          if(isset($fnameErr)) {
            echo $fnameErr;
        }
        ?>
      </span>
      <br><br>
      <label for="lname">Last Name : </label>
      <input type="text" id="lname" name="lname" onkeyup="generateFullName()" required>
      <span class="error">* 
        <?php
          if(isset($lnameErr)) {
            echo $lnameErr;
        }
        ?>
      </span>
      <br><br>
      <label for="fullname">Full Name : </label>
      <input type="text" id="fullname" name="fullname" disabled>
      <br><br>
      <input type="submit" id="submit" name="submit" value="submit">
    </form>
  </div>

  <script type="text/javascript">
    function generateFullName() {
      document.getElementById('fullname').value = document.getElementById('fname').value + ' ' + document.getElementById('lname').value;
    }
  </script>

  <?php
    echo "Hello" . " " . $fullName;
  ?>

</body>
</html>