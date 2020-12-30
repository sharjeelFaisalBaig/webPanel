<?php
include('cors.php');
if (isset($_FILES)) {
    $WholeDetail = array();
    for ($i = 0; $i < count($_FILES); $i++) {
        $fileGet = $_FILES['attachment' . $i]['name'];
        $ext = pathinfo($fileGet, PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['attachment' . $i]['tmp_name'], 'attachments/' . $fileGet)) {
            array_push($WholeDetail, ['filePath' => $_FILES['attachment' . $i]['tmp_name'], 'fileName' => $_FILES['attachment' . $i]['name'], 'fileExtention' => $ext]);
        }
    }
    echo json_encode($WholeDetail);
} else {
    $phpForm = json_decode(file_get_contents('php://input'), true);
    print_r($phpForm);
    if (unlink('attachments/' . $phpForm['name'])) {
        echo json_encode(['status' => 'true', 'msg' => 'delete request successfull']);
    } else {
        echo json_encode(['status' => 'false', 'msg' => 'delete request unsuccessful']);
    }
}
