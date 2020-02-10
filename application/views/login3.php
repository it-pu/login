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

<link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

<style>
    body h1, body h3 , body h4 {
        /*font-family: 'Ropa Sans', sans-serif;*/
        font-family: 'Pacifico', cursive;
        /*font-weight: bold;*/
    }

    .navbar-default {
        background-color: #ffffff;
        border-color: #efefef;
    }

    .thumbnail {
        padding: 0px;
        border-radius: 10px;

        -webkit-box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
        box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
    }

    img {
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    #Brand {
        position: absolute;
        top: 1px;
        left: 58px;
        max-width: 150px;
    }

    .panel-info {
        padding: 10px;
    }



    /*
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/

    @media (min-width: 1281px) {

    //CSS

    }

    /*
      ##Device = Laptops, Desktops
      ##Screen = B/w 1025px to 1280px
    */

    @media (min-width: 1025px) and (max-width: 1280px) {

    //CSS

    }

    /*
      ##Device = Tablets, Ipads (portrait)
      ##Screen = B/w 768px to 1024px
    */

    @media (min-width: 768px) and (max-width: 1024px) {

    //CSS

    }

    /*
      ##Device = Tablets, Ipads (landscape)
      ##Screen = B/w 768px to 1024px
    */

    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

    //CSS

    }

    /*
      ##Device = Low Resolution Tablets, Mobiles (Landscape)
      ##Screen = B/w 481px to 767px
    */

    @media (min-width: 481px) and (max-width: 767px) {

    //CSS

    }

    /*
      ##Device = Most of the Smartphones Mobiles (Portrait)
      ##Screen = B/w 320px to 479px
    */

    @media (min-width: 320px) and (max-width: 480px) {

        .panel-left, .panel-right {
            margin-bottom: 7px !important;
        }

        .panel-left {
            padding-left: 10px !important;
        }
        .panel-right {
            padding-right: 10px !important;
        }

        .col-xs-6 {
            padding-right: 3px;
            padding-left: 3px;
        }

    }

    .img-prodi {
        border-radius: 10px;
    }

    .up-name {
        text-align: center;
        padding: 5px;
        padding-top: 0px;
    }

    .img-header {
        border-radius: 5px;

        -webkit-box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
        box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
    }

    .list-galery-header {
        margin-bottom: 10px;
    }

    .list-galery-header .col-md-2 {
        padding: 5px;
    }
    .list-galery-header .col-md-2 img {
        -webkit-box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
        box-shadow: 0px 4px 13px -8px rgba(0,0,0,0.75);
    }

    .carousel-inner img {
        border-radius: 0px;
    }

</style>



<body>


<nav class="navbar navbar-default navbar-me navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
<!--                <img id="Brand" src="--><?//= base_url('assets/img/pu-only-logo.png'); ?><!--">-->
                <img id="Brand" src="<?= base_url('assets/icon/logo_pu.png'); ?>">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<div style="background: #fff;padding-top: 15px;">
    <div class="container">
        <div class="row" style="margin-bottom: 30px;margin-top: 70px;">
            <div class="col-md-6">
                <div style="">
                    <h1>Podomoro University</h1>

                    <p style="font-size: 20px;">
                        <span class="label label-danger">#ExploreRoomPodomoroUniversity</span>
                        <br/>
                        From the basics to advanced, you'll find everything Web design here. Web Design on Pinterest has 10.2m followers,
                        68.6m people saving ideas and thousands of ideas and images to try.
                    </p>
                </div>

                <div class="hide">
                    <hr/>

                    <div class="row list-galery-header">
                        <div class="col-md-2">
                            <img class="img-header" src="<?= base_url('images/room/Admissions Office.JPG') ?>">
                        </div>
                        <div class="col-md-2">
                            <img class="img-header" src="<?= base_url('images/room/Architecture Class.JPG') ?>">
                        </div>
                        <div class="col-md-2">
                            <img class="img-header" src="<?= base_url('images/room/Babson Room.JPG') ?>">
                        </div>
                        <div class="col-md-2">
                            <img class="img-header" src="<?= base_url('images/room/BEST - IMG_4792.JPG') ?>">
                        </div>
                        <div class="col-md-2">
                            <img class="img-header" src="<?= base_url('images/room/Computer Lab.JPG') ?>">
                        </div>
                        <div class="col-md-2">
                            <img class="img-header" src="<?= base_url('images/room/Coridor.JPG') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <button class="btn btn-lg btn-default">Explore more room</button>
                        </div>
                    </div>
                </div>

                <div class="row list-galery-header hide">
                    <div class="col-md-2">
                        <img class="img-header" src="<?= base_url('images/room/Discussion Room Fl. 3rd.JPG') ?>">
                    </div>
                    <div class="col-md-2">
                        <img class="img-header" src="<?= base_url('images/room/Elevator APL.JPG') ?>">
                    </div>
                    <div class="col-md-2">
                        <img class="img-header" src="<?= base_url('images/room/General Class 1.JPG') ?>">
                    </div>
                    <div class="col-md-2">
                        <img class="img-header" src="<?= base_url('images/room/General Class 2.JPG') ?>">
                    </div>
                    <div class="col-md-2">
                        <img class="img-header" src="<?= base_url('images/room/Lecturers Room.JPG') ?>">
                    </div>
                    <div class="col-md-2">
                        <img class="img-header" src="<?= base_url('images/room/Library.JPG') ?>">
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?= base_url('images/room/Admissions Office.JPG') ?>" alt="...">
                            <div class="carousel-caption">
                                <h4>Admissions Office</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?= base_url('images/room/Architecture Class.JPG') ?>" alt="...">
                            <div class="carousel-caption">
                                <h4>Architecture Class</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?= base_url('images/room/General Class 2.JPG') ?>" alt="...">
                            <div class="carousel-caption">
                                <h4>General Class</h4>
                            </div>
                        </div>

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
<!--                <img class="img-header" src="">-->
            </div>


        </div>
    </div>
