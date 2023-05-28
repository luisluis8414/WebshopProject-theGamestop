<?php
session_start();

try{
    
$itemId=$_POST['itemId'];

require("../../../DBConnection/mysql.php");

$stmt = $mysql->prepare("DELETE FROM cart WHERE item_id = :itemId");
$stmt->bindParam(":itemId", $itemId);
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