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
                <img src="assets/icon/logo.jpg" style="max-width: 200px;">

                <hr/>

<!--                --><?php //print_r($data_arr); ?>

                <input class="hide" readonly hidden id="formUsername" value="<?php echo $data_arr['Username']; ?>">
                <input class="hide" readonly hidden id="formToken" value="<?php echo $data_arr['TokenUser']; ?>">
                <input class="hide" readonly hidden id="formLebel" value="<?php echo $data_arr['Flag']; ?>">

                <div class="form-group">
                    <input type="password" class="form-control" id="formNewPassword" placeholder="Input new password..." autofocus>

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="formNewPasswordRe" placeholder="Re-input new password...">
                    <span id="alertPass" style="float: right;"></span>
                </div>

                <hr/>
                <button id="btnSubmit" class="btn btn-success btn-block">Submit</button>

                <p style="text-align: left;margin-top: 15px;color: #9E9E9E;font-size: 12px;">
                    - Password minimum 8 character
                    <br/>
                    - Case sensitive</p>
            </div>
        </div>
    </div>
</div>

<script>

    $('#btnSubmit').click(function () {
        var formNewPassword = $('#formNewPassword').val();
        var formNewPasswordRe = $('#formNewPasswordRe').val();

        if(formNewPassword!='' && formNewPassword!=null && formNewPasswordRe!='' && formNewPasswordRe!=null){
            if(formNewPassword==formNewPasswordRe){

                loading_button('#btnSubmit');
                $('#formNewPassword, #formNewPasswordRe').prop('disabled',true);
                var base_url_server = '<?php echo base_url(); ?>';

                var data = {
                    Username : $('#formUsername').val(),
                    Token : $('#formToken').val(),
                    Flag : $('#formLebel').val(),
                    NewPassword : $('#formNewPassword').val()
                };

                var token = jwt_encode(data,'L0G1N-3R0');
                var url = base_url_server+'resetPasswordAction';
                $.post(url,{token:token},function (jsonResult) {
                    toastr.success('Password has been reset','Success');
                    // setTimeout(function () {
                    //     window.location.href=base_url_server
                    // },500);
                });

            }
        }
    });


</script>

</body>
</html>