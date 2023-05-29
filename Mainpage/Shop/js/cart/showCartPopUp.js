function showCartAlert() {
  Swal.fire({
    title: 'Shopping Cart',
    html: '<div id="cartItemsContainer"></div>'+
    '<div id="cartFooter"></div>',
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
      window.location.href = 'php/CheckOut/finishOrder.php';
    }
  });
  getCartItems();
}
