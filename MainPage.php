<?php
   session_start();
   if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
       // Redirect the user to the login page
       header('Location: Verification/php/Login/login.php');
       exit;
   }

   if (isset($_GET['logout'])) {
       session_destroy();
       header('Location: Verification/php/Login/login.php');
       exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged in</title>
</head>
<body>
    <h1>Hi</h1>
    <a href="?logout=1">Log out</a>
</body>
</html>
