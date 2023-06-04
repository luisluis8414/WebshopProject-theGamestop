<?php
session_start();
require("../../../../DBConnection/mysql.php");

$userId = $_SESSION['userId'];

$stmt = $mysql->prepare("SELECT * FROM cart WHERE user_id = :userId");
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = array(); 
foreach ($rows as $row) {
  $itemId = $row['item_id'];
  $quantity = $row['quantity'];
  $response[] = array(
    "itemId" => $itemId,
    "quantity"=> $quantity

); 
}

echo json_encode($response); 
