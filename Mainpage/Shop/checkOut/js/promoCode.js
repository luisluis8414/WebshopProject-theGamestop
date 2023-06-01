
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
          console.log(response)
          console.log("succes " + response.success + " amount "+  response.amount)
          if(response.success){
            var total=$('#cartFooter').text().slice(0, -1);
            total-=response.amount
            $('#cartFooter').html("<strong>" + total.toFixed(2) + "$</strong>");
            $('#thecode').html(promoCode);
            $('#promoAmount').html("-$"+response.amount);
            console.log(total)
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


