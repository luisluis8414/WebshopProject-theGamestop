function onClickOrder(id) {
    let totalSum = 0;
    var orderCardsHtml = '';
  
    Swal.fire({
      title: 'Order: ' + id,
      html: '<div class="parentContainer">' +
        orderCardsHtml +
        '</div>' +
        '<div class="totalSum2">Total Sum: </div>',
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Order Again',
      cancelButtonText: 'Close',
      width: '60rem'
    }).then((result) => {
      if (result.isConfirmed) {
        orderAgain(id);
      }
    });
  
    $.ajax({
      url: 'php/getOrderView.php',
      type: 'POST',
      dataType: 'json',
      data: {
        id: id
      },
      success: function(response) {
        console.log(response);
        for (var i = 0; i < response.length; i++) {
          (function(i) {
            var itemId = response[i].itemId;
            var quantity = response[i].quantity;
            $.ajax({
              url: 'php/getItems.php',
              type: 'POST',
              dataType: 'json',
              data: {
                itemId: itemId
              },
              success: function(itemResponse) {
                console.log(itemResponse);
                var itemName = itemResponse.itemName;
                var itemPrice = itemResponse.price;
                var itemImgUrl = itemResponse.imgUrl;
                
                var orderCardHtml = '<div class="orderCard cardCart">' +
                  '<img class="image" src="' + itemImgUrl + '">' +
                  '<p class="itemName">' + itemName + '</p>' +
                  '<div class="right"><p class="quantity">' + quantity + 'x' + '</p>' +
                  '<p class="price"> <b>' + itemPrice + '$ </b></p></div>' +
                  '</div>';
    
                orderCardsHtml += orderCardHtml;
                
                totalSum += parseFloat(quantity) * parseFloat(itemPrice);
             
    
                $('.parentContainer').html(orderCardsHtml);
                $('.totalSum2').html("Total Sum: <b>" + totalSum.toFixed(2) + "$</b>"); // Update the total sum here
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
              }
            });
          })(i);
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error:', textStatus, errorThrown);
      }
    });
    
  }
  