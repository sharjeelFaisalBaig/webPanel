<script src="assets/js/ajax.js"></script>
<script>
    // Users Api Integration
    $(document).ready(() => {
        const deleteApi = 'api/deleteApi.php';
        const userUpdateApi = 'api/updateUserApi.php';
        $('.seePass').on('click', () => {
            let seePassBtn = $('.seePass');
            seePassBtn.toggleClass('fa-eye');
            seePassBtn.toggleClass('fa-eye-slash');
            if (seePassBtn.next('input').attr('type') == "password") {
                seePassBtn.next('input').attr('type', "text")
            } else if (seePassBtn.next('input').attr('type') == "text") {
                seePassBtn.next('input').attr('type', "password")
            }
        })


        $('.loginForm').on('submit', (e) => {
            e.preventDefault();
            if (!($('#username').val() == '' || $('#password').val() == '')) {
                var usernameSent = $('#username').val();
                var passwordSent = $('#password').val();
                var credentials = JSON.stringify({
                    username: usernameSent,
                    password: passwordSent
                });
                $.ajax({
                    url: 'api/loginApi.php',
                    method: 'POST',
                    data: credentials,
                    success: (Getdata) => {
                        if (Getdata.status == 'failure') {
                            if (Getdata.code == "002") {
                                $('.response').removeClass('d-none')
                                $('.response').addClass('failiure')
                                $('.response').html('Password or Username not matched !')
                                setTimeout(() => {
                                    $('.response').addClass('d-none')
                                }, 2000)
                            } else if (Getdata.code == "004") {
                                $('.response').removeClass('d-none')
                                $('.response').addClass('failiure')
                                $('.response').html('Values not reached API not running !')
                            }
                        } else {
                            window.location.href = 'index.php'
                        }
                    },
                    error: (e) => {
                        alert('Error Handling In Login')
                        console.log('Delete User Error: ', e);
                    }
                })
            } else {
                $('.response').removeClass('d-none')
                $('.response').addClass('failiure')
                $('.response').html('Please Fill The Required Fields !')
                setTimeout(() => {
                    $('.response').addClass('d-none')
                }, 2000)
            }
        })

        // login complete

        $('.addUser').on('submit', e => {
            e.preventDefault();
            let getForm = new FormData(e.target);
            $.ajax({
                url: 'api/addUserHandler.php',
                method: 'POST',
                data: getForm,
                contentType: false,
                processData: false,
                success: e => {
                    let jsObj = JSON.parse(e);
                    for (let i = 0; i < jsObj.length; i++) {
                        let objCurrent = jsObj[i];
                        if (objCurrent.status == 'success') {
                            $('.responseCreateUser').removeClass('d-none');
                            $('.responseCreateUser').removeClass('failiure');
                            $('.responseCreateUser').addClass('passed');
                            $('.responseCreateUser').html('User Created Successfully');
                            $('.addUser').trigger('reset')
                        } else {
                            $('.responseCreateUser').removeClass('d-none');
                            $('.responseCreateUser').removeClass('passed');
                            $('.responseCreateUser').addClass('failiure');
                            $('.responseCreateUser').html(objCurrent.file_error);
                        }
                    }
                },
                error: e => {
                    console.log('Delete User Error: ', e);
                }
            })
        })
        // logout
        $('.logout').on('click', () => {
            $('#logoutBtn').trigger('click');
        })

        // seeUsers
        <?php
        if ($_SESSION['userRoleNum'] >= 3) {
        ?>
            loadUsers = () => {
                $('#appendUsersData').html('')
                $.ajax({
                    url: 'api/readUsersApi.php',
                    method: 'get',
                    type: 'get',
                    success: (data) => {
                        let objJson = JSON.parse(data);
                        if (Array.isArray(objJson)) {
                            $('#appendUsersData').html(' ');
                            $.each(objJson, (key, val) => {
                                $('#appendUsersData').append(`
                                <tr>
                                    <td>
                                        <a href="${val.userImg}" target="_blank">
                                            <img class="userPicTable" src="${val.userImg}" />
                                        </a>
                                    </td>
                                    <td>
                                        ${val.userFullName}
                                    </td>
                                    <td>
                                        ${val.userEmail}
                                    </td>
                                    <td>
                                        ${val.userPhone}
                                    </td>
                                    <td>
                                        ${val.userGender}
                                    </td>
                                    <td>
                                        ${val.userDOB}
                                    </td>
                                    <td>
                                        ${val.userRoleName}
                                    </td>
                                    <td>
                                        ${val.userAddress}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-danger deleteUser" onclick="deleteUser(this)" data-delId='{"id":"${val.userId}","name": "${val.userFullName}"}'><i class="fas fa-trash-alt"></i></button> 
                                            <button class="btn btn-success ml-3 editUser" onclick="editUser(this)" data-EditId='{"userDOB" : "${val.userDOB}","userEmail" : "${val.userEmail}","userFullName" : "${val.userFullName}","userGender" : "${val.userGender}","userAddress" : "${val.userAddress.replace(/(\r\n|\n|\r)/gm,"")}","userId" : "${val.userId}","userImg" : "${val.userImg}","userName" : "${val.userName}","userPassword" : "${val.userPassword}","userPhone" : "${val.userPhone}","userRole" : "${val.userRole}","userRoleName" : "${val.userRoleName}"}'><i class="fas fa-user-edit"></i></button>
                                            <a class="btn btn-primary ml-2" href="mailto:${val.userEmail}"><i class="fas fa-envelope"></i></a> 
                                            <a class="btn btn-success ml-2" href="tel:${val.userPhone}"><i class="fas fa-phone-alt"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                            `)
                            })
                        } else {
                            $('#appendUsersData').html(' ');
                            $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${objJson.msg}</div> `)
                        }
                    },
                    error: (err) => {
                        console.log('Delete User Error: ', err);
                    }
                })
            }
        <?php
        } else {
        ?>
            loadUsers = () => {
                $('#appendUsersData').html('')
                $.ajax({
                    url: 'api/readUsersApi.php',
                    method: 'get',
                    type: 'get',
                    success: (data) => {
                        let objJson = JSON.parse(data);
                        if (Array.isArray(objJson)) {
                            $('#appendUsersData').html(' ');
                            $.each(objJson, (key, val) => {
                                $('#appendUsersData').append(`
                            <tr>
                                <td>
                                    <a href="${val.userImg}" target="_blank">
                                        <img class="userPicTable" src="${val.userImg}" />
                                    </a>
                                </td>
                                <td>
                                    ${val.userFullName}
                                </td>
                                <td>
                                    ${val.userEmail}
                                </td>
                                <td>
                                    ${val.userPhone}
                                </td>
                                <td>
                                    ${val.userGender}
                                </td>
                                <td>
                                    ${val.userDOB}
                                </td>
                                <td>
                                    ${val.userRoleName}
                                </td>
                                <td>
                                    ${val.userAddress}
                                </td>
                            </tr>
                        `)
                            })
                        } else {
                            $('#appendUsersData').html(' ');
                            $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${objJson.msg}</div> `)
                        }
                    },
                    error: (err) => {
                        console.log('Delete User Error: ', err);
                    }
                })
            }
        <?php } ?>
        loadUsers();
        $('.reloadUsers').on('click', () => {
            loadUsers();
        });
        // deleteUser
        deleteUser = (e) => {
            let deleteobj = JSON.parse(e.getAttribute('data-delId'));
            $('.insertName').html(deleteobj.name);
            $('.insertId').attr('data-id', deleteobj.id);
            $('#deleteUser').modal('show');
            $(`.yesDel[data-id="${deleteobj.id}"]`).on('click', (e) => {
                $.ajax({
                    url: deleteApi,
                    method: 'POST',
                    type: 'POST',
                    data: JSON.stringify({
                        deleteId: deleteobj.id
                    }),
                    success: res => {
                        if (res.status == 'deleted') {
                            $('#deleteUser').modal('hide');
                            swal(`${deleteobj.name} Deleted Succesfully!`, "User Deleted Sucessfully!", "success");
                            loadUsers();
                        }
                    },
                    error: err => {
                        console.log('Delete User Error: ', err);
                    }
                })
            })
        }

        // Edit User
        editUser = e => {
            let userData = JSON.parse(`${e.getAttribute('data-editid')}`)
            $('#editUser').modal('show');
            $('#editUser form input[name="name"]').val(userData.userFullName);
            $('#editUser form input[name="phoneNumber"]').val(userData.userPhone);
            $('#editUser form input[name="id"]').val(userData.userId);
            $('#editUser form input[name="email"]').val(userData.userEmail);
            $('.selectCurrImag').on('click', () => {
                $('.selectCurrImag h5').removeClass('text-danger');
                $('.selectCurrImag h5').addClass('text-warning');
                $('.selectCurrImag h5').html(`<b>Image Downloaded Drag It to Choose File Button! (For Security Purpose)</b>`);
            })
            $('.editImgPreview').attr('src', `${userData.userImg}`);
            $('.editImgPreviewAnchor').attr('href', `${userData.userImg}`);
            // Gender Value Mapping
            $('#editUser form input[name="gender"]').removeAttr('checked');
            $('#editUser form input[name="gender"][value="' + userData.userGender + '"]').trigger('click');
            // Role Value Mapping
            $('#editUser form input[name="role"]').removeAttr('checked');
            $('#editUser form input[name="role"][value="' + userData.userRole + '"]').trigger('click');
            // DOB
            $('#editUser form input[name="dob"]').val(userData.userDOB);
            //  address 
            $('#editUser form textarea[name="address"]').val(userData.userAddress);

            $('.editUser').on('submit', e => {
                e.preventDefault();
                let getForm = new FormData(e.target);
                $.ajax({
                    url: userUpdateApi,
                    method: 'POST',
                    data: getForm,
                    contentType: false,
                    processData: false,
                    success: e => {
                        let jsObj = JSON.parse(e);
                        let objCurrent = jsObj;
                        if (objCurrent[0].status == 'success') {
                            swal(`User Updated!`, `User updated successfuly`, "success");
                            $('#editUser').modal('hide');
                            $('#editUser form').trigger('reset')
                            loadUsers();
                        } else {
                            for (let i = 0; i < objCurrent.length; i++) {
                                if (objCurrent[i].file_error) {
                                    swal(`File Error`, `${objCurrent[i].file_error}`, "error");
                                } else {
                                    swal(`File Error`, `Please Select Valid Image`, "error");
                                }
                            }
                        }
                    },
                    error: e => {
                        swal(`API Error`, `Check Console, press F12`, "error");
                        console.log('Edit User Error: ', e);
                    }
                })
            })
        }



        // Orders Api Integration

        const readOrderApi = `api/readOrders.php`;
        const deleteOrderApi = `api/deleteOrder.php`;
        const deleteAllOrderApi = `api/deleteAllOrder.php`;
        const editOrderApi = `api/editOrder.php`;
        // readOrders
        const readOrder = () => {
            $.ajax({
                url: readOrderApi,
                method: 'GET',
                success: successToken => {
                    if (Array.isArray(successToken)) {
                        $('#appendOrdersData').html('');
                        $.each(successToken, (key, val) => {
                            $('#appendOrdersData').append(`
                            <tr>
                                <td>
                                    ${val.orderid}
                                </td>
                                <td>
                                    ${val.orderername}
                                </td>
                                <td>
                                    ${val.ordereremail}
                                </td>
                                <td>
                                    ${val.ordererphone}
                                </td>
                                <td>
                                    ${val.orderdate}
                                </td>
                                <td>
                                    <div class="changeStatus ${val.orderstatus}"  onclick="editOrder(this)" data-EditId='{"orderId" : "${val.orderid}","ordererName" : "${val.orderername}","ordereremail" : "${val.ordereremail}","orderdate" : "${val.orderdate}","orderstatus" : "${val.orderstatus}","ordertypename" : "${val.ordertypename}"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                        ${val.orderstatus}
                                    </div>
                                </td>
                                <td>
                                    ${val.ordertype}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-danger deleteOrder" onclick="deleteOrder(this)" data-delId='{"id":"${val.orderid}","ordererName": "${val.orderername}"}'><i class="fas fa-trash-alt"></i></button> 
                                        <button class="btn btn-success ml-3 editOrder" onclick="editOrder(this)" data-EditId='{"orderId" : "${val.orderid}","ordererName" : "${val.orderername}","ordereremail" : "${val.ordereremail}","orderdate" : "${val.orderdate}","orderstatus" : "${val.orderstatus}","ordertypename" : "${val.ordertypename}"}'><i class="fas fa-edit"></i></button>
                                        <a class="btn btn-primary ml-2" href="mailto:${val.ordereremail}"><i class="fas fa-envelope"></i></a> 
                                    </div>
                                </td>
                            </tr>
                        `)
                        })
                    } else {
                        $('#appendOrdersData').html('');
                        if (successToken.status == 'success') {
                            $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${successToken.message}</div> `)
                        }
                    }
                },
                error: err => {
                    swal(`System Failiure`, "Sorry For Our System Failiure!", "error");
                    console.log(err)
                }
            })
        }
        readOrder();
        $('.reloadOrders').on('click', () => {
            readOrder();
        })

        // Delete All Orders
        delAll = (boolIt) => {
            if (boolIt) {
                swal({
                        title: "Are you sure?",
                        text: `you want to delete All Qoutations`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: deleteAllOrderApi,
                                method: 'POST',
                                type: 'POST',
                                data: JSON.stringify({
                                    bool: 'del'
                                }),
                                success: successToken => {
                                    if (successToken.status == 'deleted') {
                                        swal(`Qoutations Deleted!`, `All Qoutations Deleted Sucessfully`, "success");
                                        readOrder();
                                    } else {
                                        swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                        console.log('Delete Qoutations Api Failiure =>', successToken.err)
                                    }
                                },
                                error: err => {
                                    swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                    console.log('error =>', err);
                                }
                            })
                        } else {
                            swal("Your Orders are Safe!");
                        }
                    });
            }
        }
        //Delete Order
        deleteOrder = (e) => {
            let deleteOrderInfo = JSON.parse(e.getAttribute('data-delid'));
            swal({
                    title: "Are you sure?",
                    text: `you want to delete Qoutation from ${deleteOrderInfo.ordererName} of Id: ${deleteOrderInfo.id}`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: deleteOrderApi,
                            method: 'POST',
                            type: 'POST',
                            data: JSON.stringify(deleteOrderInfo),
                            success: successToken => {
                                if (successToken.status == 'deleted') {
                                    swal(`Qoutation Deleted!`, `Qoutation Deleted Sucessfully`, "success");
                                    readOrder();
                                } else {
                                    swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                    console.log('Delete Qoutation Api Failiure =>', successToken.err)
                                }
                            },
                            error: err => {
                                swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                console.log('error =>', err);
                            }
                        })
                    } else {
                        swal("Your Qoutation Is Safe!");
                    }
                });
        }
        // editOrder
        editOrder = e => {
            let editInfo = JSON.parse(e.getAttribute('data-EditId'));
            let orderStatus = editInfo.orderstatus;
            $('#updateStatus').modal('show');
            $('.insertOrderName').html(editInfo.ordererName);
            let updateOptions = document.querySelector('#statusChangeHandle').options;
            for (let i = 0; i < updateOptions.length; i++) {
                if (updateOptions[i].value == orderStatus) {
                    for (let o = 0; o < updateOptions.length; o++) {
                        updateOptions[o].removeAttribute('selected')
                    }
                    updateOptions[i].setAttribute('selected', 'selected')
                }
            }
            editYesQouted = () => {
                $.ajax({
                    url: editOrderApi,
                    method: 'POST',
                    type: 'POST',
                    data: JSON.stringify({
                        editId: editInfo.orderId,
                        editedStatus: $('#statusChangeHandle').val()
                    }),
                    success: successToken => {
                        if (successToken.status == 'success') {
                            swal(`Order Status Updated!`, `${successToken.message}`, "success");
                            $('#updateStatus').modal('hide');
                            readOrder();
                        } else {
                            swal(`Updation Failed!`, `${successToken.message}`, "error");
                            $('#updateStatus').modal('hide');
                            readOrder();
                        }
                    },
                    error: err => {
                        swal(`Sorry for inconvenience!`, `${successToken.message}`, "error");
                        console.log('Edit fail =>', err);
                    }
                })
            }
            $('#updateStatus button[data-update="false"]').on('click', () => {
                $('#updateStatus').modal('hide');
            })
        }


        // Callbacks Api Integration

        const readCallbackApi = 'api/readCallbacks.php';
        const deleteCallbackApi = 'api/deleteCallback.php';
        const deleteCallbacksApi = 'api/deleteCallbacks.php';
        const editCallbackApi = 'api/editCallback.php';
        const readCallbacks = () => {
            $.ajax({
                url: readCallbackApi,
                method: 'GET',
                success: successToken => {
                    if (Array.isArray(successToken)) {
                        $('#appendCallbackData').html('');
                        $.each(successToken, (key, val) => {
                            $('#appendCallbackData').append(`
                                <tr>
                                    <td>${val.callbackid}</td>
                                    <td>${val.bookingdate}</td>
                                    <td>
                                        <div class="${val.bookingstatus}"  onclick="editCallback(this.getAttribute('data-EditId'))" data-EditId='{"callbackId" : "${val.callbackid}","bookerName" : "${val.bookername}","bookerEmail" : "${val.bookeremail}","callbackDate" : "${val.bookingdate}","callbackStatus" : "${val.bookingstatus}"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                            ${val.bookingstatus}
                                        </div>
                                    </td>
                                    <td>${val.bookername}</td>
                                    <td>${val.bookerphone}</td>
                                    <td>${val.bookeremail}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-danger deleteCallback" onclick="deleteCallback(this)" data-delId='{"id":"${val.callbackid}","bookername": "${val.bookername}"}'><i class="fas fa-trash-alt"></i></button> 
                                            <a class="btn btn-primary ml-2" href="mailto:${val.bookeremail}"><i class="fas fa-envelope"></i></a> 
                                            <a class="btn btn-success ml-2" href="tel:${val.bookerphone}"><i class="fas fa-phone-alt"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                            `);
                        })
                    } else {
                        $('#appendCallbackData').html('');
                        $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${successToken.message}</div> `)
                    }
                },
                error: err => {
                    console.log(err)
                }
            })
        }
        $('.updateCallback').on('click', () => {
            readCallbacks();
        })
        readCallbacks();

        // status Update 
        editCallback = e => {
            let editInfo = JSON.parse(e);
            let callbackStatus = editInfo.callbackStatus;
            $('#updateCallback').modal('show');
            $('.insertBookerName').html(editInfo.ordererName);
            let updateOptions = document.querySelector('#statusChangeCallback').options;
            for (let i = 0; i < updateOptions.length; i++) {
                if (updateOptions[i].value == callbackStatus) {
                    for (let o = 0; o < updateOptions.length; o++) {
                        updateOptions[o].removeAttribute('selected')
                    }
                    updateOptions[i].setAttribute('selected', 'selected')
                }
            }
            editYes = () => {
                console.log(`Im after update click ${editInfo.callbackId}`)
                $.ajax({
                    url: editCallbackApi,
                    method: 'POST',
                    type: 'POST',
                    data: JSON.stringify({
                        editId: editInfo.callbackId,
                        editedStatus: $('#statusChangeCallback').val()
                    }),
                    success: successToken => {
                        if (successToken.status == 'success') {
                            swal(`Callback Status Updated!`, `${successToken.message}`, "success");
                            $('#updateCallback').modal('hide');
                            readCallbacks();
                        } else {
                            swal(`Updation Failed!`, `${successToken.message}`, "error");
                            $('#updateCallback').modal('hide');
                            readCallbacks();
                        }
                    },
                    error: err => {
                        swal(`Sorry for inconvenience!`, `${successToken.message}`, "error");
                        console.log('Edit fail =>', err);
                    }
                })
            }
            $('#updateCallback button[data-update="false"]').on('click', () => {
                $('#updateCallback').modal('hide');
            })
        }
        // delete callback
        deleteCallback = e => {
            let deleteCallbackInfo = JSON.parse(e.getAttribute('data-delId'));
            swal({
                    title: "Are you sure?",
                    text: `you want to delete Callback from ${deleteCallbackInfo.bookername} of Id: ${deleteCallbackInfo.id}`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: deleteCallbackApi,
                            method: 'POST',
                            type: 'POST',
                            data: JSON.stringify(deleteCallbackInfo),
                            success: successToken => {
                                if (successToken.status == 'deleted') {
                                    swal(`Callback Deleted!`, `Callback Deleted Sucessfully`, "success");
                                    readCallbacks();
                                } else {
                                    swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                    console.log('Delete Callback Api Failiure =>', successToken.err)
                                }
                            },
                            error: err => {
                                swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                console.log('error =>', err);
                            }
                        })
                    } else {
                        swal("Your Callback Is Safe!");
                    }
                });
        }
        // delete All callbacks
        delAllCallbacks = (boolIt) => {
            if (boolIt) {
                swal({
                        title: "Are you sure?",
                        text: `you want to delete All Callbacks`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: deleteCallbacksApi,
                                method: 'POST',
                                type: 'POST',
                                data: JSON.stringify({
                                    bool: 'del'
                                }),
                                success: successToken => {
                                    if (successToken.status == 'deleted') {
                                        swal(`Callbacks Deleted!`, `All Orders Callbacks Sucessfully`, "success");
                                        readCallbacks();
                                    } else {
                                        swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                        console.log('Delete Callbacks Api Failiure =>', successToken.err)
                                    }
                                },
                                error: err => {
                                    swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                    console.log('error =>', err);
                                }
                            })
                        } else {
                            swal("Your Callbacks are Safe!");
                        }
                    });
            }
        }


        // Discussions Api Integration

        const readDiscussion = `api/readDiscussion.php`;
        const deleteDiscussionApi = `api/deleteDiscussion.php`;
        const deleteDiscussionsApi = `api/deleteDiscussions.php`;
        const editDiscussionsApi = `api/editDiscussionsApi.php`;
        const loadDiscussion = () => {
            $.ajax({
                url: readDiscussion,
                method: 'GET',
                type: 'GET',
                success: successToken => {
                    if (Array.isArray(successToken)) {
                        $('#appendDiscussionData').html('');
                        $.each(successToken, (key, val) => {
                            $('#appendDiscussionData').append(`
                            <tr>
                                <td>${val.discussionid}</td>
                                <td>${val.discussiondate}</td>
                                <td>
                                    <div class="${val.discussionstatus}"  onclick="editDiscussion(this.getAttribute('data-EditId'))" data-EditId='{"discussionid" : "${val.discussionid}","discussionstatus" : "${val.discussionstatus}"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                        ${val.discussionstatus}
                                    </div>
                                </td>
                                <td>${val.discussionername}</td>
                                <td>${val.discussioneremail}</td>
                                <td>${val.discussionerphone}</td>
                                <td>${val.discussionercountry}</td>
                                <td>${val.discussionercompanyname}</td>
                                <td>${val.discussionercompanytype}</td>
                                <td>${val.discussionercompanylocation}</td>
                                <td>${val.discussiondiscountgranted}% OFF</td>
                                <td>${val.discussionerprojectname}</td>
                                <td>${val.discussionerprojecttype}</td>
                                <td>${val.discussionercompanybudget}</td>
                                <td>${val.discussionshortdesc}</td>
                                <td style="padding: 19px;">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-danger deleteDiscussion" onclick="deleteDiscussion(this)" data-delId='{"id":"${val.discussionid}","discussionername": "${val.discussionername}"}'><i class="fas fa-trash-alt"></i></button> 
                                        <a class="btn btn-primary ml-2" href="mailto:${val.discussioneremail}"><i class="fas fa-envelope"></i></a> 
                                        <a class="btn btn-success ml-2" href="tel:${val.discussionerphone}"><i class="fas fa-phone-alt"></i></a> 
                                    </div>
                                </td>
                            </tr>
                        `)
                        })
                    } else {
                        if (successToken.status == 'success') {
                            $('#appendDiscussionData').html('');
                            $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${successToken.message}</div> `)
                        }
                    }
                },
                error: err => {
                    console.log(err)
                }
            })
        }
        loadDiscussion();
        $('.reloadDiscussion').on('click', () => {
            loadDiscussion();
        })

        // status Update 
        editDiscussion = e => {
            let editInfo = JSON.parse(e);
            let discussionStatus = editInfo.discussionstatus;
            $('#updateDiscussion').modal('show');
            $('.insertDiscussionerName').html(editInfo.discussionid);
            let updateOptions = document.querySelector('#statusChangeDiscussion').options;
            for (let i = 0; i < updateOptions.length; i++) {
                if (updateOptions[i].value == discussionStatus) {
                    for (let o = 0; o < updateOptions.length; o++) {
                        updateOptions[o].removeAttribute('selected')
                    }
                    updateOptions[i].setAttribute('selected', 'selected')
                }
            }
            editYesDiscussion = () => {
                $.ajax({
                    url: editDiscussionsApi,
                    method: 'POST',
                    type: 'POST',
                    data: JSON.stringify({
                        editId: editInfo.discussionid,
                        editedStatus: $('#statusChangeDiscussion').val()
                    }),
                    success: successToken => {
                        if (successToken.status == 'success') {
                            swal(`Discussion Status Updated!`, `${successToken.message}`, "success");
                            $('#updateDiscussion').modal('hide');
                            loadDiscussion();
                        } else {
                            swal(`Updation Failed!`, `${successToken.message}`, "error");
                            $('#updateDiscussion').modal('hide');
                            loadDiscussion();
                        }
                    },
                    error: err => {
                        swal(`Sorry for inconvenience!`, `${successToken.message}`, "error");
                        console.log('Edit fail =>', err);
                    }
                })
            }
            $('#updateDiscussion button[data-update="false"]').on('click', () => {
                $('#updateDiscussion').modal('hide');
            })
        }

        deleteDiscussion = (e) => {
            let deleteInfo = JSON.parse(e.getAttribute('data-delId'));
            swal({
                    title: "Are you sure?",
                    text: `you want to delete Discussion from ${deleteInfo.discussionername} of Id: ${deleteInfo.id}`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: deleteDiscussionApi,
                            method: 'POST',
                            type: 'POST',
                            data: JSON.stringify(deleteInfo),
                            success: successToken => {
                                if (successToken.status == 'deleted') {
                                    swal(`Discussion Deleted!`, `Discussion Deleted Sucessfully`, "success");
                                    loadDiscussion();
                                } else {
                                    swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                    console.log('Delete Discussion Api Failiure =>', successToken.err)
                                }
                            },
                            error: err => {
                                swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                console.log('error =>', err);
                            }
                        })
                    } else {
                        swal("Your Discussion Is Safe!");
                    }
                });
        }

        delAllDiscussions = (boolIt) => {
            if (boolIt) {
                swal({
                        title: "Are you sure?",
                        text: `you want to delete All Discussions`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: deleteDiscussionsApi,
                                method: 'POST',
                                type: 'POST',
                                data: JSON.stringify({
                                    bool: 'del'
                                }),
                                success: successToken => {
                                    if (successToken.status == 'deleted') {
                                        swal(`Discussions Deleted!`, `All Discussions Sucessfully`, "success");
                                        loadDiscussion();
                                    } else {
                                        swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                        console.log('Delete Discussions Api Failiure =>', successToken.err)
                                    }
                                },
                                error: err => {
                                    swal(`System Failiure`, `Our System is in maintainance mode, Contact any Developer press F12.`, "error");
                                    console.log('error =>', err);
                                }
                            })
                        } else {
                            swal("Your Discussions are Safe!");
                        }
                    });
            }
        }


        // Banner Management
        $('.editBanner').on('click', () => {
            $('#editBanner').modal('show')
        })

        // additional related
        if (window.location.href == "http://localhost/website-crm/git/adminAccess--D--Sh/home") {
            $('.goQouted').on('click', () => {
                window.location.reload();
            })

            $('.goQoutedlate').on('click', () => {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            })
        }
    })

    // search Api Integration
    const searchApi = 'api/searchApi.php';
    const searchIntegration = (e, tableName) => {
        let searchTerms = e.value;
        if (tableName == 'callback') {
            let dataTerm = JSON.stringify({
                accesstoken: "searchItX01777299217",
                accessType: "searchCallback",
                searchTerm: searchTerms
            });
            if (searchTerms == '') {
                readCallbacks();
            } else {
                $.ajax({
                    url: searchApi,
                    method: 'POST',
                    type: 'POST',
                    data: dataTerm,
                    success: successToken => {
                        if (Array.isArray(successToken)) {
                            $('#appendCallbackData').html('');
                            $('#status').html('');
                            $.each(successToken, (key, val) => {
                                $('#appendCallbackData').append(`
                                <tr>
                                    <td>${val.callbackid}</td>
                                    <td>${val.bookingdate}</td>
                                    <td>
                                        <div class="${val.bookingstatus}"  onclick="editCallback(this.getAttribute('data-EditId'))" data-EditId='{"callbackId" : "${val.callbackid}","bookerName" : "${val.bookername}","bookerEmail" : "${val.bookeremail}","callbackDate" : "${val.bookingdate}","callbackStatus" : "${val.bookingstatus}"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                            ${val.bookingstatus}
                                        </div>
                                    </td>
                                    <td>${val.bookername}</td>
                                    <td>${val.bookerphone}</td>
                                    <td>${val.bookeremail}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-danger deleteCallback" onclick="deleteCallback(this)" data-delId='{"id":"${val.callbackid}","bookername": "${val.bookername}"}'><i class="fas fa-trash-alt"></i></button> 
                                            <a class="btn btn-primary ml-2" href="mailto:${val.bookeremail}"><i class="fas fa-envelope"></i></a> 
                                            <a class="btn btn-success ml-2" href="tel:${val.bookerphone}"><i class="fas fa-phone-alt"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                            `);
                            })
                        } else {
                            $('#appendCallbackData').html('');
                            $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${successToken.message}</div> `)
                        }
                    },
                    error: err => {
                        console.log(err)
                    }
                })
            }
        } else if (tableName == 'discussion') {
            let dataTerm = JSON.stringify({
                accesstoken: "searchItX01777299217",
                accessType: "searchDiscussion",
                searchTerm: searchTerms
            });
            if (searchTerms == '') {
                $('.reloadDiscussion').trigger('click')
            } else {
                $.ajax({
                    url: searchApi,
                    method: 'POST',
                    type: 'POST',
                    data: dataTerm,
                    success: successToken => {
                        if (Array.isArray(successToken)) {
                            $('#appendDiscussionData').html('');
                            $('#status').html('');
                            $.each(successToken, (key, val) => {
                                $('#appendDiscussionData').append(`
                            <tr>
                                <td>${val.discussionid}</td>
                                <td>${val.discussiondate}</td>
                                <td>
                                    <div class="${val.discussionstatus}"  onclick="editDiscussion(this.getAttribute('data-EditId'))" data-EditId='{"discussionid" : "${val.discussionid}","discussionstatus" : "${val.discussionstatus}"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                        ${val.discussionstatus}
                                    </div>
                                </td>
                                <td>${val.discussionername}</td>
                                <td>${val.discussioneremail}</td>
                                <td>${val.discussionerphone}</td>
                                <td>${val.discussionercountry}</td>
                                <td>${val.discussionercompanyname}</td>
                                <td>${val.discussionercompanytype}</td>
                                <td>${val.discussionercompanylocation}</td>
                                <td>${val.discussiondiscountgranted}% OFF</td>
                                <td>${val.discussionerprojectname}</td>
                                <td>${val.discussionerprojecttype}</td>
                                <td>${val.discussionercompanybudget}</td>
                                <td>${val.discussionshortdesc}</td>
                                <td style="padding: 19px;">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-danger deleteDiscussion" onclick="deleteDiscussion(this)" data-delId='{"id":"${val.discussionid}","discussionername": "${val.discussionername}"}'><i class="fas fa-trash-alt"></i></button> 
                                        <a class="btn btn-primary ml-2" href="mailto:${val.discussioneremail}"><i class="fas fa-envelope"></i></a> 
                                        <a class="btn btn-success ml-2" href="tel:${val.discussionerphone}"><i class="fas fa-phone-alt"></i></a> 
                                    </div>
                                </td>
                            </tr>
                        `)
                            })
                        } else {
                            if (successToken.status == 'success') {
                                $('#appendDiscussionData').html('');
                                $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${successToken.message}</div> `)
                            }
                        }
                    },
                    error: err => {
                        console.log(err)
                    }
                })
            }
        } else if (tableName == 'qoutation') {
            let dataTerm = JSON.stringify({
                accesstoken: "searchItX01777299217",
                accessType: "searchQoutation",
                searchTerm: searchTerms
            });
            if (searchTerms == '') {
                $('.reloadOrders').trigger('click')
            } else {
                $.ajax({
                    url: searchApi,
                    method: 'POST',
                    type: 'POST',
                    data: dataTerm,
                    success: successToken => {
                        if (Array.isArray(successToken)) {
                            $('#appendOrdersData').html('');
                            $('#status').html('')
                            $.each(successToken, (key, val) => {
                                $('#appendOrdersData').append(`
                            <tr>
                                <td>
                                    ${val.orderid}
                                </td>
                                <td>
                                    ${val.orderername}
                                </td>
                                <td>
                                    ${val.ordereremail}
                                </td>
                                <td>
                                    ${val.ordererphone}
                                </td>
                                <td>
                                    ${val.orderdate}
                                </td>
                                <td>
                                    <div class="changeStatus ${val.orderstatus}"  onclick="editOrder(this)" data-EditId='{"orderId" : "${val.orderid}","ordererName" : "${val.orderername}","ordereremail" : "${val.ordereremail}","orderdate" : "${val.orderdate}","orderstatus" : "${val.orderstatus}","ordertypename" : "${val.ordertypename}"}' style="color: black;font-size: 16px;text-transform: capitalize;font-weight: 900;font-family: system-ui;cursor:pointer;">
                                        ${val.orderstatus}
                                    </div>
                                </td>
                                <td>
                                    ${val.ordertype}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-danger deleteOrder" onclick="deleteOrder(this)" data-delId='{"id":"${val.orderid}","ordererName": "${val.orderername}"}'><i class="fas fa-trash-alt"></i></button> 
                                        <button class="btn btn-success ml-3 editOrder" onclick="editOrder(this)" data-EditId='{"orderId" : "${val.orderid}","ordererName" : "${val.orderername}","ordereremail" : "${val.ordereremail}","orderdate" : "${val.orderdate}","orderstatus" : "${val.orderstatus}","ordertypename" : "${val.ordertypename}"}'><i class="fas fa-edit"></i></button>
                                        <a class="btn btn-primary ml-2" href="mailto:${val.ordereremail}"><i class="fas fa-envelope"></i></a> 
                                    </div>
                                </td>
                            </tr>
                        `)
                            })
                        } else {
                            $('#appendOrdersData').html('');
                            if (successToken.status == 'success') {
                                $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${successToken.message}</div> `)
                            }
                        }
                    },
                    error: err => {
                        console.log(err)
                    }
                })
            }
        } else if (tableName == 'users') {
            let dataTerm = JSON.stringify({
                accesstoken: "searchItX01777299217",
                accessType: "searchUser",
                searchTerm: searchTerms
            });
            if (searchTerms == '') {
                $('.reloadUsers').trigger('click')
            } else {
                $.ajax({
                    url: searchApi,
                    method: 'POST',
                    type: 'POST',
                    data: dataTerm,
                    success: successToken => {
                        let objJson = successToken;
                        if (Array.isArray(objJson)) {
                            $('#appendUsersData').html(' ');
                            $('#status').html(' ');
                            $.each(objJson, (key, val) => {
                                $('#appendUsersData').append(`
                                <tr>
                                    <td>
                                        <a href="${val.userImg}" target="_blank">
                                            <img class="userPicTable" src="${val.userImg}" />
                                        </a>
                                    </td>
                                    <td>
                                        ${val.userFullName}
                                    </td>
                                    <td>
                                        ${val.userEmail}
                                    </td>
                                    <td>
                                        ${val.userPhone}
                                    </td>
                                    <td>
                                        ${val.userGender}
                                    </td>
                                    <td>
                                        ${val.userDOB}
                                    </td>
                                    <td>
                                        ${val.userRoleName}
                                    </td>
                                    <td>
                                        ${val.userAddress}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-danger deleteUser" onclick="deleteUser(this)" data-delId='{"id":"${val.userId}","name": "${val.userFullName}"}'><i class="fas fa-trash-alt"></i></button> 
                                            <button class="btn btn-success ml-3 editUser" onclick="editUser(this)" data-EditId='{"userDOB" : "${val.userDOB}","userEmail" : "${val.userEmail}","userFullName" : "${val.userFullName}","userGender" : "${val.userGender}","userAddress" : "${val.userAddress.replace(/(\r\n|\n|\r)/gm,"")}","userId" : "${val.userId}","userImg" : "${val.userImg}","userName" : "${val.userName}","userPassword" : "${val.userPassword}","userPhone" : "${val.userPhone}","userRole" : "${val.userRole}","userRoleName" : "${val.userRoleName}"}'><i class="fas fa-user-edit"></i></button>
                                            <a class="btn btn-primary ml-2" href="mailto:${val.userEmail}"><i class="fas fa-envelope"></i></a> 
                                            <a class="btn btn-success ml-2" href="tel:${val.userPhone}"><i class="fas fa-phone-alt"></i></a> 
                                        </div>
                                    </td>
                                </tr>
                            `)
                            })
                        } else {
                            $('#appendUsersData').html(' ');
                            $('#status').html(` <div class="alert alert-success text-dark fa-4x" style="text-align: center;font-size: 17px;font-weight: 700;margin-top: 3rem;border: solid 2px beige;background: beige;">${objJson.message}</div> `)
                        }
                    },
                    error: err => {
                        console.log(err)
                    }
                })
            }
        }
    }
</script>