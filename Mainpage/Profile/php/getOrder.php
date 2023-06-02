<?php
session_start();

$email =  $_SESSION['email'];

require('../../../DBConnection/mysql.php');

$stmt = $mysql->prepare("SELECT id, totalSum FROM bestellungen WHERE email = :email");
$stmt->bindParam(":email", $email);
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
