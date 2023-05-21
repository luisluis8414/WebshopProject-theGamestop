$(document).ready(function () {
    $("#searchInput").on("input", function (event) {
        event.preventDefault();
        var searchQuery = $(this).val().toLowerCase(); 


        $(".ItemView .card").each(function () {
            var card = $(this);
            var name = card.find("h2").text().toLowerCase(); 

           
            if (name.includes(searchQuery)) {
                card.show(); 
            } else {
                card.hide(); 
            }
        });
    });
});



// $(document).ready(function () {

//     $("#searchInput").on("input", function (event) {
//         event.preventDefault();
//         var searchQuery = $(this).val();
//         console.log("searchQuery:" + searchQuery)
//         $.ajax({
//             url: 'php/seachItems.php',
//             type: 'POST',
//             data: {
//                 searchQuery: searchQuery,
//             },
//             success: function (response) {
//                 console.log(response);
//                 var items = JSON.parse(response);
//                 $(".ItemView").empty();

//                 // Iterate over the items and create the card elements
//                 items.forEach(function (item) {
//                     var card = $("<div>", { class: "card" });
//                     var cardContent = $("<div>");

//                     var image = $("<img>", {
//                         src: item.imagePath,
//                         alt: item.name,
//                         style: "max-width: 100%; max-height: 100%; object-fit: contain;"
//                     });
//                     var name = $("<h2>").text(item.name);
//                     var price = $("<p>").text("Price: $" + item.price);

//                     cardContent.append(image, name, price);
//                     card.append(cardContent);

//                     var cardFooter = $("<div>", { class: "card-footer" });
//                     var buyNowButton = $("<button>", { class: "buy-now-button" }).text("Buy Now");
//                     var addToCartButton = $("<button>", { class: "add-to-cart-button" });
//                     var cartIcon = $("<svg>", {
//                         xmlns: "http://www.w3.org/2000/svg",
//                         width: "16",
//                         height: "16",
//                         fill: "currentColor",
//                         class: "bi bi-cart",
//                         viewBox: "0 0 16 16"
//                     }).append($("<path>", {
//                         d: "M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z",
//                         fill: "white"
//                     }));

//                     addToCartButton.append(cartIcon);
//                     cardFooter.append(buyNowButton, addToCartButton);
//                     card.append(cardFooter);

//                     // Append the card to the card container
//                     $(".ItemView").append(card);
//                 });
//             },
//             error: function (error) {
//                 alert('Error: ' + error.message);
//             }
//         });
//     });
// });
