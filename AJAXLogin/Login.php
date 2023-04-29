<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">  </script>
    <script defer src="../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <!-- <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
    <script type="importmap">
        {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
    <script defer type="module" src="../js/model1.js"></script> -->
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
    <style>
        .container {
            position: relative;
            margin-top: 13rem;
            width: 30rem;
        }

        #responsive-canvas {
            position: absolute;

            width: 100%;
            z-index: -1;
        }
    </style>
     <script>
        if (performance.navigation.type == 1) {
            // Reloaded page, remove query parameters from URL
            window.location.replace(window.location.pathname);
        }
    </script>
</head>

<body>
    <?php
    if(!isset($_GET['Registrierung'])){
        $registrierung='';
    }else{
        $registrierung=$_GET['Registrierung'];
    }
    $failed = false;
    $failedCheckbox = false;
    if (isset($_POST["submit"]) && isset($_POST["agreement"]) && $_POST["agreement"] == 1) {
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :eMail"); //EMail ueberpruefen
        $stmt->bindParam(":eMail", $_POST["eMail"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            //Email ist vergeben
            $row = $stmt->fetch();
            if (password_verify($_POST["pw"], $row["PASSWORD"])) {
                session_start();
                $_SESSION["eMail"] = $row["EMAIL"];
                header("Location: loggedIn.php");
            } else {
                $failed = true;
            }
        } else {
            $failed = true;
        }
    } else {
        $failedCheckbox = true;
    }
    ?>
    <!-- <canvas id="responsive-canvas"></canvas> -->
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col">
            <div class="container shadow  h-75 p-5  bg-white rounded">
                <h1 class="mt-5">Login</h1>
                <form action="Login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Addresse</label>
                        <input type="email" name="eMail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        <small id="emailHelp" class="form-text text-muted">Wir werden deine Daten mit niemandem teilen</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Passwort</label>
                        <input type="password" autocomplete name="pw" class="form-control" id="exampleInputPassword1" placeholder="Passwort">
                        <small id="error" style="color: red;"></small>
                        <?php
                        if ($failed && isset($_POST["submit"])) {
                            echo "<script>document.getElementById('error').innerHTML = 'Failed to log in';</script>";
                        }
                        ?>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="agreement" value="1" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ich stimme der
                            <a href="../html/Datenschutzerklaerung.html"> Datenschutzerklärung</a>
                            und den <a href="../html/Nutzungsbedingungen.html"> Nutzungsbedingungen</a>
                            zu.
                        </label>
                    </div>
                    <small id="errorCheckbox" style="color: red;"></small>
                    <?php
                    if($registrierung=="success"){
                        echo "<small class='success' >Please check your emails to finish registration.</small><br>";           
                     }
                    if ($failedCheckbox && isset($_POST["submit"])) {
                        echo "<script>document.getElementById('error').innerHTML = 'Failed to log in. U need to accept the terms';</script>";
                    }
                    
                    ?>
                    <button type="submit" name="submit" class="btn btn-primary">Abschicken</button><br>
                    <a href="Registration.php">Ich habe nock keinen Account</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>