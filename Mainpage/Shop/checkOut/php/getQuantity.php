<?php
session_start();
// require("../../../DBConnection/mysql.php");
require("../../../../DBConnection/mysql.php");

$itemId=$_POST['itemId'];


$stmt = $mysql->prepare("SELECT quantity FROM items WHERE id = :itemId");
$stmt->bindParam(":itemId", $itemId);
$stmt->execute();

$result=$stmt->fetch(PDO::FETCH_ASSOC);
$quantity=$result['quantity'];
$response = array(
    "quantity" => $quantity
);
echo json_encode($response);
exit();
