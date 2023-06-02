$(document).ready(function() {
    // Function to fetch and populate user data
    function fetchUserData() {
        $.ajax({
            url: "php/getUserDataOnline.php",
            type: "GET",
            success: function(response) {
                var data = JSON.parse(response);

                var userContainer = $(".user-list");
                userContainer.empty();

                for (let i = 0; i < data.length; i++) {
                    var user = data[i];
                    var userDiv = $("<div>").addClass("user");

                    var userDetailsDiv = $("<div>").addClass("user-details");
                    var userNameSpan = $("<span>").addClass("user-name").text(user.firstName + " " + user.surname);
                    var userEmailSpan = $("<span>").addClass("user-email").text(user.email);

                    userDetailsDiv.append(userNameSpan, userEmailSpan);
                    userDiv.append(userDetailsDiv);

                    var statusDotDiv = $("<div>").addClass("status-dot");
                    if (user.isOnline === 1) {
                        statusDotDiv.addClass("online");
                    } else {
                        statusDotDiv.addClass("offline");
                    }
                    userDiv.append(statusDotDiv);

                    userContainer.append(userDiv);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    fetchUserData();

    setInterval(fetchUserData, 1000);
});
        