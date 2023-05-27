function getCartItems() {
    let itemIds=[]
    let imgUrl=''
    let name=''
    let price=''
    let quantity=''

    
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
            success: function (response) {
              console.log('Items Data:', response);
              
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
  