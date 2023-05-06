
$(function () {

  $('#submit').on('click', function (event) {
    event.preventDefault();

    var email = $('#email').val();
    //   var emailRegex = /^[a-zA-Z]{5,}@[^\s@]+\.[^\s@]+$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var pw = $('#pw').val();
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
            RightCredentials: undefined
          },
          success: function (response) {
            var data = JSON.parse(response);
            console.log(data);
            if (data.email != '') $('#error').html(data.email);
            if (data.pw != '') $('#error').html(data.pw);
            if (data.RightCredentials == 'true') window.location.href='../../../Mainpage.php'
          },
          error: function (error) {
            alert('Error: ' + error.message);
          }
        });
      }
    }
  });

});


