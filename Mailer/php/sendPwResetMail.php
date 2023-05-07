<?php   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'C:\xampp\htdocs\WebDev\WebShop\Mailer\vendor\autoload.php';
// sendRegistrationEmail('luis.wehrberger2@gmail.com', 'luis',"23423423423423");

function sendPwReset($recipientMail, $recipientName, $pw,$vorname){

$dotenv = Dotenv\Dotenv::createImmutable('C:\xampp\htdocs\WebDev\WebShop');
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
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration';
    $mail->Body    = '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>The Game Stop - Password Recovery</title>
        <style>
            body {
                background-color: #f7f7f7;
                font-family: Arial, sans-serif;
                text-align: center;
            }
    
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
    
            h1 {
                font-size: 28px;
                margin-top: 0;
            }
    
            p {
                font-size: 16px;
                line-height: 1.5;
                margin-bottom: 20px;
            }
    
            button {
                background-color: #0070c9;
                color: #ffffff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
    
            button:hover {
                background-color: #004c8e;
            }
    
            .footer {
                font-size: 14px;
                color: #999999;
                margin-top: 20px;
            }
            header {
                background: linear-gradient(to right, #FD746C, #FFB88C);
                color: white;
                padding: 20px;
                text-align: center;
              }
              h1 {
                margin: 0;
              }
        </style>
    </head>
    <body>
        <div class="container">
        <header>
        <h1>The Game Stop</h1>
        </header>
            <p>Password Recovery</p>
            <p>Dear '.$vorname.',</p>
            <p>We have received a request to reset the password for your account.<br> Your new one-time Password is: <br><br><b>'.$pw.'</b></p>
            <a href="http://192.168.178.22:8080/WebDev/WebShop/Verification/php/Login/login.php">
            <button>Reset Password</button>
            </a>
            <p>If you did not request a password reset, please ignore this email and your account will remain secure.</p>
            <div class="footer">
                <p>This email was sent to '.$recipientMail.'. If you have any questions, please contact our customer support.</p>
                <p>The Game Stop, Alteburgstraße 150, Reutlingen, GERMANY</p>
            </div>
        </div>
    </body>
    </html>
    
    ';
 $mail->AltBody = 'Your Registration was succsessful! <br> 
                    This is your one time password: <br>' . $pw . '<br>
                    Please finish your Registration';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
