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
    $phoneNumber = $_POST['phoneNumber'];
    $userName = mysqli_escape_string($conn, md5($_POST['userName']));
    $password = mysqli_escape_string($conn, md5($_POST['password']));
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
    $selectUser = "SELECT * FROM `users` WHERE userName = '$userName'";
    $selectUserAction = mysqli_query($conn, $selectUser);
    if ($selectUserAction) {
        if (mysqli_num_rows($selectUserAction) > 0) {
            $error = [];
            array_push($error, ['file_error' => 'User with same Username exist please try another', 'err_code' => '005']);
            echo json_encode($error);
        } else {
            if (empty($error)) {
                $sqlSubmit = 'INSERT INTO `users`(`userFullName`, `userPhone`, `userEmail`, `userAddress`, `userDOB`, `userGender`, `userName`, `userPassword`, `userRole`, `userImg`) VALUES ("' . $name . '","' . $phoneNumber . '","' . $email . '","' . $address . '","' . $dob . '","' . $gender . '","' . $userName . '","' . $password . '","' . $role . '","' . $userPic . '")';
                if (mysqli_query($conn, $sqlSubmit)) {
                    array_push($success, ['status' => 'success']);
                    echo json_encode($success);
                } else {
                    echo json_encode(['status' => 'failiure', 'err' => 'code x022']);
                }
            } else {
                array_push($error, ['status' => 'failiure']);
                echo json_encode($error);
            }
        }
    } else {
        $error = [];
        array_push($error, ['file_error' => 'Query Not Working', 'err_code' => '005']);
        echo json_encode($error);
    }
}
