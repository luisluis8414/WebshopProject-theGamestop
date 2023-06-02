<?php
session_start();

$userId = $_SESSION['userId'];

require('../../../DBConnection/mysql.php');

$stmt = $mysql->prepare("SELECT FIRST_NAME, SURNAME, EMAIL, PHONE, CITY, STREET FROM users WHERE id = :userId");
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$firstName = isset($row['FIRST_NAME']) ? $row['FIRST_NAME'] : "-";
$surname = isset($row['SURNAME']) ? $row['SURNAME'] : "-";
$email = isset($row['EMAIL']) ? $row['EMAIL'] : "-";
$phone = isset($row['PHONE']) ? $row['PHONE'] : "-";
$city = isset($row['CITY']) ? $row['CITY'] : "-";
$street = isset($row['STREET']) ? $row['STREET'] : "-";

$response = array(
  "firstName" => $firstName,
  "surname" => $surname,
  "email" => $email,
  "phone" => $phone,
  "city" => $city,
  "street" => $street
); 
echo json_encode($response);
exit();
?>
