<?php
try {
    session_start();
    $userId = $_SESSION['userId'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];
    $download = $_POST['download'];
    $paymentMethod = $_POST['paymentMethod'];
    $ccName = $_POST['ccName'];
    $ccNumber = $_POST['ccNumber'];
    $ccExpiration = $_POST['ccExpiration'];
    $ccCvv = $_POST['ccCvv'];
    $totalSum = $_POST['totalSum'];

    $sql = "INSERT INTO Bestellungen (vorname, nachname, email, adresse, adresse2, land, plz, downloadtyp, zahlungsmethode, kartenname, kartennummer, kartenablauf, cvv)
        VALUES ('$firstName', '$lastName', '$email', '$address', '$address2', '$country', '$zip', '$download', '$paymentMethod', '$ccName', '$ccNumber', '$ccExpiration', '$ccCvv')";

    require("../../../../DBConnection/mysql.php");

    $stmt = $mysql->prepare($sql);
    $stmt->execute();

    $userId = $_SESSION['userId'];

    $stmt = $mysql->prepare("SELECT item_id, quantity FROM cart WHERE user_id = :userId");
    $stmt->bindParam(":userId", $userId);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $itemIds = array();
        $quantities = array();
        foreach ($rows as $row) {
            $itemIds[] = $row['item_id'];
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



    require("../../../../Mailer/php/sendCheckoutEmail.php");

    $name = $firstName . ' ' . $lastName;
    sendCheckoutEmail($email, $name, $orderId, $address, $country, $zip, $download, $paymentMethod, $totalSum, $itemNames, $quantities, $prices);

    $response = array(
        "success" => true,
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
