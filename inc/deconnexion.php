<?php
session_start();
error_reporting(0);
htmlspecialchars($input);
htmlentities($input);
addslashes($input);
include('../libs/config.php');
session_destroy();
?>
<meta http-equiv="refresh" content="0; url=../index.php">
