
$(function () {
  
  $('#submit').on('click', function (event) {
    event.preventDefault();

    var email = $('#email').val();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    var pw = CryptoJS.SHA512($('#pw').val()).toString();
    // Bildschirmauflösung ermitteln
    var screenWidth = screen.width;
    var screenHeight = screen.height;
    var res=screenWidth+"x"+screenHeight;
    // Betriebssystem ermitteln
    var userAgent = navigator.userAgent;
    var os='';

    if (/Windows/i.test(userAgent)) {
      os="Windows Betriebssystem";
    } else if (/Macintosh/i.test(userAgent)) {
      os="Macintosh Betriebssystem";
    } else if (/Linux/i.test(userAgent)) {
      os="Linux Betriebssystem";
    } else {
      os="Unbekanntes Betriebssystem";
      console.log("Unbekanntes Betriebssystem");
    }

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
            firstLogin: undefined, 
            os: os,
            res: res
          },
          success: function (response) {
            var data = JSON.parse(response);
            console.log(data);
            if (data.email != '') $('#error').html(data.email);
            if (data.pw != '') $('#error').html(data.pw);
            if (data.RightCredentials == 'true') {
              if(data.firstLogin=='1'){
                PasswordPopUp(1)
              }
              if(data.firstLogin=='2'){
                  PasswordPopUp(2)
              }if(data.firstLogin=='0'){
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
  });

});
