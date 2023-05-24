<?php

require '../../../../vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();

$secret = $ga->createSecret(); // Generate a new secret key

$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
$response = array('secret' => $secret, 'qrCodeImageUrl' => $qrCodeUrl);

header('Content-Type: application/json');
echo json_encode($response);
