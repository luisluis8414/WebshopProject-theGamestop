function showCartAlert() {
  Swal.fire({
    title: 'Shopping Cart',
    html: '<div id="cartItemsContainer"></div>'+
    '<div id="cartFooter"></div>'+
    '<div id="cartFooterFooter"></div>',
    showCancelButton: true,
    cancelButtonText: 'Keep Shopping',
    confirmButtonText: 'Finish Order',
    width: '60rem',
    preConfirm: function () {
      return new Promise(function (resolve) {
        resolve();
      });
    }
  }).then(function (result) {
    if (result.isConfirmed) {
      var cartItemsCount = $('#cartItemsContainer').children().length;
      if (cartItemsCount >= 1) {
        window.location.href = '../Shop/CheckOut/finishOrder.php';
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "Your cart can't be empty!",
        })
      }
    }
  });
  getCartItems();
}
