$(function () {

  $('#submit').on('click', function (event) {
    event.preventDefault();

    setTimeout(function () {
      var email = $('#email').val();
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      var pw = CryptoJS.SHA512($('#pw').val()).toString();

      $('#emailError').html('');
      if (pw.length == 0) {
        $('#error').html('Please enter a password');
      } else {
        if (!emailRegex.test(email)) {
          $('#emailError').html('Please enter a valid Email');
        } else {
          $.ajax({
            url: 'loginIn.php',
            type: 'POST',
            data: {
              email: email,
              pw: pw,
              RightCredentials: undefined,
              firstLogin: undefined
            },
            success: function (response) {
              var data = JSON.parse(response);
              console.log(data);
              if (data.email != '') $('#error').html(data.email);
              if (data.pw != '') $('#error').html(data.pw);
              if (data.RightCredentials == 'true') {
                if (data.firstLogin == '1') {
                  PasswordPopUp(1);
                }
                if (data.firstLogin == '2') {
                  PasswordPopUp(2);
                }
                if (data.firstLogin == '0') {
                  FaInput(email);

                }
              }
            },
            error: function (error) {
              alert('Error: ' + error.message);
            }
          });
        }
      }
    }, 100);
  });

});
