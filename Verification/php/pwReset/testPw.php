<?php
//manipulate data
//function outputs a comma-separated string
$email = $_POST['email'];

include '../../../Mailer/php/sendPwResetMail.php';

//connect to database
require("../../../DBConnection/mysql.php");

$stmt = $mysql->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(":email", $email);
$stmt->execute();
$count = $stmt->rowCount();
if ($count == 1) {
    // Generate a new password and update the user's password in the database

    $pw = generate_password();
    $hash_pw= hash('sha512',$pw);
    $vorname = $mysql->prepare("SELECT FIRST_NAME FROM users WHERE email = :email");
    $vorname->bindParam(":email", $email);
    $vorname->execute();
    $vorname_result = $vorname->fetch();

    $nachname = $mysql->prepare("SELECT SURNAME FROM users WHERE email = :email");
    $nachname->bindParam(":email", $email);
    $nachname->execute();
    $nachname_result = $nachname->fetch();

    $name = $vorname_result['FIRST_NAME'] . ' ' . $nachname_result['SURNAME'];


    $stmt = $mysql->prepare("UPDATE users SET password = :hash_pw WHERE email = :email");
    $stmt->bindParam(":hash_pw", $hash_pw);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $stmt = $mysql->prepare("UPDATE users SET erster_login = 2 WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    // Send the user an email with the new password
    sendPwReset($email, $name, $pw, $vorname_result['FIRST_NAME']);
    // Return a success response
    $response = array(
        "email" => "",
        "success" => "Success! We have sent you a recovery email",
        "EmailTaken" => ""
    );
    echo json_encode($response);
    
    exit();
} else {
    $response = array(
        "email" => "",
        "success" => "",
        "EmailTaken" => "This Email is not connected to any account"
    );
    echo json_encode($response);
    exit();
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
