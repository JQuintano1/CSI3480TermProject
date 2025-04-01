<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//phpinfo();

function generateMixedOTP($n) {
	// Generator is a string of a mix of numeric and alphabetic characters.
	$generator = "ab1cde3fgh5ij7kl9mn0op2qrs4tuv6wx8yz";

	//We will iterate through a otp length of n, 

	$result = "";

	//loop n times, each time we append a new character formed by a substring of $generator of length 1, with a random positive offset.
	for ($i = 1; $i <= $n; $i++) {
		$result .= substr($generator, (rand(1,36)), 1);
	}
	// At the end of that we should have an n length otp formed randomly.
	return $result;
}

// Testing
$n = 8;
$otp = generateMixedOTP($n);
echo "Testing Newest OTP: \t$otp\n";

//mail
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sacoren65@gmail.com';                     //SMTP username
    $mail->Password   = 'rszi zrxk hgbr iruh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sacoren65@gmail.com', 'Sam\'s personal email');
    $mail->addAddress('sacoren65@gmail.net', 'user');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Do Not Reply';
    $mail->Body    = "Your One Time Password: $otp";
    $mail->AltBody = "Your One Time Password: $otp";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>