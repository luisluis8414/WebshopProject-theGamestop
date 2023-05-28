function showCartAlert() {


  Swal.fire({
    title: 'Shopping Cart',
    html: '<div id="cartItemsContainer"></div>',
    showCancelButton: true,
    cancelButtonText: 'Keep Shopping',
    confirmButtonText: 'Finish Order',
    width: '60rem',
  });
  getCartItems();
}
