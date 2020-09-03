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

<!-- JWT Encode -->
<script src="<?php echo base_url(); ?>assets/jwt/encode/hmac-sha256.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/enc-base64-min.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/jwt.encode.js"></script>

<!-- JWT Decode -->
<script type="text/javascript" src="<?php echo base_url('assets/jwt/decode/build/jwt-decode.min.js');?>"></script>

<script src="<?php echo base_url(); ?>assets/md5/md5.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.imgFitter.js"></script>
<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="<?= base_url('assets/newsbox/jquery.bootstrap.newsbox.min.js') ?>" type="text/javascript"></script>

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

    function getIPPublic() {

        try {
            $.getJSON("https://api.ipify.org/?format=json", function(e) {
                // console.log(e);
                // console.log(e.ip);

                localStorage.setItem('IPPublic',e.ip);

            });
        }
        catch (e){
            localStorage.setItem('IPPublic','');
        }

    }

    $(document).ready(function () {
        getIPPublic();
    });

    function loading_page_modal(action) {

        if(action=='hide' && typeof action !== 'undefined'){
            $('#modal2Loading').modal('hide');
        } else {
            $('#modal2Loading .modal-header').addClass('hide');
            $('#modal2Loading .modal-footer').addClass('hide');
            $('#modal2Loading .modal-dialog').removeClass('modal-sm modal-lg');
            $('#modal2Loading .modal-dialog').addClass('modal-sm');

            $('#modal2Loading .modal-body').html('<div style="text-align: center;"><h4><i class="fa fa-circle-o-notch fa-spin fa-fw"></i> <span>Loading page . . .</span></h4></div>');
            $('#modal2Loading').modal({
                'backdrop' : 'static',
                'show' : true
            });
        }
    }

</script>

<style>


    .table-centre tr th, .table-centre tr td {
        text-align: center;
    }
    body {
        font-family: 'MavenPro';
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
</style>

<body>

<?= $content; ?>

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

<!-- Modal -->
<div class="modal fade" id="modal2Loading" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>