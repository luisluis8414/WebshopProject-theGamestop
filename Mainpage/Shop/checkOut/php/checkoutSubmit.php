<?php
try{
    
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$address = $_POST['address'];
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

require("../../../../Mailer/php/sendCheckoutEmail.php");

$name=$firstName.' '.$lastName;
sendCheckoutEmail($email, $name, $orderId, $address, $country, $zip, $download, $paymentMethod, $totalSum);

$response = array(
    "success" => true,
);
echo json_encode($response);
exit();
}catch(Exception $e){
    $response = array(
        "error" => $e->getMessage(),
    );
    echo json_encode($response);
    exit();
}