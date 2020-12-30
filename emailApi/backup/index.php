<?php

require('cors.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$gEmail = 'sharjeelFaisalBaig@gmail.com';
$gPass = 'sharjeelFaisalBaig10365';
if (isset($_GET['sendType'])) {
    $phpForm = json_decode(file_get_contents('php://input'), true);
    $sendType = $_GET['sendType'];
    if ($sendType == 'sys') {
        if (isset($phpForm['name']) && isset($phpForm['subject']) && isset($phpForm['number']) && isset($phpForm['email']) && isset($phpForm['CountryCode']) && isset($phpForm['endDate']) && isset($phpForm['numberOfPage'])) {
            if (!($gEmail == '' || $gPass == '' || $phpForm['name'] == '' || $phpForm['subject'] == '' || $phpForm['number'] == '' || $phpForm['CountryCode'] == '' || $phpForm['email'] == '' || $phpForm['endDate'] == '' || $phpForm['numberOfPage'] == '')) {
                $attachToken = 'false';
                $name = $phpForm['name'];
                $subject = $phpForm['subject'];
                $number = $phpForm['number'];
                $senderEmail = $phpForm['email'];
                $endDate = $phpForm['endDate'];
                $numberOfPage = $phpForm['numberOfPage'];
                $CountryCode = $phpForm['CountryCode'];
                // Load Composer's autoloader
                require 'vendor/autoload.php';
                require 'credentials.php';

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    // $mail->SMTPDebug = 3;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = $gEmail;                     // SMTP username
                    $mail->Password   = $gPass;                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    if (isset($phpForm['attachment'])) {
                        $mail->addAttachment('attachments/' . $phpForm['attachment']['nameOfFile']);
                        $attachToken = $phpForm['attachment']['nameOfFile'];
                    }
                    //Recipients
                    $mail->setFrom($gEmail, 'Mycoursework');
                    $mail->addAddress($gEmail, 'Mycoursework');     // Add a recipient
                    $mail->addReplyTo($senderEmail);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    if (isset($phpForm['limited'])) {
                        $mail->Subject = 'New Availing Request -Mycoursework';
                        $mail->Body = "
                    <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                        <div class='content' style='text-align: center;'>
                            <div class='left-hole'></div>
                            <div class='right-hole'></div>
                            <div class='main-content'>
                            <h1>Offer Availing Request</h1>
                            <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@My-Coursework</h6>
                        </div>
                        <div class='content' style='text-align: left !important;'>
                            <ul>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Name:</span> <strong>$name</strong></li>
                                <li class='titleBefore  '><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500; '>Sender Email: </span> <strong style='color: #eb7f25;'>$senderEmail</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Contact Number: </span> <strong>$CountryCode-$number</strong></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    ";
                    } else {
                        $mail->Subject = 'New Order Arrived -Mycoursework';
                        $mail->Body = "
                    <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                        <div class='content' style='text-align: center;'>
                            <div class='left-hole'></div>
                            <div class='right-hole'></div>
                            <div class='main-content'>
                            <h1>Congratulations! new order recieved</h1>
                            <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@My-Coursework</h6>
                        </div>
                        <div class='content' style='text-align: left !important;'>
                            <ul>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Name:</span> <strong>$name</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Country Code: </span> <strong>$CountryCode</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500; '>Sender Email: </span> <strong style='color: #eb7f25;'>$senderEmail</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Contact Number: </span> <strong>$CountryCode-$number</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Subject: </span> <strong>$subject</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Deadline: </span> <strong>$endDate</strong></li>
                                <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>No Of Pages / Word count: </span> <strong>$numberOfPage</strong></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $status = [
                        'status' => 'success',
                        'sndType' => 'sys',
                        'fileLocation' => $attachToken
                    ];

                    $statusJson = json_encode($status);
                    echo $statusJson;
                } catch (Exception $e) {
                    $status = [
                        'status' => 'failiure',
                        'error' => $mail->ErrorInfo,
                        'sndType' => 'sys'
                    ];
                    $statusJson = json_encode($status);
                    echo $statusJson;
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $status = [
                    'status' => 'failiure',
                    'error' => 'values Not Given',
                    'sndType' => 'sys'
                ];
                $statusJson = json_encode($status);
                echo $statusJson;
            }
        } else {
            $status = [
                'status' => 'failiure',
                'error' => 'values Not Passed',
                'sndType' => 'sys'
            ];
            $statusJson = json_encode($status);
            echo $statusJson;
        }
    } else if ($sendType == 'client') {
        if (isset($phpForm['email']) && isset($phpForm['name'])) {
            if (!($phpForm['email'] == '' || $phpForm['name'] == '')) {
                $senderEmail = $phpForm['email'];
                // Load Composer's autoloader
                require 'vendor/autoload.php';
                require 'credentials.php';

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
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
                    $mail->setFrom($gEmail, 'My Coursework');
                    $mail->addAddress($senderEmail, 'support@mycoursework.com');     // Add a recipient
                    $mail->addReplyTo($gEmail);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Thank you for contacting us - My Coursework';
                    $properName = ucfirst($phpForm['name']);
                    if (isset($phpForm['limited'])) {
                        $mail->Body = "
                            <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                                <div class='content' style='text-align: center;'>
                                    <div class='left-hole'></div>
                                    <div class='right-hole'></div>
                                    <div class='main-content'>
                                    <h1>Thank You for Subscribing to our Offer</h1>
                                    <p>We will soon contact you!</p>
                                    <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@My-Coursework</h6>
                                </div>
                                <div class='content' style='text-align: left; margin-top:30px;'>
                                    <a href='http://mycoursework.uk/' style='background: white;color: #000000;font-size: 19px;padding: 9px;font-family: system-ui;border: 0 !important;border-radius: 9px;font-weight: 600;'>Visit Site</a>
                                </div>
                            </div>
                        ";
                    } else {
                        $mail->Body = "
                            <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                                <div class='content' style='text-align: center;'>
                                    <div class='left-hole'></div>
                                    <div class='right-hole'></div>
                                    <div class='main-content'>
                                    <h1>Thank You for submitting your order</h1>
                                    <p>We will soon contact you after completion of your task</p>
                                    <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@My-Coursework</h6>
                                </div>
                                <div class='content' style='text-align: left;'>
                                    <a href='http://mycoursework.uk/' style='background: white;color: #000000;font-size: 19px;padding: 9px;font-family: system-ui;border: 0 !important;border-radius: 9px;font-weight: 600;'>Visit Site</a>
                                </div>
                            </div>
                        ";
                    }
                    $mail->AltBody = 'Thankyou for Submitting your task ! We have collected your information , We will soon contact you after completion of your task';

                    $mail->send();
                    $status = [
                        'status' => 'success',
                        'sndType' => 'client'
                    ];
                    $statusJson = json_encode($status);
                    echo $statusJson;
                } catch (Exception $e) {
                    $status = [
                        'status' => 'failiure',
                        'error' => $mail->ErrorInfo,
                        'sndType' => 'client'
                    ];
                    $statusJson = json_encode($status);
                    echo $statusJson;
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $status = [
                    'status' => 'failiure',
                    'error' => 'values Not Given',
                    'sndType' => 'client'
                ];
                $statusJson = json_encode($status);
                echo $statusJson;
            }
        } else {
            $status = [
                'status' => 'failiure',
                'error' => 'values Not Passed',
                'sndType' => 'client'
            ];
            $statusJson = json_encode($status);
            echo $statusJson;
        }
    } else {
        $status = [
            'status' => 'failiure',
            'error' => 'Status Type Wrong'
        ];
        $statusJson = json_encode($status);
        echo $statusJson;
    }
} else {
    $status = [
        'status' => 'failiure',
        'error' => 'Status Not Passed'
    ];
    $statusJson = json_encode($status);
    echo $statusJson;
}
