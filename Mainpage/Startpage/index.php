<?php
session_start();
if ((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  header("Location: ../Home");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="../../src/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../src/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../src/favicon/favicon-16x16.png">

  <style>
    body {
      /* background-image: url('../../src/background.jpg'); */
      background-color: #333333;
      overflow: hidden;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .custom {
      height: fit-content;
    }
  </style>
  <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
  <script type="module" src="js/model.js"></script>
</head>

<body class="blur-background">
  <div id="loading-screen">
    <h1>Loading...</h1>
  </div>
  <div class="container-fluid" id="landscape">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-5">
        <div class="center">
          <div class="container shadow-lg bg-white rounded p-5 custom">
            <div class="text-center">
              <h1 class="mb-5 mt-2">Welcome!<br><br> Please login to continue. </h1>
              <a href="../../Verification/php/Login/Login.php" class="btn btn-primary m-2 btn-lg">Login</a>
              <a href="../Shop/" class="btn btn-primary m-2 btn-lg">View Store</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6" id="rightSide">
        <div id="modelContainer">
          <canvas id="responsive-canvas"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" id="mobile">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
        <div class="center">
          <div class="container shadow-lg bg-white rounded p-5 custom">
            <div class="text-center">
              <h1 class="mb-5 mt-2">Welcome!<br><br> Please login to continue. </h1>
              <a href="../../Verification/php/Login/Login.php" class="btn btn-primary m-2 btn-lg">Login</a>
              <a href="../Shop/" class="btn btn-primary m-2 btn-lg">View Store</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1"></div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>