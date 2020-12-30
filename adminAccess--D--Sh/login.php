<?php
session_start();
if (isset($_SESSION['userName'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en" class="dark">


<!-- Mirrored from www.webstrot.com/html/webstrotadmin/bootstrap3/dark/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 04:41:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MODREN solutions. - Control Panel</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src='../../../../google_analytics_auto.js'></script>
</head>

<body class="bg-primary">
    <style>
        .form-control {
            background: white !important;
            color: black !important;
            border-radius: 17px;
        }

        .form-control::placeholder {
            color: black !important;
        }

        .m-auto {
            margin: auto;
            float: none;
        }

        .failiure {
            background: rgb(0, 212, 255);
            background: linear-gradient(275deg, rgba(0, 212, 255, 1) 0%, rgba(2, 0, 36, 1) 0%, rgba(0, 0, 0, 1) 0%, rgba(164, 0, 0, 1) 26%, rgba(221, 0, 0, 1) 35%, rgba(255, 0, 0, 0.9248074229691877) 53%, rgba(255, 0, 0, 0.9248074229691877) 73%);
            color: #ffffff;
            font-weight: 600;
            font-size: 16px;
            position: fixed;
            width: 43rem;
            right: 5px;
            top: 15px;
            border: 0;
        }

        .d-none {
            display: none !important;
        }

        .float-right {
            float: right;
        }

        .seePass {
            position: relative;
            right: 17px;
            color: black;
            bottom: -29px;
            font-size: 16px;
        }
    </style>
    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="alert alert-danger response d-none"></div>
                <div class="col-md-5 m-auto">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="javascript:;"><span>MODREN solutions. - Control Panel</span></a>
                        </div>
                        <div class="login-form">
                            <div class="col-md-12 text-center m-b-30">
                                <i class="fas fa-key fa-2x"></i>
                            </div>
                            <form class="loginForm">
                                <div class="form-group">
                                    <input type="text" class="form-control" id='username' name="username" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-eye float-right seePass"></i>
                                    <input type="password" class="form-control" id='password' name="password" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('initScript.php') ?>
</body>


<!-- Mirrored from www.webstrot.com/html/webstrotadmin/bootstrap3/dark/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Oct 2020 04:41:04 GMT -->

</html>