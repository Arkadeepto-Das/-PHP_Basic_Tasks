<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style-index.css">
</head>
<body>
  <h1>Form</h1>
  <div>
    <form action="check.php" method="POST">
      <label for="email">Email-ID : </label>
      <input type="text" id="email" name="email" required>
      <span class="error">*
        <?php
          if(isset($_SESSION["emailErr"])) {
            echo $_SESSION["emailErr"];
            unset($_SESSION["emailErr"]);
          }
        ?>
      </span>
      <br><br>
      <input type="submit" id="submit" name="submit" value="submit">
    </form>
  </div>
</body>
</html>