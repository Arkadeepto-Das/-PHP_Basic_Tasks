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
  <title>Check</title>
  <link rel="stylesheet" href="style-check.css">
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

<?php
$f="";
$c="";
$d="";
?>

<div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["fname"])) {
    $_SESSION["fnameErr"] = "First name is required";
    header("Location: index.php");
  }

  else {
    $_SESSION["fname"] = input($_POST["fname"]);

    if(!preg_match("/^[A-Z]/",$_SESSION["fname"])) {
      $_SESSION["fnameErr"] = "First name should start with capital letter";
      header("Location: index.php");
    }
        
    elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_SESSION["fname"]) || preg_match("/[0-9]/",$_SESSION["fname"])) {
      $_SESSION["fnameErr"] = "First name should contain only alphabets";
      header("Location: index.php");
    }

    else {
      $f=1;
    }
  }

  if (empty($_POST["lname"])) {
    $_SESSION["lnameErr"] = "Last name is required";
    header("Location: index.php");
  }

  else {
    $_SESSION["lname"] = input($_POST["lname"]);

    if(!preg_match("/^[A-Z]/",$_SESSION["lname"])) {
      $_SESSION["lnameErr"] = "Last name should start with capital letter";
      header("Location: index.php");
    }
        
    elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_SESSION["lname"]) || preg_match("/[0-9]/",$_SESSION["lname"])) {
      $_SESSION["lnameErr"] = "Last name should contain only alphabets";
      header("Location: index.php");
    }

    else {
      $c=1;
    }
  }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $filename = $_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  $filepath = "uploads/".$filename;
  $d=1;

  if($f==1 && $c==1 && $d==1) {
    $greet = "Hello";
    echo "<img src='$filepath'>";
    echo "<p>" . " " . $greet . " " . $_SESSION["fname"] . " " . $_SESSION["lname"] . "</p>";
  }

}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
</div>
</body>
</html>