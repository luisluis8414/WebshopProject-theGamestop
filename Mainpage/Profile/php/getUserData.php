<?php
session_start();

$userId=$_SESSION['userId'];

require('../../../DBConnection/mysql.php');

$stmt = $mysql->prepare("SELECT FIRST_NAME, SURNAME, EMAIL, PHONE, ADRESS FROM users WHERE id = :userId");
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$firstName = isset($row['FIRST_NAME']) ? $row['FIRST_NAME'] : "-";
$surname = isset($row['SURNAME']) ? $row['SURNAME'] : "-";
$email = isset($row['EMAIL']) ? $row['EMAIL'] : "-";
$phone = isset($row['PHONE']) ? $row['PHONE'] : "-";
$address = isset($row['ADRESS']) ? $row['ADRESS'] : "-";
  
  $response = array(
    "firstName" => $firstName,
    "surname" => $surname,
    "email" => $email,
    "phone" => $phone,
    "address" => $address
); 
echo json_encode($response);
exit();