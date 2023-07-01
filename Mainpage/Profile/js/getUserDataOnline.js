$(document).ready(function() {
    function fetchUserData() {
        $.ajax({
            url: "php/getUserDataOnline.php",
            type: "GET",
            success: function(response) {
                var data = JSON.parse(response);
                console.log(data)
                var userContainer = $(".user-list");
                userContainer.empty();

                var onlineUserCount = 0; 

                for (let i = 0; i < data.length; i++) {
                    var user = data[i];
                    console.log("user"+ data[i].isOnline)
                    var userDiv = $("<div>").addClass("user");

                    var userDetailsDiv = $("<div>").addClass("user-details");
                    var userNameSpan = $("<span>").addClass("user-name").text(user.firstName + " " + user.surname);
                    var userEmailSpan = $("<span>").addClass("user-email").text(user.email);

                    userDetailsDiv.append(userNameSpan, userEmailSpan);
                    userDiv.append(userDetailsDiv);

                    var statusDotDiv = $("<div>").addClass("status-dot");
                    if (user.isOnline == 1) {
                        console.log('one')
                        statusDotDiv.addClass("online");
                        onlineUserCount++; 
                    } else {
                        statusDotDiv.addClass("offline");
                    }
                    userDiv.append(statusDotDiv);

                    userContainer.append(userDiv);
                }
                console.log("count:"+onlineUserCount)
                $('#UsersOnlineNumber').html(onlineUserCount); 
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    fetchUserData();

    setInterval(fetchUserData, 1000);
});
