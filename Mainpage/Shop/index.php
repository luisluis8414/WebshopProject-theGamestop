<?php
session_start();
require("../../DBConnection/mysql.php");
$stmt = $mysql->prepare("SELECT * FROM items WHERE quantity > 0;");
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($items as $item) {
  // Access item properties;
  $itemName = $item['name'];
  $itemDescription = $item['description'];
  $itemPrice = $item['price'];
  $itemImagePath = $item['ImagePath'];
  $itemQuantity = $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <header>
    <a href="../" class="site-logo" aria-label="homepage">The Game Stop </a>
    <nav class="main-nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a href="#" class="nav__link">Shop</a></li>
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
  <main>
  <div class="ItemView">
  <?php foreach ($items as $item) { ?>
    <div class="card">
      <h2><?php echo  $itemName; ?></h2>
      <div class="container">
        <img src="<?php echo $item['imagePath']; ?>" alt="<?php echo $item['name']; ?>">
        <p>Price: $<?php echo   $itemPrice; ?></p>
      </div>
      <div class="card-footer">
        <button class="buy-now-button">Buy Now</button>
        <button class="add-to-cart-button"><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"> <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" fill="white"></path> </svg></button>
      </div>
    </div>
  <?php } ?>
</div>

  </main>

</body>

</html>