$(document).ready(function() {
  $.ajax({
    url: "../php/getTotalSum.php",
    type: "GET",
    dataType: "json", 
    success: function (response) {
        let sum=(response[0].totalSum ).toFixed(2);
        $('#cartFooter').html("<strong>" + sum + "$</strong>");
    },
    error: function (xhr, status, error) {
        console.log("Delete request failed " + error);
    }
});

  $.ajax({
    url: '../php/getCartItems.php',
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      // console.log('Cart items:', response);
      for (let i = 0; i < response.length; i++) {
        $.ajax({
          url: '../php/getItems.php',
          type: 'POST',
          dataType: 'json',
          data: {
            itemId: response[i].itemId
          },
          success: function (itemResponse) {  
            // console.log('Items Data:', itemResponse);
            // console.log(itemResponse.itemName)
            // const imgPath=''+itemResponse.imgUrl;

            

            const list = $('<li></li>').addClass('list-group-item d-flex justify-content-between lh-condensed');

            const nameOnly = (itemResponse.itemName).split(/,|\s/)[0].trim();
            const name=$('<h6></h6>').addClass('my-0').text(nameOnly);


            const quantity=$('<span></span>').addClass('text-muted quantity').text(response[i].quantity+'x');
            const price=$('<span>$</span>').addClass('text-muted').text(itemResponse.price+"$");
            
            const hiddenId = $('<input>').attr('type', 'hidden').addClass('hiddenId').val(itemResponse.itemId);
            
            /* <li class="list-group-item d-flex justify-content-between lh-condensed">
          <h6 class="my-0">Product name</h6>
          <span class="text-muted quantity">2x</span>
          <span class="text-muted">$12</span>
        </li> */

            list.append(name, quantity, price, hiddenId)

            $('#cartItems').append(list);

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
})



