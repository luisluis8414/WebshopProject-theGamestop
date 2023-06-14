
function addToCart(itemId) {
  let quantity = 0;

  $.ajax({
    url: "php/getQuantity.php",
    type: "POST",
    dataType: "json",
    data: {
      itemId: itemId
    },
    success: function (response) {
      quantity = response.quantity;
      console.log("THE RESPONSE:" + quantity)

      let cartQuantity = 0;
      $.ajax({
        url: "php/getQuantityOfItemInCart.php",
        type: "POST",
        dataType: "json",
        data: {
          itemId: itemId
        },
        success: function (itemResponse) {
          console.log("ITEMRESPONE:"+itemResponse.quantity)
          cartQuantity=itemResponse.quantity;
          updateBadge(quantity, cartQuantity, itemId);
        },
        error: function (xhr, status, error) {
          console.error("Delete request failed " + error);
          console.error("Delete request failed " + xhr);
          console.error("Delete request failed " + status);
        }
      });
    },
    error: function (xhr, status, error) {
      console.log("Delete request failed " + error);
    }
  });
}

function updateBadge(quantity, cartQuantity, itemId) {
  if (cartQuantity < quantity) {
    console.log("1")
    let cartNumber = parseInt(document.getElementById("cart-badge").innerText);

    if (isNaN(cartNumber) || cartNumber < 0) {
      cartNumber = 0;
    }
    cartNumber += 1;

    $("#cart-badge").html(cartNumber.toString());

    if (cartNumber > 0) {
      $("#cart-badge").css("display", "flex");
    }

    sendItemIdToBackend(itemId)
  } else {
    $('.error'+itemId).html("Sorry but we don't have more items of this kind in stock");
  }
  getTotalSum();
}

