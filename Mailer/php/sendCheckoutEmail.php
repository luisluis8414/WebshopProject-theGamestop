<?php   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require_once __DIR__.('/../../vendor/autoload.php');
// sendRegistrationEmail('luis.wehrberger2@gmail.com', 'luis',"23423423423423");

function sendCheckoutEmail($recipientMail, $recipientName, $orderId, $address, $country, $zip, $download, $paymentMethod, $totalSum,  $itemName, $quantity, $price){

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../..');
$dotenv->load();

$senderMail= $_ENV['EMAIL_SENDER'];
$smtpPW=$_ENV['SMTP_PW'];
$smtpHost=$_ENV['SMTP_HOST'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
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
    $itemRows = '';
    for ($i = 0; $i < count($itemName); $i++) {
        $itemRows .= '
        <tr>
            <td>' . $itemName[$i] . '</td>
            <td>' . $quantity[$i] . '</td>
            <td>$' . $price[$i] . '</td>
        </tr>';
    }

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your Order';
    $mail->Body = '<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border: 1px solid #e1e1e1;
                border-radius: 4px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333333;
                margin-top: 0;
            }
            table {
                width: 100%;
                margin-bottom: 20px;
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
            .header {
                margin-bottom: 20px;
                background-color: #333333;
                padding: 20px;
                color: #ffffff;
                text-align: center;
                border-top-left-radius: 4px;
                border-top-right-radius: 4px;
            }
            .header h2 {
                margin: 0;
            }
            .footer {
                margin-top: 20px;
                background-color: #f4f4f4;
                padding: 20px;
                text-align: center;
                border-bottom-left-radius: 4px;
                border-bottom-right-radius: 4px;
            }
            .footer p {
                margin: 0;
            }
            .order-details {
                margin-bottom: 40px;
            }
            .total-amount {
                margin-top: 40px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>Order Confirmation</h2>
        </div>
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
                    <td><a href="" download>'.$download.'</a></td>
                </tr>
                <tr>
                    <th>Payment Method:</th>
                    <td>' . $paymentMethod . '</td>
                </tr>
            </table>
    
            <div class="order-details">
                <h2>Order Details</h2>
                <table>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    ' . $itemRows . '
                </table>
            </div>
    
            <h2 class="total-amount">Total: $' . $totalSum . '</h2>
        </div>
        <div class="footer">
            <p>Thank you for shopping with us!</p>
        </div>
    </body>
    </html>
    ';
    $mail->AltBody = '';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
