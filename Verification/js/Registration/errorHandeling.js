
$(function() {
  // Bildschirmauflösung ermitteln
var screenWidth = screen.width;
var screenHeight = screen.height;
var res=screenWidth+"x"+screenHeight;
// Betriebssystem ermitteln
var userAgent = navigator.userAgent;
var os='';
console.log(userAgent)
if (/Windows/i.test(userAgent)) {
  os="Windows Betriebssystem";
  console.log("Windows Betriebssystem");
} else if (/Macintosh/i.test(userAgent)) {
  os="Macintosh Betriebssystem";
  console.log("Macintosh Betriebssystem");
} else if (/Linux/i.test(userAgent)) {
  os="Linux Betriebssystem";
  console.log("Linux Betriebssystem");
} else {
  os="Unbekanntes Betriebssystem";
  console.log("Unbekanntes Betriebssystem");
}

  $('#submit').on('click', function(event) {
    $("#emailError").html(''); 
    $("#vornameError").html(''); 
    $("#nachnameError").html(''); 
    event.preventDefault();
    var vorname = $('#vorname').val();
    var email = $('#email').val();
    var nachname= $('#nachname').val();
    var empty='';
    var success='';
    var EmailTaken='';
    
    
   
    $.ajax({
      url: 'signup.php',
      type: 'POST',
      data: {
        vorname: vorname,
        email: email,
        nachname: nachname,
        empty:empty,
        success:success,
        EmailTaken:EmailTaken,
        os: os,
        res: res
      },
      success: function(response) {
        console.log(response);
        var data = JSON.parse(response);  
        if(data.empty!=='')$("#emailError").html(data.empty);
        if(data.vorname!=='')$("#vornameError").html(data.vorname);
        if(data.nachname!=='')$("#nachnameError").html(data.nachname);
        if(data.email!=='')$("#emailError").html(data.email);
        if(data.success!=='')$("#success").html(data.success);
        if(data.EmailTaken!=='')$("#emailError").html(data.EmailTaken);
      },
      error: function(error) {
        alert('Error: ' + error.message);
      } 
    });
  });
});
