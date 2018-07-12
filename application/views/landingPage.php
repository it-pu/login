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

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet">

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

    $(document).ready(function(){
        $('.img-fitter').imgFitter();
    });

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

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="thumbnail" style="padding: 20px;text-align: center;">
                <img data-src="<?php echo $Url_photo; ?>" class="img-fitter img-circle avatar" width="70" height="70" />
                <h4 style="margin-bottom:3px"><b><?php echo $Name; ?></b></h4>
                <span><?php echo $Username; ?></span>

                <hr/>
                <button type="button" id="btnSignInNow" class="btn btn-sm btn-block btn-success">Sign In Now</button>
                <a href="<?php echo base_url(); ?>" class="btn btn-sm btn-block btn-default">Sign Out</a>
            </div>
        </div>
    </div>
</div>

<script>

    $('#btnSignInNow').click(function(){
        var url = "<?php echo $url; ?>";
        window.location.href = url;
    });
</script>

</body>
</html>