<?php

$searchQuery = $_POST['searchQuery'];

require("../../../DBConnection/mysql.php");
$stmt = $mysql->prepare("SELECT name, price, imagePath FROM items WHERE quantity > 0 AND name LIKE :searchQuery");
$stmt->execute(['searchQuery' => "%$searchQuery%"]);

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($items);;
