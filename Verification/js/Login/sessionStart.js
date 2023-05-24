function logIn(email){
    
 $(document).ready(function () {
  
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
          $.ajax({
            url: '../../php/Login/sessionStart.php',
            type: 'POST',
            data: {
              email: email,
              os: os,
              res: res
            },
            success: function (response) {
                window.location.href = "../../../Mainpage/";
            },
            error: function (error) {
              alert('Error: ' + error.message);
            }
          });
        })
      }

  
 
  
