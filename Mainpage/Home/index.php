<?php
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  header("Location: php/pleaseSignIn.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="../../src/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../src/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../src/favicon/favicon-16x16.png">
  <link rel="stylesheet" href="css/shoppingCart.css">
  <link rel="manifest" href="../../src/favicon/site.webmanifest">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="js/AjaxLoggedInUserData.js"></script>
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/cart/showCartPopUp.js"></script>
  <script src="js/cart/shoppinCartLogic.js"></script>
  <script src="js/cart/sendCartToBackend.js"></script>
  <script src="js/cart/getCartItems.js"></script>
  <script src="js/cart/deleteCartItem.js"></script>
  <script src="js/cart/getCartItemsOnReload.js"></script>
  <script src="js/cart/increaseQuantity.js"></script>
  <script src="js/cart/decreaseQuantity.js"></script>
  <script src="js/cart/updateCartNumber.js"></script>
  <script src="js/cart/getTotalSum.js"></script>

  <!-- <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script> -->
  <!-- <script type="importmap">
    {
        "imports": {
        "three": "https://unpkg.com/three@v0.149.0/build/three.module.js",
        "three/addons/": "https://unpkg.com/three@v0.149.0/examples/jsm/"
        }
    }
    </script>
  <script type="module" src="Verification/js/THREE/model1.js"></script> -->

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
<?php include '../../navbars/navbar.php'; ?> 
  <main>
    <section class="home-intro">
      <div class="home-sliderAndHeading">
        <div id="articleView" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../../src/pictures/mainpage/HellHound.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../src/pictures/mainpage/GrimRevenant.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../src/pictures/mainpage/SacredGoat.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../src/pictures/mainpage/MainpageZombieDragon.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../src/pictures/mainpage/Sable Thornrider.png" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
        <div class="Greeting">
          <div id="error">
          <h1>Welcome back!<br> <br>
            Hello <span id="vorname">User</span> <br>
            You were last online <span id="lastOnline">today</span>
          </h1>
          <a class="nav__link nav__link--btn" href="Shop/">Visit Shop</a>
          <a class="nav__link nav__link--btn nav__link--btn--highlight" href="Profile/">Your Profile</a>
          </div>
        </div>
      </div>
    </section>

    <div class="home-about">
      <h2>What is the Gamestop</h2>
      <p>Gamestop is an Online Shop for all the Game Items you love!</p>
      <div class="columns">
        <div class="col fade-in">
          <h3>Ingame Items</h3>
          <p>
            Explore a world of thrilling gaming possibilities at The Game Stop: Legendary gear, epic quests, your virtual destiny in your hands. Dive in and become the hero of your own gaming saga!
          </p>
        </div>
        <div class="col fade-in">
          <h3>Accessoires</h3>
          <p>
            Level up your gaming style at The Game Stop, where accessories become your power and fashion statement. Unleash your gaming potential with our cutting-edge gear and personalized flair.
          </p>
        </div>
        <div class="col fade-in">
          <h3>Merch</h3>
          <p>
            Immerse yourself in gaming culture with The Game Stop's exclusive merchandise collection. Level up your style and showcase your passion with our iconic designs and collectibles.
          </p>
        </div>
      </div>
    </div>

    <div class="home-more-stuff">
      <div class="more-stuff-grid">
        <img src="../../src//pictures/maps/map.png" alt="" class="slide-in from-left" />
        <p class="slide-in from-right">
          Step into a world of limitless possibilities as we unveil our extraordinary collection of in-game items that will revolutionize your gaming experience. Prepare to embark on epic quests and conquer virtual realms with our arsenal of legendary weapons, awe-inspiring armor, and rare artifacts that will amplify your skills to unimaginable heights. Unleash your inner hero and immerse yourself in captivating narratives with our exclusive character enhancements, empowering you to rewrite the very fabric of virtual existence. From the breathtaking beauty of enchanting mounts to the exhilarating rush of adrenaline-pumping vehicles, we offer a treasure trove of in-game items that will transport you to the forefront of gaming greatness. Whether you seek to dominate the competitive arena or simply indulge in the pure joy of customization, our extensive selection of in-game items will leave you spellbound. Join us at The Game Stop, where dreams become reality, and the power to redefine gaming lies at your fingertips. Let the adventure begin!
        </p>
      </div>
      <div class="more-stuff-grid">
        <p class="slide-in from-left">
          Indulge in the realm of gaming fashion at The Game Stop, where accessories become statements of style and power. Elevate your gaming persona with our meticulously crafted accessories, from sleek gaming headsets that immerse you in crystal-clear audio, to cutting-edge controllers that enhance precision and control. Embrace the spirit of customization with vibrant and eye-catching skins, stickers, and decals that transform your devices into personalized works of art. Enhance your comfort and endurance with ergonomic gaming chairs and advanced gaming mouse pads, designed to optimize your performance during intense gaming sessions. Unleash your true potential with our wide range of gaming accessories, as we redefine the boundaries of gaming excellence. Elevate your gaming experience to new heights at The Game Stop, where accessories are more than just add-ons – they are the keys to unlocking your gaming prowess.
        </p>
        <img src="https://unsplash.it/401" alt="" class="slide-in from-right" />
      </div>
      <div class="more-stuff-grid">
        <img src="//unsplash.it/400" alt="" class="slide-in from-left" />
        <p class="slide-in from-right">
          Immerse yourself in the world of gaming culture with The Game Stop's exclusive merchandise collection. Embrace your passion for gaming with pride as you adorn yourself in our premium apparel, featuring iconic game logos and captivating designs. From stylish t-shirts that showcase your favorite characters to cozy hoodies that keep you warm during intense gaming sessions, our merchandise is a testament to your dedication and love for the gaming universe. Complete your gaming shrine with our meticulously crafted collectibles, including figurines, posters, and art prints that bring virtual worlds to life in your own space. Let your gaming enthusiasm shine with The Game Stop's extraordinary merchandise, where gaming becomes a lifestyle and your dreams become tangible reality.
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