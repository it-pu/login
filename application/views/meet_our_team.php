<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podomoro University</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icon/favicon.png">

</head>


<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!--<link href="--><?php //echo base_url(); ?><!--assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" id="bootstrap-css">-->

<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
<link href="<?php echo base_url(); ?>assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/compiled-4.10.1.min.css" rel="stylesheet">


<!-- <link href="<?php echo base_url(); ?>assets/posisi/bootstrap-posisi.css" rel="stylesheet"> -->

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
<script src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>

<style>
  
body
{
  background: #f1f1f1;
  margin: 0;
  padding: 100px 0px;
  height: 100%;
  box-sizing: border-box;
  font-family: sans-serif;
}

h1
{
  margin-top: -50px;
  font-family: 'Courgette', cursive;
  text-align: center;
  color: #1785eb;
  font-size: 45px;
  
}

.container
{
  display: flex;
  align-items: center;
  justify-content: center;
  width: 80%;
  margin: auto;
}

.imgBx
{
  border-radius: 30px;
  background: #ffffff;
  text-align: center;
  overflow: hidden;
  position: relative;
  padding: 30px 0 40px;
  margin: 0px 20px;
  width: 30%; 
    height: 280px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.5);
}

.imgBx .pic
{
  display: inline-block;
  width: 130px;
  height: 130px;
  margin-bottom: 0px;
  z-index: 1;
  position: relative;
}

.imgBx .pic::before
{
  content: "";
  width: 100%;
  height: 0;
  border-radius: 50%;
  background: #1785eb;
  position: absolute;
  bottom: 135%;
  right: 0;
  left: 0;
  opacity: 0.2;
  transform: scale(3);
  transition: all 0.3s linear 0s;
}

.imgBx:hover .pic::before
{
  height: 100%;
}

.imgBx .pic::after
{
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: #1785eb;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
}

.imgBx .pic img
{
  width: 100%;
  height: auto;
  border-radius: 50%;
  transform: scale(1);
  transition: all 0.9s ease 0s;
}

.imgBx:hover .pic img
{
  box-shadow: 0 0 0 14px #f7f5ec;
  transform: scale(0.7);
}

.imgBx .content
{
  margin-bottom: 30px;
}

.imgBx .nama
{
  font-family: 'Courgette', cursive;
  font-size: 22px;
  font-weight: 700;
  color: #4e5052;
  letter-spacing: 1px;
  margin-bottom: 5px;
}

.imgBx .posisi
{
  width: 100%;
  padding: 0;
  margin: 0;
  background: #1785eb;
  position: absolute;
  bottom: -100px;
  left: 0;
  transition: all 0.5s ease 0s;
}

.imgBx:hover .posisi
{
  bottom: 0;
}


@media (max-width: 720px)
{
  .container
  {
    flex-direction: column;
  }
  .imgBx
  {
    width: 80%;
    margin-top: 30px;
  }
}

</style>
<body>

<h1>- - - Meet our team - - -</h1>

<div class="container" style="margin-top: 50px;">
  <!-- team 1 -->
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/9907003.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Lily B Putri</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">WAKIL REKTOR II</span>
    </ul>
  </div>
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018034.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Martin Hasen</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">KABAG IT</span>
    </ul>
  </div>
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017090.JPG" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Nandang Mulyadi</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">KASUBAG IT</span>
    </ul>
  </div>
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2016065.JPG" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Novita Riani Br Ginting</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
</div>
<div class="container" style="margin-top: 50px;">
  <!-- team 1 -->
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2018018.jpg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Alhadi Rahman</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2017114.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Irfan Firdaus</h3>
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019003.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Agustian</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  <div class="imgBx">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019072.png" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Ridwantoro</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  
</div>
<div class="container" style="margin-top: 50px;">
  <!-- team 1 -->
  <div class="imgBx" style="width: 230px;">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019002.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Jorgie Gilbert Sumual</h3>
      
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  <div class="imgBx" style="width: 230px;">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2019064.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Ahmad Askhabul Yamin</h3>
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  <div class="imgBx" style="width: 230px;">
    <div class="pic">
      <img src="https://pcam.podomorouniversity.ac.id/uploads/employees/2020046.jpeg" style="height: 130px;width: 130px;">
    </div>
    <div class="content">
      <h3 class="nama" style="margin-top: 18px;">Adi Kurnianto Saputro</h3>
    </div>
    <ul class="posisi">
      <span style="font-size: 20px; color: white;">STAFF IT</span>
    </ul>
  </div>
  
</div>
<script>
    $(document).ready(function () {
        $('.img-fitter').imgFitter();
    });
</script>
</body>
</html>