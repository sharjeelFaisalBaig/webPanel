<?php
include('cors.php');
if (isset($_FILES['attachment'])) {
    $fileGet = $_FILES['attachment']['name'];
    $ext = pathinfo($fileGet, PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], 'attachments/' . $fileGet)) {
        echo json_encode(['filePath' => $_FILES['attachment']['tmp_name'], 'fileName' => $_FILES['attachment']['name'], 'fileExtention' => $ext]);
    }
} else {
    $phpForm = json_decode(file_get_contents('php://input'), true);
    print_r($phpForm);
    if (unlink('attachments/' . $phpForm['name'])) {
        echo json_encode(['status' => 'true', 'msg' => 'delete request successfull']);
    } else {
        echo json_encode(['status' => 'false', 'msg' => 'delete request unsuccessful']);
    }
}
