$(document).ready(function() {
    // Initially hide the credit card fields
    $('.credit-card-fields').hide();
  
    // Listen for changes in the payment method selection
    $('input[name="paymentMethod"]').change(function() {
      if ($('#paypal').is(':checked')) {
        // PayPal is selected, hide the credit card fields
        $('.credit-card-fields').hide();
      } else {
        // Credit card is selected, show the credit card fields
        $('.credit-card-fields').show();
      }
    });
  });
  