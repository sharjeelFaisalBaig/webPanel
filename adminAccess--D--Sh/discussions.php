<?php include('header.php') ?>
<style>
    .nowrapcol th {
        white-space: nowrap !important;
        padding: 20px !important;
    }
</style>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Discussions</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="home">Dashboard</a></li>
                                <li class="active">All Discussions</li>
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
                        <div class="card alert">
                            <div class="card-header pr">
                                <h4>All Discussions </h4>
                                <div class="search-action">
                                    <div class="search-type dib">
                                        <button class="btn btn-danger m-0 mr-3" onclick="delAllDiscussions(true)"><i class="fas fa-trash-alt mr-3"></i> Delete All</button>
                                    </div>
                                    <div class="search-type dib">
                                        <input class="form-control input-rounded" onkeyup="searchIntegration(this,'discussion')" placeholder="search" type="text">
                                    </div>
                                </div>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="javascript:;" class="reloadDiscussion"><i class="ti-loop"></i> Update data</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr class="nowrapcol">
                                                <th>Discussion Id</th>
                                                <th>Discussion Date</th>
                                                <th>Discussion Status</th>
                                                <th>Discussioner Name</th>
                                                <th>Discussioner Email</th>
                                                <th>Discussioner Phone number</th>
                                                <th>Discussioner Country</th>
                                                <th>Discussioner Company name</th>
                                                <th>Discussioner Company type</th>
                                                <th>Discussioner Company Location</th>
                                                <th>Discussion Granted (%)</th>
                                                <th>Discussioner Project name</th>
                                                <th>Discussioner Project type</th>
                                                <th>Discussioner Project Budget</th>
                                                <th>Discussion Short Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="appendDiscussionData">

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