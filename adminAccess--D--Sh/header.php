<?php
session_start();
if (!(isset($_SESSION['userName']))) {
    header('Location: login.php');
}
?>
<?php include('api/utility/functions.php') ?>
<!DOCTYPE html>
<html lang="en" class="dark">


<!-- Mirrored from www.webstrot.com/html/webstrotadmin/bootstrap3/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 04:31:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modren Solutions - ADMIN</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/font-awsome/css/all.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src='../../../../google_analytics_auto.js'></script>
</head>

<body>
    <!-- /javascript:; sidebar -->
    <?php include('sidebar.php') ?>

    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="#">
                    <!-- <img src="assets/images/logo.png" alt="" /> --><span>Modren solutions - ADMIN</span></a></div>
            <div class="hamburger sidebar-toggle" onclick="document.querySelector('.supplyMargin').classList.toggle('mt-11R')">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><a href="my-profile"><img class="avatar-img" src="<?php echo $_SESSION['userImg'] ?>" alt="" /></a> <span class="user-avatar"><a href="my-profile" style="margin: 0px;padding: 0;margin-right: 13px;"><?php echo $_SESSION['userFullName'] ?></a><i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-heading">
                            <span class="text-left"><?php echo $_SESSION['userRole'] ?></span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="my-profile"><i class="ti-user"></i> <span>Profile</span></a></li>
                                <li><a href="javascript:;"><i class="ti-write"></i> <span>My Task</span></a></li>
                                <li><a href="javascript:;"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                <li><a href="javascript:;"><i class="ti-settings"></i> <span>Setting</span></a></li>
                                <li>
                                    <form action="" method="POST">
                                        <button type="submit" id="logoutBtn" name="logoutBtn" style="background: none;outline: none !important;border: 0;font-size: 14px;margin-left: -5px;"><i class="ti-power-off"></i> <span>Logout</span></button>
                                    </form>
                                </li>
                                <?php
                                if (isset($_POST['logoutBtn'])) {
                                    sessionDelete();
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>