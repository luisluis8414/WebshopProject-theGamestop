<?php   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require_once __DIR__.('/../../vendor/autoload.php');
// sendRegistrationEmail('luis.wehrberger2@gmail.com', 'luis',"23423423423423");

function sendCheckoutEmail($recipientMail, $recipientName, $orderId, $address, $country, $zip, $download, $paymentMethod, $totalSum){

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../..');
$dotenv->load();

$senderMail= $_ENV['EMAIL_SENDER'];
$smtpPW=$_ENV['SMTP_PW'];
$smtpHost=$_ENV['SMTP_HOST'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $smtpHost;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $senderMail;                     //SMTP username
    $mail->Password   = $smtpPW;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($senderMail, 'The Game Stop');

    $mail->addAddress($recipientMail, $recipientName);               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your Order';
    $mail->Body = '<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
        }
        h1 {
            color: #333333;
        }
        table {
            width: 100%;
        }
        table, th, td {
            border: 1px solid #e1e1e1;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Order</h1>
        <table>
            <tr>
                <th>Recipient Name:</th>
                <td>' . $recipientName . '</td>
            </tr>
            <tr>
                <th>Recipient Email:</th>
                <td>' . $recipientMail . '</td>
            </tr>
            <tr>
                <th>Address:</th>
                <td>' . $address . '</td>
            </tr>
            <tr>
                <th>Country:</th>
                <td>' . $country . '</td>
            </tr>
            <tr>
                <th>Zip Code:</th>
                <td>' . $zip . '</td>
            </tr>
            <tr>
                <th>Download:</th>
                <td>' . $download . '</td>
            </tr>
            <tr>
                <th>Payment Method:</th>
                <td>' . $paymentMethod . '</td>
            </tr>
        </table>
    </div>
</body>
</html>';
    $mail->AltBody = '';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
