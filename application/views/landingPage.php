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
<link href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/template/js/libs/jquery-1.10.2.min.js'); ?><!--"></script>-->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/jwt/encode/hmac-sha256.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/enc-base64-min.js"></script>
<script src="<?php echo base_url(); ?>assets/jwt/encode/jwt.encode.js"></script>

<!------ Include the above in your HEAD tag ---------->
<script src="<?php echo base_url(); ?>assets/js/jquery.imgFitter.js"></script>
<script>

    $(document).ready(function(){
        window.base_url_server = '<?php echo base_url(); ?>';
        $('.img-fitter').imgFitter();
    });

</script>


<style type="text/css">

    body {
        background: #fcfcfc;
    }
    .avatar {
        border: 2px solid #607D8B;
    }

    #double .thumbnail:hover {
        border: 3px solid #607D8B;
        background: #f7f7f7;
        color: #607D8B;
        cursor: pointer;
    }

    .a-link {
        display: block;
        cursor: pointer;
    }

    .panel-eula {
        font-weight: bold;
        color: #4a57bd;
        background-color: #ddebf8;
        border: 1px solid #9096c7;
        padding: 19px;
        padding-top: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    .bg-eula {
        background: #f5dbc0 !important;
    }

    .tb-loading {

        font-size: 39px;
        margin-top: 85px;

        /*-webkit-box-shadow: 0px 0px 18px -8px rgba(0,0,0,0.75);*/
        /*-moz-box-shadow: 0px 0px 18px -8px rgba(0,0,0,0.75);*/
        /*box-shadow: 0px 0px 18px -8px rgba(0,0,0,0.75);*/
    }
</style>

<body>

<div class="container" style="margin-top: 50px;">
    <div class="row">

        <?php if($EULA==1 || $EULA=='1'){ ?>
            <div class="col-md-6 col-md-offset-3" style="text-align: center;">
                <div style="margin-bottom: 20px;">
                    <img src="<?= base_url('images/eula2.jpg'); ?>" style="width: 100%;max-width: 250px;">
                </div>
                <div class="panel-eula">
                    Thank you for using our portal services. The services are provided by Podomoro University. By using our Services, you are agreeing to these information. Please read them carefully.
                </div>
                <textarea class="hide" id="EulaDataToken"><?= $toInsertEULA; ?></textarea>
                <button class="btn btn-primary" id="EulaBtnStart"><b>Continue <i style="margin-left: 5px;" class="fa fa-arrow-right"></i></b></button>
            </div>
        <?php } else { ?>

        <?php if($User==1 || $User=='1'){ ?>
                <div class="col-xs-12">
                <div class="tb-loading" style="padding: 20px;text-align: center;">
                    <i class="fa fa-refresh fa-spin fa-fw right-margin"></i> Loading page...
                </div>
            </div>

        <?php } else { ?>

            <div id="double" class="col-md-8 col-md-offset-2">
                <div class="col-md-2"></div>


                <?php   for($p=0;$p<count($DataUser);$p++){
                    $UserData = $DataUser[$p];
                    if($UserData['flag']=='lec'){
                        ?>
                        <div class="col-md-4">
                            <a href="javascript:void(0);" class="a-link" data-url="<?php echo $UserData['url_login']; ?>" data-token="<?php echo $UserData['token']; ?>">
                                <div class="thumbnail" style="text-align: center;padding: 20px;">
                                    <img src="<?php echo base_url('assets/icon/lecturer.png') ?>">
                                    <hr/>
                                    <h4><b>Portal Lecturer</b></h4>
                                </div>
                            </a>
                        </div>

                    <?php } else {  ?>
                        <div class="col-md-4">
                            <a href="javascript:void(0);" class="a-link" data-url="<?php echo $UserData['url_login']; ?>" data-token="<?php echo $UserData['token']; ?>">
                                <div class="thumbnail" style="text-align: center;padding: 20px">
                                    <img src="<?php echo base_url('assets/icon/employee.png') ?>">
                                    <hr/>
                                    <h4><b>P - Cam</b></h4>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        <?php } ?>



        <?php }

        ?>

    </div>
</div>

<form action="" hidden id="formSubmitLogin" method="post">
    <input id="formTokenLogin" class="hide" hidden readonly name="token" />
</form>

<script>

    $(document).ready(function () {
        var user = "<?= $User; ?>";
        var EULA = "<?= $EULA; ?>"
        if(parseInt(user)==1 && parseInt(EULA)==0){
            var url_login = "<?php echo $url_login; ?>";
            var token = "<?php echo $token; ?>";
            $('#formSubmitLogin').attr('action',url_login);
            $('#formTokenLogin').val(token);
            $('#formSubmitLogin').submit();
        }
    });

    $(document).on('click','.a-link',function () {
        var url_login = $(this).attr('data-url');
        var token = $(this).attr('data-token');
        if(url_login!='' && url_login!=null && token!='' && token!=null){
            $('#formSubmitLogin').attr('action',url_login);
            $('#formTokenLogin').val(token);
            $('#formSubmitLogin').submit();
        }
    });

    $(document).on('click','#EulaBtnStart',function () {
        var EulaDataToken = $('#EulaDataToken').val();
        var url = base_url_server+'uath/__eulaStart';
        $.post(url,{token:EulaDataToken},function (jsonResult) {
            // console.log(jsonResult);
            // var d = JSON.parse(jsonResult);
            // console.log(d);
            if(jsonResult.Status==1){
                window.location.replace(base_url_server+'eula');
            }
        });

    });

</script>

</body>
</html>