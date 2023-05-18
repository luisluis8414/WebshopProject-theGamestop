$(function () {

  $('#submit').on('click', function (event) {
    event.preventDefault();

    var email = $('#email').val();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var pw = $('#pw').val();
    var hashedPW = CryptoJS.SHA512(pw).toString();
    console.log("hashed pw:"+hashedPW)
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
            pw: hashedPW,
            RightCredentials: undefined
          },
          success: function (response) {
            var data = JSON.parse(response);
            console.log(data);
            if (data.email != '') $('#error').html(data.email);
            if (data.pw != '') $('#error').html(data.pw);
            if (data.RightCredentials == 'true') window.location.href='../../../Mainpage/index.php'
          },
          error: function (error) {
            alert('Error: ' + error.message);
          }
        });
      }
    }
  });

});