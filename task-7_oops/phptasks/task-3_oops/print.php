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
  <ul>
    <li>
      <a href="../task-1/index.php">task-1</a>
    </li>
    <li>
      <a href="../task-1_oops/index.php">task-1_oops</a>
    </li>
    <li>
      <a href="../task-2/index.php">task-2</a>
    </li>
    <li>
      <a href="../task-2_oops/index.php">task-2_oops</a>
    </li>
    <li>
      <a href="../task-3/index.php">task-3</a>
    </li>
    <li>
      <a href="../task-3_oops/index.php">task-3_oops</a>
    </li>
    <li>
      <a href="../task-4/index.php">task-4</a>
    </li>
    <li>
      <a href="../task-4_oops/index.php">task-4_oops</a>
    </li>
    <li>
      <a href="../task-5/index.php">task-5</a>
    </li>
    <li>
      <a href="../task-5_oops/index.php">task-5_oops</a>
    </li>
    <li>
      <a href="../task-6/index.php">task-6</a>
    </li>
    <li>
      <a href="../task-6_oops/index.php">task-6_oops</a>
    </li>
    <li>
      <a href="../../logout.php">Logout</a>
    </li>
  </ul>
  <div>
    <?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {

        include("Check.php");
        $firstName = $_POST["fname"];
        $lastName = $_POST["lname"];
        $marksdata = $_POST["marks"];
        $value = new Check($firstName, $lastName);
        $_SESSION["fnameErr"] = $value->firstNameCheck();
        $_SESSION["lnameErr"] = $value->lastNameCheck();
        $result = $value->result($marksdata);
        
        if(isset($_SESSION["fnameErr"]) || isset($_SESSION["lnameErr"]) || isset($_SESSION["marksErr"])) {
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

        }

      }
    ?>
  </div>
</body>