<?php
session_start();
// require("../../../DBConnection/mysql.php");
require("../../../DBConnection/mysql.php");

$userId=$_SESSION['userId'];
$itemId=$_POST['itemId'];


$stmt = $mysql->prepare("SELECT quantity FROM cart WHERE user_id = :userId AND item_id = :itemId");
$stmt->bindParam(":userId", $userId);
$stmt->bindParam(":itemId", $itemId);
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
