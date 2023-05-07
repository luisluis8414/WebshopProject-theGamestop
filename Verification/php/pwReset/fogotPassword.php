<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../../../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="../../../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../Extern/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/pwReset/resetPw.js"></script>
    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
    
   <title>Reset Password</title>
   <style>
      #wrapper{
         margin-top: 20rem;   
      }
      .error{
    color: red;
      }

      .success{
         color: green;
      }

   </style>
</head>

<body>
   <div class="container" id="wrapper">
      <div class="row"></div>
      <div class="row">
         <div class="col-sm"></div>
         <div class="col-5">
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
         <div class="col-sm"> </div>
      </div>
   </div>
</body>

</html>