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

<!------ Include the above in your HEAD tag ---------->
<script src="<?php echo base_url(); ?>assets/js/jquery.imgFitter.js"></script>
<script>

    $(document).ready(function(){
        $('.img-fitter').imgFitter();
    });

</script>


<style type="text/css">

    body {
        background: #d4dde6;
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
</style>

<body>

<div class="container" style="margin-top: 50px;">
    <div class="row">

    <?php if($User==1 || $User=='1'){ ?>
            <div class="col-xs-4 col-md-offset-4">
                <div class="thumbnail" style="padding: 20px;text-align: center;">
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

    </div>
</div>

<form action="" hidden id="formSubmitLogin" method="post">
    <input id="formTokenLogin" class="hide" hidden readonly name="token" />
</form>

<script>

    $(document).ready(function () {
        var user = "<?php echo $User; ?>";
        if(user==1 || user=='1'){
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

</script>

</body>
</html>