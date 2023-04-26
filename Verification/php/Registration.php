<?php
    // Start the session
        if(!isset($_GET['Registrierung'])){
            $registrierung='';
        }else{
            $registrierung=$_GET['Registrierung'];
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <script defer src="../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <title>Registrierung</title>
    <script>
        if (performance.navigation.type == 1) {
            // Reloaded page, remove query parameters from URL
            window.location.replace(window.location.pathname);
        }
    </script>
    <style>
        .container{
            margin-top: 10rem;
            width: 30rem;
        }
    </style>
</head>
<body>
<div class="container shadow-lg p-5 mb-5 bg-white rounded">
        <h1>Registrierung</h1>
    <form action="signup.php" method="post">
    <div class="form-group p-1">
        <label for="Vorname">Vorname</label>
        <?php
        if(isset($_GET['vorname'])){
            $vorname=$_GET['vorname'];
            echo "<input class='form-control' type='text' name='vorname' placeholder='Vorname' value='$vorname'>";
        }else{
            echo '<input class="form-control" type="text" name="vorname" placeholder="Vorname">';
        }
        if($registrierung=="vorname"){
            echo "<small class='error' >Nur Buchstaben als Vorname gültig!</small><br>";
        }
        ?>
    </div>
    <div class="form-group p-1">
        <label for="Nachname">Nachname</label>
        <?php
            if(isset($_GET['nachname'])){
                $nachname=$_GET['nachname'];
                echo "<input class='form-control' type='text' name='nachname' placeholder='Nachname' value='$nachname'>";
            }else{
                echo '<input class="form-control" type="text" name="nachname" placeholder="Nachname">';
            }
            if($registrierung=="nachname"){
                echo "<small class='error' >Nur Buchstaben als Nachname gültig!</small><br>";
            }
        ?>
    </div>
    <div class="form-group p-1">
        <label for="E-Mail">E-Mail</label>
        <?php
            if(isset($_GET['email'])){
                $email=$_GET['email'];
                echo "<input autocomplete='username'  class='form-control' type='text' name='eMail' placeholder='E-Mail' value='$email'>";
            }else{
                echo '<input autocomplete="username"  class="form-control" type="text" name="eMail" placeholder="E-Mail" >';
            }
            if($registrierung=="email"){
                echo "<small class='error' >Please enter a valid email!</small><br>";           
             }
             if($registrierung=="emailTaken"){
                echo "<small class='error' >There is already an account connected to this email!</small><br>";           
             }

        ?>
    </div>
        <?php
            if($registrierung=="empty"){
                echo "<small class='error' >Bitte alle Felder ausfüllen!</small><br>";           
             }
        ?>
        <button type="submit" name="submit" class="btn btn-primary mt-2 mb-2">Abschicken</button><br>
        <a href="Login.php">Ich habe bereits einen Account</a> 
    </form>
    </div>
    
    </body>
</html>