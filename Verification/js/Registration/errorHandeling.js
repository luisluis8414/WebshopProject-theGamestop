
$(function() {
  // Bildschirmauflösung ermitteln
  event.preventDefault();

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

  $('#submit').on('click', function(event) {

    $("#emailError").html(''); 
    $("#vornameError").html(''); 
    $("#nachnameError").html(''); 

    var vorname = $('#vorname').val();
    var email = $('#email').val();
    var nachname= $('#nachname').val();
    var empty='';
    var success='';
   
    $.ajax({
      url: 'testFields.php',
      type: 'POST',
      data: {
        vorname: vorname,
        email: email,
        nachname: nachname,
        empty:empty,
        success:success,
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
        if(data.success!==''){
          // $.ajax({
          //   url: 'https://api.zerobounce.net/v2/validate?api_key=b8d9387b7c474c9390e81136e563eb53&email='+email+'&ip_address=', //if you see this-- there are no credits on the apiKey so dont even try ;)
          //   type: 'GET',
          //   success: function(response) {
          //     console.log(response)
          //     if(response.status=="invalid"){
          //       if(response.did_you_mean!==null){
          //       $("#emailError").html("This Email is invalid. Please check for typos.<br> Did you mean: " + response.did_you_mean);
          //       }else{
          //         $("#emailError").html("This Email is invalid. Please check for typos.");
          //       }
          //     }else{
                  // -->ajax
          //     }
          //   }
          // })
          $.ajax({
            url: 'createUser.php',
            type: 'POST',
            data: {
              vorname: vorname,
              email: email,
              nachname: nachname,
              os: os,
              res: res,
              success:success
            },
            success: function(response) {
              var data = JSON.parse(response)

              if(data.success!=='')$("#sucess").html(data.success)
              else $("#emailError").html("There is already an Email bound to this account");
            }
          })
        }
      },
      error: function(error) {
        alert('Error: ' + error.message);
      } 
    });
  });
});
