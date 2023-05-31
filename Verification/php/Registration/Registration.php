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
    <link href="../../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="../../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../../Extern/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../js/Registration/errorHandeling.js"></script>
  <script type="text/javascript" src="../../js/Registration/checkUsername.js"></script>
  <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
  <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
  <script type="module" src="../../js/THREE/model2.js"></script>
  <link rel="stylesheet" href="../../css/login.css">
  <link rel="stylesheet" href="../../css/responsive.css">
  <title>Registrierung</title>
</head>

<body>
  <div id="modelContainer">
    <canvas id="responsive-canvas"></canvas>
  </div>

  <div id="formWrapper" class="shadow-lg p-5 bg-white rounded">
    <h1 id="LoginHeading">Registration</h1>
    <form method="post" id="myForm">
      <div class="form-group p-1">
        <label for="Vorname">First name</label>
        <input id="vorname" class="form-control" type="text" name="vorname" placeholder="first name">
        <small id="vornameError" class="error"></small>
      </div>
      <div class="form-group p-1">
        <label for="Nachname">Last name</label>
        <input id="nachname" class="form-control" type="text" name="nachname" placeholder="last name">
        <small id="nachnameError" class="error"></small>
      </div>
      <div class="form-group p-1">
        <label for="E-Mail">E-mail</label>
        <input id="email" autocomplete="username" class="form-control" type="text" name="email" placeholder="e-mail">
        <small id="emailError" class="error"></small>
        <small id="good" class="success"></small>
      </div>
      <button id="submit" type="submit" name="submit" class="btn btn-primary">Submit</button><br>
      <a href="../Login/Login.php">I already have an account</a><br>
    </form>
  </div>

</body>

</html>