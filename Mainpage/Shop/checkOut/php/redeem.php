<?php
session_start();

try {
    $promoCode = $_POST['promoCode'];

    require("../../../../DBConnection/mysql.php");

    $stmt = $mysql->prepare("SELECT * FROM redeemcodes WHERE codes = :promoCode");
    $stmt->bindParam(":promoCode", $promoCode);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $amount = $row['amount'];

        $response = array(
            "success" => true,
            "amount" => $amount
        );
    } else {
        $response = array(
            "success" => false
        );
    }

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
