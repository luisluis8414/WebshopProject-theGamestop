<?php

$email = $_POST['email'];
require("../../../DBConnection/mysql.php");
$stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :email"); //EMail ueberpruefen
$stmt->bindParam(":email", $_POST["email"]);
$stmt->execute();
$count = $stmt->rowCount();
if ($count != 0) {
    $response = array(
        "email" => "",
        "EmailTaken" => "Email already connected to an existing Account"
    );
    echo json_encode($response);
    exit();
}else {
    $response = array(
        "email" => "",
        "EmailTaken" => ""
    );
    echo json_encode($response);
    exit();
}
