<!-- Delete User -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document" style="max-width: 33%;overflow: hidden;">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-danger" style="font-weight: 500;font-family: fantasy;"><i class="fas fa-exclamation-triangle fs-2x text-warning"></i>&nbsp;&nbsp;Are you sure to delete <span class="insertName"></span></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger yesDel insertId" data-id="">Delete</button>
                <button type="button" class="btn btn-dark cancelDel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit User -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document" style="max-width: 33%;overflow: hidden;color:black;">
        <div class="modal-content">
            <form method="POST" class="editUser" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <h1 class="col-md-12 text-center text-dark" style="margin-bottom:12px;font-size: 33px;font-weight: 900;">Edit User</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Name</b></label>
                                <input type="hidden" name="id">
                                <input type="text" name="name" class="form-control" style="color:black !important;" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block"><b>Phone Number</b></label>
                                <input type="number" name="phoneNumber" class="form-control" style="color:black !important;" placeholder="+92 3229 288 113" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block"><b>Email</b></label>
                                <input type="email" name="email" class="form-control" style="color:black !important;" placeholder="abc@xyz.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group img-cont">
                                <label class="d-block"><b>Picture</b></label>
                                <input type="file" name="userPic" class="form-control" style="color:black !important;" required>
                            </div>
                        </div>
                        <a href="#" class="editImgPreviewAnchor" target="_blank" download>
                            <div class="col-md-12 border border-dark mb-3 selectCurrImag">
                                <h5 class="text-danger"><b>Image Preview</b></h5>
                                <div class="d-flex justify-content-center">
                                    <img src="" class="editImgPreview" />
                                </div>
                            </div>
                        </a>
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
                                <input type="date" name="dob" class="form-control" style="color:black !important;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block"><b>Address</b></label>
                                <textarea name="address" class="form-control" style="color:black !important;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger yesEdit insertId goQoutedlate" data-id="">Update</button>
                    <button type="button" class="btn btn-dark cancelEdit" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Discount -->

<!-- Edit User -->
<div class="modal fade" id="editBanner" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document" style="max-width: 33%;overflow: hidden;color:black;">
        <div class="modal-content">
            <form method="POST" class="editBanner" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <h1 class="col-md-12 text-center text-dark" style="margin-bottom:12px;font-size: 33px;font-weight: 900;">Banners Managment</h1>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Banner Title</b></label>
                                <input type="text" name="name" class="form-control" style="color:black !important;" placeholder="Full Name" required>
                            </div>
                        </div>
                        <a href="#" class="editImgPreviewAnchor" target="_blank" download>
                            <div class="col-md-12 border border-dark mb-3 selectCurrImag">
                                <h5 class="text-danger"><b>Image Preview</b></h5>
                                <div class="d-flex justify-content-center">
                                    <img src="" class="editImgPreview" />
                                </div>
                            </div>
                        </a>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Banner Timer</b></label>
                                <input type="text" name="name" class="form-control" style="color:black !important;" placeholder="Full Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-id="">Update</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit order status -->
<div class="modal fade" id="updateStatus" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document" style="max-width: 33%;overflow: hidden;">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-dark" style="font-weight: 500;font-family: fantasy;"><i class="fas fa-edit fs-2x text-success"></i>&nbsp;&nbsp;Update Qoutation From <span class="insertOrderName"></span></h2>
                <br>
                <select id="statusChangeHandle" style="color: black !important;" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="qouted">Qouted</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success goQouted" onclick="editYesQouted()">Update</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal" data-update="false">Cancel</button>
            </div>
        </div>
    </div>
</div>



<!-- edit callback status -->
<div class="modal fade" id="updateCallback" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document" style="max-width: 33%;overflow: hidden;">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-dark" style="font-weight: 500;font-family: fantasy;"><i class="fas fa-edit fs-2x text-success"></i>&nbsp;&nbsp;Update Callback Status <span class="insertBookerName"></span></h2>
                <br>
                <select id="statusChangeCallback" style="color: black !important;" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="attended">Attended</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success goQouted" onclick="editYes()">Update</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal" data-update="false">Cancel</button>
            </div>
        </div>
    </div>
</div>



<!-- edit discussion status -->
<div class="modal fade" id="updateDiscussion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document" style="max-width: 33%;overflow: hidden;">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-dark" style="font-weight: 500;font-family: fantasy;"><i class="fas fa-edit fs-2x text-success"></i>&nbsp;&nbsp;Update Discussion Status ID: <span class="insertDiscussionerName"></span></h2>
                <br>
                <select id="statusChangeDiscussion" style="color: black !important;" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="discussed">Discussed</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success goQouted" onclick="editYesDiscussion()">Update</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal" data-update="false">Cancel</button>
            </div>
        </div>
    </div>
</div>