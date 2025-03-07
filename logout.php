<?php
session_start();
session_destroy(); // Destroy the session to log out
header("Location: admin_login.php"); // Redirect to login page
exit();
?>