<?php
session_start();
if ($_SESSION['userRoleNum'] < 3) {
    header('Location: index.php');
}
?>
<?php include('header.php') ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Users</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="home">Dashboard</a></li>
                                <li class="active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-12 text-right">
                            <a href="users" class="btn btn-primary">All Users</a>
                        </div>
                        <div class="card alert">
                            <div class="card-header text-center mb-md-5 pb-md-4">
                                <h3>CREATE USER</h3>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" class="addUser" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><b>Name</b></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Phone Number</b></label>
                                                    <input type="number" name="phoneNumber" class="form-control" placeholder="+92 3229 288 113" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>User Name</b></label>
                                                    <input type="password" name="userName" class="form-control" placeholder="Enter Secure Username" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Password</b></label>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter Secure Password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Email</b></label>
                                                    <input type="email" name="email" class="form-control" placeholder="abc@xyz.com" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Picture</b></label>
                                                    <input type="file" name="userPic" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Gender</b></label>
                                                    <div class="row pt-3 align-items-center pl-3">
                                                        <label class="mr-4"><input type="radio" name="gender" checked value="male" required> Male</label>
                                                        <label class="mr-4"><input type="radio" name="gender" value="female" required> Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Role</b></label>
                                                    <div class="row pt-3 align-items-center pl-3">
                                                        <label class="mr-4"><input type="radio" name="role" value="1" checked required> Regular</label>
                                                        <label class="mr-4"><input type="radio" name="role" value="2" required> Admin</label>
                                                        <label class="mr-4"><input type="radio" name="role" value="3" required> Master Admin</label>
                                                        <label><input type="radio" name="role" value="4" required> Super Admin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Date Of Birth</b></label>
                                                    <input type="date" name="dob" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block"><b>Address</b></label>
                                                    <textarea name="address" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-center mt-2">
                                            <div class="col-md-4 m-auto">
                                                <button type="submit" class="btn btn-primary btn-block" style="font-size: 18px;font-weight: 700;">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
            </div>
        </div>
    </div>
</div>
<div class="alert responseCreateUser d-none" style="top: 11rem;"></div>
<?php include('footer.php') ?>