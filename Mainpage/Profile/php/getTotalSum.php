<?php
session_start();

try {
    $userId = $_SESSION['userId'];
    $totalSum = 0;
    $items = array();

    require("../../../DBConnection/mysql.php");

    $stmtOuter = $mysql->prepare("SELECT quantity, item_id FROM cart WHERE user_id = :userId");
    $stmtOuter->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmtOuter->execute();

    while ($row = $stmtOuter->fetch(PDO::FETCH_ASSOC)) {
        $quantity = $row['quantity'];
        $itemId = $row['item_id'];

        $stmtInner = $mysql->prepare("SELECT price FROM items WHERE id = :itemId");
        $stmtInner->bindParam(":itemId", $itemId, PDO::PARAM_INT);
        $stmtInner->execute();

        $result = $stmtInner->fetch(PDO::FETCH_ASSOC);
        $price = $result['price'];

        $totalSum += $quantity * $price;

        // Add quantity and item_id to items array
        $items[] = array(
            "quantity" => $quantity,
            "item_id" => $itemId
        );
    }

    $response = array(
        "totalSum" => $totalSum,
        "items" => $items
    );
    
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response = array(
        "fail" => $e->getMessage(),
    );
    echo json_encode($response);
    exit();
}
?>
