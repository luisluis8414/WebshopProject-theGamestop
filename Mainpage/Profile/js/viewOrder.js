function onClickOrder(id) {
    Swal.fire({
      title: 'Order',
      text: 'Do you want to place the order again?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Order Again',
      cancelButtonText: 'Close'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            url: 'php/getOrderView.php',
            type: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function(response) {
              console.log('Response from PHP file:', response);
              // Handle the response data here
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error('Error:', textStatus, errorThrown);
              // Handle any errors here
            }
          });
          console.log("Order again! Order ID: " + id);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        console.log("Close clicked! Order ID: " + id);
      }
    });
  }
  