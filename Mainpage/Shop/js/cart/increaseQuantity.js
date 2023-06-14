function increaseQuantity() {
    const itemId = $(this).siblings('.hiddenId').val();

    $.ajax({
        url: "php/increaseQuantity.php",
        type: "POST",
        data: { itemId: itemId },
        dataType: "json", 
        success: function (response) {
            console.log(response[0].quantity)
            if (response[0].quantity> 0) {
                $('#quantity' + itemId).html('x ' + response[0].quantity);
                updateCartNumber(itemId, -1);
          
            } else {
               $('#errorMsg'+itemId).html("We don't have more than this in stock");
            }
            
        },
        error: function (xhr, status, error) {
            console.log("Delete request failed " + error);
        }
    });
    getTotalSum();
}

