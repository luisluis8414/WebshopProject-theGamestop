<?php
session_start();
require("../../../DBConnection/mysql.php");

$itemId = $_POST['itemId'];

$stmt = $mysql->prepare("SELECT name, price, imagePath FROM items WHERE id = :itemId");
$stmt->bindParam(":itemId", $itemId);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$response = array();

if ($row) {
  $itemName = $row['name'];
  $price = $row['price'];
  $imagePath = $row['imagePath'];

  $response = array(
    "itemName" => $itemName,
    "price" => $price,
    "imagePath" => $imagePath
  );
}

echo json_encode($response);
exit();
