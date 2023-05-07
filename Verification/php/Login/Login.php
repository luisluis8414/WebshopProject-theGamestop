<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <link href="../../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="../../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../Extern/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/Login/Login.js"></script>
    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
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
    <title>Login</title>
    <style>
        #formWrapper {
            margin-top: 25%;
            width: 50%;
            height: fit-content;
        }

        body {
            overflow: hidden;
        }

        #responsive-canvas {
            position: absolute;
            top: -2rem;
            width: 100%;
            z-index: -1;
        }
        .content{
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <canvas id="responsive-canvas"></canvas>
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-11 d-flex">
                <div id="formWrapper" class="shadow-lg p-5 mb-5 bg-white rounded mx-auto">
                    <div class="content">
                    <h1 class="text-center">Login</h1>
                    <form method="post" id="myForm">
                        <div class="form-group p-1">
                            <label for="E-Mail" style="width: 100px;">E-mail</label>
                            <input id="email" autocomplete="username" class="form-control" type="text" name="email" placeholder="E-mail">
                            <small id="emailError" class="error"></small>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" autocomplete name="pw" class="form-control" id="pw" placeholder="Password">
                                <small id="error" style="color: red;"></small>
                            </div>
                        </div>
                        <button id="submit" type="submit" name="submit" class="btn btn-primary mt-2 mb-2">Abschicken</button><br>
                        <a href="../Registration/Registration.php">I don't have an account</a><br>
                        <a href="../pwReset/fogotPassword.php">Forgot Password</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>