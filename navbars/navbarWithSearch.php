<header>
  <a href="../Home/" class="site-logo" aria-label="homepage">
    <img src="../../src/logo3.png" alt="logo" id="logo">
  </a>
  <nav class="main-nav">
    <ul class="nav__list">
    <li class="nav__list-item">
        <a href="../Home" class="nav__link">Home</a>
      </li>
      <li class="nav__list-item"><a href="#" class="nav__link">Shop</a></li>
      <li class="nav__list-item">
        <a href="../Profile/" class="nav__link">Profile</a>
      </li>
      
    </ul>
  </nav>
  <nav class="account">
    <ul class="nav__list__right">

      <input type="text" id="searchInput" name="search" placeholder="Search..." hidden/>
      <div class="shopping-cart">
      <svg onclick="showCartAlert()" id="ShoppingCartIcon" style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"> <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" fill="white"></path> </svg>    
      <div class="cart-badge" id="cart-badge" style="display: none;">0</div>
      </div>
      <li class="nav__list-item__right">
        <a class="nav__link__right nav__link--btn nav__link__right--btn" href="../../Verification/php/Login/logOutWithOutRedirect.php">Log Out</a>
      </li>
    </ul>
  </nav>
</header>