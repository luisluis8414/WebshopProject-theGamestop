$(document).ready(function() {
  // Initially hide the credit card fields
  $('.credit-card-fields').hide();
  
  // Listen for changes in the payment method selection
  $('input[name="paymentMethod"]').change(function() {
    if ($('#paypal').is(':checked')) {
      // PayPal is selected, hide the credit card fields
      $('.credit-card-fields').hide();
      // Remove the "required" attribute from credit card fields
      $('.credit-card-fields input').removeAttr('required');
    } else {
      // Credit card is selected, show the credit card fields
      $('.credit-card-fields').show();
      // Add the "required" attribute to credit card fields
      $('.credit-card-fields input').attr('required', 'required');
    }
  });
});
