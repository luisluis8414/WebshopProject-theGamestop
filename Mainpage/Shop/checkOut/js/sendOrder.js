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
    var paymentMethod=paymentMethod = $('label[for="' + $('input[name="paymentMethod"]:checked').attr('id') + '"]').text();
    var ccName = $('#cc-name').val();
    var ccNumber = $('#cc-number').val();
    var ccExpiration = $('#cc-expiration').val();
    var ccCvv = $('#cc-cvv').val();
    var totalSum =  $('#cartFooter').text().replace('$', '');
    var fees = $('#fees strong').text();
    var promo =$('#promoAmount').text();

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
      totalSum: totalSum,
      fees: fees,
      promo: promo
    };

    $.ajax({
      type: 'POST',
      url: 'php/checkoutSubmit.php', 
      data: formData,
      success: function(response) {
        console.log(response)
        var data = JSON.parse(response);
        if(data.success=='success'){
          deleteCart(data.orderId);
          // window.location.href = "php/thankYou.php";
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });

});
  
}