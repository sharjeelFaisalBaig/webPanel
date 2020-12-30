<?php include('header.php');
session_start();
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Users</h1>
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
                            <?php if ($_SESSION['userRoleNum'] >= 3) {
                                echo '<a href="new-user" class="btn btn-primary">Add Users</a>';
                            } ?>
                        </div>
                        <div class="card alert">
                            <div class="card-header pr">
                                <h4>All Users </h4>
                                <div class="search-action">
                                    <div class="search-type dib">
                                        <input class="form-control input-rounded" onkeyup="searchIntegration(this,'users')" placeholder="search" type="text">
                                    </div>
                                </div>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="javascript:;" class="reloadUsers"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="new-user"><i class="ti-user"></i> Create User</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>User image</th>
                                                <th>Full Name</th>
                                                <th>Emails</th>
                                                <th>Phone Number</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                <th>User Role</th>
                                                <th>User Address</th>
                                                <?php if ($_SESSION['userRoleNum'] >= 3) {
                                                    echo '<th>Actions</th>';
                                                } ?>
                                            </tr>
                                        </thead>
                                        <tbody id="appendUsersData">

                                        </tbody>
                                    </table>
                                    <div id="status"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

                </div>
                <!-- /# row -->
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>