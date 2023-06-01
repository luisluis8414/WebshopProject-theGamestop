$(document).ready(function() {
    let sum
    $.ajax({
      url: "../php/getTotalSum.php",
      type: "GET",
      dataType: "json", 
      success: function (response) {
          sum=parseFloat((response[0].totalSum ).toFixed(2));
      },
      error: function (xhr, status, error) {
          console.log("Delete request failed " + error);
      }
  });

    
   
    $('#download').change(function() {
      var selectedOption = $(this).val();
      let total=0;
      
      // Perform actions based on the selected option
      if (selectedOption === 'Downloadlink') {
        $('#fees').removeClass();
        $('#fees').addClass('list-group-item d-flex justify-content-between');
        $('#fees').find('span').html("Downloadlink");
        $('#fees').find('strong').html("+2$");

        total=sum+2;
         $('#cartFooter').html("<strong>" + total + "$</strong>");
      } else if (selectedOption === 'Zip for Hard Drive') {
        $('#fees').removeClass();
        $('#fees').addClass('list-group-item d-flex justify-content-between');
        $('#fees').find('span').html("Zip for Hard Drive");
        $('#fees').find('strong').html("+6$");

        total=sum+6;
         $('#cartFooter').html("<strong>" +  total + "$</strong>");
      } else if (selectedOption === 'Add them to my account') {
        $('#fees').removeClass();
        $('#cartFooter').html("<strong>" +  sum + "$</strong>");
      }
    });
  });
  