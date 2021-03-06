<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require('../emailApi/cors.php');
require('../emailApi/functions.php');
if (file_get_contents('php://input')) {
    $phpForm = json_decode(file_get_contents('php://input'), true);
    $convertedData = array_convertio($phpForm);
    if (isset($convertedData['accesstoken'])) {
        if ($convertedData['accesstoken'] == 'quoted!55nn2@##@$#25efdsacdsaazx!!@@') {
            if (isset($convertedData['accessType']) && $convertedData['accessType'] == 'detailed') {
                // ACCESS APPROVED
                include('connection.php');
                $currDate = date("Y-m-d");
                $insertSql = "INSERT INTO `discussion`(`discussionername`, `discussioneremail`, `discussionerphone`, `discussiondate`, `discussionstatus`, `discussiondiscountgranted`, `discussionercountry`, `discussionerprojecttype`, `discussionerprojectname`, `discussionercompanyname`, `discussionercompanylocation`, `discussionercompanytype`, `discussionercompanybudget`, `discussionshortdesc`) VALUES ('{$convertedData["name"]}','{$convertedData["email"]}','{$convertedData["countryCode"]} {$convertedData["phone"]}','{$currDate}','pending','{$convertedData["discountType"]}','{$convertedData["country"]}','{$convertedData["projectType"]}','{$convertedData["projectName"]}','{$convertedData["company"]}','{$convertedData["companyLocation"]}','{$convertedData["companyType"]}','{$convertedData["budget"]}','{$convertedData["message"]}')";
                $insertSqlAction = mysqli_query($conn, $insertSql);
                if ($insertSqlAction) {
                    echo json_encode(['status' => 'success', 'message' => 'row inserted!']);
                } else {
                    echo json_encode(['status' => 'failiure', 'error' => "Our System is under construction X9918"]);
                }
            }
        } else {
            echo json_encode(['status' => 'failed', 'error' => 'Security vulnerability warning API']);
        }
    } else {
        echo json_encode(['status' => 'failed', 'error' => 'Security token missing']);
    }
} else {
    echo json_encode(['status' => 'failed', 'error' => 'Security token missing']);
}
