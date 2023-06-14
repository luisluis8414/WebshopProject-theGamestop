function getTotalSum() {
    $.ajax({
      url: "php/getTotalSum.php",
      type: "GET",
      dataType: "json",
      success: function (response) {
        for (var i = 0; i < response.items.length; i++) {
          var quantity = response.items[i].quantity;
          console.log(typeof quantity)
          if (quantity >= 10) {
            var discountedSum = response.totalSum.toFixed(2) - (response.totalSum.toFixed(2) * 0.1);
            $('#cartFooter').html("Total Sum: <strong><s>" + response.totalSum.toFixed(2) + "$</s></strong>" + " <strong>" + discountedSum.toFixed(2) + "$</strong>");
            $('#cartFooterFooter').html("<small style='color: green;'>10 items of same Type Discount</small>");
  
          } else if (quantity >= 5) {
            var discountedSum = response.totalSum.toFixed(2) - (response.totalSum.toFixed(2) * 0.05);
            $('#cartFooter').html("Total Sum: <strong><s>" + response.totalSum.toFixed(2) + "$</s></strong>" + " <strong>" + discountedSum.toFixed(2) + "$</strong>");
            $('#cartFooterFooter').html("<small style='color: green;'>5 items of same Type Discount</small>");
  
          } else {
            $('#cartFooter').html("Total Sum: <strong>" + response.totalSum.toFixed(2) + "$</strong>");
            $('#cartFooterFooter').html("");
          }
        }
      },
      error: function (xhr, status, error) {
        console.log("Delete request failed " + error);
      }
    });
  }
  