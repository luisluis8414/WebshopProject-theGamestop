$(document).ready(function () {

    $("#email").on("input", function () {
        var email = $(this).val();
        console.log("email:" + email)
        var EmailTaken = '';
        $.ajax({
            url: 'testUsername.php',
            type: 'POST',
            data: {
                email: email,
                EmailTaken: EmailTaken
            },
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);

                if (data.EmailTaken !== '') $("#emailError").html(data.EmailTaken);
                if (data.EmailTaken == '') $("#emailError").html('');
            },
            error: function (error) {
                alert('Error: ' + error.message);
            }
        });
    });
});