</div>

<div style="background: #efefef;min-height: 100px;">
    <div class="container">
        <div class="">
            <div class="row" style="margin-bottom: 30px;text-align: center;">
                <div class="col-md-12">
                    <h1>Explore Podomoro University</h1>
                </div>
            </div>

            <div class="row" style="margin-bottom: 30px;">

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 panel-left">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Admissions Office.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Admission</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 panel-right">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Architecture Class.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Architecture Class</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 panel-left">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Babson Room.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Babson Room</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 panel-right">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Computer Lab.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Computer Lab</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <div class="container" style="min-height: 10000px;">

        <div class="hide">
            <div class="row" style="margin-bottom: 30px;text-align: center;">
                <div class="col-md-12">
                    <h1>Explore Podomoro University</h1>
                </div>
            </div>

            <div class="row" style="margin-bottom: 30px;">

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 panel-left">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Admissions Office.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Admission</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 panel-right">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Architecture Class.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Architecture Class</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 panel-left">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Babson Room.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Babson Room</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 panel-right">
                            <div class="thumbnail">
                                <img src="<?= base_url('images/room/Computer Lab.JPG') ?>">
                                <div class="panel-info">
                                    <h4>Computer Lab</h4>
                                    <p>To embed your selected fonts into a webpage, copy this code into the <head> of your HTML document.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" style="margin-bottom: 30px;text-align: center;">
            <div class="col-md-12">
                <h1>Undergraduate Programs</h1>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px;">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-6 panel-left">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-acc-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Accounting</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 panel-right">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-ars-1-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Architecture</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-6 panel-left">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-cem-1-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Construction Engineering & Management</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 panel-right">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-dpp-1-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Design Product</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-bottom: 30px;">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-6 panel-left">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-ent-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Entreprenuership</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 panel-right">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-hbp-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Hotel Business</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-6 panel-left">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-law-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Business Law</h4>
                        </div>
                    </div>
                    <div class="col-xs-6 panel-right">
                        <img class="img-prodi" src="<?= base_url('images/prodi/butt-upp-1-613x542-613x542.jpg'); ?>">
                        <div class="up-name">
                            <h4>Urban & Regional Planning</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>

</body>

<script>

    // $(window).scroll(function() {
    //     if($(this).scrollTop()>7) {
    //         $( ".navbar-me" ).addClass("navbar-fixed-top");
    //         $( ".navbar-me" ).css("border-color",'#efefef');
    //     } else {
    //         $( ".navbar-me" ).removeClass("navbar-fixed-top");
    //         $( ".navbar-me" ).css("border-color",'#efefef');
    //     }
    // });

</script>

</html>