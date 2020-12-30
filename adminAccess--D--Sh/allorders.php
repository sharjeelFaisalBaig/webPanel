<?php include('header.php') ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Orders</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="home">Dashboard</a></li>
                                <li class="active">All Orders</li>
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
                                <h4>All Orders </h4>
                                <div class="search-action">
                                    <div class="search-type dib">
                                        <button class="btn btn-danger m-0 mr-3" onclick="delAll(true)"><i class="fas fa-trash-alt mr-3"></i> Delete All</button>
                                    </div>
                                    <div class="search-type dib">
                                    <input class="form-control input-rounded" onkeyup="searchIntegration(this,'qoutation')" placeholder="search" type="text">
                                    </div>
                                </div>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="javascript:;" class="reloadOrders"><i class="ti-loop"></i> Update data</a></li>
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
                                                <th>Qoutation id</th>
                                                <th>Requestor Name</th>
                                                <th>Requestor Email</th>
                                                <th>Requestor Phone No.</th>
                                                <th>Qoutation Date</th>
                                                <th>Qoutation Status</th>
                                                <th>Qoutation Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="appendOrdersData">

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