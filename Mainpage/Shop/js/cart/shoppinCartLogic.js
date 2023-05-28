
function addToCart(itemId) {
    let cartNumber = parseInt(document.getElementById("cart-badge").innerText);

    if (isNaN(cartNumber)||cartNumber<0) {
      cartNumber=0;
    }
    cartNumber += 1;

    $("#cart-badge").html(cartNumber.toString());
  
    if (cartNumber > 0) {
     $("#cart-badge").css("display", "flex");
    }

    sendItemIdToBackend(itemId)
  }

  
  