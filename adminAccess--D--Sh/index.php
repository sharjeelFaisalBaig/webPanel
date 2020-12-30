<?php include('header.php') ?>
<?php require('directExtentions.php');
require('api/utility/connection.php');
$latestQoute = new getLatestQoutation;
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome <b style="font-size: 20px;margin-left: 11px;background: aliceblue;color: black;padding: 4px;border-radius: 8px;font-family: system-ui;text-transform: capitalize;"><?php echo $_SESSION['userFullName']; ?></b></span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <div id="main-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card alert cardFix">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="stat-icon">
                                        <div class="card-option drop-menu pull-right"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="home"><i class="ti-loop"></i> Reload</a></li>
                                                <li><a href="qoutes"><i class="ti-download m-r-10"></i> All Qoutations</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-heading">
                                            <div class="stat-count">Latest Qoutation Request</div>
                                        </div>
                                        <div class="col-md-12 m-t-30 text-center">
                                            <h3>Related: <b class="text-warning"> <?php echo $latestQoute::$QoutationType ?></b></h3>
                                        </div>
                                        <div class="stat-footer">
                                            <div class="row m-0">
                                                <div class="col-lg-12 p-0 text-left">
                                                    <div class="analytic-arrow">
                                                        <i class="ti-user"></i>
                                                    </div>
                                                    <div class="count-header">By Requestor</div>
                                                    <div class="stat-count" style="FONT-SIZE: 18px;background: aliceblue;color: black;padding: 7px;font-family: system-ui;font-weight: 600;border-radius: 20px;width: fit-content;float: left;margin-top: -2px;"><?php echo "{$latestQoute::$RequestorName} <small>({$latestQoute::$Qoutationid})</small>" ?></div>
                                                </div>
                                                <div class="col-lg-6 p-0 text-left">
                                                    <div class="analytic-arrow visible-hidden">
                                                        <i class="fa fa-clock"></i>
                                                    </div>
                                                    <div class="count-header visible-hidden">Request Date</div>
                                                    <a class="btn btn-success ml-2" style="margin-top: 0px;font-size: 22px;color: black;" href="tel:<?php echo $latestQoute::$RequestorPhone ?>"><i class="fas fa-phone-alt"></i></a>
                                                </div>
                                                <div class="col-lg-6 p-0 text-right">
                                                    <div class="analytic-arrow">
                                                        <i class="fa fa-clock"></i>
                                                    </div>
                                                    <div class="count-header">Request Date</div>
                                                    <div class="count-header" style="FONT-SIZE: 18px;background: aliceblue;color: black;padding: 7px;font-family: system-ui;font-weight: 600;border-radius: 20px;width: fit-content;float: right;margin-top: 3px;"><?php echo "{$latestQoute::$QoutationDate}" ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card alert cardFix">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="stat-icon">
                                        <div class="card-option drop-menu pull-right"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="discussions"><i class="fas fa-comments m-r-10"></i> All Discussions</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-heading">
                                            <div class="stat-count">Discussion Progress</div>
                                        </div>
                                        <div class="col-md-12 m-t-30 text-center">
                                            <div class="table-responsive" style="overflow: auto;max-width: 100%;max-height: 25rem;">
                                                <table class="table student-data-table m-t-20">
                                                    <thead class="nowrapcol">
                                                        <tr>
                                                            <th>Discussion Id</th>
                                                            <th>Discussion Date</th>
                                                            <th>Discussion Status</th>
                                                            <th>Discussioner Name</th>
                                                            <th>Discussioner Email</th>
                                                            <th>Discussioner Phone number</th>
                                                            <th>Discussioner Country</th>
                                                            <th>Discussioner Company name</th>
                                                            <th>Discussioner Company type</th>
                                                            <th>Discussioner Project name</th>
                                                            <th>Discussioner Project type</th>
                                                            <th>Discussion Short Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $selectDiscussion = "SELECT * FROM `discussion` ORDER BY discussiondate DESC LIMIT 3;";
                                                        $selectDiscussionAction = mysqli_query($conn, $selectDiscussion);
                                                        if ($selectDiscussionAction) {
                                                            if (mysqli_num_rows($selectDiscussionAction) > 0) {
                                                                while ($row = mysqli_fetch_assoc($selectDiscussionAction)) {
                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $row['discussionid'] ?></td>
                                                                        <td><?php echo $row['discussiondate'] ?></td>
                                                                        <td>
                                                                            <div class="<?php echo $row['discussionstatus'] ?>" onclick="editDiscussion(this.getAttribute('data-EditId'))" data-EditId='{"discussionid" : "<?php echo $row['discussionid'] ?>","discussionstatus" : "<?php echo $row['discussionstatus'] ?>"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                                                                <?php echo $row['discussionstatus'] ?>
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $row['discussionername'] ?></td>
                                                                        <td><?php echo $row['discussioneremail'] ?></td>
                                                                        <td><?php echo $row['discussionerphone'] ?></td>
                                                                        <td><?php echo $row['discussionercountry'] ?></td>
                                                                        <td><?php echo $row['discussionercompanyname'] ?></td>
                                                                        <td><?php echo $row['discussionercompanytype'] ?></td>
                                                                        <td><?php echo $row['discussionerprojectname'] ?></td>
                                                                        <td><?php echo $row['discussionerprojecttype'] ?></td>
                                                                        <td><?php echo $row['discussionshortdesc'] ?></td>
                                                                        <td style="padding: 19px;">
                                                                            <div class="d-flex justify-content-center">
                                                                                <button class="btn btn-danger deleteDiscussion" onclick="deleteDiscussion(this)" data-delId='{"id":"<?php echo $row['discussionid'] ?>","discussionername": "<?php echo $row['discussionername'] ?>"}'><i class="fas fa-trash-alt"></i></button>
                                                                                <a class="btn btn-primary ml-2" href="mailto:<?php echo $row['discussioneremail'] ?>"><i class="fas fa-envelope"></i></a>
                                                                                <a class="btn btn-success ml-2" href="tel:<?php echo $row['discussionerphone'] ?>"><i class="fas fa-phone-alt"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                        <?php
                                                                }
                                                            } else {
                                                                echo '<div id="status">No Discussions!</div>';
                                                            }
                                                        } else {
                                                            die('Discussion Connection Failiure' + mysqli_error($selectDiscussionAction));
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="users">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-danger">
                                                <i class="ti-user"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit"><?php echo getRownumber('users') ?></div>
                                                <div class="stat-text">Users Added</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="discussions">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-primary">
                                                <i class="fas fa-comments"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit"><?php echo getRownumber('discussion') ?></div>
                                                <div class="stat-text">New Discussions</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="qoutations">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-warning">
                                                <i class="ti-download"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit"><?php echo getRownumber('orders') ?></div>
                                                <div class="stat-text">New Qoutations</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="callbacks">
                                    <div class="card p-0">
                                        <div class="stat-widget-three">
                                            <div class="stat-icon bg-danger">
                                                <i class="fas fa-phone fa-flip-horizontal"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit"><?php echo getRownumber('callbacks') ?></div>
                                                <div class="stat-text">New Callbacks</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-md-12">
                        <div class="card alert">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="stat-icon">
                                        <div class="card-option drop-menu pull-right"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="users"><i class="ti-download m-r-10"></i> All Users</a></li>
                                                <li><a href="new-user"><i class="fa fa-plus"></i> Add new user</a></li>
                                                <li><a href="home"><i class="ti-loop"></i>Reload</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 m-t-30 m-b-30 text-white">
                                    <h4>Latest Users Added</h4>
                                </div>
                                <div class="col-md-12">
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
                                            <tbody>
                                                <?php
                                                $mysqliRead = 'SELECT * FROM users JOIN userrole ON userrole.userRoleId = users.userRole ORDER BY userId DESC LIMIT 4';
                                                $queryStatus = mysqli_query($conn, $mysqliRead);
                                                $rows = [];
                                                if ($queryStatus) {
                                                    if (mysqli_num_rows($queryStatus) > 0) {
                                                        while ($row = mysqli_fetch_assoc($queryStatus)) {
                                                ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?php echo $row['userImg'] ?>" target="_blank">
                                                                        <img class="userPicTable" src="<?php echo $row['userImg'] ?>" />
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userFullName'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userEmail'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userPhone'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userGender'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userDOB'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userRoleName'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['userAddress'] ?>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <button class="btn btn-danger deleteUser" onclick="deleteUser(this)" data-delId='{"id":"<?php echo $row['userId'] ?>","name": "<?php echo $row['userFullName'] ?>"}'><i class="fas fa-trash-alt"></i></button>
                                                                        <button class="btn btn-success ml-3 editUser" onclick="editUser(this)" data-EditId='{"userDOB" : "<?php echo $row['userDOB'] ?>","userEmail" : "<?php echo $row['userEmail'] ?>","userFullName" : "<?php echo $row['userFullName'] ?>","userGender" : "<?php echo $row['userGender'] ?>","userAddress" : "<?php echo preg_replace("/\r|\n/", "", $row['userAddress']) ?>","userId" : "<?php echo $row['userId'] ?>","userImg" : "<?php echo $row['userImg'] ?>","userName" : "<?php echo $row['userName'] ?>","userPassword" : "<?php echo $row['userPassword'] ?>","userPhone" : "<?php echo $row['userPhone'] ?>","userRole" : "<?php echo $row['userRole'] ?>","userRoleName" : "<?php echo $row['userRoleName'] ?>"}'><i class="fas fa-user-edit"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                <?php
                                                        }
                                                    } else {
                                                        echo '<div id="status">No Users Currently</div>';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>