<?php
session_start();
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)) {
  header("Location: ../php/pleaseSignIn.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/shoppingCart.css">

  <link rel="apple-touch-icon" sizes="180x180" href="../../../src/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../../src/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../../src/favicon/favicon-16x16.png">
  <link rel="manifest" href="../../src/favicon/site.webmanifest">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../../Extern/js/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css">
  <script src="js/promoCode.js"></script>
  <script src="js/form.js"></script>
  <script src="js/billingInfo.js"></script>
  <script src="js/fillCart.js"></script>
  <script src="js/sendOrder.js"></script>
  <script src="js/downloadtype.js"></script>
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
  <script src="js/deleteCart.js"></script>
  <link rel="stylesheet" href="css/navbar.css">

  <title>Check Out</title>
 
</head>

<body>
  
<?php include '../../../navbars/navbarCheckout.php'; ?>
  <div class="content">
    <div class="container">
      <div id="heading" class="py-5 text-center">
        <!-- <img id="ControllerLogo" src="src/logo4.png" alt=""> -->
        <h2>Checkout</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <div id="cartItems">

            </div>
            
          
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal (USD)</span>
              <strong id="subtotal">$20</strong>
            </li>
            <li id="fees"> 
              <span></span>
              <strong></strong>
            </li>
            

            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small id="thecode">no code</small>
              </div>
              <span class="text-success" id="promoAmount">-</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
              <span id="discount" style="color: green;">--</span>
              <strong style="color: green;" id="discountSum">--</strong>
            </li>

              
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong id="cartFooter">$20</strong>
            </li>
          </ul>


          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" id="promoCode" class="btn btn-success">Redeem</button>
            </div>
          </div>
          <div >
            <small id="discountError" style="color: red;"></small>
          </div>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>



            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>Germany</option>
                  <option>United States</option>
                  <option>France</option>
                  <option>Spain</option>
                  <option>Austria</option>
                  <option>Switzerland</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>

              <div class="col-md-5 mb-3">
                <label for="download">Downloadtype</label>
                <select class="custom-select d-block w-100" id="download" required>
                  <option value="">Choose...</option>
                  <option>Downloadlink</option>
                  <option>Zip for Hard Drive</option>
                  <option>Add them to my account</option>

                </select>
                <div class="invalid-feedback">
                  Please select a type.
                </div>
              </div>
            </div>
            <!-- <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div> -->

            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" required checked>
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
            <div class="invalid-feedback" style="width: 100%;">
              Please select a payment method
            </div>
            <div class="row">
              <div class="col-md-6 mb-3 credit-card-fields">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3 credit-card-fields">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3 credit-card-fields">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3 credit-card-fields">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info" required>
              <label class="custom-control-label" for="save-info">I have read an accepted the <a href="#">terms</a></label>
              <div class="invalid-feedback" style="width: 100%;">
                Please accept our terms
              </div>
              <br> <br>
            </div>

            <button class="btn btn-primary btn-lg btn-block" id="submitButton" type="submit">Order</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2021 - 2045 thegamestop</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>
  </div>

</body>

</html>