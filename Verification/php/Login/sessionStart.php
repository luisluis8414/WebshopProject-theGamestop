<?php
session_start();
$email = $_POST['email'];
$os = $_POST['os'];
$res = $_POST['res'];
$lastLogin = date('Y-m-d');



require("../../../DBConnection/mysql.php");
$stmt = $mysql->prepare("SELECT id FROM users WHERE EMAIL = :email");
$stmt->bindParam(":email", $email);
$stmt->execute();

$UserId = $stmt->fetchColumn();


$_SESSION['logged_in'] = true;
$_SESSION['email'] =  $email;
$_SESSION['userId'] = $UserId;

$stmt = $mysql->prepare("UPDATE users SET last_login = :lastLogin, is_online = 1, operating_system = :os, screen_resolution= :res WHERE EMAIL = :email");
$stmt->bindParam(":lastLogin", $lastLogin);
$stmt->bindParam(":os", $os);
$stmt->bindParam(":res", $res);
$stmt->bindParam(":email", $email);

$stmt->execute();

$response = array(
        "email" => "success"
);
echo json_encode($response);
exit();
