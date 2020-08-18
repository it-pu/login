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
<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
<style>
    body {
        /*background: #f9f9f9;*/
        background: #ffffff;
        /*background: rgba(218,218,218,1)*/
    }
    h1 {
        font-family: 'Courgette', cursive;
    }

    .thumbnail {
        padding: 10px;
        height: 150px;
        border: 3px solid #e2e2e2;
    }

    img {
        width: 90px;
        border-radius: 85px;
        /*border-bottom-left-radius: 0px;*/
        /*border-bottom-right-radius: 0px;*/
        border: 3px solid #e2e2e2;
    }
    .team-name {
        margin-top: 10px;
        font-family: 'Courgette', cursive;
        font-size: 17px;
        background: #fff;
        font-weight: bold;
    }

    .col-xs-6 {
        text-align: center;
        margin-bottom: 15px;
    }
</style>
<body>


<div class="container">

    <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-12" style="text-align: center;">
            <h1>- - - Meet our team - - -</h1>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/9907003.jpeg">
                    <div class="team-name">Lily B Putri</div>
                </div>
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018034.jpeg">
                    <div class="team-name">Martin Hasen</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2016065.JPG">
                    <div class="team-name">Novita Riani Br Ginting</div>
                </div>
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017090.JPG">
                    <div class="team-name">Nandang Mulyadi</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018018.jpg">
                    <div class="team-name">Alhadi Rahman</div>
                </div>
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017114.jpeg">
                    <div class="team-name">Irfan Firdaus</div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" style="text-align: center;margin-top: 20px;">

        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019003.jpeg">
                    <div class="team-name">Agustian</div>
                </div>
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019072.png">
                    <div class="team-name">Ridwantoro</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019002.jpeg">
                    <div class="team-name">Jorgie Gilbert Sumual</div>
                </div>
                <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019064.jpeg">
                    <div class="team-name">Ahmad Askhabul Yamin</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <!-- <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019006.jpeg">
                    <div class="team-name">Bismar Gazali</div>
                </div> -->
                <!-- <div class="col-xs-6">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019002.jpeg">
                    <div class="team-name">Jorgie Gilbert Sumual</div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.img-fitter').imgFitter();
    });
</script>
</body>
</html>