
$(function() {
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
        EmailTaken:EmailTaken
      },
      success: function(response) {
        console.log(response);
        var data = JSON.parse(response);  
        if(data.empty!=='')$("#emailError").html(data.empty);
        if(data.vorname!=='')$("#vornameError").html(data.vorname);
        if(data.nachname!=='')$("#nachnameError").html(data.nachname);
        if(data.email!=='')$("#emailError").html(data.email);
        if(data.success!=='')window.location.href = "Login.php";
        if(data.EmailTaken!=='')$("#emailError").html(data.EmailTaken);
      },
      error: function(error) {
        alert('Error: ' + error.message);
      } 
    });
  });
});
