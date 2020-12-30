<?php
header('Access-Control-Allow-Methods: POST');
include('utility/cors.php');
include('utility/functions.php');
include('utility/connection.php');
new Cors;
if (isset($_GET)) {
    $mysqliRead = 'SELECT * FROM users JOIN userrole ON userrole.userRoleId = users.userRole';
    $queryStatus = mysqli_query($conn, $mysqliRead);
    $rows = [];
    if ($queryStatus) {
        if (mysqli_num_rows($queryStatus) > 0) {
            while ($row = mysqli_fetch_assoc($queryStatus)) {
                array_push(
                    $rows,
                    [
                        'userId' => $row['userId'],
                        'userFullName' => $row['userFullName'],
                        'userPhone' => $row['userPhone'],
                        'userEmail' => $row['userEmail'],
                        'userAddress' => $row['userAddress'],
                        'userDOB' => $row['userDOB'],
                        'userGender' => $row['userGender'],
                        'userName' => $row['userName'],
                        'userPassword' => $row['userPassword'],
                        'userRole' => $row['userRole'],
                        'userRoleName' => $row['userRoleName'],
                        'userImg' => $row['userImg'],
                    ]
                );
            }
            echo json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(['status' => 'failed', 'msg' => 'No Records Present'], JSON_PRETTY_PRINT);
        }
    }
} else {
    echo json_encode(['invilad call method' => 'false']);
}
