$(document).ready(function() {
    $("#EditProfile").click(function() {
      // Get the field values
      var firstName = $("#FirstName").text().trim();
      var lastName = $("#LastName").text().trim();
      var phone = $("#Phone").text().trim();
      var city = $("#City").text().trim();
      var street = $("#Street").text().trim();
      if (phone == '-') phone = '';
      if (city == '-') city = '';
      if (street == '-') street = '';
  
      var content = `
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">First Name</p>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="swalFirstName" value="${firstName}">
            <small id="firstNameError" class="error-text"></small>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Last Name</p>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="swalLastName" value="${lastName}">
            <small id="lastNameError" class="error-text"></small>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Phone</p>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="swalPhone" value="${phone}">
            <small id="phoneError" class="error-text"></small>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">City</p>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="swalCity" value="${city}">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Street</p>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="swalStreet" value="${street}">
          </div>
        </div>
      `;
  
      Swal.fire({
        title: "Edit Profile",
        html: content,
        showCancelButton: true,
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
        didOpen: function() {
          $(".swal2-input").addClass("form-control");
        },
        preConfirm: function() {
          var editedFirstName = $("#swalFirstName").val();
          var editedLastName = $("#swalLastName").val();
          var editedPhone = $ ("#swalPhone").val();
          var editedCity = $("#swalCity").val();
          var editedStreet = $("#swalStreet").val();

          $("#firstNameError").text("");
          $("#lastNameError").text("");
          $("#phoneError").text("");
  
     
          if (editedFirstName && !(/^[a-zA-ZäüöÄÜÖ]+$/.test(editedFirstName))) {
            $("#firstNameError").text("Please enter a valid first name (only characters)");
            return false;
          }
          
          if (editedLastName && !(/^[a-zA-ZäüöÄÜÖ]+$/.test(editedLastName))) {
            $("#lastNameError").text("Please enter a valid last name (only characters)");
            return false;
          }
          
  
   
          if (editedPhone && !(/^(\+)?\d+$/.test(editedPhone))) {
            $("#phoneError").text("Please enter a valid phone number");
            return false; 
          }
          
  
          var data = {
            editedFirstName: editedFirstName,
            editedLastName: editedLastName,
            editedPhone: editedPhone,
            editedCity: editedCity,
            editedStreet: editedStreet
          };
  
          $("#FirstName").text(editedFirstName);
          $("#LastName").text(editedLastName);
          $("#Phone").text(editedPhone);
          $("#City").text(editedCity);
          $("#Street").text(editedStreet);
  
          $.ajax({
            url: "php/updateUser.php",
            type: "POST",
            data: data,
            success: function(response) {
              console.log("Post request successful");
              console.log(response);
            },
            error: function(xhr, status, error) {
              console.log("An error occurred while making the POST request");
              console.log(xhr.responseText);
            }
          });
        }
      });
    });
  });
  