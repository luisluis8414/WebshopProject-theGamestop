function showCartAlert() {
  getCartItems();
    Swal.fire({
      title: 'Shopping Cart',
      text: 'Your shopping cart is empty.',
      icon: 'info',
      confirmButtonText: 'OK'
    });
  }