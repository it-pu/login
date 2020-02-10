<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podomoro University</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icon/favicon.png">

</head>


<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!--<link href="--><?php //echo base_url(); ?><!--assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" id="bootstrap-css">-->

<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
<link href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet">


<link href="<?php echo base_url(); ?>assets/social/bootstrap-social.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/template/js/libs/jquery-1.10.2.min.js'); ?><!--"></script>-->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/jwt/encode/hmac-sha256.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/enc-base64-min.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/jwt.encode.js"></script>

<script src="<?php echo base_url(); ?>assets/md5/md5.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.imgFitter.js"></script>
<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script>
    $.fn.extend({
        animateCss: function(animationName, callback) {
            var animationEnd = (function(el) {
                var animations = {
                    animation: 'animationend',
                    OAnimation: 'oAnimationEnd',
                    MozAnimation: 'mozAnimationEnd',
                    WebkitAnimation: 'webkitAnimationEnd',
                };

                for (var t in animations) {
                    if (el.style[t] !== undefined) {
                        return animations[t];
                    }
                }
            })(document.createElement('div'));

            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);

                if (typeof callback === 'function') callback();
            });

            return this;
        },
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

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">

<style type="text/css">


    body {
        background: #d4dde6;
        /*background: #607d8b;*/
        /*background: #963a33;*/
    }

    .center {
        padding-top: 40px;
        /*position: absolute;*/
        /*left: 50%;*/
        /*top: 30%;*/
        /*-webkit-transform: translate(-50%, -50%);*/
        /*transform: translate(-50%, -50%);*/
    }

    .btn-default-danger {
        color: #d43f3a;
        border: 1px solid #d43f3a;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .btn-default-danger:hover {
        background: #d43f3a ;
        color: #fff;
        border: 1px solid #d43f3a;
    }

    .btn-default-danger .fa-envelope{
        margin-right: 5px;
        padding-right: 10px;
        border-right: 1.3px solid #d43f3a;
    }

    .fa-windows  {
        /*margin-right: 5px;*/
        /*padding-right: 10px;*/
        /*border-right: 1.3px solid #333;*/
    }

    .btn-default-danger:hover .fa-envelope {
        border-right: 1.3px solid #fff;
    }

    .fa-envelope {
        margin-right: 5px;
        padding-right: 10px;
        border-right: 1.3px solid #fff;
    }

    #btnLoginWithGoogle {

        background: #ffffff !important;
        color: #dd4b39;
        border: 1px solid #dd4b39;
        font-weight: bold;

    }

    #btnLoginWithGoogle:hover {

        background: #dd4b39 !important;
        color: #ffffff;
        border: 1px solid #dd4b39;
        font-weight: bold;

    }

    .btn-google>:first-child {
        border-right: 1px solid #dd4b39 !important;
    }

    .avatar {
        border: 2px solid #607D8B;
    }


    .a-link {
        cursor: pointer;
    }

    .a-link img {
        width: 100%;max-width: 100px;
    }

    .a-link .thumbnail {
        /*background: #f5f5f5;*/

        padding: 15px;
        margin-bottom: 0px;
        border: 1px solid #415a6b;
        text-align: center;
    }
    .a-link .thumbnail:hover {

        background: #ffeb3b1a;
    }

    .a-link .thumbnail h4 {
        color: #415a6b;font-weight: bold;margin-bottom: 0px;
    }
    .list-unstyled li span{
        margin-right: 5px;
    }

    .fa-coffee, .fa-heart {
        margin-right: 5px;
        margin-left: 5px;
    }

    .fa-coffee {
        color: #795548b8;
    }

    .fa-heart {
        color: #ff857c;
    }


    img.bg {
        /* Set rules to fill background */
        min-height: 100%;
        min-width: 1024px;

        /* Set up proportionate scaling */
        width: 100%;
        height: auto;

        /* Set up positioning */
        position: fixed;
        top: 0;
        left: 0;
    }

    @media screen and (max-width: 1024px){
        img.bg {
            left: 50%;
            margin-left: -512px; }
    }

    .btn-social-2>:first-child {
        line-height: 31px;
    }

    .thumbnail {
        /*border: none;*/
        border-radius: 0px;
    }
    .well {
        border-radius: 0px !important;
        border: none !important;
        background-color: #e4eaf6ba;
    }

    .panel-prodi {
        -webkit-box-shadow: 3px 7px 26px -8px rgba(0,0,0,1);
        -moz-box-shadow: 3px 7px 26px -8px rgba(0,0,0,1);
        box-shadow: 3px 7px 26px -8px rgba(0,0,0,1);
        border-radius: 15px;
        transition: transform .2s;
    }

    .h1-c {
        font-family: 'Source Sans Pro', sans-serif;
        color: #ffffff;
        margin-top: 0px;
        margin-bottom: 35px;
        text-shadow: 2px 0px 8px rgba(0,0,0,0.94);
    }

    #page-list-app a {
        color: #333333;
        text-decoration: none;
    }

    #page-list-app2 a {
        text-decoration: none;
    }

    .panel-prodi img {
        width: 100%;
        border-top-right-radius: 15px;
        border-top-left-radius:15px;
        border: 3px solid #fff;
        border-bottom: none;

    }

    .panel-prodi:hover {
        transform: scale(1.05);
    }


    .panel-prodi-name {
        background: #ffffff;
        min-height: 90px;
        padding: 5px 3px 10px 3px;
        text-align: center;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        font-size: 17px;
    }

    .panel-icon {
        text-align: center;
        min-height: 180px !important;
        padding: 10px;
        border: 5px solid #9e9e9e3b;
        color: #607d8b;
    }

    .panel-icon:hover {
        /*background: lightblue;*/
        cursor: pointer;
        /*border: 5px solid #607d8b61;*/
        color: #135e82;

        transform: scale(1.1);
    }

    .panel-icon img {
        width: 100%;
        max-width: 88px;
        margin-bottom: 10px;
    }
    .panel-icon-title {
        font-size: 19px;
        font-weight: bold;

        font-family: 'Source Sans Pro', sans-serif;
    }

    .well {
        border-radius: 15px;
    }

    #page-list-app .col-md-6 .row {
        margin-bottom: 25px;
    }

    #page-list-app2 .col-md-4 .row {
        margin-bottom: 25px;
    }

    .row {

    }

    .table-centre tr th, .table-centre tr td {
        text-align: center;
    }
    .table-academic td:nth-child(2) {
        text-align: left;
    }


    #btnLoginCheckUser, #btnLoginCheckPassword {
        color: #274675;
        background-color: #ffffff;
        border-color: #24416d;
    }
    #btnLoginCheckUser:hover, btnLoginCheckPassword:hover {
        color: #ffffff;
        background-color: #274675;
        border-color: #24416d;
    }

    #btnLoginWithAD {
        font-weight: bold;
    }
