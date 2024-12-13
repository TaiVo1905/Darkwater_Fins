<?php
// error_reporting(E_ALL ^ E_DEPRECATED);
require_once("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("../../vendor/phpmailer/phpmailer/SMTP.php");
require_once("../../vendor/phpmailer/phpmailer/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendEmailCode($email, $user_name){;
    function randomCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';
        for ($i = 0; $i < 6; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomCode;
    }
    $randomCode = randomCode();
    setcookie("code", $randomCode, time() + 60, "/");
    setcookie("email", $email, time() + 60, "/");
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Username   = 'congdoan0806@gmail.com';
        $mail->Password   = 'mjtr obtf igwy eqtn';
        //Recipients
        $mail->setFrom('congdoan0806@gmail.com', 'Darkwater Fins');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'AUTHENTICATION CODE FOR DARKWATER FINS WEBSITE ACCOUNT REGISTRATION';
        $mail->Body    =
                        "<p>Dear $user_name,</p>
                        <span>This is your code to comspanlete our website account registration:</span>
                        <span><strong>$randomCode</strong></span>
                        <p>This code has value in 1 minute. Please enter your code in registration page to cmplete.</p>
                        <p>Best regards,<br>Darkwater Fins</p>";
        $mail->AltBody =
                        "Dear $user_name,\n
                        This is your code to comspanlete our website account registration: $$randomCode\n
                        This code has value in 1 minute. Please enter your code in registration page to cmplete.\n
                        Best regards,\n
                        Darkwater Fins";
    
        $mail->send();
        return 'Message has been sent';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
};

if (isset($_GET['func'])) {
    $function = $_GET['func'];
    if ($function == "sendEmailCode" && isset($_GET['email']) && isset($_GET["user_name"])) {
        $email = $_GET['email'];
        $user_name = $_GET['user_name'];
        echo $function($email, $user_name);
    } else { 
        echo "Hàm không hợp lệ hoặc tham số không hợp lệ.";
    }
} else {
    echo "Không có hàm nào được chỉ định.";
}
?>