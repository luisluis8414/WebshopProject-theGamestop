<header>
  <div class="logoAndName">
    <a href="#" class="site-logo" aria-label="homepage">The Game Stop
      <svg style="color: #BE6C2A" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
        <!-- SVG code here -->
      </svg>
    </a>
  </div>
  <nav class="main-nav">
    <ul class="nav__list">
      <li class="nav__list-item"><a href="../Shop/index.php" class="nav__link">Shop</a></li>
      <li class="nav__list-item">
        <a href="#" class="nav__link">Articles</a>
      </li>
      <li class="nav__list-item"><a href="../Profile/" class="nav__link">Profile</a></li>
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
