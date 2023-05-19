
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../extern/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script defer src="../extern/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../Extern/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="js/AjaxLoggedInUserData.js"></script>
  <script type="text/javascript" src="../Extern/js/jquery.min.js"></script>

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

  <style>
    .ImageCarousel{
      width: 100rem;
      margin: auto;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <header>
    <a href="#" class="site-logo" aria-label="homepage">The Game Stop </a>
    <nav class="main-nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a href="Shop/index.php" class="nav__link">Shop</a></li>
        <li class="nav__list-item">
          <a href="#" class="nav__link">Articles</a>
        </li>
        <li class="nav__list-item">
          <a href="#" class="nav__link">Another page</a>
        </li>
        <li class="nav__list-item">
          <a href="#" class="nav__link">Pricing</a>
        </li>
        <li class="nav__list-item"><a href="#" class="nav__link">Blog</a></li>
      </ul>
    </nav>
    <nav class="account">
      <ul class="nav__list">
        <li class="nav__list-item">
          <a class="nav__link nav__link--btn" href="../Verification/php/Login/Login.php">Login</a>
        </li>
        <li class="nav__list-item">
          <a class="nav__link nav__link--btn nav__link--btn--highlight" href="#">Sign Up</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="home-intro">
      <div class="home-sliderAndHeading">
        <h1>Hello <span id="vorname">User</span> &#128516; Welcome back! You were last online <span id="lastOnline">today</span></h1>
        <div class="ImageCarousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../src/pictures/Skyrim-Dragon-PNG-Photos-1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/pictures/Dragon1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/pictures/girl.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        </div>
      </div>
    </section>

    <div class="home-about">
      <h2>About us</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      <div class="columns">
        <div class="col fade-in">
          <h3>Lorem, ipsum.</h3>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae
            maiores fuga eos provident voluptas perferendis.
          </p>
        </div>
        <div class="col fade-in">
          <h3>A, illo!</h3>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Voluptatibus minima quo beatae eius blanditiis officiis.
          </p>
        </div>
        <div class="col fade-in">
          <h3>Repudiandae, error?</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum
            quasi quis doloribus quia illum laudantium.
          </p>
        </div>
      </div>
    </div>

    <div class="home-more-stuff">
      <div class="more-stuff-grid">
        <img src="https://unsplash.it/400" alt="" class="slide-in from-left" />
        <p class="slide-in from-right">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
          quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
          omnis sapiente neque cumque consequuntur reiciendis deserunt.
          Dolorem vero exercitationem consequuntur, eligendi cupiditate
          debitis facilis quibusdam magni. Eveniet.
        </p>
      </div>
      <div class="more-stuff-grid">
        <p class="slide-in from-left">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
          quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
          omnis sapiente neque cumque consequuntur reiciendis deserunt.
          Dolorem vero exercitationem consequuntur, eligendi cupiditate
          debitis facilis quibusdam magni. Eveniet.
        </p>
        <img src="https://unsplash.it/401" alt="" class="slide-in from-right" />
      </div>
      <div class="more-stuff-grid">
        <img src="//unsplash.it/400" alt="" class="slide-in from-left" />
        <p class="slide-in from-right">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
          quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
          omnis sapiente neque cumque consequuntur reiciendis deserunt.
          Dolorem vero exercitationem consequuntur, eligendi cupiditate
          debitis facilis quibusdam magni. Eveniet.
        </p>
      </div>
      <div class="more-stuff-grid">
        <p class="slide-in from-left">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
          quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
          omnis sapiente neque cumque consequuntur reiciendis deserunt.
          Dolorem vero exercitationem consequuntur, eligendi cupiditate
          debitis facilis quibusdam magni. Eveniet.
        </p>
        <img src="https://unsplash.it/401" alt="" class="slide-in from-right" />
      </div>
      <div class="more-stuff-grid">
        <img src="//unsplash.it/400" alt="" class="slide-in from-left" />
        <p class="slide-in from-right">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
          quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
          omnis sapiente neque cumque consequuntur reiciendis deserunt.
          Dolorem vero exercitationem consequuntur, eligendi cupiditate
          debitis facilis quibusdam magni. Eveniet.
        </p>
      </div>
      <div class="more-stuff-grid">
        <p class="slide-in from-left">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fugit,
          quae beatae vero sit magni quaerat id ratione. Dolor optio unde amet
          omnis sapiente neque cumque consequuntur reiciendis deserunt.
          Dolorem vero exercitationem consequuntur, eligendi cupiditate
          debitis facilis quibusdam magni. Eveniet.
        </p>
        <img src="https://unsplash.it/401" alt="" class="slide-in from-right" />
      </div>
    </div>
  </main>
  <script src="js/observers.js"></script>
</body>

</html>