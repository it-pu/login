<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Podomoro University</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icon/favicon.png">

</head>


<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/template/js/libs/jquery-1.10.2.min.js'); ?><!--"></script>-->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<!------ Include the above in your HEAD tag ---------->
<script src="<?php echo base_url(); ?>assets/js/jquery.imgFitter.js"></script>


<script src="<?php echo base_url(); ?>assets/jwt/encode/hmac-sha256.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/enc-base64-min.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/jwt.encode.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jwt/decode/build/jwt-decode.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/daterangepicker/moment.min.js'); ?>"></script>

<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>


<script>

    $(document).ready(function(){
        $('.img-fitter').imgFitter();
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

</script>


<style type="text/css">

    body {
        background: #d4dde6;
    }
    .avatar {
        border: 2px solid #607D8B;
    }

    #double .thumbnail:hover {
        border: 3px solid #607D8B;
        background: #f7f7f7;
        color: #607D8B;
        cursor: pointer;
    }

</style>

<body>


<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <!--            <h3><b>Reset Password</b></h3>-->
            <div class="thumbnail" style="min-height: 100px;padding: 15px;text-align: center;">
                <img src="<?php echo base_url('assets/icon/logo_pu.png'); ?>" style="max-width: 200px;">

                <hr/>

                <textarea hidden class="hide" id="formToken"><?php echo $token; ?></textarea>

                <div class="form-group">
                    <input type="password" class="form-control" id="formNewPassword" placeholder="Input new password..." autofocus>

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="formNewPasswordRe" disabled placeholder="Re-input new password...">
                    <span id="alertPass" style="float: right;"></span>
                </div>

                <hr/>
                <button id="btnSubmit" class="btn btn-success btn-block" disabled>Submit</button>

                <p style="text-align: left;margin-top: 15px;color: #9E9E9E;font-size: 12px;">
                    - Minimum 8 character
                    <br/>
                    - Case sensitive</p>
            </div>
        </div>
    </div>
</div>

<script>

    $('#btnSubmit').click(function () {
        //cek apakah password match
        saveNewPassword();

    });

    function saveNewPassword() {
        loading_button('#btnSubmit');

        var formNewPassword = $('#formNewPassword').val();
        var formNewPasswordRe = $('#formNewPasswordRe').val();
        if(formNewPassword!='' && formNewPassword!=null && formNewPasswordRe!='' && formNewPasswordRe!=null){

            if(formNewPassword==formNewPasswordRe){
                // Cek apakah password < 8 karakter
                if(formNewPassword.length>=8){
                    var url = "<?php echo base_url('updatepassword'); ?>"
                    var formToken = $('#formToken').val();

                    var data_arr = jwt_decode(formToken,'UAP)(*');

                    // Cek due date
                    var Date = data_arr.DueDate.split(' ')[0].trim();
                    if(Date == moment().format('YYYY-MM-DD')){



                        data_arr.Password = formNewPassword;
                        var Username = (data_arr.Type=='std') ? data_arr.NPM : data_arr.NIP;
                        var DB = (data_arr.Type=='std') ? 'db_academic.auth_students' : 'db_employees.employees';
                        var data = {
                            DB : DB,
                            Type : data_arr.Type,
                            Username : Username,
                            Password : formNewPassword
                        };
                        var token = jwt_encode(data);
                        $.post(url,{token:token},function (result) {
                            toastr.success('Password Saved','Success');
                            setTimeout(function () {
                                window.location.href="<?php echo base_url(); ?>";
                            },500);
                        });
                    } else {
                        toastr.error('Token Expired','Error');
                    }

                }
                else {
                    toastr.error('Password less than 8 character','Error');
                }
            } else {
                toastr.error('Password and Re-password not match','Error');
            }


        } else {

            if(formNewPasswordRe=='' || formNewPasswordRe==null) {
                $('#formNewPassword').css('border','1px solid red');
                setTimeout(function (args) {
                    $('#formNewPassword').css('border','1px solid #ccc');
                },1000);
            }

            if(formNewPasswordRe=='' || formNewPasswordRe==null){
                $('#formNewPasswordRe').css('border','1px solid red');
                setTimeout(function (args) {
                    $('#formNewPasswordRe').css('border','1px solid #ccc');
                },1000);
            }
        }

        setTimeout(function (args) {
            $('#btnSubmit').html('Submit').prop('disabled',true);
        },1000);
    }

    $(document).on('keyup','#formNewPassword',function () {
        countChar();
    });

    $(document).on('blur','#formNewPassword',function () {
        countChar();
    });

    // Count karakter
    function countChar() {
        var c = $('#formNewPassword').val();
        var d = true;
        if(c.length>=8){
            d = false;
        }
        $('#formNewPasswordRe,#btnSubmit').prop('disabled',d);
        $('#formNewPasswordRe').css('border','1px solid #ccc');
        $('#alertPass').html('');

    }

    $(document).on('keyup','#formNewPasswordRe',function () {
        checkPassword();
    });

    $(document).on('blur','#formNewPasswordRe,#formNewPassword',function () {
        checkPassword();
    });

    $(document).on('keypress','#formNewPasswordRe,#formNewPasswordRe',function (e) {
        if (e.which == 13) {
            saveNewPassword();
            return false;    //<---- Add this line
        }
    });

    function checkPassword() {
        var formNewPassword = $('#formNewPassword').val();
        var formNewPasswordRe = $('#formNewPasswordRe').val();

        if(formNewPassword!='' && formNewPassword!=null && formNewPasswordRe!='' && formNewPasswordRe!=null){
            if(formNewPassword==formNewPasswordRe){
                $('#btnSubmit').prop('disabled',false);
                $('#formNewPasswordRe').css('border','1px solid green');
                $('#alertPass').html('<i style="color: green;">Match</i>');
            } else {
                $('#btnSubmit').prop('disabled',true);
                $('#formNewPasswordRe').css('border','1px solid red');
                $('#alertPass').html('<i style="color: red;">Not match</i>');
            }
        }

    }

    function loading_button(element) {
        $(''+element).html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
        $(''+element).prop('disabled',true);
    }
</script>
</body>
</html>