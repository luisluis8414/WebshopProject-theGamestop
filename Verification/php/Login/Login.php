<?php
session_start();
if ((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  header("Location: ../../../Mainpage/");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../src/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../src/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../src/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../src/favicon/site.webmanifest">
    <link href="../../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="../../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../Extern/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/Login/Login.js"></script>
    <script type="text/javascript" src="../../js/Login/passwordPopup.js"></script>
    <script type="text/javascript" src="../../js/Login/TwoFApopup.js"></script>
    <script type="text/javascript" src="../../js/Login/2FAInputPopUp.js"></script>
    <script type="text/javascript" src="../../js/Login/sessionStart.js"></script>


    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="importmap">
        {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
    <script type="module" src="../../js/THREE/model1.js"></script>
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <title>Login</title>
</head>

<body class="blur-background">
    <div id="loading-screen">
    <h1>Loading...</h1>
    </div>

    <div id="modelContainer">
        <canvas id="responsive-canvas"></canvas>
    </div>

    <div id="formWrapper" class="shadow-lg bg-white rounded">
        <h1 id="LoginHeading">Login</h1>
        <form method="post" id="myForm">
            <div class="form-group">
                <label for="E-Mail">E-mail</label>
                <input id="email" autocomplete="username" class="form-control" type="text" name="email" placeholder="e-mail">
                <small id="emailError" class="error"></small>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" autocomplete name="pw" class="form-control" id="pw" placeholder="password">
                    <small id="error" style="color: red;"></small>
                    <small id="success" style="color: green;"></small>
                </div>
            </div>
            <button id="submit" type="submit" name="submit" class="btn btn-primary ">Submit</button><br>
            <a href="../Registration/Registration.php">I don't have an account</a><br>
            <a href="../pwReset/fogotPassword.php">Forgot Password</a>
        </form>
    </div>


</body>

</html>