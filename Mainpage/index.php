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

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
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
        <li class="nav__list-item"><a href="Shop/index.php" class="nav__link">Shop</a></li>
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
              <a class="nav__link nav__link--btn" href="php/logOut.php">Log Out</a>
            </li>';
        } else {
          // Not logged in
          echo '
      <li class="nav__list-item">
        <a class="nav__link nav__link--btn" href="../Verification/php/Login/Login.php">Login</a>
      </li>
      <li class="nav__list-item"> 
        <a class="nav__link nav__link--btn nav__link--btn--highlight" href="../Verification/php/Registration/Registration.php">Sign Up</a>
      </li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <main>
    <section class="home-intro">
      <div class="home-sliderAndHeading">
        <div id="articleView" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../src/pictures/mainpage/HellHound.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/pictures/mainpage/GrimRevenant.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/pictures/mainpage/SacredGoat.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/pictures/mainpage/MainpageZombieDragon.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../src/pictures/mainpage/Sable Thornrider.png" class="d-block w-100" alt="...">
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
        <img src="../src//pictures/maps/map.png" alt="" class="slide-in from-left" />
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