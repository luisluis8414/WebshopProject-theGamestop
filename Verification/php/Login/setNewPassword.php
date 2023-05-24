<?php

$email = $_POST['email'];
$password = $_POST['password'];

require '../../../vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';
require("../../../DBConnection/mysql.php");

        $ga = new PHPGangsta_GoogleAuthenticator();
        $secretKey=$ga->createSecret();

        $stmt = $mysql->prepare("UPDATE users SET PASSWORD = :password, erster_login = 1, secretKey = :secretKey WHERE EMAIL = :email");
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":secretKey", $secretKey);
        $stmt->execute();
        $count = $stmt->rowCount();

        
        if ($count > 0) {
            $response = array('success' => true);
            echo json_encode($response);

        } else {
            $response = array('success' => false, 'message' => 'Failed to update password.');
            echo json_encode($response);
        }