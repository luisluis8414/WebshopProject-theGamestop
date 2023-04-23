<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link href="../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <title>Login</title>
    <style>
        .container{
            margin-top: 15rem;
            width: 30rem;
        }
    </style>
</head>

<body>
    <?php
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
    }else{
        $failedCheckbox=true;
    }
    ?>


    <div class="container shadow p-5 mb-5 bg-white rounded">
        <h1>Login</h1>
        <form action="Login.php" method="post" >
            <div class="form-group">
                <label for="exampleInputEmail1">Email Addresse</label>
                <input type="email" name="eMail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Wir werden deine Daten mit niemandem teilen</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Passwort</label>
                <input type="password" name="pw" class="form-control" id="exampleInputPassword1" placeholder="Passwort">
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
                if ($failedCheckbox && isset($_POST["submit"])) {
                    echo "<script>document.getElementById('error').innerHTML = 'Failed to log in. U need to accept the terms';</script>";
                }
                ?>
            <button type="submit" name="submit" class="btn btn-primary">Abschicken</button><br>
            <a href="Registration.php">Ich habe nock keinen Account</a>
        </form>
    </div>
</body>

</html>