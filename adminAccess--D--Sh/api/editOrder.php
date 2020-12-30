<?php
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json');
include('utility/cors.php');
include('utility/functions.php');
include('utility/connection.php');
if (file_get_contents('php://input')) {
    $phpForm = json_decode(file_get_contents('php://input'), true);
    $editId = $phpForm['editId'];
    $editedStatus = $phpForm['editedStatus'];
    $editSql = 'UPDATE `orders` SET `orderstatus`= "' . $editedStatus . '" WHERE `orderid` = ' . $editId . '';
    $editSqlAction = mysqli_query($conn, $editSql);
    if ($editSqlAction) {
        echo json_encode(['status' => 'success', 'message' => 'Status Updated For Order Id ' . $editId . '']);
    } else {
        echo json_encode(['status' => 'failed', 'err code' => 'X8281io', 'message' => 'System Failiure']);
    }
} else {
    echo json_encode(['status' => 'failed', 'err code' => 'X9i200', 'message' => 'trying to crack firewall']);
}
