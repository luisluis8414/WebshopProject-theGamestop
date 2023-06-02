$(document).ready(function() {
    $.ajax({
      url: "php/getUserData.php",
      type: "GET",
      success: function(response) {
        var data = JSON.parse(response);
        $('#FirstName').html(data.firstName);
        $('#LastName').html(data.surname);
        var fullName = data.firstName + " " + data.surname;
        $('#ShowName').html(fullName);
        $('#ShowEmail').html(data.email);
        $('#Email').html(data.email);
        $('#Phone').html(data.phone);
        $('#Address').html(data.address);
        $('#City').html(data.city);
        $('#Street').html(data.street);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
  