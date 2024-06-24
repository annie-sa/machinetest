<?php
// Start session (if not already started)
session_start();

// Destroy session data
session_unset();
session_destroy();

// Redirect to login page after logout
header("Location: login.php");
exit;
?>