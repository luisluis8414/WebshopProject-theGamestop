function getCartItems() {

  $.ajax({
    url: 'php/getCartItems.php',
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      // console.log('Cart items:', response);
      for (let i = 0; i < response.length; i++) {
        $.ajax({
          url: 'php/getItems.php',
          type: 'POST',
          dataType: 'json',
          data: {
            itemId: response[i].itemId
          },
          success: function (itemResponse) {  
            // console.log('Items Data:', itemResponse);
            const imgPath=''+itemResponse.imgUrl;

            const itemContainer = $('<div class="cardCart"></div>');
            const rightSide = $('<div class="rightCard"></div>');
            const leftSide = $('<div class="leftCard"></div>');
            const mid = $('<div class="midCard"></div>');

            const hiddenId = $('<input>').attr('type', 'hidden').addClass('hiddenId').val(itemResponse.itemId);
            const img = $('<img>').attr('src', imgPath).attr('alt', 'Product Image');

            const nameOnly = (itemResponse.itemName).split(/,|\s/)[0].trim();

            const name=$('<h5>').text(nameOnly);


            const price = $('<p>').text(itemResponse.price+ '$');
            const quantity = $('<p>').attr('id', 'quantity'+response[i].itemId).text('x ' + response[i].quantity);
            const deleteButton = $('<button>').addClass('deleteButton').text('');
            const minusButton = $('<button>').addClass('minusButton').html('<span id="counterButtons">-</span>');
            const plusButton = $('<button>').addClass('plusButton').html('<span id="counterButtons">+</span>'); 

            deleteButton.click(deleteItem);

            rightSide.append(img);
            mid.append(name, quantity, price);
            leftSide.append(minusButton, plusButton, deleteButton, hiddenId);
            itemContainer.append(rightSide, mid, leftSide);

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
