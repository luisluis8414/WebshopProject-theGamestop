<?php
session_start();
require("../../../../DBConnection/mysql.php");

$userId = $_SESSION['userId'];
$orderId = $_POST['orderId'];

$stmt = $mysql->prepare("SELECT * FROM cart WHERE user_id = :userId");
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$response = array(); // Initialize an empty array to store the cart items

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $itemId = $row['item_id'];
    $quantity = $row['quantity'];

    $stmt2 = $mysql->prepare("INSERT INTO bestellungsItems (orderId, itemId) VALUES (:orderId, :itemId)");
    $stmt2->bindParam(":orderId", $orderId);
    $stmt2->bindParam(":itemId", $itemId);
    $stmt2->execute();
}

$stmt3 = $mysql->prepare("DELETE FROM cart WHERE user_id = :userId");
$stmt3->bindParam(":userId", $userId);
$stmt3->execute();

$response = array(
    "success" => "success"
); 

echo json_encode($response);
