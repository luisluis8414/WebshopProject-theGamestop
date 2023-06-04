<?php
session_start();

try{
    
$itemId=$_POST['itemId'];
$userId=$_SESSION['userId'];

require("../../../../DBConnection/mysql.php");

$stmt = $mysql->prepare("DELETE FROM cart WHERE item_id = :itemId AND user_id = :userId");
$stmt->bindParam(":itemId", $itemId);
$stmt->bindParam(":userId", $userId);
$stmt->execute();

$response[] = array(
    "success" => 'success',
); 
echo json_encode($response); 
exit();

}catch(Exception $e){
    $response[] = array(
        "fail" => $e->getMessage(),
    ); 
    echo json_encode($response); 
    exit();
}   