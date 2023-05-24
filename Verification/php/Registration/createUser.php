<?php

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];

include '../../../Mailer/php/sendRegistrationMail.php';

require("../../../DBConnection/mysql.php");
$stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :email"); //EMail ueberpruefen
$stmt->bindParam(":email", $_POST["email"]);
$stmt->execute();
$count = $stmt->rowCount();
if ($count == 0) {
    $pw = generate_password();
    $hash_pw = hash('sha512', $pw);
    $stmt = $mysql->prepare("INSERT INTO users (EMAIL, PASSWORD, FIRST_NAME, SURNAME) VALUES (:email, :hash_pw, :vorname, :nachname)");
    $stmt->bindParam(":email", $_POST["email"]);
    $stmt->bindParam(":hash_pw", $hash_pw);
    $stmt->bindParam(":vorname", $vorname);
    $stmt->bindParam(":nachname", $nachname);
    $stmt->execute();
    // Return a success response
    $name = $vorname . ' ' . $nachname;
    $response = array(
        "success" => "Registration successful. We've send you an Email with your one-time login credentials"

    );
    echo json_encode($response);
    sendRegistrationEmail($email, $name, $pw, $vorname);
    exit();
} else {
    $response = array(
        "success" => ""
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
