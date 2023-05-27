<?php

require '../../../../vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';
require("../../../../DBConnection/mysql.php");

$ga = new PHPGangsta_GoogleAuthenticator();

$email = $_POST['email'];
$code = $_POST['code'];


$stmt = $mysql->prepare("SELECT secret_key FROM users WHERE EMAIL = :email"); 
$stmt->bindParam(":email", $email);
$stmt->execute();

$secretKey = $stmt->fetchColumn();

$DBCode = $ga->getCode($secretKey);

if($DBCode==$code){
    $response = array(
        'email' => 'success'
    );
}else{
    $response = array(
        'email' => ''
    );
}
header('Content-Type: application/json');
echo json_encode($response);
