<!-- HTML part of reset password page -->

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
  <title>Reset Password</title>
</head>
<body>
  <div class="container">
    <h1>Reset Password</h1>
    <form>
      <label for="email">Email-ID</label>
      <span>*</span>
      <input type="email" id="email" name="email" required>
      <label for="pwd">New Password</label>
      <span>*</span>
      <input type="password" id="pwd" name="pwd" required>
      <input type="submit" value="Reset">
      <ul>
        <li>
          <a href="../public/index.php">Login</a>
        </li>
      </ul>
    </form>
  </div>
</body>
</html>