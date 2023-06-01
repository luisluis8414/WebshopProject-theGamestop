$(document).ready(function() {
  // Show the credit card fields on page load
  $('.credit-card-fields').show();
  
  // Handle changes to the payment method radio buttons
  $('input[name="paymentMethod"]').change(function() {
    if ($('#paypal').is(':checked')) {
      // Hide the credit card fields for PayPal option
      $('.credit-card-fields').hide();
      $('.credit-card-fields input').removeAttr('required');
    } else {
      // Show the credit card fields for other options
      $('.credit-card-fields').show();
      $('.credit-card-fields input').attr('required', 'required');
    }
  });
});
