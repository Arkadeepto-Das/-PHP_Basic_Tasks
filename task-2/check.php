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

    if(isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $filename = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $filepath = "uploads/".$filename;
        $d=1;
    }

    else {
        $_SESSION["imageErr"] = "Image is required";
        header("location : index.php");
    }

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