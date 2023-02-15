<!-- HTML form part -->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style-index.css">
</head>
<body>
<?php
$_SESSION["fnameErr"] = "";
$_SESSION["lnameErr"] = "";
$_SESSION["imageErr"] = "";
?>

<div>
    <h1>Form</h1>
    <form oninput="fullname.value = fname.value +' '+ lname.value" method="post" action="check.php" enctype="multipart/form-data">
        <label for="fname">First Name : </label>
        <input type="text" id="fname" name="fname" required>
        <span class="error">* <?php echo $_SESSION["fnameErr"]?></span>
        <br><br>
        <label for="lname">Last Name : </label>
        <input type="text" id="lname" name="lname" required>
        <span class="error">* <?php echo $_SESSION["lnameErr"]?></span>
        <br><br>
        <label for="image">Choose image : </label>
        <input type="file" id="image" name="image" required>
        <span class="error">* <?php echo $_SESSION["imageErr"]?></span>
        <br><br>
        <label for="fullname">Full Name : </label>
        <input type="text" id="fullname" name="fullname" disabled>
        <br><br>
        <input type="submit" id="submit" name="submit" value="submit">
    </form>
</div>
</body>
</html>