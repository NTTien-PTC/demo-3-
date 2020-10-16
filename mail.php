<?php 
	include ("PHPMailer/src/Exception.php");
	include ("PHPMailer/src/OAuth.php");
	include ("PHPMailer/src/POP3.php");
	include ("PHPMailer/src/PHPMailer.php");
	include ("PHPMailer/src/SMTP.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'huyo.hung99@gmail.com';                     // SMTP username
    $mail->Password   = 'anhhung123';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->CharSet='UTF-8';
    $mail->setFrom('huyo.hung99@gmail.com', 'Huy Hùng');
    $mail->addAddress('vannt2368@gmail.com', 'Thu Vân');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hi Mrs. Van';
    $mail->Body    = 'Hellooooooooooooooooooooooooooooooooooooooooooo</b>';
    $mail->AltBody = 'Hiiiiiiiiiiiiiiiiiiiiiiiii';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 ?>