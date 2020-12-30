<?php
require('cors.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$gEmail = 'sharjeelFaisalBaig@gmail.com';
$gPass = 'sharjeelFaisalBaig10365';
// Load Composer's autoloader
require 'vendor/autoload.php';
require 'credentials.php';
require 'functions.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$phpForm = json_decode(file_get_contents('php://input'), true);
if (isset($phpForm)) {
    $formData = array_convertio($phpForm);
    $response = [];
    if (isset($formData['accesstoken'])) {
        if ($formData['accesstoken'] == 'quoted!55nn2@##@$#25efdsacdsaazx!!@@') {
            if ($formData['accessType'] == 'qouted') {
                try {
                    $email = $formData['qouteEmail'];
                    //Server settings
                    // $mail->SMTPDebug = 3;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = $gEmail;                     // SMTP username
                    $mail->Password   = $gPass;                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    //Recipients
                    $mail->setFrom($gEmail, '@modrenSolutions');
                    $mail->addAddress($email, '@modrenSolutions');     // Add a recipient
                    $mail->addReplyTo($gEmail);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = "@modrenSolutions Thankyou for requesting Quotation";
                    $mail->Body = "
                        <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                            <div class='content' style='text-align: center;'>
                                <div class='left-hole'></div>
                                <div class='right-hole'></div>
                                <div class='main-content'>
                                <h1>Thankyou for requesting Quotation</h1>
                                <p>We will contact you within few hours!</p>
                                <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@modrenSolutions</h6>
                            </div>
                            <div class='content' style='text-align: left; margin-top:30px;'>
                                <a href='http://modrenSolutions.com/' style='background: white;color: #000000;font-size: 19px;padding: 9px;font-family: system-ui;border: 0 !important;border-radius: 9px;font-weight: 600;'>Visit Site</a>
                            </div>
                        </div>
                    ";
                    $mail->AltBody = '@modrenSolutions Thankyou for requesting Quotation -We will contact you within few hourse';
                    if ($mail->send()) {
                        echo json_encode(['email' => 'sent']);
                    }
                } catch (Exception $e) {
                }
            }
            else if ($formData['accessType'] == 'detailed') {
                try {
                    $email = $formData['email'];
                    //Server settings
                    // $mail->SMTPDebug = 3;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = $gEmail;                     // SMTP username
                    $mail->Password   = $gPass;                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    //Recipients
                    $mail->setFrom($gEmail, '@modrenSolutions');
                    $mail->addAddress($email, '@modrenSolutions');     // Add a recipient
                    $mail->addReplyTo($gEmail);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = "@modrenSolutions Thankyou for Contacting Us";
                    $mail->Body = "
                        <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                            <div class='content' style='text-align: center;'>
                                <div class='left-hole'></div>
                                <div class='right-hole'></div>
                                <div class='main-content'>
                                <h1>Thankyou for Contacting Us</h1>
                                <p>We have recieved your details, We will contact you within few hours!</p>
                                <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@modrenSolutions</h6>
                            </div>
                            <div class='content' style='text-align: left; margin-top:30px;'>
                                <a href='http://modrenSolutions.com/' style='background: white;color: #000000;font-size: 19px;padding: 9px;font-family: system-ui;border: 0 !important;border-radius: 9px;font-weight: 600;'>Visit Site</a>
                            </div>
                        </div>
                    ";
                    $mail->AltBody = '@modrenSolutions Thankyou for Contacting Us -We will contact you within few hourse';
                    if ($mail->send()) {
                        echo json_encode(['email' => 'sent']);
                    }
                } catch (Exception $e) {
                }
            }
            else if ($formData['accessType'] == 'callBack') {
                try {
                    $email = $formData['callEmail'];
                    //Server settings
                    // $mail->SMTPDebug = 3;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = $gEmail;                     // SMTP username
                    $mail->Password   = $gPass;                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    //Recipients
                    $mail->setFrom($gEmail, '@modrenSolutions');
                    $mail->addAddress($email, '@modrenSolutions');     // Add a recipient
                    $mail->addReplyTo($gEmail);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = "@modrenSolutions Thankyou for Booking Callback";
                    $mail->Body = "
                        <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                            <div class='content' style='text-align: center;'>
                                <div class='left-hole'></div>
                                <div class='right-hole'></div>
                                <div class='main-content'>
                                <h1>Thankyou for Booking Callback</h1>
                                <p>We have sheduled a Call For you in next 2 hours!</p>
                                <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@modrenSolutions</h6>
                            </div>
                            <div class='content' style='text-align: left; margin-top:30px;'>
                                <a href='http://modrenSolutions.com/' style='background: white;color: #000000;font-size: 19px;padding: 9px;font-family: system-ui;border: 0 !important;border-radius: 9px;font-weight: 600;'>Visit Site</a>
                            </div>
                        </div>
                    ";
                    $mail->AltBody = '@modrenSolutions Thankyou for Contacting Us -We will contact you within few hourse';
                    if ($mail->send()) {
                        echo json_encode(['email' => 'sent']);
                    }
                } catch (Exception $e) {
                }
            }
        }
    }
}
