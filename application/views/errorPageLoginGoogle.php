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
            <div class="thumbnail" style="padding: 20px;text-align: center;">
                <div class="row">
                    <div class="col-xs-3" style="padding-top: 25px;padding-bottom:25px;background: lightyellow;">
                        <img src="<?php echo base_url('assets/icon/no-entry.png'); ?>" style="max-width: 100px;width: 100%;">
                    </div>
                    <div class="col-xs-9" style="text-align: left;">
                        <h1 style="margin: 0px;"><b>403</b></h1>
                        <h3 style="margin-top: 0px;">FORBIDDEN</h3>
                        <p>You don't have permission to access / on this server.</p>
                        <hr style="margin: 10px;" />
                        <p style="color: #00bcd4;">Pleace use email from <b>Podomoro University</b> or contact your administrator</p>

                    </div>
                </div>

            </div>

            <div style="text-align: center;margin-top: 20px;">
                <a href="<?php echo base_url(); ?>" class="btn btn-danger">Back to page sing in</a>
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