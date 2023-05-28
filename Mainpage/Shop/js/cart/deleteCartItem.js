function deleteItem() {

    const itemId = $(this).siblings('.hiddenId').val();
    // console.log("Item ID:", itemId);

    $.ajax({
        url: "php/deleteCartItem.php",
        type: "POST",
        data: { itemId: itemId },
        success: function (response) {
            $('#cartItemsContainer').find('.cardCart').filter(function () {
                return $(this).find('.hiddenId').val() === itemId;
            }).fadeOut(400, function () {
                $(this).remove();
            });

            let cartNumber = parseInt(document.getElementById("cart-badge").innerText);

            let quantity = $('#quantity' + itemId).text().replace('x ', '');
            console.log(quantity);

            cartNumber -= quantity;
            console.log(cartNumber)
            $("#cart-badge").html(cartNumber.toString());


            if (isNaN(cartNumber) || cartNumber <= 0) {
                $("#cart-badge").css("display", "none");
              }
              
              

        },
        error: function (xhr, status, error) {
            console.log("Delete request failed " + response);
            // Handle any errors that occurred during the request
        }
    });
}
