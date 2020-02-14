<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="education, top education, education in indonesia, world education, education and training, education system, education system in indonesia, top education countries, academic, academy asia, top academic journals, best academic colleges, best academic colleges in the world, top academic countries, top academic universities in the world, top academic universities, research, international research, research in indonesia, international research university, collaboration, international collaboration, collaboration and innovation, collaboration and social business, student exchange international, student exchange 2017 indonesia, student exchange indonesia, international student exchange program, student exchange, international student exchange, culture, scholar, independent, it, sme, university, its, technology, student, dkv, computer science, superior, itb, information technology, collaboration, broadcasting, mmu, online courses, lecture, accreditation, utem, semarang, job fair, informatics, information systems, fkm, information management, podomoro university, pu, cultured,
    visual communication design, PU, pu, central park, APL Tower, Agung Podomoro Group, APL, Agung Podomoro, Trihatma Kusuma Haliman, Bacelius Ruru, Cosmas Batubara, Serian Wijatno, central java, faculty of public health, student achievement, tv ku, world class university, economics faculty, faculty of computer science, engineering informatics, semarang central java, the faculty of engineering, scholarship s2, scholarship s1, cultural studies , collaborative research, collaborating and partnering, research colleges, international research papers "/>
    <meta name="description" content="Universitas Agung Podomoro | Podomoro University"/>
    <meta name="Author" content="Copyright 2020, Designed & Development by IT Podomoro University"/>
    <meta name="robots" content="all"/>
    <meta name="robots" content="index,follow"/>
    <meta name="Googlebot" content="index,follow"/>

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

<link href="<?php echo base_url(); ?>assets/hover-master/hover-min.css" rel="stylesheet">

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

<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,800&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
<style>

    @font-face {
        font-family: 'MavenPro';
        src: url("./assets/font/maven/MavenPro.ttf");
        src: url("./assets/font/maven/MavenPro.ttf") format('ttf'),
        url("./assets/font/maven/MavenPro.ttf") format('truetype');
    }

    @font-face {
        font-family: 'MavenPro-SemiBold';
        src: url("./assets/font/maven/static/MavenPro-SemiBold.ttf");
        src: url("./assets/font/maven/static/MavenPro-SemiBold.ttf") format('ttf'),
        url("./assets/font/maven/static/MavenPro-SemiBold.ttf") format('truetype');
    }

    body {
        padding: 20px;
        /*font-family: 'Maven Pro', sans-serif;*/
        font-family: 'MavenPro-SemiBold';
        background-color: #eaeaea;
    }

    #listApps, #listProdi {
        margin-bottom: 30px;
    }

    #listApps .row {
        margin-bottom: 15px;
    }

    .apps-grid {
        margin-bottom: 0px !important;
    }

    #listApps .thumbnail {
        padding: 10px;
        text-align: center;
        height: 130px;
        border-radius: 5px;
        border: none;
    }

    #listApps a {
        text-decoration: none;
        color: #333333;
    }

    #listApps .thumbnail p {
        font-size: 15px;
        margin-top: 10px;
        color: #7b7b7b;
    }

    #listApps .thumbnail img {
        width: 100%;
        max-width: 50px;
        padding-top: 10px;
    }

    #listProdi .thumbnail {
        border: none;
        border-radius: 0px;
        padding: 0px;
    }


    .page-coming-soon {
        position: absolute;
        top: -6px;
        right: 18px;
        background: #FF5722;
        color: #fff;
        font-size: 10px;
        padding: 0px 5px 0px 5px;
        border-radius: 3px;
        border: 1px solid #ffffff;
    }

    #listProdi img {
        width: 100%;
        border-radius: 5px;
    }

    #listProdi .col-md-6 {
        margin-bottom: 20px;
    }
</style>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-bottom: 30px;">
            <a href="https://podomorouniversity.ac.id/" target="_blank">
                <img src="<?= base_url(); ?>assets/icon/logo_pu.png" style="width: 100%; max-width: 200px;">
            </a>
        </div>
    </div>
</div>

<div class="container" id="listApps">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="row hide">
                <div class="col-md-12">
                    <h4 style="border-left: 7px solid #FF5722;padding-left: 7px;">Information System</h4>
                </div>
            </div>

            <div class="row apps-grid">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="<?= base_url('portal-login'); ?>" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/idea.png">
                                    <p>Login Portal</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://portal.podomorouniversity.ac.id/assets/documents/Student_Portal.pdf" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/android.png">
                                    <p>Student Mobile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="<?= base_url('search-people'); ?>" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/searc-people.png">
                                    <p>Search People</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <!--                            <a href="https://alumni.podomorouniversity.ac.id/" target="_blank">-->
                            <a href="javascript:void(0)" class="coming-soon">
                                <div class="thumbnail">
                                    <div class="page-coming-soon">Coming soon</div>
                                    <img src="<?= base_url(); ?>images/icon/alumni.png">
                                    <p>Alumni</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://podivers.org/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/bem.png">
                                    <p>Podivers</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <!--                            <a href="https://career.podomorouniversity.ac.id/" target="_blank">-->
                            <a href="javascript:void(0)" class="coming-soon">
                                <div class="thumbnail">
                                    <div class="page-coming-soon">Coming soon</div>
                                    <img src="<?= base_url(); ?>images/icon/career.png">
                                    <p>Career</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row apps-grid">

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://cblibrary.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/student.png">
                                    <p>CB Library</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://journal.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/journal.png">
                                    <p>Journal</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://portal.podomorouniversity.ac.id/assets/documents/PARENT_PORTAL.pdf" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/parents.png">
                                    <p>Parent Portal</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://repository.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/repository.png">
                                    <p>Repository</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://sister.podomorouniversity.ac.id/auth/login" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/sister.png">
                                    <p>Sister</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://blogs.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/blogs.png">
                                    <p>Blogs</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row apps-grid">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://pucel.co/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/pucel.png">
                                    <p>Pucel</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://pu-x.com/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/pux.png">
                                    <p>PU-X</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://play.google.com/store/apps/details?id=com.ypap.CRM" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/crm.png">
                                    <p>CRM Mobile</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://admission.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/registration.png">
                                    <p>Online Registrations</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container" id="listProdi">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row hide" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <h4 style="border-left: 7px solid #FF5722;padding-left: 7px;">Undergraduate Programs</h4>
                </div>
            </div>

            <div class="row" style="">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://acc.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/acc.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://arc.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/arc.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://law.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/blp.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://cem.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/cem.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://ent.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/ent.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://hbp.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/hbp.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://urp.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/urp.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://pdp.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/pdp.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div style="text-align: center;">
                <a href="<?= base_url('meet-our-team'); ?>" target="_blank" style="color: #333333;">
                    <i class="fa fa-copyright" aria-hidden="true"></i> 2020 Universitas Agung Podomoro
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('.coming-soon').click(function () {
        alert('Coming soon :)');
    });
</script>


</body>
</html>