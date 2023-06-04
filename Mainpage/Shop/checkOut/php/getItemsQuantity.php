<?php
session_start();
// require("../../../DBConnection/mysql.php");
require("../../../../DBConnection/mysql.php");

$userId=$_SESSION['userId'];


$stmt = $mysql->prepare("SELECT quantity FROM cart WHERE user_id = :userId");
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$quantity=0; 
foreach ($rows as $row) {
  $quantity += $row['quantity'];
}

$response = array(
    "quantity" => $quantity
);
echo json_encode($response);
exit();
