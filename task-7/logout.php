<?php
session_start();
?>

<?php
session_unset();
session_destroy();
?>

<?php
header("Location: index.php");
?>