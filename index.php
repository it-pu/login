<!DOCTYPE html>
<html>
<head>
    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 "> -->
    <title>Podomoro University</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/icon/favicon.png">

</head>


<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/toastr/toastr.min.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/template/js/libs/jquery-1.10.2.min.js'); ?><!--"></script>-->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<script src="assets/jwt/encode/hmac-sha256.js"></script>
<script src="assets/jwt/encode/enc-base64-min.js"></script>
<script src="assets/jwt/encode/jwt.encode.js"></script>

<script src="assets/md5/md5.js"></script>
<script src="assets/js/jquery.imgFitter.js"></script>
<script src="assets/toastr/toastr.min.js"></script>
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



<style type="text/css">


    body {
        background: #d4dde6;
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

    .btn-default-danger .fa-google-plus {
        margin-right: 5px;
        padding-right: 10px;
        border-right: 1.3px solid #d43f3a;
    }

    .btn-default-danger:hover .fa-google-plus {
        border-right: 1.3px solid #fff;
    }

    #btnLoginWithGoogle {

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
</style>

<body>


<!-- <div style="margin-top: 70px;"></div> -->

<div id="login-overlay" class="modal-dialog center" style="z-index:0;">
    <div class="modal-content">
        <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Login to site.com</h4>
        </div> -->
        <div class="modal-body" style="padding-bottom:0px;">

            <div class="row">
                <div class="col-xs-12" style="text-align: center;margin: 10px;">
                    <img src="assets/icon/logo.jpg" style="max-width: 200px;">
                    <hr/>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6" id="divSignIn"></div>
                <div class="col-xs-6">
                    <p class="lead"><i class="fa fa-info-circle" style="margin-right: 5px;"></i> Announcement</p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-caret-right text-success"></span> Academic Calender</li>
                        <li><span class="fa fa-caret-right text-success"></span> Students - How to KRS Online</li>
                        <li><span class="fa fa-caret-right text-success"></span> Students - </li>
                        <li><span class="fa fa-caret-right text-success"></span> Lecturers</li>
                        <li><span class="fa fa-caret-right text-success"></span> All Employees</li>
                        <li><span class="fa fa-caret-right text-success"></span> HBP</li>
                    </ul>
                    <p><a href="/new-customer/" class="btn btn-info btn-block">Read more</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12" style="text-align: center;font-size: 12px;color: #9E9E9E;">
                    <hr style="margin-bottom:10px;" />
                    <p>© 2018 IT PU, We Made With <i class="fa fa-coffee" aria-hidden="true"></i> & <i class="fa fa-heart" aria-hidden="true"></i>
                    <br/> Version 2.0.1
                    </p>
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

        // window.base_url_server = 'http://10.1.10.27:8080/siak3/';
        window.base_url_server = 'http://localhost:8080/siak3/';
        window.htmlUserName = '<div class="well" id="formWellUsername">' +
            '                        <div class="form-group">' +
            '                            <label for="username" class="control-label">Username</label>' +
            '                            <input type="text" class="form-control" id="username" placeholder="Input username...">' +
            '                        </div>' +
            '                        <div style="text-align: right;">' +
            '                            <button type="submit" class="btn btn-primary" id="btnLoginCheckUser">Next <i class="fa fa-angle-right"></i></button>' +
            '                        </div>' +
            '                        <hr/>' +
            '                        <button class="btn btn-default btn-default-danger btn-block" id="btnLoginWithGoogle"><i class="fa fa-google-plus"></i> Sign In With Google</button>' +
            '' +
            '                        <a href="/forgot/">Help to login</a><br/>' +
            '                    </div>';

        $('#divSignIn').html(htmlUserName);
    });

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

    $(document).on('keypress','#username',function (e) {
        if (e.which == 13) {
            CheckUsername2Login();
            return false;    //<---- Add this line
        }
    });

    $(document).on('click','#btnLoginCheckPassword',function () {
        CheckPassword2Login();
    });

    $(document).on('keypress','#password',function (e) {
        if (e.which == 13) {
            CheckPassword2Login();
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
                console.log(jsonResult);

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

            var url = base_url_server+'uath/__checkUsername';
            var token = jwt_encode({Username:Username});

            $.post(url,{token:token},function (jsonResult) {
                // console.log(jsonResult);
                setTimeout(function () {
                    if(jsonResult.Status=='1' && jsonResult.DataUser.Status!='0'){
                        $('#formWellUsername').animateCss('fadeOutLeft', function() {
                            // $('#formWellUsername').addClass('hide');

                            var htmlPass = '<div style="text-align: center;" id="dataAvatar">' +
                                '                        <img data-src="'+jsonResult.DataUser.PathPhoto+'" class="img-fitter img-circle avatar" width="70" height="70" />' +
                                '                        <h4 style="margin-bottom:0px;">'+jsonResult.DataUser.Name.trim()+'</h4>'+jsonResult.DataUser.Username+
                                '                        <hr/>' +
                                '                    </div>' +
                                '                    <div class="well" id="formWellPassword">' +
                                '                        <div class="form-group">' +
                                '                            <label for="password" class="control-label">Password</label>' +
                                '                            <input type="password" class="hide" hidden readonly id="user" ' +
                                'value="'+jsonResult.DataUser.Username+'.'+jsonResult.DataUser.Status+'.'+jsonResult.DataUser.User+'.'+jsonResult.DataUser.Year+'">' +
                                '                            <input type="password" class="form-control" id="password" placeholder="Input password...">' +
                                '                        </div><div id="divCaptcha"></div>' +
                                '                        <div style="text-align: right;">' +
                                '                            <button type="button" class="btn btn-default" id="btnBackLogin"><i class="fa fa-angle-left"></i> Back</button> | ' +
                                '                            <button type="submit" class="btn btn-success" id="btnLoginCheckPassword">Sign In <i class="fa fa-angle-right"></i></button>' +
                                '                        </div>' +
                                '                    </div>';

                            $('#divSignIn').html(htmlPass);

                            $('#formWellPassword').animateCss('fadeInRight', function() {
                                $('.img-fitter').imgFitter();
                                $('#password').focus();
                            });

                        });
                    }
                    else {
                        $('#btnLoginCheckUser').html('Next <i class="fa fa-angle-right"></i>').prop('disabled',false);
                        toastr.error(jsonResult.Message,'Error');
                        $('#username').val('').focus();

                    }




                },1000);
            });

        }
    }

    function CheckPassword2Login() {
        var Password = $('#password').val();

        if(Password!='' && Password!=null){
            loading_button('#btnLoginCheckPassword');
            $('#btnBackLogin').prop('disabled',true);
            var dataUser = $('#user').val();
            var url = base_url_server+'uath/__checkPassword';
            var data = {
                Username : dataUser.split('.')[0],
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
                        localStorage.setItem('LoginFalse', 0);
                        window.location.href='';
                    } else {
                        localStorage.setItem('LoginFalse', totalWrong);
                    }


                }
                else if(jsonResult.Status=='-1'){
                    modalChangePassword(jsonResult.DataUser);
                } else if(jsonResult.Status=='1'){

                    if(jsonResult.url_direct.length==1){
                        window.location.href = jsonResult.url_direct[0].url;
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
        var htmlBody = '<div class="row">' +
            '    <div class="col-xs-3" style="text-align:center;">' +
            '    <img src="'+dataUser.PathPhoto+'" class="img-rounded" style="width:100%;max-width: 200px;" />'+dataUser.Username+
            '    </div>' +
            '    <div class="col-xs-9">' +
            '    <h4>Hello, '+dataUser.Name+'</h4>' +
            'Pleace change your password first <i class="fa fa-smile-o" aria-hidden="true"></i>.' +
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
        $('#modalGlobal .modal-footer').addClass('hide');
        $('#modalGlobal .modal-body').html(htmlBody);

        $('#modalGlobal').modal({
            'backdrop' : 'static',
            'show' : true
        });

        $('#modalGlobal').on('shown.bs.modal', function () {
            $('#formNewPassword').focus();
        })
    }

    function updatePassword(data){
        var token = jwt_encode(data);
        var url = base_url_server+'uath/updatePassword';

        $.post(url,{token:token},function(jsonResult){
            console.log(jsonResult);

            $('#modalGlobal').modal('hide');

            if(jsonResult.url_direct.length==1){
                window.location.href = jsonResult.url_direct[0].url;
            } else if(jsonResult.url_direct.length>1){
                setTimeout(function () {
                    loadPagePanel(jsonResult.url_direct);
                },1000)
            }

        });

    }

    function loadPagePanel(ArrPage) {

        var htmlBody = '';
        for(var i=0;i<ArrPage.length;i++){
            var h = '';
            if(ArrPage[i].flag=='lec'){
                h = '<div class="col-md-6">' +
                    '    <a href="'+ArrPage[i].url+'" class="a-link">' +
                    '        <div class="thumbnail">' +
                    '            <img src="assets/icon/lecturer.png" />' +
                    '            <h4>Portal Lecturer</h4>' +
                    '        </div>' +
                    '    </a>' +
                    '</div>';
            }
            else {
                h = '<div class="col-md-6">' +
                    '    <a href="'+ArrPage[i].url+'" class="a-link">' +
                    '        <div class="thumbnail">' +
                    '            <img src="assets/icon/employee.png" />' +
                    '            <h4>P - Cam</h4>' +
                    '        </div>' +
                    '    </a>' +
                    '</div>';
            }

            htmlBody = htmlBody+''+h;
        }





        $('#modalGlobal .modal-header').addClass('hide');
        $('#modalGlobal .modal-footer').addClass('hide');
        $('#modalGlobal .modal-body').html('<div class="row">'+htmlBody+'</div>');
        $('#formNewPassword').focus();
        $('#modalGlobal').modal({
            'backdrop' : 'static',
            'show' : true
        });
    }

    function loading_button(element) {
        $(''+element).html('<i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading...');
        $(''+element).prop('disabled',true);
    }

</script>

</body>
</html>