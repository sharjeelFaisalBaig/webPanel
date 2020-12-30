<?php
function returnSession()
{
    return [
        'userId' => $_SESSION['userId'],
        'userFullName' => $_SESSION['userFullName'],
        'userRole' => $_SESSION['userRole'],
        'userImg' => $_SESSION['userImg'],
        'userPhone' => $_SESSION['userPhone'],
        'userEmail' => $_SESSION['userEmail'],
        'userDOB' => $_SESSION['userDOB'],
        'userAddress' => $_SESSION['userAddress'],
        'userGender' => $_SESSION['userGender']
    ];
};
function sessionDelete()
{
    session_unset();
    session_destroy();
?>
    <script>
        window.location.reload();
    </script>
<?php
}
