$(function() {
  $('#submit').on('click', function(event) {
    $("#emailError").html(''); 
  
    event.preventDefault();
    var email = $('#email').val();
    var success = '';
    var EmailTaken='';
    
   
    $.ajax({
      url: 'testPw.php',
      type: 'POST',
      data: {
        email: email,
        success:success,
        EmailTaken:EmailTaken
      },
      success: function(response) {
        console.log(response);
        var data = JSON.parse(response);  
        console.log(data.success)
        if(data.email!=='')$("#emailError").html(data.email);
        if(data.EmailTaken!=='')$("#emailError").html(data.EmailTaken);
        if(data.success!=='')$("#emailHelp").html(data.success);
       
  
      },
      error: function(xhr, status, error) {
        cl('Error: ' + error.message);
      }
    });
  });
});
