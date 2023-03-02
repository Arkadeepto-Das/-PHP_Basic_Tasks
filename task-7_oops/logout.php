<!-- Here the user gets logged out -->

<?php
session_start();
?>

<?php
session_unset();
session_destroy();
header("Location: index.php");
?>