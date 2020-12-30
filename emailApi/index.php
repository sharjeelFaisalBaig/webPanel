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
                $name = $formData['qouteName'];
                $country = $formData['qouteCountry'];
                $phoneNumber = $formData['qouteNumber'];
                $email = $formData['qouteEmail'];
                $task = $formData['qouteTask'];
                $countryCodeQouted = $formData['countryCodeQouted'];
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
                    $mail->setFrom($gEmail, '@modrenSolutions');
                    $mail->addAddress($gEmail, '@modrenSolutions');     // Add a recipient
                    $mail->addReplyTo($email);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    if ($formData['accessType'] == 'qouted') {
                        $mail->Subject = "New Customer Related " . ucfirst($task) . " -modrenSolutions";
                        $mail->Body = "
                                <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                                    <div class='content' style='text-align: center;'>
                                        <div class='left-hole'></div>
                                        <div class='right-hole'></div>
                                        <div class='main-content'>
                                        <h1>Customer Related " . ucfirst($task) . "</h1>
                                        <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@modrenSolutions</h6>
                                    </div>
                                    <div class='content' style='text-align: left !important;'>
                                        <ul>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Name: </span> <strong>$name</strong></li>
                                            <li class='titleBefore  '><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500; '>Email: </span> <strong style='color: #eb7f25;'>$email</strong></li>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Contact Number: </span> <strong>$countryCodeQouted-$phoneNumber</strong></li>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Contact Number: </span> <strong>$countryCodeQouted-$phoneNumber</strong></li>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Country: </span> <strong>$country</strong></li>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Task: </span> <strong>$task</strong></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            ";
                        $mail->AltBody = 'Hello Sir Your order has recieved !';
                    } else {
                        $status = [
                            'status' => 'failed',
                            'sndType' => 'sys',
                            'title' => 'Cannot Proceed Qoutation',
                            'message' => 'Access mode not defined',
                            'code' => 'x91'
                        ];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    }

                    if ($mail->send()) {
                        $status = [
                            'status' => 'success',
                            'sndType' => 'sys',
                            'title' => 'Qoutation Proceeded',
                            'message' => 'We have recieved your details, We will contact you within Few hours',
                        ];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    } else {
                        $status = [
                            'status' => 'failed',
                            'sndType' => 'sys',
                            'title' => 'Cannot Proceed Qoutation',
                            'message' => 'Cannot Proceed Qoutation',
                            'code' => 'x94'
                        ];
                        $response = [];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    }
                } catch (Exception $e) {
                    $status = [
                        'status' => 'failiure',
                        'title' => 'Cannot Proceed Qoutation',
                        'error' => $mail->ErrorInfo,
                        'sndType' => 'sys',
                        'message' => 'Qoutation Not Procedded !',
                        'code' => 'x97'
                    ];
                    $response = [];
                    array_push($response, $status);
                    echo json_encode($response, JSON_PRETTY_PRINT);
                }
            } else if ($formData['accessType'] == 'detailed') {
                $name = $formData['name'];
                $country = $formData['country'];
                $countryCode = $formData['countryCode'];
                $phoneNumber = $formData['phone'];
                $email = $formData['email'];
                $projectType = $formData['projectType'];
                $projectName = $formData['projectName'];
                $budget = $formData['budget'];
                $company = $formData['company'];
                $companyLocation = $formData['companyLocation'];
                $companyType = $formData['companyType'];
                $message = $formData['message'];
                $discountType = $formData['discountType'];
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
                    $mail->setFrom($gEmail, '@modrenSolutions');
                    $mail->addAddress($gEmail, '@modrenSolutions');     // Add a recipient
                    $mail->addReplyTo($email);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    if ($formData['accessType'] == 'detailed') {
                        $mail->Subject = "New Customer Related " . ucfirst($projectType) . " -modrenSolutions";
                        $mail->Body = "
                                <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                                    <div class='content' style='text-align: center;'>
                                        <div class='left-hole'></div>
                                        <div class='right-hole'></div>
                                        <div class='main-content'>
                                        <h1>Customer Related " . ucfirst($projectType) . "</h1>
                                        <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@modrenSolutions</h6>
                                    </div>
                                    <div class='content' style='text-align: left !important;'>
                                        <ul>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Name: </span> <strong>$name</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>country: </span> <strong>$country</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Country Code: </span> <strong>$countryCode</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Phone Number: </span> <strong>$countryCode-$phoneNumber</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Email: </span> <strong>$email</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Discount Requested: </span> <strong>$discountType% OFF</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Project Type: </span> <strong>$projectType</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>ProjectName: </span> <strong>$projectName</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Budget: </span> <strong>$budget</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Company: </span> <strong>$company</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Company Location: </span> <strong>$companyLocation</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Company Type: </span> <strong>$companyType</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Message: </span> <strong>$message</strong></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            ";
                        $mail->AltBody = 'Hello Sir Your order has recieved !';
                    } else {
                        $status = [
                            'status' => 'failed',
                            'sndType' => 'detail',
                            'title' => 'Cannot Submit Details',
                            'message' => 'Access mode not defined',
                            'code' => 'x91'
                        ];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    }

                    if ($mail->send()) {
                        $status = [
                            'status' => 'success',
                            'sndType' => 'detail',
                            'title' => 'Details Submitted',
                            'message' => 'Your discussion has been Proceeded, We will contact you within Few hours',
                        ];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    } else {
                        $status = [
                            'status' => 'failed',
                            'sndType' => 'detail',
                            'title' => 'Cannot Submit Details',
                            'message' => 'Please Try to Submit your details again !',
                            'code' => 'x94'
                        ];
                        $response = [];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    }
                } catch (Exception $e) {
                    $status = [
                        'status' => 'failiure',
                        'title' => 'Cannot Submit Details',
                        'error' => $mail->ErrorInfo,
                        'sndType' => 'detail',
                        'message' => 'Please Try to Submit your details again !',
                        'code' => 'x97'
                    ];
                    $response = [];
                    array_push($response, $status);
                    echo json_encode($response, JSON_PRETTY_PRINT);
                }
            } else if ($formData['accessType'] == 'callBack') {
                $name = $formData['callName'];
                $countryCode = $formData['countryCode'];
                $phoneNumber = $formData['callNumber'];
                $email = $formData['callEmail'];
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
                    $mail->setFrom($gEmail, '@modrenSolutions');
                    $mail->addAddress($gEmail, '@modrenSolutions');     // Add a recipient
                    $mail->addReplyTo($email);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    if ($formData['accessType'] == 'callBack') {
                        $mail->Subject = "New Call Back -modrenSolutions";
                        $mail->Body = "
                                <div class='header-custom email-signup-thankyou' style='border: 20px dashed #ff8100;background: #000000c7;padding: 31px;color: white;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 17px;'>
                                    <div class='content' style='text-align: center;'>
                                        <div class='left-hole'></div>
                                        <div class='right-hole'></div>
                                        <div class='main-content'>
                                        <h1>Customer Call Back</h1>
                                        <h6 style='font-size: 25px;padding: 0px !important;font-family: system-ui;margin: 0;font-weight: 700;color: #eb7f25;letter-spacing: 3px;'>@modrenSolutions</h6>
                                    </div>
                                    <div class='content' style='text-align: left !important;'>
                                        <ul>
                                            <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Name: </span> <strong>$name</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Country Code: </span> <strong>$countryCode</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Phone Number: </span> <strong>$countryCode-$phoneNumber</strong></li>
                                             <li class='titleBefore'><span style='color: #cdcdce;font-size: 18px;margin-right: 22px;font-weight: 500;'>Email: </span> <strong>$email</strong></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            ";
                        $mail->AltBody = 'Hello Sir Your order has recieved !';
                    } else {
                        $status = [
                            'status' => 'failed',
                            'sndType' => 'callBack',
                            'title' => 'Cannot Place Callback',
                            'message' => 'Access mode not defined',
                            'code' => 'x91'
                        ];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    }

                    if ($mail->send()) {
                        $status = [
                            'status' => 'success',
                            'sndType' => 'callBack',
                            'title' => 'Callback Placed',
                            'message' => 'Callback Booked We will shortly contact you!',
                        ];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    } else {
                        $status = [
                            'status' => 'failed',
                            'sndType' => 'callBack',
                            'title' => 'Cannot Place Callback',
                            'message' => 'Please try to book again !',
                            'code' => 'x94'
                        ];
                        $response = [];
                        array_push($response, $status);
                        echo json_encode($response, JSON_PRETTY_PRINT);
                    }
                } catch (Exception $e) {
                    $status = [
                        'status' => 'failiure',
                        'error' => $mail->ErrorInfo,
                        'sndType' => 'callBack',
                        'title' => 'Cannot Place Callback',
                        'message' => 'Please try to book again !',
                        'code' => 'x97'
                    ];
                    $response = [];
                    array_push($response, $status);
                    echo json_encode($response, JSON_PRETTY_PRINT);
                }
            }
        } else {
            $response = [];
            array_push($response, ['status' => 'failed', 'title' => 'We are Sorry', 'message' => 'Some technical issue happens in our System you Can Contact: 03228299115 ', 'err' => 'denied-access', 'code' => 'x099']);
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}
