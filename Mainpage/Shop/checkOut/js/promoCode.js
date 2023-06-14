$(document).ready(function() {
  $('#promoCode').closest('.input-group-append').click(function(event) {
    event.preventDefault();
    var promoCode = $('.form-control').val();

    $('.form-control').val('');

    $.ajax({
      url: 'php/redeem.php',
      type: 'POST',
      data: { promoCode: promoCode },
      success: function(response) {
        console.log(response);
        console.log("success " + response.success + " amount " + response.amount);
        if (response.success) {
          var total = parseFloat($('#cartFooter').text().slice(0, -1));
          var discount = response.amount;

          if (total - discount >= 20) {
            total -= discount;
            $('#cartFooter').html("<strong>" + total.toFixed(2) + "$</strong>");
            $('#thecode').html(promoCode);
            $('#promoAmount').html("-$" + discount.toFixed(2));
            console.log(total);
          } else {
            $('#discountError').html("Order total after discount is less than $20. Cannot apply promo code.");
          }
        }
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error("Error:", error);
        console.log("xhr:", xhr);
        console.log("status:", status);
      }
    });
  });
});
