<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
include('utility/cors.php');
include('utility/functions.php');
if (file_get_contents('php://input')) {
    $convertedData = json_decode(file_get_contents('php://input'), true);
    if (isset($convertedData['accesstoken'])) {
        if ($convertedData['accesstoken'] == 'searchItX01777299217') {
            if (isset($convertedData['accessType']) && $convertedData['accessType'] == 'searchCallback') {
                // ACCESS APPROVED
                include('utility/connection.php');
                $insertSql = "SELECT * FROM `callbacks` WHERE 
                callbacks.bookername like '%{$convertedData["searchTerm"]}%' OR 
                callbacks.callbackid like '%{$convertedData["searchTerm"]}%' OR
                callbacks.bookingdate like '%{$convertedData["searchTerm"]}%' OR
                callbacks.bookingstatus like '%{$convertedData["searchTerm"]}%' OR
                callbacks.bookername like '%{$convertedData["searchTerm"]}%' OR
                callbacks.bookerphone like '%{$convertedData["searchTerm"]}%' OR
                callbacks.bookeremail like '%{$convertedData["searchTerm"]}%'";
                $insertSqlAction = mysqli_query($conn, $insertSql);
                $result = [];
                if ($insertSqlAction) {
                    if (mysqli_num_rows($insertSqlAction) > 0) {
                        while ($row = mysqli_fetch_assoc($insertSqlAction)) {
                            array_push($result, $row);
                        }
                        echo json_encode($result, JSON_PRETTY_PRINT);
                    } else {
                        echo json_encode(['status' => 'success', 'message' => 'No Callbacks For this Terms "' . $convertedData['searchTerm'] . '" Present!']);
                    }
                } else {
                    echo json_encode(['status' => 'failiure', 'error' => "Our System is under construction X9918"]);
                }
            } else if (isset($convertedData['accessType']) && $convertedData['accessType'] == 'searchDiscussion') {
                // ACCESS APPROVED
                include('utility/connection.php');
                $insertSql = "SELECT * FROM `discussion` WHERE
                discussionid  like '%{$convertedData["searchTerm"]}%' OR
                discussionername  like '%{$convertedData["searchTerm"]}%' OR
                discussioneremail  like '%{$convertedData["searchTerm"]}%' OR
                discussionerphone  like '%{$convertedData["searchTerm"]}%' OR
                discussiondate  like '%{$convertedData["searchTerm"]}%' OR
                discussionstatus  like '%{$convertedData["searchTerm"]}%' OR
                discussiondiscountgranted  like '%{$convertedData["searchTerm"]}%' OR
                discussionercountry  like '%{$convertedData["searchTerm"]}%' OR
                discussionerprojecttype  like '%{$convertedData["searchTerm"]}%' OR
                discussionerprojectname  like '%{$convertedData["searchTerm"]}%' OR
                discussionercompanyname  like '%{$convertedData["searchTerm"]}%' OR
                discussionercompanylocation  like '%{$convertedData["searchTerm"]}%' OR
                discussionercompanytype  like '%{$convertedData["searchTerm"]}%' OR
                discussionercompanybudget  like '%{$convertedData["searchTerm"]}%' OR
                discussionshortdesc   like '%{$convertedData["searchTerm"]}%'";
                $insertSqlAction = mysqli_query($conn, $insertSql);
                $result = [];
                if ($insertSqlAction) {
                    if (mysqli_num_rows($insertSqlAction) > 0) {
                        while ($row = mysqli_fetch_assoc($insertSqlAction)) {
                            array_push($result, $row);
                        }
                        echo json_encode($result, JSON_PRETTY_PRINT);
                    } else {
                        echo json_encode(['status' => 'success', 'message' => 'No Discussions For this Terms "' . $convertedData['searchTerm'] . '" Present!']);
                    }
                } else {
                    echo json_encode(['status' => 'failiure', 'error' => "Our System is under construction X9918"]);
                }
            } else if (isset($convertedData['accessType']) && $convertedData['accessType'] == 'searchQoutation') {
                // ACCESS APPROVED
                include('utility/connection.php');
                $insertSql = "SELECT * FROM `orders` WHERE
                orderid like '%{$convertedData["searchTerm"]}%' OR
                orderername like '%{$convertedData["searchTerm"]}%' OR
                ordereremail like '%{$convertedData["searchTerm"]}%' OR
                orderdate like '%{$convertedData["searchTerm"]}%' OR
                ordererphone like '%{$convertedData["searchTerm"]}%' OR
                orderstatus like '%{$convertedData["searchTerm"]}%' OR
                ordertype like '%{$convertedData["searchTerm"]}%'";
                $insertSqlAction = mysqli_query($conn, $insertSql);
                $result = [];
                if ($insertSqlAction) {
                    if (mysqli_num_rows($insertSqlAction) > 0) {
                        while ($row = mysqli_fetch_assoc($insertSqlAction)) {
                            array_push($result, $row);
                        }
                        echo json_encode($result, JSON_PRETTY_PRINT);
                    } else {
                        echo json_encode(['status' => 'success', 'message' => 'No Qoutations For this Terms "' . $convertedData['searchTerm'] . '" Present!']);
                    }
                } else {
                    echo json_encode(['status' => 'failiure', 'error' => "Our System is under construction X9918"]);
                }
            } else if (isset($convertedData['accessType']) && $convertedData['accessType'] == 'searchUser') {
                // ACCESS APPROVED
                include('utility/connection.php');
                $insertSql = "SELECT * FROM users JOIN userrole ON userrole.userRoleId = users.userRole WHERE
                userId like '%{$convertedData["searchTerm"]}%' OR
                userFullName like '%{$convertedData["searchTerm"]}%' OR
                userPhone like '%{$convertedData["searchTerm"]}%' OR
                userEmail like '%{$convertedData["searchTerm"]}%' OR
                userAddress like '%{$convertedData["searchTerm"]}%' OR
                userDOB like '%{$convertedData["searchTerm"]}%' OR
                userGender like '%{$convertedData["searchTerm"]}%' OR
                userName like '%{$convertedData["searchTerm"]}%' OR
                userPassword like '%{$convertedData["searchTerm"]}%' OR
                userRoleName like '%{$convertedData["searchTerm"]}%' OR
                userImg like '%{$convertedData["searchTerm"]}%'
                ";
                $insertSqlAction = mysqli_query($conn, $insertSql);
                $result = [];
                if ($insertSqlAction) {
                    if (mysqli_num_rows($insertSqlAction) > 0) {
                        while ($row = mysqli_fetch_assoc($insertSqlAction)) {
                            array_push($result, $row);
                        }
                        echo json_encode($result, JSON_PRETTY_PRINT);
                    } else {
                        echo json_encode(['status' => 'success', 'message' => 'No Qoutations For this Terms "' . $convertedData['searchTerm'] . '" Present!']);
                    }
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
