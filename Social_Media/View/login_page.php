<!-- HTML part of login page -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap');
  </style>
  <link rel="stylesheet" href="../Content/css/style_index.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="../Controller/login.php">
      <label for="email">Email-ID</label>
      <span>*</span>
      <input type="email" id="email" name="email" required>
      <label for="pwd">Password</label>
      <span>*</span>
      <input type="password" id="pwd" name="pwd" required>
      <input type="submit" value="Login">
      <ul>
        <li>
          <a href="../Scripts/register_page.php">Register</a>
        </li>
        <li>
          <a href="../Scripts/reset_page.php">Reset Password</a>
        </li>
      </ul>
    </form>
  </div>
</body>
</html>
