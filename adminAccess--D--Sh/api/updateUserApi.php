<?php
header('Access-Control-Allow-Methods: POST');
include('utility/cors.php');
include('utility/functions.php');
include('utility/connection.php');
new Cors;
if (isset($_POST)) {
    $error = [];
    $success = [];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $userPic;
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    if (isset($_FILES['userPic'])) {
        if ($_FILES['userPic']['size'] <= 16000000) {
            $fileGet = $_FILES['userPic']['name'];
            $details = pathinfo($fileGet);
            $extentions = ['png' => 'png', 'jpg' => 'jpg', 'jpeg' => 'jpeg'];
            $ext = $details['extension'];
            $matchExt = array_search($ext, $extentions);
            if (!$matchExt == '') {
                $fileName = $fileGet;
                $fileLocation = $_FILES['userPic']['tmp_name'];
                $size = $_FILES['userPic']['size'];
                if (move_uploaded_file($fileLocation, 'uploads/' . $fileName)) {
                    $getQ = 'SELECT userImg FROM `users` WHERE userId = ' . $id . '';
                    $getQSucc = mysqli_query($conn, $getQ);
                    if (mysqli_num_rows($getQSucc)) {
                        while ($getQrow = mysqli_fetch_assoc($getQSucc)) {
                            unlink('../'.$getQrow['userImg']);
                        }
                    }
                    $userPic = 'api/uploads/' . $fileName;
                } else {
                    $userPic = 'no image';
                    array_push($success, ['formSuccessFileNotPresent' => 'file Not Attached', 'err_code' => '110']);
                }
            } else {
                $userPic = 'extension not matched';
                array_push($error, ['file_error' => 'File extention not matched', 'err_code' => '003']);
            }
        } else {
            $userPic = 'no image';
            array_push($error, ['file_error' => 'File exceeds max size Limit: 2MB', 'err_code' => '005']);
        }
    };


    if (empty($error)) {
        $sqlSubmit = 'UPDATE `users` SET `userFullName`="' . $name . '", `userPhone`="' . $phoneNumber . '", `userEmail`="' . $email . '", `userAddress`="' . $address . '", `userDOB`="' . $dob . '", `userGender`="' . $gender . '", `userRole`="' . $role . '", `userImg`="' . $userPic . '" WHERE `userId`=' . $id . '';
        if (mysqli_query($conn, $sqlSubmit)) {
            array_push($success, ['status' => 'success']);
            echo json_encode($success);
        } else {
            echo json_encode(['status' => 'failiure', 'err' => 'Query Not Working']);
        }
    } else {
        array_push($error, ['status' => 'failiure']);
        echo json_encode($error);
    }
}
