<?php
session_start();

$userId = $_SESSION['userId'];

require('../../../DBConnection/mysql.php');

$editedFirstName = $_POST['editedFirstName'];
$editedLastName = $_POST['editedLastName'];
$editedPhone = $_POST['editedPhone'];
$editedCity = $_POST['editedCity'];
$editedStreet = $_POST['editedStreet'];

$stmt = $mysql->prepare("UPDATE users SET FIRST_NAME = :firstName, SURNAME = :lastName, PHONE = :phone, CITY = :city, STREET = :street WHERE id = :userId");
$stmt->bindParam(":firstName", $editedFirstName);
$stmt->bindParam(":lastName", $editedLastName);
$stmt->bindParam(":phone", $editedPhone);
$stmt->bindParam(":city", $editedCity);
$stmt->bindParam(":street", $editedStreet);
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$response = array(
  'status' => 'success',
  'message' => 'User profile updated successfully.'
);

echo json_encode($response);
exit();
?>
