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
        $marksdata = $_POST["marks"];
        $code = $_POST["code"];
        $number = $_POST["number"];
        $value = new Check($firstName, $lastName);
        $_SESSION["fnameErr"] = $value->firstNameCheck();
        $_SESSION["lnameErr"] = $value->lastNameCheck();
        $result = $value->result($marksdata);
        $phonenum = $value->numberCheck($number);
        
        if(isset($_SESSION["fnameErr"]) || isset($_SESSION["lnameErr"]) || isset($_SESSION["marksErr"]) || isset($_SESSION["numberErr"])) {
          header("Location: index.php");
        }

        else {

          $filename = $_FILES["image"]["name"];
          $tempname = $_FILES["image"]["tmp_name"];
          $filepath = $value->uploadImage($filename, $tempname);
          $fullname = $value->fullname();
          echo "<img src='$filepath'>";
          echo "<p>" . "Hello" . " " . $fullname . "</p>";

          echo "<table>";
          echo "<tr>";
          echo "<th>" . "Subjects" . "</th>";
          echo "<th>" . "Marks" . "</th>";
          echo "</tr>";
          
          foreach($result as $key=>$val) {

            echo "<tr>";
            echo "<td>" . $key . "</td>";
            echo "<td>" . $val . "</td>";
            echo "</tr>";
          
          }

          echo "</table>";

          echo "<p>" . "Phone number : " . $phonenum . "</p>";

        }

      }
    ?>
  </div>
</body>