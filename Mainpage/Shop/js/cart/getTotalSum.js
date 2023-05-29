function getTotalSum(){
    $.ajax({
        url: "php/getTotalSum.php",
        type: "GET",
        dataType: "json", 
        success: function (response) {
            console.log(response)
            $('#cartFooter').html("Total Sum: <strong>" + response[0].totalSum + "$</strong>");

        },
        error: function (xhr, status, error) {
            console.log("Delete request failed " + error);
        }
    });
      
}