<?php
session_start();
// require("../../../DBConnection/mysql.php");
require("../../../DBConnection/mysql.php");

$itemId=$_POST['itemId'];


$stmt = $mysql->prepare("SELECT description FROM items WHERE id = :itemId");
$stmt->bindParam(":itemId", $itemId);
$stmt->execute();

$result=$stmt->fetch(PDO::FETCH_ASSOC);
$description=$result['description'];
$response = array(
    "description" => $description
);
echo json_encode($response);
exit();
