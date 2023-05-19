$(document).ready(function () {
    let vorname ="User";
    let lastOnline="today";
    $.ajax({
        url: 'php/getUserData.php',
        type: 'GET',
        data: {
            vorname: vorname,
            lastOnline: lastOnline
        },
        success: function (response) {
            console.log(response);
            var data = JSON.parse(response);

            $("#vorname").html(data.vorname);
            $("#lastOnline").html(data.lastOnline);
        },
        error: function (error) {
            alert('Error: ' + error.message);
        }
    });
});
