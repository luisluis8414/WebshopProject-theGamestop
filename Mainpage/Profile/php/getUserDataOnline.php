<?php
session_start();

$userId = $_SESSION['userId'];

require('../../../DBConnection/mysql.php');

$stmt = $mysql->prepare("SELECT FIRST_NAME, SURNAME, EMAIL, is_online FROM users WHERE id <> :userId");
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$response = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $firstName = isset($row['FIRST_NAME']) ? $row['FIRST_NAME'] : "-";
    $surname = isset($row['SURNAME']) ? $row['SURNAME'] : "-";
    $email = isset($row['EMAIL']) ? $row['EMAIL'] : "-";
    $isOnline = isset($row['is_online']) ? $row['is_online'] : "-";

    $userResponse = array(
        "firstName" => $firstName,
        "surname" => $surname,
        "email" => $email,
        "isOnline" => $isOnline
    );

    $response[] = $userResponse;
}

echo json_encode($response);
exit();
