<?php
session_start();
    if(!isset($_SESSION["eMail"])){
        header("Location: Login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <script defer src="../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <title>Logged In</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="margin-top: 20%;">Logged in &#129395;</h1><br>
    <Button onclick="window.location.href = 'logOut.php';" class="btn btn-primary">Log out</Button>
</body>
</html>