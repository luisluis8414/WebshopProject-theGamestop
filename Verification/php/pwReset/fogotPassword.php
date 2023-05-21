<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/forgotPw.css">
    <script defer src="../../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../Extern/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/pwReset/resetPw.js"></script>
    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
  <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
  <!-- <script type="module" src="../../js/THREE/model3.js"></script> -->
  <script type="module" src="../../js/THREE/model4.js"></script>
   <title>Reset Password</title>
</head>

<body>
<div id="modelContainer">
    <canvas id="responsive-canvas1"></canvas>
    <canvas id="responsive-canvas2"></canvas>
  </div>


         <div class="shadow-lg p-5 bg-white rounded" id="formWrapper">
            <h1>Forgot password</h1>
            <form>
               <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input id="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll send you an recovery email.</small> <br>
                  <small id="success" class="success"></small>
                  <small id="emailError" class="error"></small>
               </div>
               <button type="submit" id="submit" class="btn btn-primary">Submit</button> <br>
               <a href="../Login/Login.php">Back to Login</a>
            </form>
         </div>
      </div>

</body>

</html>