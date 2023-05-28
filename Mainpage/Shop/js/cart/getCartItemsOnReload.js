$(document).ready(function() {
    $.ajax({
      url: 'php/getItemsQuantity.php',
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        console.log("Quantity on reload: " + response.quantity);
        let quantity=response.quantity;
        if(quantity>0&&!(isNaN($("#cart-badge").val())))
        $("#cart-badge").html(quantity.toString());
        $("#cart-badge").css("display", "flex");
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    }); 
  });
  