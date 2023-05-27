
function addToCart(itemId) {
    let cartNumber = parseInt(document.getElementById("cart-badge").innerText);

    cartNumber += 1;

    document.getElementById("cart-badge").innerText = cartNumber.toString();
  
    if (cartNumber > 0) {
      document.getElementById("cart-badge").style.display = "flex";
    }

    sendItemIdToBackend(itemId)
  }
  