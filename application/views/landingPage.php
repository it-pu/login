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