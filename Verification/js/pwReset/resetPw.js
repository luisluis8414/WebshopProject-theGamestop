$(function () {

    $('#submit').on('click', function (event) {
        event.preventDefault();

        var email = $('#email').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        var success= '';
        var EmailTaken = '';
        $('#emailError').html('');


        if (!emailRegex.test(email)) {
            $('#emailError').html('Please enter a valid Email');
        } else {
            $.ajax({
                url: 'testPw.php',
                type: 'POST',
                data: {
                    email: email,
                    success: success,
                    EmailTaken: EmailTaken
                },
                success: function (response) {
                    console.log(response)
                    
                    var data = JSON.parse(response);
                    
                    if (data.emailTaken != '') $('#error').html(data.emailTaken);
                    if (data.success !== '') $('#success').html(data.success);
                },
                error: function (error) {
                    alert('Error: ' + error.message);
                }
            });
        }
    });
});
