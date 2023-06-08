<?php
try {
    session_start();
    $orderId = $_POST['orderId'];

    $sql = "SELECT * FROM bestellungen WHERE id = :orderId";

    require("../../../DBConnection/mysql.php");

    $stmt = $mysql->prepare($sql);
    $stmt->bindParam(":orderId", $orderId);
    $stmt->execute();

    require("../../../Mailer/php/sendCheckoutEmail.php");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
    $email = $result['email'];
    $firstName = $result['vorname'];
    $lastName = $result['nachname'];
    $address = $result['adresse'];
    $country = $result['land'];
    $zip = $result['plz'];
    $download = $result['downloadtyp'];
    $paymentMethod = $result['zahlungsmethode'];
    $totalSum = $result['totalSum'];

    

    $fees = '-';
    $promo = '-';

    $stmt = $mysql->prepare("SELECT itemId, quantity FROM bestellungsitems WHERE orderId = :orderId");
    $stmt->bindParam(":orderId", $orderId);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $itemIds = array();
        $quantities = array();
        foreach ($rows as $row) {
            $itemIds[] = $row['itemId'];
            $quantities[] = $row['quantity'];
        }
    $response = array();
   

    
$itemNames = array();
$prices = array();
foreach ($itemIds as $itemId) {
    $stmt = $mysql->prepare("SELECT name, price FROM items WHERE id = :itemId");
    $stmt->bindParam(":itemId", $itemId);
    $stmt->execute();

    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    $itemNames[] = $item['name'];
    $prices[] = $item['price'];
}

    $name = $firstName . ' ' . $lastName;
    sendCheckoutEmail($email, $name, $orderId, $address, $country, $zip, $download, $paymentMethod, $totalSum, $itemNames, $quantities, $prices, $fees, $promo);

    $response = array(
        "success" => 'success'
    );
    echo json_encode($response);
    exit();
} catch (Exception $e) {
    $response = array(
        "error" => $e->getMessage(),
    );
    echo json_encode($response);
    exit();
}