</style>

<body style="background: #f8f8f8 !important;">


<!--<img src="--><?//= base_url('assets/img4.JPG'); ?><!--" class="bg">-->
<!--<img src="--><?//= base_url('images/bg.png'); ?><!--" class="bg">-->
<!--<img src="--><?//= base_url('images/326790-P9JGFI-23.jpg'); ?><!--" class="bg">-->

<div style="height: 79px;text-align: center;">
    <img src="<?= base_url('assets/icon/logo_pu.png') ?>" style="max-width: 200px;margin-top:20px;">
</div>

<div style="background: #ffffff;border-top: 4px solid #cccccc5e;margin-top: 20px;">
    <div class="container" style="margin-top: 30px;">

        <div class="row">
            <div class="col-md-8 hidden-xs">
                <img src="<?= base_url('images/portal-login-2.jpg'); ?>" style="width: 100%">
            </div>
            <div class="col-md-4" style="margin-bottom: 25px;">

                <div class="thumbnail" style="padding-top: 25px;border: none;">

                    <div class="col-md-12" id="divSignIn"></div>

                    <?php

                    if(count($CalendarAcademic)>0){ $dc = $CalendarAcademic[0]; $fileCalendar = json_decode($dc['FileUpload']); ?>
                        <div style="padding: 5px 15px 5px 15px;text-align: center;">
                            <a href="<?= url_pas.'fileGetAny/'.$fileCalendar[0]; ?>" target="_blank"><i class="fa fa-download" style="margin-right: 5px;"></i> Academic Calendar</a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalGlobal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).ready(function () {

        window.googleBtn = '<?php echo $loginURL; ?>';
        window.base_url_server = '<?php echo base_url(); ?>';
        window.base_url_pas = '<?php echo url_pas; ?>';
        window.htmlUserName = '<div class="well" id="formWellUsername">' +
            '                        <div class="form-group">' +
            '                            <label for="username" class="control-label">Username</label>' +
            '                            <input type="text" class="form-control" id="username" placeholder="Input username...">' +
            '                        </div>' +
            '                        <div style="text-align: right;">' +
            '                            <button type="submit" class="btn btn-primary" id="btnLoginCheckUser">Next <i class="fa fa-angle-right"></i></button>' +
            '                        </div>' +
            '                        <hr/>' +
            '                        <a href="'+googleBtn+'" class="btn btn-danger btn-block btn-social btn-google" id="btnLoginWithGoogle"><i class="fa fa-google"></i> Sign in with Google</a>' +
            '<span style="float: right;color: #8c8989;font-size: 12px;">Use email @podomorouniversity.ac.id</span>' +
            '                        <br/><br/>' +
            '                        <a href="javascript:void(0)" class="btn btn-block btn-default btn-social btn-social-2" id="btnLoginWithAD"><i class="fa fa-windows"></i> Sign in with Active Directory</a>' +
            // '<span style="float: right;color: #8c8989;">Use AD Login</span>' +
            '                    </div><a href="javascript:void(0);" class="hide" id="btnForgot">Forgot Password Portal.</a>';

        $('#divSignIn').html(htmlUserName);

        $('#username').focus();

        localStorage.setItem('LoginFalse', 0);

        //var servername = "<?//= $_SERVER['SERVER_NAME']; ?>//";
        //if(servername!='localhost'){
        //    loadModalAwal();
        //}

    });

    function loadModalAwal() {

        return false;

        $('#modalGlobal .modal-header').addClass('hide');
        $('#modalGlobal .modal-footer').html('<div id="viewBtnClose"><u>Close on <i class="fa fa-angle-double-right"></i> <span id="viewTimer">-</span> seconds</u></div>');
        $('#modalGlobal .modal-body').html('<div style="text-align: center;">' +
            '    <h1>Dear Students<br/><small>Now you can access the academic portal on Android</small></h1><hr/>' +
            '    <a href="https://play.google.com/store/apps/details?id=com.ypap.StudentPU"><img class="" src="<?= base_url('assets/google-play-badge.png'); ?>" style="width: 100%;max-width:180px;"></a>' +
            '</div>' +
            '<div class="alert alert-info" style="margin-top:15px;text-align:center;"><p style="font-weight:bold;font-size:15px;">If the application has problems (for example : it cannot sign in), <br/> please try downloading the alternative link that we have provided below ' +
            '<br/><br/><a href="'+base_url_server+'assets/documents/Student_Portal.pdf" target="_blank" class="btn btn-primary" id="btnAlt">Alternative Link</a></p></div>' +
            '');

        var tim = 6;
        var loadTimer = setInterval(function () {

            if(tim>=1){
                tim = tim - 1;
                $('#viewTimer').html(tim);
            } else {
                clearInterval(loadTimer);
                setTimeout(function () {
                    $('#viewBtnClose').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                },500);
            }

        },1000);

        $('#btnAlt').animateCss('flash');

        $('#modalGlobal').modal({
            'backdrop' : 'static',
            'show' : true
        });
    }

    $(document).on('click','#btnLoginCheckUser',function() {
        CheckUsername2Login();
    });

    $(document).on('click','#btnBackLogin',function () {

        $('#formWellPassword').animateCss('fadeOutRight', function() {

            $('#divSignIn').html(htmlUserName);
            $('#username').focus();
            $('#formWellUsername').animateCss('fadeInLeft');

        })

    });

    $(document).on('click','#btnLoginWithAD',function () {

        var html = '<div class="well" id="formWellUsername">' +
            '                        <div class="form-group">' +
            '                            <label for="username" class="control-label">Username</label>' +
            '                            <input type="text" class="form-control" id="username" placeholder="Input username...">' +
            '                        </div>' +
            '                        <div class="form-group">' +
            '                            <label for="password" class="control-label">Password</label>' +
            '                            <input type="password" class="form-control" id="password" placeholder="Input password...">' +
            '                        </div>' +
            '<div style="text-align: right;"> <button type="button" class="btn btn-default" id="btnBackLoginFrAd"><i class="fa fa-angle-left"></i> Back</button> <button type="submit" class="btn btn-primary" id="btnLoginCheckAD">Sign In <i class="fa fa-angle-right"></i></button></div>';

        $('#divSignIn').html(html);
        $('#username').focus();
        $('#formWellUsername').animateCss('fadeInRight');
    });

    $(document).on('click','#btnLoginCheckAD',function (e) {
        loading_button('#btnLoginCheckAD');
        $('#btnBackLoginFrAd').prop('disabled',true);
        var username = $("#username").val();
        var password = $("#password").val();
        if (username == '' || password == '') {
            toastr.error('Username and Password is Required');
            $('#password').val('');
            $('#username').val('');
            $('#btnLoginCheckAD').html('Sign In <i class="fa fa-angle-right"></i>').prop('disabled',false);
            $('#btnBackLoginFrAd').prop('disabled',false);
        }
        else
        {
            CheckPasswordLoginAD(username,password);
        }

    });

    $(document).on('keypress','#username',function (e) {
        if (e.which == 13) {
            if (!$("#btnLoginCheckAD").length) {
                CheckUsername2Login();
            }
            return false;    //<---- Add this line
        }
    });

    $(document).on('click','#btnLoginCheckPassword',function () {
        CheckPassword2Login();
    });

    $(document).on('click','#btnBackLoginFrAd',function () {
        $('#divSignIn').html(htmlUserName);
        $('#username').focus();
        $('#formWellUsername').animateCss('fadeInLeft');
    });

    $(document).on('keypress','#password',function (e) {
        if (e.which == 13) {
            if ($("#btnLoginCheckAD").length) {
                loading_button('#btnLoginCheckAD');
                $('#btnBackLoginFrAd').prop('disabled',true);
                var username = $("#username").val();
                var password = $("#password").val();
                if (username == '' || password == '') {
                    toastr.error('Username and Password is Required');
                    $('#password').val('');
                    $('#username').val('');
                    $('#btnLoginCheckAD').html('Sign In <i class="fa fa-angle-right"></i>').prop('disabled',false);
                    $('#btnBackLoginFrAd').prop('disabled',false);
                }
                else
                {
                    CheckPasswordLoginAD(username,password);
                }
            }
            else
            {
                CheckPassword2Login();
            }

            return false;    //<---- Add this line
        }
    });




    $(document).on('keyup','#formNewRePassword',function(){
        var formNewPassword = $('#formNewPassword').val();
        var formNewRePassword = $('#formNewRePassword').val();
        if(formNewPassword==formNewRePassword){
            $('#btnSaveNewPassword').prop('disabled',false);
            $('#formNewRePassword').css('border','1px solid green');
        } else {
            $('#btnSaveNewPassword').prop('disabled',true);
            $('#formNewRePassword').css('border','1px solid red');
        }
    });

    $(document).on('click','#btnSaveNewPassword',function() {

        var formNewPassword = $('#formNewPassword').val();
        var formNewRePassword = $('#formNewRePassword').val();

        $('#alertPass').html('');
        if(formNewPassword!='' && formNewPassword!=null && formNewRePassword!='' && formNewRePassword!=null){


            if(formNewPassword==formNewRePassword){

                var formLastPassword = $('#formLastPassword').val();
                if(formLastPassword==md5(formNewPassword)){
                    $('#alertPass').html('<div class="alert alert-danger" role="alert">New Password same as the old password</div>');
                    setTimeout(function(){$('#alertPass').html('');},3000);
                } else {
                    var User = $('#formUser').val();
                    var Username = $('#formUsername').val();
                    var data = {
                        User : User,
                        Username : Username,
                        Year : $('#formYear').val(),
                        NewPassword : formNewPassword
                    };

                    $('#formNewPassword,#formNewRePassword').prop('disabled',true);
                    loading_button('#btnSaveNewPassword');
                    updatePassword(data);

                }

            } else {
                $('#formNewRePassword').css('border','1px solid red');
            }

        }
    });

    // Forgot Password
    $(document).on('click','#btnForgot',function () {

        var htmlBody = '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<input class="form-control" id="formForgotUsername" placeholder="Input username..." /> ' +
            '</div>' +
            '<div class="form-group">' +
            '<div class="input-group">' +
            '  <input type="text" class="form-control" id="formForgotEmailPU" placeholder="Input your emial..." aria-describedby="basic-addon2">' +
            '  <span class="input-group-addon" id="basic-addon2">@podomorouniversity.ac.id</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-12" style="text-align: right;">' +
            '<button type="button" class="btn btn-default btn-sm" id="btnCloseForgotPassword" data-dismiss="modal">Close</button> ' +
            '<button type="button" class="btn btn-success btn-sm" id="btnSubmitForgotPassword">Submit</button> ' +

            '</div>' +
            '</div>';

        $('#modalGlobal .modal-header').addClass('hide');
        $('#modalGlobal .modal-dialog').css('max-width','415px');
        $('#modalGlobal .modal-footer').addClass('hide');
        $('#modalGlobal .modal-body').html(htmlBody);

        $('#modalGlobal').modal({
            'backdrop' : 'static',
            'show' : true
        });

        $('#modalGlobal').on('shown.bs.modal', function () {
            $('#formNewPassword').focus();
        });
    });

    $(document).on('click','#btnSubmitForgotPassword',function () {
        var formForgotUsername = $('#formForgotUsername').val();
        var formForgotEmailPU = $('#formForgotEmailPU').val();

        if(formForgotUsername!='' && formForgotUsername!=null
            && formForgotEmailPU!='' && formForgotEmailPU!=null){

            loading_button('#btnSubmitForgotPassword');
            $('#formForgotUsername,#formForgotEmailPU,#btnCloseForgotPassword').prop('disabled',true);

            var url = base_url_server+'uath/resetPassword?username='+formForgotUsername+'&email='+formForgotEmailPU;

            $.getJSON(url,function (jsonResult) {
                console.log(jsonResult);
                if(jsonResult.length>0)
                {
                    var url_send = base_url_pas+'__resetPasswordUser?token='+jsonResult[0].Token+'&f='+jsonResult[0].Flag+'&d='+jsonResult[0].Date;
                    $.get(url_send,function (result) {
                        if(result=='0'){
                            toastr.error('Email not send','Error');
                        } else {
                            setTimeout(function () {
                                window.location.href = base_url_server;
                            },500);
                        }
                    });

                } else {
                    toastr.error('Username & Email not match','Error');
                }
            });
        }

    });

    function loginForm() {

        var Username = $('#username').val();
        var Password = $('#password').val();

        if(Username!='' && Username!=null && Password!='' && Password!=null){

            var url = base_url_server+'uath/getAuthSSOLogin';
            var data = {
                formYear : $('#formYear').val(),
                Username : Username,
                Password : Password
            };
            var token = jwt_encode(data);

            $.post(url,{token:token},function(jsonResult) {

                if(jsonResult.Status=='-1'){
                    modalChangePassword(jsonResult.Students);
                }


            });
        }

    }

    function CheckUsername2Login() {
        var Username = $('#username').val();

        if(Username!='' && Username!=null){

            loading_button('#btnLoginCheckUser');

            var splitusername = Username.split('.');

            // console.log(splitusername);

            if(splitusername.length>1){
                if(splitusername[0].toUpperCase()=='I' || splitusername[0].toUpperCase()=='P'){
                    nextToInsertPasswors(splitusername[1],splitusername[0].toUpperCase());
                }
                else {
                    $('#btnLoginCheckUser').html('Next <i class="fa fa-angle-right"></i>').prop('disabled',false);
                    toastr.error('User not found','Error');
                    $('#username').val('').focus();
                    $('#formWellUsername').animateCss('shake');
                }

            } else {
                nextToInsertPasswors(splitusername[0],'');
            }



        }
    }

    function nextToInsertPasswors(Username,userType) {

        var url = base_url_server+'uath/__checkUsername';
        var token = jwt_encode({Username:Username,userType : userType});

        $.post(url,{token:token},function (jsonResult) {

            setTimeout(function () {
                if(jsonResult.Status=='1' && jsonResult.DataUser.Status!='0'){

                    if(userType!='' &&  userType=='I'){

                        if(jsonResult.DataUser.Status=='1' && jsonResult.DataUser.User=='Employees'){
                            $('#formWellUsername').animateCss('fadeOutLeft', function() {

                                var htmlPass = '<div style="text-align: center;" id="dataAvatar">' +
                                    '                        <img data-src="'+jsonResult.DataUser.PathPhoto+'" class="img-fitter img-circle avatar" width="70" height="70" />' +
                                    '                        <h4 style="margin-bottom:0px;">'+jsonResult.DataUser.Name.trim()+'</h4>'+jsonResult.DataUser.Username+
                                    '                        <hr/>' +
                                    '                    </div>' +
                                    '                    <div class="well" id="formWellPassword">' +
                                    '                        <div class="form-group">' +
                                    '                             <input type="hidden" class="hide" hidden readonly id="TypeUser" value="'+userType.toLowerCase()+'" />' +
                                    '                            <label for="password" class="control-label">Password</label>' +
                                    '                            <input type="password" class="hide" hidden readonly id="user" ' +
                                    '                                       value="'+jsonResult.DataUser.Username+'.'+jsonResult.DataUser.Status+'.'+jsonResult.DataUser.User+'.'+jsonResult.DataUser.Year+'">' +
                                    '                            <input type="password" class="form-control" id="password" placeholder="Input password...">' +
                                    '                        </div><div id="divCaptcha"></div>' +
                                    '                        <div style="text-align: right;">' +
                                    '                            <button type="button" class="btn btn-default" id="btnBackLogin"><i class="fa fa-angle-left"></i> Back</button> | ' +
                                    '                            <button type="submit" class="btn btn-primary" id="btnLoginCheckPassword">Sign In <i class="fa fa-angle-right"></i></button>' +
                                    '                        </div>' +
                                    '                    </div>';

                                $('#divSignIn').html(htmlPass);

                                $('#formWellPassword').animateCss('fadeInRight', function() {
                                    $('.img-fitter').imgFitter();
                                    $('#password').focus();
                                });

                            });
                        } else {
                            $('#btnLoginCheckUser').html('Next <i class="fa fa-angle-right"></i>').prop('disabled',false);
                            toastr.warning('Account non-active','Warning');
                            $('#username').val('').focus();
                            $('#formWellUsername').animateCss('shake');
                        }


                    }
                    else if(userType!='' &&  userType=='P'){
                        if(jsonResult.DataUser.Status=='1' || jsonResult.DataUser.Status=='-1'){
                            $('#formWellUsername').animateCss('fadeOutLeft', function() {

                                var htmlPass = '<div style="text-align: center;" id="dataAvatar">' +
                                    '                        <img data-src="'+jsonResult.DataUser.PathPhoto+'" class="img-fitter img-circle avatar" width="70" height="70" />' +
                                    '                        <h4 style="margin-bottom:0px;">'+jsonResult.DataUser.Name.trim()+'</h4>'+jsonResult.DataUser.Username+
                                    '                        <hr/>' +
                                    '                    </div>' +
                                    '                    <div class="well" id="formWellPassword">' +
                                    '                        <div class="form-group">' +
                                    '                             <input type="hidden" class="hide" hidden readonly id="TypeUser" value="'+userType.toUpperCase()+'" />' +
                                    '                            <label for="password" class="control-label">Password</label>' +
                                    '                            <input type="password" class="hide" hidden readonly id="user" ' +
                                    '                                       value="'+jsonResult.DataUser.Username+'.'+jsonResult.DataUser.Status+'.'+jsonResult.DataUser.User+'.'+jsonResult.DataUser.Year+'">' +
                                    '                            <input type="password" class="form-control" id="password" placeholder="Input password...">' +
                                    '                        </div><div id="divCaptcha"></div>' +
                                    '                        <div style="text-align: right;">' +
                                    '                            <button type="button" class="btn btn-default" id="btnBackLogin"><i class="fa fa-angle-left"></i> Back</button> | ' +
                                    '                            <button type="submit" class="btn btn-primary" id="btnLoginCheckPassword">Sign In <i class="fa fa-angle-right"></i></button>' +
                                    '                        </div>' +
                                    '                    </div>';

                                $('#divSignIn').html(htmlPass);

                                $('#formWellPassword').animateCss('fadeInRight', function() {
                                    $('.img-fitter').imgFitter();
                                    $('#password').focus();
                                });

                            });
                        } else {
                            $('#btnLoginCheckUser').html('Next <i class="fa fa-angle-right"></i>').prop('disabled',false);
                            toastr.warning('Account non-active','Warning');
                            $('#username').val('').focus();
                            $('#formWellUsername').animateCss('shake');
                        }
                    }
                    else {
                        $('#formWellUsername').animateCss('fadeOutLeft', function() {

                            var htmlPass = '<div style="text-align: center;" id="dataAvatar">' +
                                '                        <img data-src="'+jsonResult.DataUser.PathPhoto+'" class="img-fitter img-circle avatar" width="70" height="70" />' +
                                '                        <h4 style="margin-bottom:0px;">'+jsonResult.DataUser.Name.trim()+'</h4>'+jsonResult.DataUser.Username+
                                '                        <hr/>' +
                                '                    </div>' +
                                '                    <div class="well" id="formWellPassword">' +
                                '                        <div class="form-group">' +
                                '                             <input type="hidden" class="hide" hidden readonly id="TypeUser" value="'+userType.toUpperCase()+'" />' +
                                '                            <label for="password" class="control-label">Password</label>' +
                                '                            <input type="password" class="hide" hidden readonly id="user" ' +
                                '                                       value="'+jsonResult.DataUser.Username+'.'+jsonResult.DataUser.Status+'.'+jsonResult.DataUser.User+'.'+jsonResult.DataUser.Year+'">' +
                                '                            <input type="password" class="form-control" id="password" placeholder="Input password...">' +
                                '                        </div><div id="divCaptcha"></div>' +
                                '                        <div style="text-align: right;">' +
                                '                            <button type="button" class="btn btn-default" id="btnBackLogin"><i class="fa fa-angle-left"></i> Back</button> | ' +
                                '                            <button type="submit" class="btn btn-primary" id="btnLoginCheckPassword">Sign In <i class="fa fa-angle-right"></i></button>' +
                                '                        </div>' +
                                '                    </div>';

                            $('#divSignIn').html(htmlPass);

                            $('#formWellPassword').animateCss('fadeInRight', function() {
                                $('.img-fitter').imgFitter();
                                $('#password').focus();
                            });

                        });
                    }


                }
                else {
                    $('#btnLoginCheckUser').html('Next <i class="fa fa-angle-right"></i>').prop('disabled',false);
                    toastr.error(jsonResult.Message,'Error');
                    $('#username').val('').focus();
                    $('#formWellUsername').animateCss('shake');
                }




            },500);
        });
    }

    function CheckPasswordLoginAD(Username,Password) {
        var url = base_url_server+'uath/__checkloginwithAd';
        var data = {
            Username : Username.trim(),
            Password : Password.trim()
        };
        var token = jwt_encode(data);
        $.post(url,{token:token},function (jsonResult) {
            if (jsonResult['Status']) {
                var rs = jsonResult['data'];
                if(rs.url_direct.length==1){

                    $('#formSubmitLogin').attr('action',rs.url_direct[0].url_login);
                    $('#formTokenLogin').val(rs.url_direct[0].token);
                    $('#formSubmitLogin').submit();

                } else if(rs.url_direct.length>1){
                    loadPagePanel(rs.url_direct);
                }

            }
            else
            {
                toastr.error(jsonResult['msg'])
                // $('#password').val('');
                // $('#username').val('');
                $('#btnLoginCheckAD').html('Sign In <i class="fa fa-angle-right"></i>').prop('disabled',false);
                $('#btnBackLoginFrAd').prop('disabled',false);
            }

        });
        // $('#btnLoginCheckAD').html('Sign In <i class="fa fa-angle-right"></i>').prop('disabled',false);

    }

    function CheckPassword2Login() {
        var Password = $('#password').val();
        var TypeUser = $('#TypeUser').val();

        if(Password!='' && Password!=null){
            loading_button('#btnLoginCheckPassword');
            $('#btnBackLogin').prop('disabled',true);
            var dataUser = $('#user').val();
            var url = base_url_server+'uath/__checkPassword';
            var data = {
                Username : dataUser.split('.')[0],
                TypeUser : TypeUser,
                Status : dataUser.split('.')[1],
                User : dataUser.split('.')[2],
                Year : dataUser.split('.')[3],
                Password : Password
            };
            var token = jwt_encode(data);
            $.post(url,{token:token},function (jsonResult) {


                if(jsonResult.Status=='0'){

                    toastr.warning(jsonResult.Message,'Warning');

                    var totalWrong = (localStorage.getItem('LoginFalse')==null) ? 1 :
                        parseInt(localStorage.getItem('LoginFalse')) + 1;

                    if(totalWrong>3){
                        $('#formWellPassword').animateCss('shake');
                        setTimeout(function () {
                            localStorage.setItem('LoginFalse', 0);
                            window.location.href='';
                        },500);
                    } else {
                        $('#formWellPassword').animateCss('shake');
                        localStorage.setItem('LoginFalse', totalWrong);
                    }


                }
                else if(jsonResult.Status=='-1'){
                    modalChangePassword(jsonResult.DataUser);
                } else if(jsonResult.Status=='1'){

                    if(jsonResult.url_direct.length==1){

                        var url = jsonResult.url_direct[0].url_login;
                        var token = jsonResult.url_direct[0].token;
                        FormSubmitAuto(url, 'POST', [
                            { name: 'token', value: token },
                        ],'');


                    } else if(jsonResult.url_direct.length>1){
                        loadPagePanel(jsonResult.url_direct);
                    }
                }

                setTimeout(function () {
                    $('#password').val('');
                    $('#btnBackLogin').prop('disabled',false);
                    $('#btnLoginCheckPassword').html('Sign In <i class="fa fa-angle-right"></i>').prop('disabled',false);
                },1000);
            });
        }
    }

    function modalChangePassword(dataUser){

        var title = (dataUser.User=='Parent') ? 'Hello, '+dataUser.Name+'\'s Parents' : 'Hello, '+dataUser.Name;

        var htmlBody = '<div class="row">' +
            '    <div class="col-xs-3" style="text-align:center;">' +
            '    <img src="'+dataUser.PathPhoto+'" class="img-rounded" style="width:100%;max-width: 200px;" />'+dataUser.Username+
            '    </div>' +
            '    <div class="col-xs-9">' +
            '    <h4>'+title+'</h4>' +
            'Please, change your password first <i class="fa fa-smile-o" aria-hidden="true"></i>.' +
            '    <hr/>' +
            '    <div class="form-group">' +
            '    <input type="password" class="form-control" id="formNewPassword" placeholder="New password..." autofocus="autofocus">' +
            '    <input type="password" class="form-control hide" id="formUsername" readonly hidden value="'+dataUser.Username+'">' +
            '    <input type="password" class="form-control hide" id="formLastPassword" readonly hidden value="'+dataUser.LastPassword+'">' +
            '    <input type="password" class="form-control hide" id="formYear" readonly hidden value="'+dataUser.Year+'">' +
            '    <input type="password" class="form-control hide" id="formUser" readonly hidden value="'+dataUser.User+'">' +
            '    </div>' +
            '    <div class="form-group">' +
            '    <input type="password" class="form-control" id="formNewRePassword" placeholder="Re-password...">' +
            '    </div>' +
            '<div id="alertPass"></div>' +
            '    <div style="text-align: right;">' +
            '    <button class="btn btn-primary" id="btnSaveNewPassword" disabled>Save</button>' +
            '    </div>' +
            '    </div>' +
            '    </div>';

        $('#modalGlobal .modal-header').addClass('hide');
        $('#modalGlobal .modal-dialog').css('max-width','600px');
        $('#modalGlobal .modal-footer').addClass('hide');
        $('#modalGlobal .modal-body').html(htmlBody);

        $('#modalGlobal').modal({
            'backdrop' : 'static',
            'show' : true
        });

        $('#modalGlobal').on('shown.bs.modal', function () {
            $('#formNewPassword').focus();
        });
    }

    function updatePassword(data){
        var token = jwt_encode(data);
        var url = base_url_server+'uath/updatePassword';

        $.post(url,{token:token},function(jsonResult){

            $('#modalGlobal').modal('hide');


            setTimeout(function () {
                if(jsonResult.url_direct.length==1){
                    $('#formSubmitLogin').attr('action',jsonResult.url_direct[0].url_login);
                    $('#formTokenLogin').val(jsonResult.url_direct[0].token);
                    $('#formSubmitLogin').submit();
                } else if(jsonResult.url_direct.length>1){
                    loadPagePanel(jsonResult.url_direct);
                }
            },500);



        });

    }

    function loadPagePanel(ArrPage) {

        var htmlBody = '';
        // filtering pcam agar tidak double
        var rs = [];
        for (var index = 0; index < ArrPage.length; index++) {
            var f = true;
            var flag = ArrPage[index].flag;
            for (var j = 0; j < rs.length; j++) {
                var flag2 = rs[j].flag;
                if (flag == flag2) {
                    f = false;
                    break;
                }

            }

            if (f) {
                rs.push(ArrPage[index]);
            }

        }

        ArrPage = [];
        ArrPage = rs;
        // End filtering pcam agar tidak double
        for(var i=0;i<ArrPage.length;i++){
            var h = '';
            if(ArrPage[i].flag=='lec'){
                h = '<div class="col-md-6">' +
                    '    <a href="javascript:void(0);" data-url="'+ArrPage[i].url_login+'" data-token="'+ArrPage[i].token+'" class="a-link">' +
                    '        <div class="thumbnail">' +
                    '            <img src="assets/icon/lecturer.png" />' +
                    '            <h4>Portal Lecturer</h4>' +
                    '        </div>' +
                    '    </a>' +
                    '</div>';
            }
            else {
                h = '<div class="col-md-6">' +
                    '    <a href="javascript:void(0);" data-url="'+ArrPage[i].url_login+'" data-token="'+ArrPage[i].token+'" class="a-link">' +
                    '        <div class="thumbnail">' +
                    '            <img src="assets/icon/employee.png" />' +
                    '            <h4>Portal Campus</h4>' +
                    '        </div>' +
                    '    </a>' +
                    '</div>';
            }

            htmlBody = htmlBody+''+h;
        }


        $('#modalGlobal .modal-header').addClass('hide');
        $('#modalGlobal .modal-dialog').css('max-width','600px');
        $('#modalGlobal .modal-footer').addClass('hide');
        $('#modalGlobal .modal-body').html('<div class="row">'+htmlBody+'</div>');
        $('#formNewPassword').focus();
        $('#modalGlobal').modal({
            'backdrop' : 'static',
            'show' : true
        });
    }

    $(document).on('click','.a-link',function () {
        var url_login = $(this).attr('data-url');
        var token = $(this).attr('data-token');

        if(url_login!='' && url_login!=null && token!='' && token!=null){

            var url = url_login;
            var token = token;
            FormSubmitAuto(url, 'POST', [
                { name: 'token', value: token },
            ],'');

        }

    });

    function loading_button(element) {
        $(''+element).html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
        $(''+element).prop('disabled',true);
    }

    function FormSubmitAuto(action, method, values,blank = '_blank') {
        var form = $('<form/>', {
            action: action,
            method: method
        });
        $.each(values, function() {
            form.append($('<input/>', {
                type: 'hidden',
                name: this.name,
                value: this.value
            }));
        });
        form.attr('target', blank);
        form.appendTo('body').submit();
    }

</script>

</body>
</html>