<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link href="../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/errorHandeling.js"></script>
    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
    <script type="importmap">
        {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
    <script defer type="module" src="../js/model1.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Registrierung</title>
    <style>
        #wrapper {
            margin: auto;
            margin-top: 10%;
            margin-right: 20rem;
            position: relative;
            align-items: center;
            justify-content: center;
            width: 30rem;
        }
        body {
  overflow: hidden;
}
        #responsive-canvas {
            position: absolute;
            top: -6rem;
            width: 100%;
            z-index: -1;
        }
    </style>
</head>

<body>
    <canvas id="responsive-canvas"></canvas>
    <div id="wrapper">
        <div class="container shadow-lg p-5 mb-5 bg-white rounded">
            <h1>Registrierung</h1>
            <form method="post" id="myForm">
                <div class="form-group p-1">
                    <label for="Vorname">Vorname</label>
                    <input id="vorname" class="form-control" type="text" name="vorname" placeholder="Vorname">
                    <small id="vornameError" class="error"></small>
                </div>
                <div class="form-group p-1">
                    <label for="Nachname">Nachname</label>
                    <input id="nachname" class="form-control" type="text" name="nachname" placeholder="Nachname">
                    <small id="nachnameError" class="error"></small>
                </div>
                <div class="form-group p-1">
                    <label for="E-Mail">E-Mail</label>
                    <input id="email" autocomplete="username" class="form-control" type="text" name="email" placeholder="E-Mail">
                    <small id="emailError" class="error"></small>
                </div>
                <button id="submit" type="submit" name="submit" class="btn btn-primary mt-2 mb-2">Abschicken</button><br>
                <a href="Login.php">Ich habe bereits einen Account</a>
            </form>
        </div>
    </div>
</body>

</html>