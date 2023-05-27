function getCartItems() {

  $.ajax({
    url: 'php/getCartItems.php',
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      console.log('Cart items:', response);
      for (let i = 0; i < response.length; i++) {
        $.ajax({
          url: 'php/getItems.php',
          type: 'POST',
          dataType: 'json',
          data: {
            itemId: response[i].itemId
          },
          success: function (itemResponse) {  
            console.log('Items Data:', itemResponse);
            const imgPath=''+itemResponse.imgUrl;

            const itemContainer = $('<div class="cardCart"></div>');
            const img = $('<img>').attr('src', imgPath).attr('alt', 'Product Image');
            const name = $('<h3>').text(itemResponse.name);
            const price = $('<p>').text('Price: ' + itemResponse.price);
            const quantity = $('<p>').text('Quantity: ' + response[i].quantity);

            itemContainer.append(img, name, price, quantity);

            $('#cartItemsContainer').append(itemContainer);

          },
          error: function (xhr, status, error) {
            console.error('Error:', error);
            console.log('xhr:', xhr);
            console.log('status:', status);
          }
        });
      }

    },
    error: function (xhr, status, error) {
      console.error('Error:', error);
      console.log('xhr:', xhr);
      console.log('status:', status);
    }
  });
}
