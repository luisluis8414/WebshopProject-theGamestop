function getTotalSum() {
    $.ajax({
      url: "php/getTotalSum.php",
      type: "GET",
      dataType: "json",
      success: function (response) {
        var quantity = 0;
        var highestDiscount = 0;
        for (var i = 0; i < response.items.length; i++) {
          quantity += response.items[i].quantity;
        }
        
        var message = 'Total Sum: <strong>' + response.totalSum.toFixed(2) + '$</strong>';
        var messageFooter = '';
  
        if (quantity >= 10) {
          highestDiscount = 0.15;
          message = "Total Sum: <strong><s>" + response.totalSum.toFixed(2) + "$</s></strong> <strong>" + calculateDiscountedSum(response.totalSum, highestDiscount).toFixed(2) + "$</strong>";
          messageFooter = "<small style='color: green;'>10 items discount. You get 15% on checkout.</small>";
        } else if (quantity >= 5) {
          highestDiscount = 0.05;
          message = "Total Sum: <strong><s>" + response.totalSum.toFixed(2) + "$</s></strong> <strong>" + calculateDiscountedSum(response.totalSum, highestDiscount).toFixed(2) + "$</strong>";
          messageFooter = "<small style='color: green;'>5 items discount. You get 5% on checkout.</small>";
        }
  
        $('#cartFooter').html(message);
        $('#cartFooterFooter').html(messageFooter);
      },
      error: function (xhr, status, error) {
        console.log("Delete request failed " + error);
      }
    });
  }
  
  function calculateDiscountedSum(totalSum, discount) {
    return totalSum - (totalSum * discount);
  }
  