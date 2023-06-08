function deleteCart(orderId) {
    $.ajax({
      url: "php/deleteCart.php",
      type: "POST",
      dataType: "json",
      data: { orderId: orderId },
      success: function (response) {
        console.log(response)
      },
      error: function (xhr, status, error) {
        console.error("Delete request failed " + error);
        console.error("Delete request failed " + status);
        console.error("Delete request failed " + xhr);
      }
    });
  }
  