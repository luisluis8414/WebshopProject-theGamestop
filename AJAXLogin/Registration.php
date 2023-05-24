<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <script defer src="../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="errorHandeling.js"></script>
    <title>Registrierung</title>
    <style>
        .error{
            color: red;
        }
        .container{
            margin-top: 10rem;
            width: 30rem;
        }
    </style>
</head>
<body>
    <script>
    
    </script>
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
        <input id="email" autocomplete="username"  class="form-control" type="text" name="email" placeholder="E-Mail" >
        <small id="emailError" class="error"></small>
    </div>
        <button id="submit" type="submit" name="submit" class="btn btn-primary mt-2 mb-2">Abschicken</button><br>
        <a href="Login.php">Ich habe bereits einen Account</a> 
    </form>
    </div>
    </body>
</html>