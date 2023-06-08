<?php
session_start();

require('../../../DBConnection/mysql.php');

$id = $_POST['id'];

$stmt = $mysql->prepare("SELECT * FROM bestellungsItems WHERE orderId = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();

$response = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $orderId = $row['orderId'];
  $itemId = $row['itemId'];
  $quantity = $row['quantity'];
  
  $responseData = array(
    "orderId" => $orderId,
    "itemId" => $itemId,
    "quantity" => $quantity,
  ); 

  $response[] = $responseData;
}

echo json_encode($response);
exit();
?>
