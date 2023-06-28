function showImage(imagePath, itemId, name) {
var text='';
var requestData = {
  itemId: itemId
};
  $.ajax({
    url: 'php/getText.php',
    type: 'POST',
    data: requestData,
    success: function(response) {
      let data = JSON.parse(response);
      text=data.description;
      

      var cartQuantity = 0;
  $.ajax({
    url: 'php/getQuantityOfItemInCart.php',
    type: 'POST',
    data: requestData,
    success: function(response) {
      let data = JSON.parse(response);
      cartQuantity = data.quantity;
      // console.log("cartQuantity: " + cartQuantity);
  
      var lagerQuantity = 0;
      var availableQuantity = 0;
  
      $.ajax({
        url: 'php/getQuantity.php',
        type: 'POST',
        data: requestData,
        success: function(response) {
          let data = JSON.parse(response);
          lagerQuantity = data.quantity;
          availableQuantity = lagerQuantity - cartQuantity;
          // console.log("Available Quantity: " + lagerQuantity);
  
          Swal.fire({
            title: name,
            html: `<div id="ImageContainer"><img src="${imagePath}" alt="${name}" id="PopUpImage"></div>
            <br>
            <div class="quantity">
            <input type="number" min="1" max="20" step="1" value="1">
            <button id="addToCartBtn">Add to Cart</button>
            </div>
            <small style="color: red" id="errorMsg"></small>
            <br>
            <h2 style="margin: 0;">Description</h2>

            <p id="text" ></p>`,
            width: '40%',
            imageWidth: '100%',
            imageHeight: 'auto',
            imageAlt: name,
            showCloseButton: true,
            showConfirmButton: false,
          });
          $('#text').html(text);
          jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
          jQuery('.quantity').each(function() {
            var spinner = jQuery(this),
              input = spinner.find('input[type="number"]'),
              btnUp = spinner.find('.quantity-up'),
              btnDown = spinner.find('.quantity-down'),
              min = input.attr('min'),
              max = input.attr('max');
        
            btnUp.click(function() {
              var oldValue = parseFloat(input.val());
              if (oldValue >= max) {
                var newVal = oldValue;
              } else {
                var newVal = oldValue + 1;
              }
              spinner.find("input").val(newVal);
              spinner.find("input").trigger("change");
            });
        
            btnDown.click(function() {
              var oldValue = parseFloat(input.val());
              if (oldValue <= min) {
                var newVal = oldValue;
              } else {
                var newVal = oldValue - 1;
              }
              spinner.find("input").val(newVal);
              spinner.find("input").trigger("change");
            });
        
          });
  
          $(document).on('click', '#addToCartBtn', function() {
            var quantityInput = $('.quantity input');
            var inputQuantity = parseInt(quantityInput.val());
            // console.log("Input quantity: " + inputQuantity);
  
            if (inputQuantity <= availableQuantity) {
              availableQuantity -= inputQuantity;
              $('#errorMsg').html(``);
  
              // console.log("Available - Input: " + availableQuantity);
              for (var i = 0; i < inputQuantity; i++) {
                // console.log("i " + i);
                addToCart(itemId);
              }
            } else {
              $('#errorMsg').html(`We don't have this much in stock. We currently only have ${availableQuantity} in stock`);
            }
          });
        }
      });
    }
  });
    },
    error: function(xhr, status, error) {
      console.log("Fehler: " + error);
      
    }
  });
  

 
  
  

  
 
}


