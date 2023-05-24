<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>

  <!-- <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script> -->
  <!-- <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
  <script type="module" src="../Verification/js/THREE/model1.js"></script> -->

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/main.css" />
  <style>
    body, html {
      height: 100%;
    }
    .container-centered {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }
  </style>
</head>
<body>
<header>
    <div class="logoAndName">
      <a href="#" class="site-logo" aria-label="homepage">The Game Stop
        <svg style="color: #BE6C2A" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
          <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z" fill="#BE6C2A"></path>
          <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z" fill="#BE6C2A"></path>
        </svg>
      </a>
    </div>
    <nav class="main-nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a href="../Shop/index.php" class="nav__link">Shop</a></li>
        <li class="nav__list-item">
          <a href="#" class="nav__link">Articles</a>
        </li>
        <li class="nav__list-item"><a href="#" class="nav__link">Blog</a></li>
      </ul>
    </nav>
    <nav class="account">
      <ul class="nav__list">
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
          // Logged in
          echo '
            <li class="nav__list-item">
              <a class="nav__link nav__link--btn" href="../php/logOut.php">Log Out</a>
            </li>';
        } else {
          // Not logged in
          echo '
      <li class="nav__list-item">
        <a class="nav__link nav__link--btn" href="../../Verification/php/Login/Login.php">Login</a>
      </li>
      <li class="nav__list-item"> 
        <a class="nav__link nav__link--btn nav__link--btn--highlight" href="../../Verification/php/Registration/Registration.php">Sign Up</a>
      </li>';
        }
        ?>
      </ul>
    </nav>
  </header>
  <div class="container-fluid h-100">
    <div class="row align-items-center justify-content-center h-100">
      <div class="col-12 col-md-6 ">
        <div class="container text-center border">
          <h1>Profile </h1>
          <p>This container is centered using Bootstrap.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>