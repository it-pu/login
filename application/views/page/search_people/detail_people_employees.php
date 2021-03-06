<?php

if(count($dataEmployees)>0){
    $d = $dataEmployees[0];


?>
    <style>
        .avatar-name {
            font-family: "MavenPro-Bold"
        }

        .thumbnail {
            border-radius: 0px;
            -webkit-box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);

        }
        .avatar-img-scholar {
            width: 100%;
            max-width: 100px;
            padding: 5px;
            border: 1px solid #CCCCCC;
            -webkit-box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
        }
        .avatar-img {
            width: 100%;
            max-width: 150px;
            border-radius: 0px;
            border: 1px solid #ccc;
            padding: 5px;
            -webkit-box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.75);
        }
        .btnDetailAcc .fa {
            margin-right: 5px;
        }
    </style>

<div style="background: rgba(214, 224, 226, 0.2);padding-top: 15px;padding-bottom: 15px;">
    <div class="container" style="margin-top: 30px;">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <a href="<?= base_url('search-people'); ?>" class="btn btn-warning"><i class="fa fa-arrow-left" style="margin-right: 5px"></i> Back to search people</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div style="text-align: center;">
                            <h1 class="avatar-name" style="margin-top: 0px;margin-bottom: 25px;"><?= $d['Name']; ?></h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3" style="margin-bottom: 15px;">
                        <div style="text-align: center;">
                            <?php
                                $imgPhoto = ($d['Photo']!='' && $d['Photo']!=null)
                                    ? 'https://pcam.podomorouniversity.ac.id/uploads/employees/'.$d['Photo']
                                    : 'https://pcam.podomorouniversity.ac.id/images/icon/no_image.png';
                            ?>
                            <img src="<?= $imgPhoto; ?>" class="avatar-img">
                            <div style="margin-top: 15px;" class="hide">
                                <img src="http://simpeg.dinus.ac.id/updir/qr/0686.11.2001.267.png" class="avatar-img-scholar">
                                <div>My Scholar</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">

                        <div class="thumbnail">
                            <table class="table table-striped" style="margin-bottom: 0px;">
                                <tr>
                                    <td style="width: 25%;border-top: none;">NIP</td>
                                    <td style="width: 1%;border-top: none;">:</td>
                                    <td style="border-top: none;"><?= $d['NIP']; ?></td>
                                </tr>
                                <?php if($d['NIDN']!='') { ?>
                                    <tr>
                                        <td>NIDN</td>
                                        <td>:</td>
                                        <td><?= $d['NIDN']; ?></td>
                                    </tr>
                                <?php } ?>
                                <!-- HIDE BY FEBRY @ MARCH 2020 -->
                                <?php if( $d['ProdiName']!='') { ?>
                                    <!-- <tr>
                                        <td>Home Base</td>
                                        <td>:</td>
                                        <td><a href="https://<?= $d['Host']; ?>" target="_blank"><?= $d['ProdiName']; ?></a></td>
                                    </tr> -->
                                <?php } ?>

                                <!-- <tr>
                                    <td>E-mail</td>
                                    <td>:</td>
                                    <td><span style="color: #FF5722;"><?= $d['EmailPU']; ?></span></td>
                                </tr> -->

                                <?php if($d['StatusLecturer']!='') { ?>
                                    <!-- <tr>
                                        <td>Lecturer Status</td>
                                        <td>:</td>
                                        <td><?= $d['StatusLecturer']; ?></td>
                                    </tr> -->
                                <?php } ?>

                                <!-- <tr>
                                    <td>Position</td>
                                    <td>:</td>
                                    <td><?= $Division; ?> <i class="fa fa-arrow-right" style="margin-right: 5px; margin-left: 5px;"></i> <?= $Position; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?= ($d['Address']!='' && $d['Address']!=null) ? substr($d['Address'],0,15).'____' : '-' ; ?></td>
                                </tr> -->
                                <!-- END HIDE BY FEBRY @ MARCH 2020 -->
                            </table>
                        </div>
                        <div class="hide" style="margin-top: 10px;">
                            <button class="btn btn-default" style="color: blue;"><i class="fa fa-link" style="margin-right: 5px;"></i> Get short link</button>
                            <button class="btn btn-primary"><i class="fa fa-linkedin-square" style="margin-right: 5px;"></i> Linkedin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;margin-bottom: 50px;">
            <div class="col-md-10 col-md-offset-1">

                <div class="thumbnail" style="padding: 10px;">

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="javascript:void(0);" class="btnDetailAcc" data-acc="getDPTimetable">Timetables</a></li>
                        <li role="presentation"><a href="javascript:void(0);" class="btnDetailAcc" data-acc="getMentoring">Mentoring Final Project <span class="badge"><?= $TotalFP; ?></span></a></li>
                        <li role="presentation"><a href="javascript:void(0);" class="btnDetailAcc" data-acc="getResearch">Research <span class="badge"><?= $TotalResaerch; ?></span></a></li>
                        <li role="presentation"><a href="javascript:void(0);" class="btnDetailAcc" data-acc="getPublikasi">Scientific Publications <span class="badge"><?= $TotalPublikasi; ?></span></a></li>
                        <li role="presentation"><a href="javascript:void(0);" class="btnDetailAcc" data-acc="getDedication">Scienty Services <span class="badge"><?= $TotalDedication; ?></span></a></li>
                        <li role="presentation"><a href="javascript:void(0);" class="btnDetailAcc" data-acc="getHKI">HKI  <span class="badge"><?= $TotalHKI; ?></span></a></li>
                    </ul>

                    <div style="margin-top: 30px;" id="loadDetails">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

    <script>

        $(document).ready(function () {
            loading_page('#loadDetails');
            window.dt_NIP = "<?= $d['NIP']; ?>";
            window.dt_Name = "<?= $d['Name']; ?>";
            loadTimeTable();


            try {
                $.getJSON("https://api.ipify.org/?format=json", function(e) {
                    inputLogging(dt_NIP,e.ip);
                });
            } catch (e){
                inputLogging(dt_NIP,'');
            }

            addingLastSeen(dt_NIP,'emp',dt_Name);

        });
        
        function inputLogging(NIP,IP_Public) {

            var token = jwt_encode({
                action : 'setDataLogging',
                NIP : NIP,
                IP_Public : IP_Public
            });
            var url = dt_base_url_js+'__getDetailsPeople';

            $.post(url,{token:token},function(result) {

            });

        }

        function dataNotYet() {
            setTimeout(function () {
                $('#loadDetails').html('<div style="text-align: center;margin-top: 50px;margin-bottom: 50px;"><h3 style="color: #a7a7a7;">--- <img src="'+dt_base_url_js+'images/icon/empty-folder.png" style="max-width: 50px;margin-top: -14px;margin-right: 10px;"/>No data ---</h3></div>');
            },500);
        };

        function loading_page(elm){
            $(elm).html('<div style="text-align: center;margin-top: 20px;margin-bottom: 50px;"><i class="fa fa-circle-o-notch fa-spin fa-fw" style="margin-right: 5px;"></i>Loading...</div>');
        }

        $('.btnDetailAcc').click(function () {
            var acc = $(this).attr('data-acc');
            $('a.btnDetailAcc').parent().removeClass('active');
            $('a[data-acc='+acc+']').parent().addClass('active');

            loading_page('#loadDetails');

            if(acc=='getDPTimetable'){
                loadTimeTable();
            }
            else if(acc=='getMentoring'){
                loadMentoring();
            }
            else if(acc=='getResearch'){
                loadResearch();
            }
            else if(acc=='getPublikasi'){
                loadPublikasi();
            }
            else if(acc=='getDedication'){
                loadDedication();
            }
            else if(acc=='getHKI'){
                loadHKI();
            }
        });

        function loadTimeTable() {

            var data = { action : 'getDPTimetable', NIP : dt_NIP };
            var token = jwt_encode(data);

            var url = dt_base_url_js+'__getDetailsPeople';

            $.post(url,{token:token},function (jsonResult) {

                var viewlistTb = '';
                if(jsonResult.Timetables.length>0){
                    $.each(jsonResult.Timetables,function (i,v) {

                        var Schedule = '';
                        if(v.Schedule.length>0){
                            $.each(v.Schedule,function (i2,v2) {
                                Schedule = Schedule+'<div>'+v2.Dayname+',<b style="color: #ff5722;"> '+v2.StartSessions.substring(0,5)+' - '+v2.EndSessions.substring(0,5)+' </b> | <i class="fa fa-map-marker" style=""></i> '+v2.Room+'</div>';
                            });
                        }

                        viewlistTb = viewlistTb+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td style="text-align: left;"><b>'+v.CourseEng+'</b><br/>'+v.Course+'</td>' +
                            '<td>'+v.ClassGroup+'</td>' +
                            '<td style="text-align: left;">'+Schedule+'</td>' +
                            '</tr>';
                    });

                    var SemesterName = jsonResult.Semester[0].Name;
                    setTimeout(function () {

                        $('#loadDetails').html('<h4 class="avatar-name" style="border-left: 10px solid orange;padding-left: 10px;">'+SemesterName+'</h4>' +
                            '                        <div class="table-responsive">' +
                            '                           <table class="table table-striped table-bordered table-centre">' +
                            '                            <thead>' +
                            '                            <tr style="background: #e0e0e091;">' +
                            '                                <th style="width: 1%;">No</th>' +
                            '                                <th>Course</th>' +
                            '                                <th style="width: 10%;">Group</th>' +
                            '                                <th style="width: 35%;">Schedule</th>' +
                            '                            </tr>' +
                            '                            </thead>' +
                            '                            <tbody>'+viewlistTb+'</tbody>' +
                            '                        </table></div>');

                    },500);
                } else {
                    dataNotYet();
                }



            });

        }

        function loadMentoring() {
            var data = { action : 'getMentoring', NIP : dt_NIP };
            var token = jwt_encode(data);
            var url = dt_base_url_js+'__getDetailsPeople';

            $.post(url,{token:token},function (jsonResult) {
                if(jsonResult.length>0){


                    var tb = '';
                    $.each(jsonResult,function (i,v) {
                        tb = tb+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td>'+v.NPM+'</td>' +
                            '<td style="text-align: left;"><a href="'+dt_base_url_js+'search-people/detail-student/'+v.NPM+'" target="_blank">'+v.Name+'</a></td>' +
                            '<td>'+v.Year+'</td>' +
                            '</tr>';
                    });

                    setTimeout(function () {
                        $('#loadDetails').html('<div class="row"><div class="col-md-12"><h4 class="avatar-name" style="border-left: 10px solid orange;padding-left: 10px;">Mentoring Final Project</h4>' +
                            '           <div class="table-responsive">' +
                            '                        <table class="table table-striped table-centre table-bordered">' +
                            '                            <thead>' +
                            '                            <tr style="background: #e0e0e091;">' +
                            '                                <th style="width: 1%;">No</th>' +
                            '                                <th style="width: 15%;">NIM</th>' +
                            '                                <th>Name</th>' +
                            '                                <th style="width: 15%;">Class Of</th>' +
                            '                            </tr>' +
                            '                            </thead>' +
                            '                            <tbody>'+tb+'</tbody>' +
                            '                        </table>' +
                            '                    </div></div></div>');
                    },500);

                } else {
                    dataNotYet();
                }
            })

        }

        function loadResearch() {
            var data = { action : 'getResearch', NIP : dt_NIP };
            var token = jwt_encode(data);
            var url = dt_base_url_js+'__getDetailsPeople';
            $.post(url,{token:token},function (jsonResult) {

                if(jsonResult.length>0){

                    var tb = '';

                    $.each(jsonResult,function (i,v) {

                        tb = tb+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td style="text-align: left;">'+v.Title+'</td>' +
                            '</tr>';

                    });


                    setTimeout(function () {
                        $('#loadDetails').html('<div class="row"><div class="col-md-12">' +
                            '                   <h4 class="avatar-name" style="border-left: 10px solid orange;padding-left: 10px;">Research</h4>' +
                            '                   <div class="table-responsive">' +
                            '                        <table class="table table-striped table-centre table-bordered">' +
                            '                            <thead>' +
                            '                            <tr style="background: #e0e0e091;">' +
                            '                                <th style="width: 1%;">No</th>' +
                            '                                <th>Title</th>' +
                            '                            </tr>' +
                            '                            </thead><tbody>'+tb+'</tbody>' +
                            '                        </table>' +
                            '                    </div></div></div>');
                    },500);

                } else {
                    dataNotYet()
                }

            });
        }

        function loadPublikasi() {
            var data = { action : 'getPublikasi', NIP : dt_NIP };
            var token = jwt_encode(data);
            var url = dt_base_url_js+'__getDetailsPeople';
            $.post(url,{token:token},function (jsonResult) {

                if(jsonResult.length>0){
                    var tb = '';

                    $.each(jsonResult,function (i,v) {

                        tb = tb+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td style="text-align: left;">'+v.Title+'</td>' +
                            '</tr>';
                    });

                    setTimeout(function () {
                        $('#loadDetails').html('<div class="row"><div class="col-md-12">' +
                            '               <h4 class="avatar-name" style="border-left: 10px solid orange;padding-left: 10px;">Scientific Publications</h4>' +
                            '                   <div class="table-responsive">' +
                            '                        <table class="table table-striped table-centre table-bordered">' +
                            '                            <thead>' +
                            '                            <tr style="background: #e0e0e091;">' +
                            '                                <th style="width: 1%;">No</th>' +
                            '                                <th>Title</th>' +
                            '                            </tr>' +
                            '                            </thead><tbody>'+tb+'</tbody>' +
                            '                        </table>' +
                            '                    </div></div></div>');
                    },500);
                } else {
                    dataNotYet();
                }

            });
        }

        function loadDedication() {
            var data = { action : 'getDedication', NIP : dt_NIP };
            var token = jwt_encode(data);
            var url = dt_base_url_js+'__getDetailsPeople';
            $.post(url,{token:token},function (jsonResult) {
                if(jsonResult.length>0){
                    var tb = '';

                    $.each(jsonResult,function (i,v) {

                        tb = tb+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td style="text-align: left;">'+v.Title+'</td>' +
                            '</tr>';
                    });

                    setTimeout(function () {
                        $('#loadDetails').html('<div class="row"><div class="col-md-12">' +
                            '               <h4 class="avatar-name" style="border-left: 10px solid orange;padding-left: 10px;">Scienty Services</h4>' +
                            '                   <div class="table-responsive">' +
                            '                        <table class="table table-striped table-centre table-bordered">' +
                            '                            <thead>' +
                            '                            <tr style="background: #e0e0e091;">' +
                            '                                <th style="width: 1%;">No</th>' +
                            '                                <th>Title</th>' +
                            '                            </tr>' +
                            '                            </thead><tbody>'+tb+'</tbody>' +
                            '                        </table>' +
                            '                    </div></div></div>');
                    },500);
                } else {
                    dataNotYet();
                }
            });
        }

        function loadHKI() {
            var data = { action : 'getHKI', NIP : dt_NIP };
            var token = jwt_encode(data);
            var url = dt_base_url_js+'__getDetailsPeople';
            $.post(url,{token:token},function (jsonResult) {
                if(jsonResult.length>0){
                    var tb = '';

                    $.each(jsonResult,function (i,v) {

                        tb = tb+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td style="text-align: left;">'+v.Title+'</td>' +
                            '</tr>';
                    });

                    setTimeout(function () {
                        $('#loadDetails').html('<div class="row"><div class="col-md-12">' +
                            '               <h4 class="avatar-name" style="border-left: 10px solid orange;padding-left: 10px;">HKI</h4>' +
                            '                   <div class="table-responsive">' +
                            '                        <table class="table table-striped table-centre table-bordered">' +
                            '                            <thead>' +
                            '                            <tr style="background: #e0e0e091;">' +
                            '                                <th style="width: 1%;">No</th>' +
                            '                                <th>Title</th>' +
                            '                            </tr>' +
                            '                            </thead><tbody>'+tb+'</tbody>' +
                            '                        </table>' +
                            '                    </div></div></div>');
                    },500);
                } else {
                    dataNotYet();
                }
            });
        }

    </script>

<?php } ?>