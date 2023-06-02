<?php

try{
    $email = $_POST['email'];
$password = $_POST['password'];

require '../../../vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';
require("../../../DBConnection/mysql.php");

header('Content-Type: application/json');

$ga = new PHPGangsta_GoogleAuthenticator();
$secretKey = $ga->createSecret();

$stmt = $mysql->prepare("UPDATE users SET PASSWORD = :password, erster_login = 0, secret_key = :secretKey WHERE EMAIL = :email");
$stmt->bindParam(":password", $password);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":secretKey", $secretKey); 
$stmt->execute();
$count = $stmt->rowCount();

$response = array();
if ($count > 0) {
    $response = array('success' => 'success');
} else {
    $response = array('success' => 'fail', 'message' => 'Failed to update password.');
}
echo json_encode($response);
exit();

}catch(Exception $e)
{
$response = array('exception' => $e->getMessage());
echo json_encode($response);
exit();
}