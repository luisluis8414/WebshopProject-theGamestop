<?php
session_start();
require("../../DBConnection/mysql.php");
$stmt = $mysql->prepare("SELECT * FROM items WHERE quantity > 0;");
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/shoppingCart.css">
  <link rel="apple-touch-icon" sizes="180x180" href="../../src/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../src/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../src/favicon/favicon-16x16.png">
  <link rel="manifest" href="../../src/favicon/site.webmanifest">
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script type="text/javascript" src="js/search.js"></script>
  <script type="text/javascript" src="js/biggerImage.js"></script>
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
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  
<?php 
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  include '../../navbars/navbarWithSearchNotLoggedIn.php'; 
}else{
  include '../../navbars/navbarWithSearch.php'; 
}
?>
  <main>
  <div class="ItemView">
  <?php foreach ($items as $item) { ?>
    <div class="card">
      <div>
        <img src="<?php echo $item['imagePath']; ?>" alt="<?php echo $item['name']; ?>" class="ItemImages" onclick="showImage('<?php echo $item['imagePath']; ?>', '<?php echo $item['name']; ?>');">
        <h2><?php echo $item['name']; ?></h2>
        <p>Price: <b><?php echo $item['price']; ?>$</b></p>
        <small class="error<?php echo $item['id'];?>"></small>
        <input type="hidden" class="item-id" value="<?php echo $item['id']; ?>">
      </div>
      <div class="card-footer">
      <?php 
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  echo '<div id="filler"> </div>';
}else{
  include 'php/buttons.php'; 
}
?>
        
      </div>
    </div>
  <?php } ?>
</div>
  </main>

</body>

</html>