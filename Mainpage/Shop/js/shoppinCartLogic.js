function addToCart() {
    // Get the current cart number
    let cartNumber = parseInt(document.getElementById("cart-badge").innerText);
  
    // Increment the cart number by 1
    cartNumber += 1;
  
    // Update the cart number element
    document.getElementById("cart-badge").innerText = cartNumber.toString();
  
    // Show the cart badge if cartNumber is greater than 0
    if (cartNumber > 0) {
      document.getElementById("cart-badge").style.display = "flex";
    }
  }
  