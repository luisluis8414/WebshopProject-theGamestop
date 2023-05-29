function sendItemIdToBackend(itemId) {

    const data = {
      itemId: itemId
    };
$.ajax({
    url: 'php/storeCart.php',
    method: 'POST',
    data: data,
    success: function(response) {
      // console.log(response);
    },
    error: function(errorThrown) {
      console.error('Failed to send item IDs to the backend:', errorThrown);
    }
  });
}