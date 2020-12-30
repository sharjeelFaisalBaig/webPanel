<script src="assets/js/ajax.js"></script>
<script>
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
</script>