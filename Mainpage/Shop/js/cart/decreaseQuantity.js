function decreaseQuantity() {
    const itemId = $(this).siblings('.hiddenId').val();

    $.ajax({
        url: "php/decreaseQuantity.php",
        type: "POST",
        data: { itemId: itemId },
        dataType: "json", 
        success: function (response) {
            if (response[0].quantity> 0) {
                $('#quantity' + itemId).html('x ' + response[0].quantity);
                $('#errorMsg'+itemId).html("");
            } else {
                $('#cartItemsContainer').find('.cardCart').filter(function () {
                    return $(this).find('.hiddenId').val() === itemId;
                }).fadeOut(400, function () {
                    $(this).remove();
                });
            }
            updateCartNumber(itemId, 1);
            getTotalSum();
        },
        error: function (xhr, status, error) {
            console.log("Delete request failed " + error);
        }
    });
}
