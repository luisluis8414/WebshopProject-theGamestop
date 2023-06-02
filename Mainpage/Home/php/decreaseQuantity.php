<?php
session_start();

try{
    
$itemId=$_POST['itemId'];
$userId=$_SESSION['userId'];

require("../../../DBConnection/mysql.php");

$stmt = $mysql->prepare("SELECT quantity FROM cart WHERE item_id =:itemId AND user_id = :userId");
$stmt->bindParam(":itemId", $itemId, PDO::PARAM_INT);
$stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
$stmt->execute();

$result=$stmt->fetch(PDO::FETCH_ASSOC);
$quantity = $result['quantity'];

if($quantity -1 >= 0){
    $quantity-=1;

    $stmt = $mysql->prepare("UPDATE cart SET quantity = :quantity WHERE item_id = :itemId AND user_id = :userId");
    $stmt->bindParam(":itemId", $itemId, PDO::PARAM_INT);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
    $stmt->execute();
}else $quantity = -1;

if($quantity==0){
    $stmt = $mysql->prepare("DELETE FROM cart WHERE item_id = :itemId AND user_id = :userId");
    $stmt->bindParam(":itemId", $itemId, PDO::PARAM_INT);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmt->execute();
}

$response[] = array(
    "quantity" => $quantity,
); 
header("Content-Type: application/json");
echo json_encode($response); 
exit();

}catch(Exception $e){
    $response[] = array(
        "fail" => $e->getMessage(),
    ); 
    echo json_encode($response); 
    exit();
}   