<?php
session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user back to the main page or any other desired location
header('Location: ../index.php'); // Replace "index.php" with your desired location
exit;
?>
