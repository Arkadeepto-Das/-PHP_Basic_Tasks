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
$fname=$lname=$fullname="";
$fnameErr=$lnameErr=$fullnameErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
    }

    else {
        $fname = input($_POST["fname"]);

        if(!preg_match("/^[A-Z]/",$fname)) {
            $fnameErr = "First name should start with capital letter";
        }
        
        elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname) || preg_match("/[0-9]/",$fname)) {
            $fnameErr = "First name should contain only alphabets";
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
    }

    else {
        $lname = input($_POST["lname"]);

        if(!preg_match("/^[A-Z]/",$lname)) {
            $lnameErr = "Last name should start with capital letter";
        }
        
        elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lname) || preg_match("/[0-9]/",$lname)) {
            $lnameErr = "Last name should contain only alphabets";
        }
    }
}

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div>
    <h1>Form</h1>
    <form oninput="fullname.value = fname.value +' '+ lname.value" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <form action = "index.php" method = "POST">
        <label for="fname">First Name : </label>
        <input type="text" id="fname" name="fname">
        <span class="error">* <?php echo $fnameErr;?></span>
        <br><br>
        <label for="lname">Last Name : </label>
        <input type="text" id="lname" name="lname">
        <span class="error">* <?php echo $lnameErr;?></span>
        <br><br>
        <label for="fullname">Full Name : </label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname;?>" disabled>
        <br><br>
        <input type="submit" id="submit" name="submit" value="submit">
    </form>
</div>

<?php
$greet="Hello";
echo "$greet $fname $lname";
?>

</body>
</html>