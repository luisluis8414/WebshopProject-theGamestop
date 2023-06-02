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
  <link rel="stylesheet" href="css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script src="js/getUserData.js"></script>
  <script src="js/getUserDataOnline.js"></script>

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
    body,
    html {
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
  <?php include '../php/navbarProfile.php'; ?>


  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3" id="ShowName">John Smith</h5>
              <p class="text-muted mb-1" id="ShowEmail">example@email.com</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-outline-primary ms-1 mt-2">Edit Profile</button>
              </div>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
          <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <p class=""><span class="text-primary font-italic me-1">Your Orders</span></p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">Order1</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">Order2</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">Order3</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0">Order4</p>

              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">First Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0" id="FirstName">Johnatan</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Last Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0" id="LastName">Smith</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0" id="Email">example@example.com</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0" id="Phone">-</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0" id="Address">-</p>
                </div>
              </div>
            </div>
          </div 
          <div class="row">

          <div class="col-md-12">
          <div class="card-body p-0">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">Other Users Online </span></p>
                  <div class="user-list">
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>





        </div>
      </div>

    </div>
    </div>
  </section>
</body>

</html>