function showCartAlert() {


  Swal.fire({
    title: 'Shopping Cart',
    html: '<div id="cartItemsContainer"></div>',
    icon: 'info',
    confirmButtonText: 'OK',
    didOpen: function () {
      cartItemsContainer.empty();

      
    }
  });
  getCartItems();
}
