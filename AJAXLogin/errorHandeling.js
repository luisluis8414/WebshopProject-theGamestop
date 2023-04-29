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
        console.log(data.success)
        if(data.empty!=='')$("#emailError").html(data.empty);
        if(data.vorname!=='')$("#vornameError").html(data.vorname);
        if(data.nachname!=='')$("#nachnameError").html(data.nachname);
        if(data.email!=='')$("#emailError").html(data.email);
        if(data.EmailTaken!=='')$("#emailError").html(data.EmailTaken);
        if(data.success!=='')window.location.href = "Login.php";
       
  
      },
      error: function(xhr, status, error) {
        alert('Error: ' + error.message);
      }
    });
  });
});
