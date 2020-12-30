<link rel="stylesheet" href="assets/js/ajax.js">
<script>
    $(document).ready(() => {
        const apiUrl = 'emailApi/';
        const clientApiUrl = 'emailApi/client.php';
        const discountApi = 'discountApi/settings.json';
        const callbackApi = 'API/callbackApi.php';
        const discountApidb = 'API/discussionApi.php';
        const qoutedApidb = 'API/qoutationApi.php';
        $('.goForm').on('click', () => {
            $('.forceContact').trigger('click');
        })
        // countryCode Handler
        $('.countryCode').on('change', () => {
            let countryCodeQouted = document.querySelectorAll('.countryCode');
            for (let iMain = 0; iMain < countryCodeQouted.length; iMain++) {
                for (let i = 0; i < countryCodeQouted[iMain].options.length; i++) {
                    let curr = countryCodeQouted[iMain].options[i];
                    let currattr = curr.getAttribute('data-countrycode');
                    curr.innerHTML = currattr;
                }
                let selected = countryCodeQouted[iMain].selectedOptions;
                for (let i = 0; i < selected.length; i++) {
                    selected[i].innerHTML = selected[i].value;
                }
            }
        })
        // qouted Submit
        $('.getQouted').on('submit', e => {
            e.preventDefault();

            window.swal({
                title: "Proceeding Qoutation...",
                text: "Please wait",
                button: false,
                showConfirmButton: false,
                allowOutsideClick: false
            });

            let formData = $('.getQouted').serializeArray();
            let jsonData = JSON.stringify(formData);
            $.ajax({
                url: qoutedApidb,
                method: 'POST',
                type: 'POST',
                data: jsonData,
                success: successToken => {
                    $.ajax({
                        url: apiUrl,
                        method: 'POST',
                        data: jsonData,
                        success: e => {
                            let responseJson = JSON.parse(e);
                            if (responseJson[0].status == 'success') {
                                swal(`${responseJson[0].title}`, `${responseJson[0].message}`, "success", {
                                    button: "Close",
                                })
                                $('.getQouted').trigger('reset');
                                $("#discountSection").modal("show");
                                $.ajax({
                                    url: clientApiUrl,
                                    method: 'POST',
                                    data: jsonData,
                                    success: res => {

                                    }
                                })
                            } else {
                                swal(`${responseJson[0].title}`, `${responseJson[0].message}`, "error", {
                                    button: "Close",
                                })
                            }
                        },
                        error: err => {
                            swal(`Cant Send !`, `Check Console press F12`, "error", {
                                button: "Close",
                            })
                            console.error('Qoutation Api Error =>', err);
                        }
                    })
                },
                error: err => {
                    console.error('Api Error Of Qoutation Details =>', err)
                }
            })
        })
        // detailed Submit
        $('.detailDisscus').on('submit', e => {
            e.preventDefault();
            window.swal({
                title: "Proceeding Discussion...",
                text: "Please wait",
                button: false,
                showConfirmButton: false,
                allowOutsideClick: false
            });
            let data = $('.detailDisscus').serializeArray();
            let jsonData = JSON.stringify(data);
            $.ajax({
                url: discountApidb,
                method: 'POST',
                type: 'POST',
                data: jsonData,
                success: successToken => {
                    if (successToken.status == 'success') {
                        $.ajax({
                            url: apiUrl,
                            method: 'POST',
                            type: 'POST',
                            data: jsonData,
                            success: e => {
                                let responseJson = JSON.parse(e);
                                if (responseJson[0].status == 'success') {
                                    swal(`${responseJson[0].title}`, `${responseJson[0].message}`, "success", {
                                        button: "Close",
                                    })
                                    $('.detailDisscus').trigger('reset');
                                    $.ajax({
                                        url: clientApiUrl,
                                        method: 'POST',
                                        data: jsonData,
                                        success: res => {

                                        }
                                    })
                                } else {
                                    swal(`${responseJson[0].title}`, `${responseJson[0].message}`, "error", {
                                        button: "Close",
                                    })
                                }
                            },
                            error: err => {
                                swal(`Cant Send !`, `Check Console press F12`, "error", {
                                    button: "Close",
                                })
                                console.error('Discussion Api Error =>', err);
                            }
                        })
                    } else {
                        console.error('Discuss error =>', successToken.error)
                        swal(`System Failiure!`, `${successToken.error}`, "error", {
                            button: "Close",
                        })
                    }
                },
                error: err => {
                    console.error('Api Error Of Discuss Details =>', err)
                }
            })
        })
        // call back booking
        $('.calBack').on('submit', e => {
            e.preventDefault();
            let callData = $('.calBack').serializeArray();
            window.swal({
                title: "Booking Callback...",
                text: "Please wait",
                button: false,
                showConfirmButton: false,
                allowOutsideClick: false
            });
            let jsonData = JSON.stringify(callData);
            $.ajax({
                url: callbackApi,
                method: 'POST',
                type: 'POST',
                data: jsonData,
                success: successToken => {
                    if (successToken.status == 'success') {
                        console.log('callback =>', successToken.message)
                        $.ajax({
                            url: apiUrl,
                            method: 'POST',
                            type: 'POST',
                            data: jsonData,
                            success: e => {
                                let responseJson = JSON.parse(e);
                                if (responseJson[0].status == 'success') {
                                    swal(`${responseJson[0].title}`, `${responseJson[0].message}`, "success", {
                                        button: "Close",
                                    })
                                    $('.calBack').trigger('reset');
                                    $("#callModal").modal("toggle");
                                    $("#discountSection").modal("show");
                                    $.ajax({
                                        url: clientApiUrl,
                                        method: 'POST',
                                        data: jsonData,
                                        success: res => {}
                                    })
                                } else {

                                    swal(`${responseJson[0].title}`, `${responseJson[0].message}`, "error", {
                                        button: "Close",
                                    })
                                }
                            },
                            error: err => {
                                swal(`Details Collected !`, `Email Send error, Check Console press F12`, "error", {
                                    button: "Close",
                                })
                                console.error('Callback Api Error =>', err);
                            }
                        })
                    } else {
                        console.error('callback error =>', successToken.error)
                        swal(`System Failiure!`, `${successToken.error}`, "error", {
                            button: "Close",
                        })
                    }
                },
                error: err => {
                    swal(`Cant Send !`, `Check Console press F12`, "error", {
                        button: "Close",
                    })
                    console.error('Callback Api Error =>', err);
                }
            })
        })
        // discount configuration
        $.ajax({
            url: discountApi,
            method: 'GET',
            type: 'GET',
            dataType: 'json',
            success: response => {
                let ResponseTimes = response[0];
                let ResponseConfig = response[1];
                if (response[2].allow == 'true') {
                    $("#delmodal").on("click", (o) => {
                        $("#discountSection").modal("hide");
                    });
                    setTimeout(() => {
                        $("#discountSection").modal("show"),

                            $("#callModal").hasClass("show") ? ($("#discountSection").modal("hide")) : ($("#discountSection").modal("show"));
                    }, 30000);
                    $(".disCountOffer").on("click", () => {
                        $("#discountSection").modal("show");
                    });

                    $('.Dhours').html(ResponseTimes.hours)
                    $('.Dminutes').html(ResponseTimes.minutes)
                    $('.Dseconds').html(ResponseTimes.seconds)
                    $('#disImg').attr('src', ResponseConfig.img)
                    $('#disBtnTitle').html(ResponseConfig.btnTitle)
                    timer = () => {
                        let hoursCurr = ResponseTimes.hours;
                        let minutesCurr = ResponseTimes.minutes;
                        let secondsCurr = ResponseTimes.seconds;
                        var dicount = setInterval(() => {
                            if (secondsCurr == 0) {
                                if (minutesCurr == 0) {
                                    if (hoursCurr == 0) {
                                        hoursCurr = 0;
                                        minutesCurr = 0;
                                        secondsCurr = 0;
                                        clearInterval(dicount);
                                        $('.Dhours').html(hoursCurr);
                                        $('.Dminutes').html(minutesCurr);
                                        $('.Dseconds').html(secondsCurr);
                                    } else {
                                        hoursCurr = hoursCurr - 1;
                                        minutesCurr = 60;
                                        secondsCurr = 60;
                                    }
                                    $('.Dhours').html(hoursCurr);
                                    $('.Dminutes').html(minutesCurr);
                                    $('.Dseconds').html(secondsCurr);
                                } else {
                                    minutesCurr = minutesCurr - 1;
                                    secondsCurr = 60;
                                    $('.Dhours').html(hoursCurr);
                                    $('.Dminutes').html(minutesCurr);
                                    $('.Dseconds').html(secondsCurr);
                                }
                            } else {
                                secondsCurr = secondsCurr - 1;
                                $('.Dhours').html(hoursCurr);
                                $('.Dminutes').html(minutesCurr);
                                $('.Dseconds').html(secondsCurr);
                            }
                        }, 1000)
                    };
                    timer();
                    $('#disBtnTitle').on('click', () => {
                        $("#discountSection").modal("toggle");
                        if ($('.Dhours').html() == 0 && $('.Dminutes').html() == 0 && $('.Dseconds').html() == 0) {
                            swal(`Sorry Discount Time out!`, `Please Try Next Time`, "error", {
                                button: "Close",
                            })
                            $('.discountType').val('0');
                        } else {
                            $('.forceContact').trigger('click');
                            swal(`Offer Request Accepted`, `Please Fill The Detailed Form`, "success", {
                                button: "Close",
                            });
                            $('.optionDiscount').removeClass('d-none');
                            $('.optionDiscount').html('<span>30% OFF</span>');
                            $('.discountType').val('30');
                        }
                    })
                } else {
                    $(".disCountOffer").on("click", () => {
                        swal(`Sorry Discount Time out!`, `Please Try Next Time`, "error", {
                            button: "Close",
                        })
                    });
                }
            },
            error: err => {
                console.error(`Discount Api Error =>`, err);
            }
        })
    })
</script>
<!-- live Chat -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5fcdbd04920fc91564ce1b0d/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    $('.popchat').on('click', () => {
        Tawk_API.toggle();
    })
</script>
<!--End of Tawk.to Script-->