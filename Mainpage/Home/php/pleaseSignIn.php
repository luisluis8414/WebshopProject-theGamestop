<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #333333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #formWrapper {
            padding: 2em;
            width: 40em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="formWrapper" class="shadow-lg bg-white rounded">
        <h1 class="mb-4">Please login or register to gain full access to this site</h1>
        <form method="post" id="myForm">
    <a href="../../../Verification/php/Login/Login.php" class="btn btn-lg btn-primary m-2">Login</a>
    <a href="../../../Verification/php/Registration/Registration.php" class="btn btn-lg btn-primary m-2">Register</a>
</form>

    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
