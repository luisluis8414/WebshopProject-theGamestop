<?php
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  header("Location: php/pleaseSignIn.php");
  exit;
}
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
  <script type="text/javascript" src="../../Extern/js/jquery.min.js"></script>
  <script type="text/javascript" src="js/search.js"></script>
  <script type="text/javascript" src="js/biggerImage.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/showCartPopUp.js"></script>
  <script src="js/shoppinCartLogic.js"></script>
  <script src="js/sendCartToBackend.js"></script>
</head>

<body>
<?php include '../php/navbarWithSearch.php'; ?>
  <main>
  <div class="ItemView">
  <?php foreach ($items as $item) { ?>
    <div class="card">
      <div>
        <img src="<?php echo $item['imagePath']; ?>" alt="<?php echo $item['name']; ?>" class="ItemImages" onclick="showImage('<?php echo $item['imagePath']; ?>', '<?php echo $item['name']; ?>');">
        <h2><?php echo $item['name']; ?></h2>
        <p>Price: <b><?php echo $item['price']; ?>$</b></p>
        <input type="hidden" class="item-id" value="<?php echo $item['id']; ?>">
      </div>
      <div class="card-footer">
        <button class="buy-now-button">Buy Now</button>
        <button class="add-to-cart-button" onclick="addToCart(<?php echo $item['id']; ?>)">
          <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" fill="white"></path>
          </svg>
        </button>
      </div>
    </div>
  <?php } ?>
</div>
  </main>

</body>

</html>