<?php
session_start();

require('../../../DBConnection/mysql.php');

$id=$_POST['id'];

$stmt = $mysql->prepare("SELECT adresse, totalSum FROM bestellungen WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();

$response = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $id = isset($row['id']) ? $row['id'] : "-";
  $totalSum = isset($row['totalSum']) ? $row['totalSum'] : "-";
  
  $responseData = array(
    "id" => $id,
    "totalSum" => $totalSum
  ); 

  $response[] = $responseData;
}

echo json_encode($response);
exit();
?>