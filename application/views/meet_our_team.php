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
<link href="<?php echo base_url(); ?>assets/css/compiled-4.10.1.min.css" rel="stylesheet">


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
<script src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- <script src="<?php echo base_url(); ?>assets/js/js_liquid.js"></script> -->

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
        background: rgb(241 241 241);
        /*background-image: url(images/bg-liquid.png);
        background-position: center;
        background-repeat: none;
        background-size: cover;*/
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
        width: 100px;
        border-radius: 100px;
        /*border-bottom-left-radius: 0px;*/
        /*border-bottom-right-radius: 0px;*/
        border: 3px solid #e2e2e2;
    }
    .team-name {
        margin-top: 10px;
        font-family: 'Courgette', cursive;
        font-size: 17px;
        /*background: #fff;*/
        font-weight: bold;
    }

    .col-xs-6 {
        text-align: center;
        margin-bottom: 15px;
    }

    .btn-liquid {
        display: inline-block;
        position: relative;
        width: 100%;
        height: auto;

        border-radius: 27px;

        color: #fff;
        font: 700 14px/60px "Droid Sans", sans-serif;
        letter-spacing: 0.05em;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
    }

    .btn-liquid .inner {
        position: relative;

        z-index: 2;
    }

    .btn-liquid canvas {
        position: absolute;
        top: -50px;
        right: -50px;
        bottom: -50px;
        left: -50px;

        z-index: 1;
    }
    .bg-profile{
        /*background-image: url(images/bg-profile2.png);*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .px-2{
        padding: 42px;
    }
    .p-0{
        padding: 0px;
    }
    .my-90{
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>
<body>


<div class="container my-90">

    <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-12" style="text-align: center;">
            <h1>- - - Meet our team - - -</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 mb-4">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/9907003.jpeg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">                    
                    <div class="team-name ">Lily B Putri</div>                        
                </h4>
                <hr>
                <!-- Quotation -->
                <p><b> WAKIL REKTOR II</b></p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                 <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018034.jpeg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">Martin Hasen</div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b>KABAG IT</b></p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017090.JPG">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">Nandang Mulyadi</div>

                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b>KASUBAG IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2016065.JPG">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">Novita Riani Br Ginting</div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p><b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018018.jpg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">Alhadi Rahman</div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017114.jpeg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">
                        <div class="team-name">Irfan Firdaus</div>
                    </div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019003.jpeg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">
                        <div class="team-name">Agustian</div>
                    </div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019072.png">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">
                        <div class="team-name">Ridwantoro</div>
                    </div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019002.jpeg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">
                        <div class="team-name">Jorgie Gilbert Sumual</div>
                    </div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-3 mb-5">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-up rgba-indigo-light"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019064.jpeg">
              </div>

              <!-- Content -->
              <div class="card-body">
                <!-- Name -->
                <h4 class="card-title">
                    <div class="team-name">
                        <div class="team-name">Ahmad Askhabul Yamin</div>
                    </div>
                </h4>
                <hr>
                <!-- Quotation -->
                <p> <b> STAFF IT</b>
                </p>
              </div>

            </div>
            <!-- Card -->
        </div>

    </div>

    <!-- <div class="row justify-content-center">

        <div class="col-xs-6 col-md-3 ">


            <div class="bg-profile">
                <div class="px-2" style="top:10px;position: relative;">                        
                    <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/9907003.jpeg">
                    <div class="team-name ">Lily B Putri</div>                        
                </div>
            </div>
                   
        </div>
        <div class="col-xs-6 col-md-3 ">
                <div class="bg-profile">
                    <div class="px-2" style="top:10px;position: relative;">
                        <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018034.jpeg">
                        <div class="team-name">Martin Hasen</div>
                    </div>
                </div>
        </div>

        <div class="col-xs-6 col-md-3 ">
                <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                        <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2016065.JPG">
                        <div class="team-name">Novita Riani Br Ginting</div>
                    </div>
                </div>
        </div>
        <div class="col-xs-6 col-md-3 ">
                <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                        <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017090.JPG">
                        <div class="team-name">Nandang Mulyadi</div>
                    </div>
                </div>
        </div>
            
        <div class="col-xs-6 col-md-3 ">
            
                <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                        <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018018.jpg">
                        <div class="team-name">Alhadi Rahman</div>
                    </div>
                </div>
        </div>
        <div class="col-xs-6 col-md-3 ">
                <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                            <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017114.jpeg">
                            <div class="team-name">Irfan Firdaus</div>
                        </div>
                </div>
        </div>
            

        <div class="col-xs-6 col-md-3 ">
                <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                        <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019003.jpeg">
                        <div class="team-name">Agustian</div>
                    </div>
                </div>
        </div>
        <div class="col-xs-6 col-md-3 ">
                <div class="bg-profile">
                    <div class="px-2" style="top:10px;position: relative;">
                        <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019072.png">
                        <div class="team-name">Ridwantoro</div>
                    </div>
                </div>                
        </div>

        <div class="col-xs-6 col-md-3 ">           
                <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                            <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019002.jpeg">
                            <div class="team-name">Jorgie Gilbert Sumual</div>
                        </div>
                    </div>
        </div>

        <div class="col-xs-6 col-md-3 ">
                    <div class="bg-profile">
                        <div class="px-2" style="top:10px;position: relative;">
                            <img class="img-fitter" data-src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019064.jpeg">
                            <div class="team-name">Ahmad Askhabul Yamin</div>
                        </div>
                    </div>
        </div>
            

    </div> -->
</div>


<script>
    $(document).ready(function () {
        $('.img-fitter').imgFitter();
    });
</script>
</body>
</html>