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
<div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $_SESSION["fname"] = input($_POST["fname"]);

  if(!preg_match("/^[A-Z]/",$_SESSION["fname"])) {
    $_SESSION["fnameErr"] = "First name should start with capital letter";
    header("Location: index.php");
  }
        
  elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_SESSION["fname"]) || preg_match("/[0-9]/",$_SESSION["fname"])) {
    $_SESSION["fnameErr"] = "First name should contain only alphabets";
    header("Location: index.php");
  }

  $_SESSION["lname"] = input($_POST["lname"]);

  if(!preg_match("/^[A-Z]/",$_SESSION["lname"])) {
    $_SESSION["lnameErr"] = "Last name should start with capital letter";
    header("Location: index.php");
  }
        
  elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_SESSION["lname"]) || preg_match("/[0-9]/",$_SESSION["lname"])) {
    $_SESSION["lnameErr"] = "Last name should contain only alphabets";
    header("Location: index.php");
  }

  if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $filename = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $filepath = "uploads/".$filename;
  }

  $greet = "Hello";
  echo "<img src='$filepath'>";
  echo "<p>" . $greet . " " . $_SESSION["fname"] . " " . $_SESSION["lname"] . "</p>";

  $head_1 = "Subject";
  $head_2 = "Marks";
  $lines = input($_POST["marks"]);
  $lines_arr = explode("\n", $lines);
  
  echo "<table>";
  echo "<tr>";
  echo "<th>" . $head_1 . "</th>";
  echo "<th>" . $head_2 . "</th>";
  echo "</tr>";
  foreach($lines_arr as $val) {
    $count = 0;
    $slash = 0;
    $split = str_split($val);
    foreach($split as $val2) {
      if(preg_match('/[0-9]/', $val2)) {
        ++$count;
      }

      if($val2=='|') {
        ++$slash;
      }
    }
    
    if(preg_match('/^[a-zA-Z]/', $val) && preg_match('/[0-9]$/', $val) && $count<=3 && $slash==1) {
      $subject = array_filter(explode('|', $val));
      echo "<tr>";
      foreach($subject as $data) {
      echo "<td>" . $data . "</td>";
      }
      echo "</tr>";
    }

    else {
      $_SESSION["marksErr"] = "Put in the format subject|marks.";
      header("Location: index.php");
    }
  }
  echo "</table>";

  $_SESSION["code"] = $_POST["code"];
  $_SESSION["number"] = $_POST["number"];

  if(preg_match('/[A-Za-z]/', $_SESSION["number"])) {
    $_SESSION["numberErr"] = "Phone number should be of 10 digits";
    header("Location: index.php");
  }

  else {
    $phone = $_SESSION["code"] . $_SESSION["number"];
    $print = "Phone number : ";
    echo "<p>" . $print . $phone . "</p>";
  }

  $_SESSION["email"] = $_POST["email"];
  if(validate($_SESSION["email"])===false) {
    $_SESSION["emailErr"] = "Enter your Email-ID in proper format";
    header("Location: index.php");
  }
  else {
    $print = "Email-ID : ";
    echo "<p>" . $print . $_SESSION["email"] . "</p>";
  }

}

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate($data) {
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$data,
    CURLOPT_HTTPHEADER => array(
      "Content-Type: text/plain",
      "apikey: 7qgDJ6nDyaxddvIxYnB13x39ztMT09TV"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
  )
);

$response = curl_exec($curl);

curl_close($curl);
$validationResult = json_decode($response, true);
$flag=true;
if ($validationResult['format_valid']==false || $validationResult['smtp_check']==false) {
  $flag=false;
}
curl_close($curl);
return $flag;
}

?>
</div>
</body>
</html>