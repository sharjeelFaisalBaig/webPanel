<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include('utility/cors.php');
include('utility/functions.php');

$phpForm = json_decode(file_get_contents('php://input'), true);
if (isset($phpForm)) {
    include('utility/connection.php');
    if ($phpForm['bool'] == 'del') {
        $delSql = "DELETE FROM `callbacks` WHERE 1";
        $delSqlAction = mysqli_query($conn, $delSql);
        if ($delSqlAction) {
            echo json_encode(['status' => 'deleted', 'code' => 'delSucx099']);
        } else {
            echo json_encode(['status' => 'failed', 'code' => 'delFailx099', 'err' => mysqli_error($delSqlAction)]);
        }
    } else {
        echo json_encode(['status' => 'failed', 'code' => 'delFailx099', 'message' => 'Try to Crack firewall']);
    }
} else {
    echo json_encode(['status' => 'failed', 'code' => 'delFailx099', 'message' => 'Try to Crack firewall']);
}
