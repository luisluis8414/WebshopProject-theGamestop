$(document).ready(function() {
  var recent=0;
  var oldPromoCode='';
  $('#promoCode').closest('.input-group-append').click(function(event) {
    event.preventDefault();
    var promoCode = $('.form-control').val();
    if(oldPromoCode==promoCode){
      $('#discountError').html("This Code is already applied");
    }else{
      $('#discountError').html("");
      oldPromoCode=promoCode;
    $('.form-control').val('');
    
    $.ajax({
      url: 'php/redeem.php',
      type: 'POST',
      data: { promoCode: promoCode },
      success: function(response) {
        console.log("success " + response.success + " amount " + response.amount);
        if (response.success) {
          var total = parseFloat($('#cartFooter').text().slice(0, -1));
          total+=recent;
          var discount = response.amount;

          if (total - discount >= 20) {
            total -= discount;
            recent=discount;
            $('#cartFooter').html("<strong>" + total.toFixed(2) + "$</strong>");
            $('#thecode').html(promoCode);
            $('#promoAmount').html("-$" + parseFloat(discount).toFixed(2));
          } else {
            $('#discountError').html("Order total after discount is less than $20. Cannot apply promo code.");
            recent=0;
          }
        }else{
          $('#discountError').html("There is no promo Code like this");
        }
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error("Error:", error);
        console.log("xhr:", xhr);
        console.log("status:", status);
      }
    });
    }
    
  });
});
