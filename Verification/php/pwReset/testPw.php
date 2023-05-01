<?php
//manipulate data
//function outputs a comma-separated string
$email = $_POST['email'];

// include '../../../Mailer/php/sendPwResetMail.php';

//connect to database

if (empty($email)) {
    $response = array(
        "empty" => "Please fill out every field!",
        "email" => "",
        "success" => "",
        "EmailTaken" => ""
    );
    echo json_encode($response);
    exit();
} else {
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $response = array(
            "empty" => "",
            "email" => "Please enter a valid email",
            "success" => "",
            "EmailTaken" => ""
        );
        echo json_encode($response);
        exit();
    } else {
        require("../mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            // Generate a new password and update the user's password in the database
            $pw = generate_password();
            $hash = password_hash($pw, PASSWORD_BCRYPT);
            $stmt = $mysql->prepare("UPDATE users SET password = :hash WHERE email = :email");
            $stmt->bindParam(":hash", $hash);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            // Send the user an email with the new password
            // sendPwReset($email, $name, $pw);
            // Return a success response
            $response = array(
                "empty" => "",
                "email" => "",
                "success" => "Success! We have sent you an email with a new password!",
                "emailTaken" => ""
            );
            echo json_encode($response);
            exit();
        } else {
            $response = array(
                "empty" => "",
                "email" => "",
                "success" => "",
                "EmailTaken" => "This Email is not connected to any account"
            );
            echo json_encode($response);
            exit();
        }
    }
}
function generate_password()
{
    $length = 10; // set desired password length here (including at least one lowercase letter, one uppercase letter, and one digit)
    $password = '';
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    while (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{9,}$/', $password)) {
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
    }

    return $password;
}
