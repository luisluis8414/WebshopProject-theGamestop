<?php

require '../../../../vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';
require("../../../../DBConnection/mysql.php");

$ga = new PHPGangsta_GoogleAuthenticator();

$email = $_POST['email'];

$stmt = $mysql->prepare("SELECT secretKey FROM users WHERE EMAIL = :email"); 
$stmt->bindParam(":email", $email);
$stmt->execute();

$secretKey = $stmt->fetchColumn();

$qrCodeUrl = $ga->getQRCodeGoogleUrl($email, $secretKey);
$response = array(
    'secret' => $secretKey, 
    'qrCodeImageUrl' => $qrCodeUrl
);
header('Content-Type: application/json');
echo json_encode($response);
