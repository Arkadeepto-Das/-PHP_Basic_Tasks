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
</head>
<body>
<div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $c = 0;

  $_SESSION["fname"] = input($_POST["fname"]);

  if(!preg_match("/^[A-Z]/",$_SESSION["fname"])) {
    $_SESSION["fnameErr"] = "First name should start with capital letter";
    ++$c;
  }
        
  elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_SESSION["fname"]) || preg_match("/[0-9]/",$_SESSION["fname"])) {
    $_SESSION["fnameErr"] = "First name should contain only alphabets";
    ++$c;
  }

  $_SESSION["lname"] = input($_POST["lname"]);

  if(!preg_match("/^[A-Z]/",$_SESSION["lname"])) {
    $_SESSION["lnameErr"] = "Last name should start with capital letter";
    ++$c;
  }
        
  elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_SESSION["lname"]) || preg_match("/[0-9]/",$_SESSION["lname"])) {
    $_SESSION["lnameErr"] = "Last name should contain only alphabets";
    ++$c;
  }

  if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $filename = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $filepath = "uploads/".$filename;
  }

  $subject = array();
  $marks = array();
  $lines = input($_POST["marks"]);
  $lines_arr = explode("\n", $lines);
  
  foreach($lines_arr as $val) {
    $data = explode('|', $val);

    if(preg_match('/[0-9]/', $data[0]) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $data[0])) {
      $_SESSION["marksErr"] = "Put in the format subject|marks.";
      ++$c;
    }

    elseif(is_numeric($data[1])!=1) {
      $_SESSION["marksErr"] = "Put in the format subject|marks.";
      ++$c;
    }

    else {
      array_push($subject,$data[0]);
      array_push($marks,$data[1]);
    }

  }

  $_SESSION["result"] = array_combine($subject,$marks);

  $_SESSION["code"] = $_POST["code"];
  $_SESSION["number"] = $_POST["number"];

  if(preg_match('/[A-Za-z]/', $_SESSION["number"])) {
    $_SESSION["numberErr"] = "Phone number should be of 10 digits";
    ++$c;
  }

  $_SESSION["email"] = $_POST["email"];
  
  if(validate($_SESSION["email"])===false) {
    $_SESSION["emailErr"] = "Enter your Email-ID in proper format";
    ++$c;
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

if($c>0) {
  header("Location: index.php");
}

else {
  header("Location: pdf.php");
}
?>
</div>
</body>
</html>