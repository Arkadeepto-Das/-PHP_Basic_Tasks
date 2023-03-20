<!-- Routing part -->

<?php

  $uri = $_SERVER["REQUEST_URI"];  
  $uri = rtrim($uri);

  switch ($uri) {

    case "/" :
      require 'Controller/login.php';

    case "/login" :
      require 'Controller/login.php';
    
    case "/signin" :
      require "Controller/login.php";

    case "/register" :
      require "Controller/register.php";

    case "/signup" :
      require 'Controller/register.php';

    case "/reset" :
      require 'Controller/reset.php';

    case "/resetpassword" :
      require 'Controller/reset.php';
  }

?>
