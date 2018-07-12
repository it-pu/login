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



</style>

<body>

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a href="">
                        <div class="thumbnail" style="text-align: center;padding: 20px;">
                            <img src="<?php echo base_url('assets/icon/lecturer.png') ?>">
                            <hr/>
                            <h4><b>Portal Lecturer</b></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="thumbnail" style="text-align: center;padding: 20px">
                            <img src="<?php echo base_url('assets/icon/employee.png') ?>">
                            <hr/>
                            <h4><b>P - Cam</b></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#btnSignInNow').click(function(){
        //var url = "<?php //echo $url; ?>//";
        //window.location.href = url;
    });
</script>

</body>
</html>