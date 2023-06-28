function getTotalSum() {
    $.ajax({
      url: "php/getTotalSum.php",
      type: "GET",
      dataType: "json",
      success: function (response) {
        // console.log(response.items)
        for (var i = 0; i < response.items.length; i++) {
          var quantity = response.items[i].quantity;
          // console.log("quant"+quantity)
          var message='Total Sum: <strong>' + response.totalSum.toFixed(2) + '$</s></strong>'
          var messageFooter='';
          if (quantity >= 10) {
            var discountedSum = response.totalSum.toFixed(2) - (response.totalSum.toFixed(2) * 0.1);
            message="Total Sum: <strong><s>" + response.totalSum.toFixed(2) + "$</s></strong>" + " <strong>" + discountedSum.toFixed(2) + "$</strong>";
            messageFooter="<small style='color: green;'>10 items of same Type Discount</small>";
            break;
          } else if (quantity >= 5) {
            var discountedSum = response.totalSum.toFixed(2) - (response.totalSum.toFixed(2) * 0.05);
            message="Total Sum: <strong><s>" + response.totalSum.toFixed(2) + "$</s></strong>" + " <strong>" + discountedSum.toFixed(2) + "$</strong>";
            messageFooter="<small style='color: green;'>5 items of same Type Discount</small>";
            break;
          }
        }
        $('#cartFooter').html(message);
        $('#cartFooterFooter').html(messageFooter);
      },
      error: function (xhr, status, error) {
        console.log("Delete request failed " + error);
      }
    });
  }
  