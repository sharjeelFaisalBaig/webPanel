<?php
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/json');
include('utility/cors.php');
include('utility/functions.php');
include('utility/connection.php');
new Cors;
$readOrder = "SELECT * FROM `orders`";
$readOrderQuery = mysqli_query($conn, $readOrder);
$jsonPush = [];
if ($readOrderQuery) {
    if (mysqli_num_rows($readOrderQuery)) {
        while ($row = mysqli_fetch_assoc($readOrderQuery)) {
            array_push($jsonPush, $row);
        }
        echo json_encode($jsonPush);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'No Qoutations!']);
    }
} else {
    echo json_encode(['status' => 'fail', 'message' => 'Query Error']);
}
