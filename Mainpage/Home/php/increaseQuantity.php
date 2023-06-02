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

$resultQuantityCart=$stmt->fetch(PDO::FETCH_ASSOC);
$quantityInCart = $resultQuantityCart['quantity'];

$stmt = $mysql->prepare("SELECT quantity FROM items WHERE id =:itemId");
$stmt->bindParam(":itemId", $itemId, PDO::PARAM_INT);
$stmt->execute();

$resultQuantityStock=$stmt->fetch(PDO::FETCH_ASSOC);
$quantityInStock= $resultQuantityStock['quantity'];



if($quantityInCart + 1 <= $quantityInStock){
    $quantityInCart+=1;

    $stmt = $mysql->prepare("UPDATE cart SET quantity = :quantity WHERE item_id = :itemId AND user_id = :userId");
    $stmt->bindParam(":itemId", $itemId, PDO::PARAM_INT);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmt->bindParam(":quantity", $quantityInCart, PDO::PARAM_INT);
    $stmt->execute();
}else $quantityInCart = -1;

$response[] = array(
    "quantity" => $quantityInCart,
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