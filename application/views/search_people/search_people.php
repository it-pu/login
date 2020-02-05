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

<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
<style>
    h1 {
        font-family: 'Fredoka One', cursive;
    }

    .avatar-name {
        font-family: 'Fjalla One', sans-serif;
    }

    .input-group-lg {
        -webkit-box-shadow: 1px 1px 5px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: 1px 1px 5px -2px rgba(0,0,0,0.75);
        box-shadow: 1px 1px 5px -2px rgba(0,0,0,0.75);

        border-radius: 45px;
    }
    .input-group-addon {
        background: #ffffff;
        border-right: 1px solid #ffffff;
    }
    .input-group-lg>.form-control {
        border-radius: 22px;
        border-left: none;
    }

    .input-group-lg>.input-group-addon {
        border-top-left-radius: 22px;
        border-bottom-left-radius: 22px;
    }
</style>

<body>

<style>

    textarea:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus {
        border-color: #CCCCCC;
        box-shadow: none;
        outline: 0 none;
    }


    .card {
        background-color: rgba(214, 224, 226, 0.2);
        text-align: center;
        padding: 15px;
        border: 1px solid #cccccc7a;
        border-radius: 5px;
        height: 221px;
        margin-bottom: 25px;
    }
    .card:hover {
        background: rgba(214, 224, 226, 0.59);
        cursor: pointer;
    }
    .card img.avatar {
        width: 75px;
        height: 75px;
        border-radius: 45px;
        border: 1px solid #CCCCCC;
    }

    @keyframes placeHolderShimmer {
        0% {
            background-position: -468px 0
        }
        100% {
            background-position: 468px 0
        }
    }

    .animated-background {
        animation-duration: 1s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: placeHolderShimmer;
        animation-timing-function: linear;
        background: #f6f7f8;
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background-size: 800px 104px;
        height: 221px;
        position: relative;
    }
    .loading-page .col-xs-6{
        margin-bottom: 25px;
    }
</style>

<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12" style="text-align: center;">
            <h1>Search people</h1>
        </div>
        <div class="col-md-8 col-md-offset-2" style="margin-top: 20px;">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" id="formSearch" autofocus placeholder="Search..." aria-describedby="sizing-addon1">
            </div>
        </div>
    </div>


    <div class="row" style="margin-top: 50px;" id="showData"></div>
    <div class="row" style="margin-top: 50px;" id="showDataStd"></div>
</div>



<script>
    // setTimeout(function () {
    //     $('.timeline-wrapper').hide();
    //     $('.show-data').show();
    // }, 3000);
</script>



<script>
    $(document).ready(function () {

        window.defaultPage = '';
        window.defaultPage1 = '<div class="col-md-2 col-md-offset-3">' +
            '            <div class="card">' +
            '                <i class="fa fa-question fa-5x" style="color: #c2c2c27a;"></i>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-2">' +
            '            <div class="card">' +
            '                <i class="fa fa-question fa-5x" style="color: #c2c2c27a;"></i>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-2">' +
            '            <div class="card">' +
            '                <i class="fa fa-question fa-5x" style="color: #c2c2c27a;"></i>' +
            '            </div>' +
            '        </div>';

        window.notFoundPage = function (key) {

            var pg = '<div style="text-align: center;color: #9e9e9ea6;margin-bottom: 15px;">' +
            '            <h1>Sorry we couldn\'t find any matches for  <span style="color: #1e90ffbd;">'+key+'</span></h1>' +
            '        </div>';
            return pg;
        };

        window.loadingPage = '<div class="col-md-4 loading-page">' +
            '            <div class="row">' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-4 loading-page">' +
            '            <div class="row">' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-4 loading-page">' +
            '            <div class="row">' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>';

        $('#showData').html(defaultPage);

        $('.img-fitter').imgFitter();
    });

    $('#formSearch').keyup(function () {
        var key = $(this).val();



        if(key!=''){



            $('#showData,#showDataStd').html(loadingPage);

            var base_url_js = "<?= base_url(); ?>";
            var url = base_url_js+'__getPeople?key='+key.trim();
            $.getJSON(url,function (jsonResult) {
                console.log(jsonResult);
                

                setTimeout(function () {
                    $('#showData,#showDataStd').empty();
                    // Employees
                    if(jsonResult.Employees.length>0){
                        var isi = 1;
                        var detailList = '';
                        $.each(jsonResult.Employees,function (i,v) {

                            if(isi==3){ isi = 1; }

                            var depan = (isi==1) ? '<div class="col-md-4"><div class="row">' : '';
                            var belakang = ((i+1) == jsonResult.Employees.length || isi==2) ? '</div></div>' : '';

                            detailList = detailList+depan+'<div class="col-xs-6 animated fadeIn">' +
                                '            <div class="card">' +
                                '                <div>' +
                                '                    <img class="avatar img-fitter" data-src="'+v.Photo+'">' +
                                '                </div>' +
                                '                <h4 class="avatar-name">'+v.Name+'<br/><small>'+v.NIP+'</small></h4>' +
                                '                <p>'+v.Dvision+'</p>' +
                                '            </div>' +
                                '        </div>'+belakang;

                            isi = isi + 1;
                        });

                        $('#showData').html(detailList);

                        $('.img-fitter').imgFitter();
                    }

                    if(jsonResult.Students.length>0){
                        var isi = 1;
                        var detailList = '';

                        $.each(jsonResult.Students,function (i,v) {

                            if(isi==3){ isi = 1; }

                            var depan = (isi==1) ? '<div class="col-md-4"><div class="row">' : '';
                            var belakang = ((i+1) == jsonResult.Students.length || isi==2) ? '</div></div>' : '';

                            detailList = detailList+depan+'<div class="col-xs-6 animated fadeIn">' +
                                '            <div class="card">' +
                                '                <div>' +
                                '                    <img class="avatar img-fitter" data-src="'+v.Photo+'">' +
                                '                </div>' +
                                '                <h4 class="avatar-name">'+v.Name+'<br/><small>'+v.NPM+'</small></h4>' +
                                '                <p>'+v.Prodi+'</p>' +
                                '            </div>' +
                                '        </div>'+belakang;

                            isi = isi + 1;
                        });

                        $('#showDataStd').html(detailList);

                        $('.img-fitter').imgFitter();
                    }


                    if(jsonResult.Employees.length<=0 && jsonResult.Students.length<=0) {
                        var notFoundPageData = notFoundPage(key);
                        $('#showData').html(notFoundPageData);
                    }
                },1000);


            });


        } else {
            setTimeout(function () {
                $('#showData').html(defaultPage);
            },1000);
        }
    });
</script>

</body>
</html>