<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['logged_in'])) {
    $email = $_SESSION['email'];

    require("../../DBConnection/mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :email"); //EMail ueberpruefen
    $stmt->bindParam(":email",  $email);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count == 1) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $firstName = $row['FIRST_NAME'];
        $lastOnline = $row['last_login'];

        $currentTime = time();
        $lastOnlineTime = strtotime($lastOnline);
        $timeDiff = $currentTime - $lastOnlineTime;

        // Format the last online time
        if ($timeDiff < 86400) {
            $formattedTime = "Today";
        } elseif ($timeDiff < 172800) {
            $formattedTime = "Yesterday";
        } else {
            $daysAgo = floor($timeDiff / 86400);
            $formattedTime = $daysAgo . " days ago";
        }

        $response = array(
            "vorname" => $firstName,
            "lastOnline" => $formattedTime,
            "error" => ""
        );

        echo json_encode($response);
        exit();
    } else {
        // User not found in the database
        $response = array(
            "vorname" => "User",
            "lastOnline" => "today",
            "error" => "1"
        );
        echo json_encode($response);
        exit();
    }
} else {
    //user not logged in
    $response = array(
        "vorname" => "User",
        "lastOnline" => "today",
        "error"=> "2"
    );
    echo json_encode($response);
    exit();
}
