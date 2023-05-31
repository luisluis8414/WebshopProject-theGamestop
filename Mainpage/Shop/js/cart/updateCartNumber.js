function updateCartNumber(itemId, num){
            let cartNumber = parseInt(document.getElementById("cart-badge").innerText);

            cartNumber -= num;
            $("#cart-badge").html(cartNumber.toString());


            if (isNaN(cartNumber) || cartNumber <= 0) {
                $("#cart-badge").css("display", "none");
              }
              
}