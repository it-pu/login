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

<link href="<?php echo base_url(); ?>assets/font/custom-font.css" rel="stylesheet">

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

<script type="text/javascript" src="<?php echo base_url('assets/'); ?>moment/moment.js"></script>

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

    window.dt_base_url_js = "<?= base_url(); ?>";
    window.dt_base_url_pas = "<?= url_pas; ?>";

    function addingLastSeen(UserID,Type,Name) {

        var dataLastSeen = localStorage.getItem('dataLastSeen');

        var newData = {
            Name : Name,
            UserID : UserID,
            Type : Type
        };
        var dataPush2LastSeen = [];
        if(dataLastSeen!=null && dataLastSeen!=''){
            dataPush2LastSeen = JSON.parse(dataLastSeen);
            var pushNew = true;
            for(var i=0;i<dataPush2LastSeen.length;i++){
                if(UserID==dataPush2LastSeen[i].UserID){
                    pushNew = false;
                    break;
                }
            }
            if (pushNew){
                dataPush2LastSeen.push(newData);
            }
        } else {
            dataPush2LastSeen.push(newData);
        }

        localStorage.setItem('dataLastSeen',JSON.stringify(dataPush2LastSeen));

    }
</script>

<style>


    .table-centre tr th, .table-centre tr td {
        text-align: center;
    }
    body {
        font-family: 'MavenPro';
    }
</style>

<body>

<?= $content; ?>

</body>
</html>