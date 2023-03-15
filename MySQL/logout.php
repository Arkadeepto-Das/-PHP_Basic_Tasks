<!-- Here the user gets logged out. -->

<?php

  session_start();

  require 'SendQuery.php';

  $conn = SendQuery::connect();
  $userName = $_SESSION["userName"];
  $data = "UPDATE Profiles SET TaskNum = NULL WHERE Username = '$userName'";

  if($conn->query($data) === FALSE) {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();

  header("Location: index_login.php");

?>