<?php
session_start();

try{
    
$itemId = $_POST['itemId'];
$userId = $_SESSION['userId'];

require("../../../DBConnection/mysql.php");

$stmt = $mysql->prepare("SELECT * FROM cart WHERE item_id = :itemId AND user_id = :userId");
$stmt->bindParam(":itemId", $itemId);

$stmt->bindParam(":userId", $userId);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $stmt = $mysql->prepare("UPDATE cart SET quantity = quantity + 1 WHERE item_id = :itemId AND user_id = :userId");
    $stmt->bindParam(":itemId", $itemId);
    $stmt->bindParam(":userId", $userId);
    $stmt->execute();
}  else{
    $stmt = $mysql->prepare("INSERT INTO cart (user_id, item_id, quantity) VALUES (:userId, :itemId, 1)");
    $stmt->bindParam(":itemId", $itemId);

    $stmt->bindParam(":userId", $userId);
    $stmt->execute();
}

$response = array(
    "response" => "success"
);
echo json_encode($response);
exit();

}catch(Exception $e){
    $response = array(
        "response" => $e->getMessage(),
        "stackTrace" => $e->getTraceAsString()
    );
    echo json_encode($response);
    exit();
}   