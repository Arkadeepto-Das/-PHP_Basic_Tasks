<!-- HTML part of register page -->

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
  <title>Register</title>
</head>
<body>
  <div class="container">
    <h1>Register</h1>
    <form>
      <label for="user">Username</label>
      <span>*</span>
      <input type="text" id="user" name="user" required>
      <label for="email">Email-ID</label>
      <span>*</span>
      <input type="email" id="email" name="email" required>
      <label for="pwd">Password</label>
      <span>*</span>
      <input type="password" id="pwd" name="pwd" required>
      <input type="submit" value="Sign Up">
    </form>
  </div>
</body>
</html>
