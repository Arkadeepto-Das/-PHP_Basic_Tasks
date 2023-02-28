<!-- Data is checked here and forwarded to pdf.php -->

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
        $_SESSION["firstName"] = $_POST["fname"];
        $_SESSION["lastName"] = $_POST["lname"];
        $marksdata = $_POST["marks"];
        $_SESSION["code"] = $_POST["code"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $value = new Check($_SESSION["firstName"], $_SESSION["lastName"]);
        $_SESSION["fnameErr"] = $value->firstNameCheck();
        $_SESSION["lnameErr"] = $value->lastNameCheck();
        $_SESSION["result"] = $value->result($marksdata);
        $_SESSION["phonenum"] = $value->numberCheck($number);
        $_SESSION["emailcheck"] = $value->emailCheck($email);
        
        if(isset($_SESSION["fnameErr"]) || isset($_SESSION["lnameErr"]) || isset($_SESSION["marksErr"]) || isset($_SESSION["numberErr"]) || isset($_SESSION["emailErr"])) {
          header("Location: index.php");
        }

        else {

          header("Location: pdf.php");

        //   $filename = $_FILES["image"]["name"];
        //   $tempname = $_FILES["image"]["tmp_name"];
        //   $filepath = $value->uploadImage($filename, $tempname);
        //   $fullname = $value->fullname();
        //   echo "<img src='$filepath'>";
        //   echo "<p>" . "Hello" . " " . $fullname . "</p>";

        //   echo "<table>";
        //   echo "<tr>";
        //   echo "<th>" . "Subjects" . "</th>";
        //   echo "<th>" . "Marks" . "</th>";
        //   echo "</tr>";
          
        //   foreach($result as $key=>$val) {

        //     echo "<tr>";
        //     echo "<td>" . $key . "</td>";
        //     echo "<td>" . $val . "</td>";
        //     echo "</tr>";
          
        //   }

        //   echo "</table>";

        //   echo "<p>" . "Phone number : " . $phonenum . "</p>";
        //   echo "<p>" . "Email-ID : " . $emailcheck . "</p>";
      
        }

      }
    ?>
  </div>
</body>