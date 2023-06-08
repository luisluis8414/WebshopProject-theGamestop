function orderAgain(orderId){
    $.ajax({
        url: 'php/orderAgain.php', 
        type: 'POST',
        data: {
            orderId:orderId
        },
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if(response.success=='success'){
            window.location.href='../../Mainpage/Shop/checkout/php/thankYou.php'
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error:', jqXHR);
          console.error('Error:', textStatus, errorThrown);
          console.log(response.error)
        }
      });
      
}