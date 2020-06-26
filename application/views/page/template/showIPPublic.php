<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
<body>

<script>
    $(document).ready(function () {
        getIPPublic();

    });

    function getIPPublic() {
        try {
            $.getJSON("https://api.ipify.org/?format=json", function(e) {
                // console.log(e);
                // console.log(e.ip);
                $('body').html(e.ip);


            });
        }
        catch (e){
            $('body').html('-');
        }
    }
</script>

</body>
</html>