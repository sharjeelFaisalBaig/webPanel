<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include('utility/cors.php');
include('utility/functions.php');
new Cors;
$data = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)) {
    if (!($data['username'] == '' || $data['password'] == '')) {
        include('utility/connection.php');
        $username = mysqli_escape_string($conn, md5($data['username']));
        $password = mysqli_escape_string($conn, md5($data['password']));
        $getCredentialsQuery = "SELECT * FROM users JOIN userrole ON users.userRole = userrole.userRoleId WHERE userName = '" . $username . "' AND userPassword = '" . $password . "'";
        $res = mysqli_query($conn, $getCredentialsQuery);
        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                session_start();
                while ($row = mysqli_fetch_assoc($res)) {
                    $_SESSION['userId'] =  $row['userId'];
                    $_SESSION['userFullName'] =  $row['userFullName'];
                    $_SESSION['userName'] =  $row['userName'];
                    $_SESSION['userPassword'] =  $row['userPassword'];
                    $_SESSION['userRole'] =  $row['userRoleName'];
                    $_SESSION['userRoleNum'] =  $row['userRoleId'];
                    $_SESSION['userImg'] =  $row['userImg'];
                    $_SESSION['userPhone'] =  $row['userPhone'];
                    $_SESSION['userEmail'] =  $row['userEmail'];
                    $_SESSION['userDOB'] =  $row['userDOB'];
                    $_SESSION['userGender'] =  $row['userGender'];
                    $_SESSION['userAddress'] =  $row['userAddress'];
                    echo json_encode(['status' => 'success', 'loged in' => 'success']);
                }
            } else {
                echo json_encode(['status' => 'failure', 'message' => 'password not matched', 'code' => '002']);
            }
        } else {
            die();
        }
    }
} else {
    echo json_encode(['status' => 'failure', 'message' => 'values Not Given', 'code' => '004']);
}
