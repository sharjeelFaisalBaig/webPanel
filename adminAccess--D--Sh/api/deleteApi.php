<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include('utility/cors.php');
include('utility/functions.php');

$phpForm = json_decode(file_get_contents('php://input'), true);
if (isset($phpForm)) {
    include('utility/connection.php');
    $delId = $phpForm['deleteId'];
    $delSql = "DELETE FROM `users` WHERE userId = $delId";
    $delSqlAction = mysqli_query($conn, $delSql);
    if ($delSqlAction) {
        $getQ = 'SELECT userImg FROM `users` WHERE userId = ' . $delId . '';
        $getQSucc = mysqli_query($conn, $getQ);
        if (mysqli_num_rows($getQSucc)) {
            while ($getQrow = mysqli_fetch_assoc($getQSucc)) {
                unlink('../' . $getQrow['userImg']);
            }
        }
        echo json_encode(['status' => 'deleted', 'code' => 'delSucx099']);
    } else {
        echo json_encode(['status' => 'failed', 'code' => 'delFailx099', 'err' => mysqli_error($delSqlAction)]);
    }
}
