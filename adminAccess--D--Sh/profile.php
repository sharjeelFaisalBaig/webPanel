<?php include('header.php') ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card alert">
                            <div class="card-body">
                                <div class="user-profile">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="user-photo m-b-30">
                                                <img class="img-responsive" src="<?php echo $_SESSION['userImg'] ?>" alt="" style="max-width: 27rem;min-width: 28rem;" />
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="user-profile-name"><?php echo $_SESSION['userFullName']; ?></div>
                                            <div class="user-job-title"><?php echo ucfirst($_SESSION['userRole']) ?></div>
                                            <div class="user-send-message"><a class="btn btn-primary btn-addon" href="mailto:<?php echo $_SESSION['userEmail'] ?>" type="button"><i class="ti-email"></i>Send Email</a></div>
                                            <div class="custom-tab user-profile-tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="1">
                                                        <div class="contact-information">
                                                            <div class="phone-content">
                                                                <span class="contact-title">Phone:</span>
                                                                <span class="phone-number"><?php echo $_SESSION['userPhone'] ?></span>
                                                            </div>
                                                            <div class="address-content">
                                                                <span class="contact-title">ID:</span>
                                                                <span class="mail-address"><?php echo $_SESSION['userId'] ?></span>
                                                            </div>
                                                            <div class="address-content">
                                                                <span class="contact-title">Address:</span>
                                                                <span class="mail-address"><?php echo $_SESSION['userAddress'] ?></span>
                                                            </div>
                                                            <div class="email-content">
                                                                <span class="contact-title">Email:</span>
                                                                <span class="contact-email"><?php echo $_SESSION['userEmail'] ?></span>
                                                            </div>
                                                            <div class="skype-content">
                                                                <span class="contact-title">Role:</span>
                                                                <span class="contact-skype"><?php echo ucfirst($_SESSION['userRole']) ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="basic-information">
                                                            <div class="birthday-content">
                                                                <span class="contact-title">Birthday:</span>
                                                                <span class="birth-date"><?php echo $_SESSION['userDOB'] ?> </span>
                                                            </div>
                                                            <div class="gender-content">
                                                                <span class="contact-title">Gender:</span>
                                                                <span class="gender"><?php echo ucfirst($_SESSION['userGender']) ?></span>
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
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>