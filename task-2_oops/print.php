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
  <title>Check</title>
  <link rel="stylesheet" href="style-print.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap');
  </style>
</head>
<body>
  <div>
    <?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {

        include("Check.php");
        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $value = new Check($firstName, $lastName);
        $_SESSION["fnameErr"] = $value->firstNameCheck();
        $_SESSION["lnameErr"] = $value->lastNameCheck();
        
        if(isset($_SESSION["fnameErr"]) || isset($_SESSION["lnameErr"])) {
          header("Location: index.php");
        }

        else {
          $filepath = $value->printImage($filename, $tempname);
          $fullname = $value->fullname();
          echo "<img src='$filepath'>";
          echo "<p>" . "Hello" . " " . $fullname . "</p>"; 
        }

      }
    ?>
  </div>
</body>