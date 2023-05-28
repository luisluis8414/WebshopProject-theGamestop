$(document).ready(function () {
    let vorname ="User";
    let lastOnline="today";
    let error="";

    $.ajax({
        url: 'Mainpage/php/getUserData.php',
        type: 'GET',
        data: {
            vorname: vorname,
            lastOnline: lastOnline,
            error: error
        },
        success: function (response) {
            console.log(response);
            var data = JSON.parse(response);

            $("#vorname").html(data.vorname);
            $("#lastOnline").html(data.lastOnline);
            if(data.error=="1"){
                $("#error").html("Hello &#128516;");
            }
            if(data.error=="2"){
                $("#error").html("Hello &#128516; Please log in or sign up to get full acsess!");
            }
        },
        error: function (error) {
            alert('Error: ' + error.message);
        }
    });
});
