function sendCheckout(event){
  event.preventDefault();
  $(document).ready(function() {
    
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var country = $('#country').val();
    var zip = $('#zip').val();
    var download = $('#download').val();
    var paymentMethod = $('input[name="paymentMethod"]:checked').val();
    var ccName = $('#cc-name').val();
    var ccNumber = $('#cc-number').val();
    var ccExpiration = $('#cc-expiration').val();
    var ccCvv = $('#cc-cvv').val();
    var totalSum = $('#cartFooter').val()

    // Create an object with the form data
    var formData = {
      firstName: firstName,
      lastName: lastName,
      email: email,
      address: address,
      country: country,
      zip: zip,
      download: download,
      paymentMethod: paymentMethod,
      ccName: ccName,
      ccNumber: ccNumber,
      ccExpiration: ccExpiration,
      ccCvv: ccCvv,
      totalSum: totalSum
    };
    console.log(formData)
    // Send the form data to the PHP script via AJAX
    $.ajax({
      type: 'POST',
      url: 'php/checkoutSubmit.php', // Replace with your PHP script URL
      data: formData,
      success: function(response) {
        if(response.success){
          console.log("worked bitch")
        }
      },
      error: function(xhr, status, error) {
        // Handle AJAX errors
        console.error(error);
      }
    });

});
  
}