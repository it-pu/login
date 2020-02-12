


<?php if(count($dataStd)>0){ $d = $dataStd[0];

$warnaStatus = '#607d8b';
$sts = $d['StatusStudentID'];
if($sts=='1'){
    $warnaStatus = '#2196f3';
} else if($sts=='2' || $sts=='8' || $sts=='9'){
    $warnaStatus = '#ff9800';
} else if($sts=='3'){
    $warnaStatus = '#4CAF50';
} else if($sts=='4' || $sts=='6' || $sts=='7'){
    $warnaStatus = '#f44336';
}


?>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    <style>
        .avatar-name {
            font-family: 'Fjalla One', sans-serif;
        }
        body {
            background: #eaeaea;
        }

        #listAcievement .col-md-6 {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        #listAcievement .thumbnail {
            padding: 15px;
        }

        #listAcievement h4 {
            margin-top: 0px;
            font-family: 'Fjalla One', sans-serif;
            /*border-left: 7px solid orangered;*/
            /*padding-left: 10px;*/
        }

        #listAcievement h4 .fa {
            margin-right: 5px;
        }

        #listAcievement .list-group-item {
            border-left: none;
            border-right: none;
        }
        #listAcievement .panel {
            margin-bottom: 0px;
        }
    </style>


    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <a href="<?= base_url('search-people'); ?>" class="btn btn-warning"><i class="fa fa-arrow-left" style="margin-right: 5px"></i> Back to search people</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" style="text-align: center;margin-bottom: 20px;">
                        <h1 class="avatar-name"><?= ucwords(strtolower($d['Name'])); ?></h1>
                    </div>
                </div>

                <div class="thumbnail" style="padding: 15px;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="">
                                <img src="https://pcam.podomorouniversity.ac.id/uploads/students/<?= $d['DB'].'/'.$d['Photo']; ?>" style="width: 100%;">
                                <div style="text-align: center;background: <?= $warnaStatus; ?>;font-weight: bold;color:#ffffff;padding: 5px;"><?= $d['StatusStudent']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td style="width: 30%;">NIM</td>
                                        <td style="width: 2%;">:</td>
                                        <td><?= $d['NPM']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Study Programs</td>
                                        <td>:</td>
                                        <td><a target="_blank" href="https://<?= $d['Host']; ?>"><?= $d['ProdiEng']; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Class Of</td>
                                        <td>:</td>
                                        <td><?= $d['Year']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>:</td>
                                        <td><?= ($d['DateOfBirth']!='' && $d['DateOfBirth']!=null) ? date('d F Y',strtotime($d['DateOfBirth'])) : ''; ?></td>
                                    </tr>
                                    <?php if($d['JudiciumsDate']!='' && $d['JudiciumsDate']!=null) { ?>
                                        <tr>
                                            <td>Judiciums Date</td>
                                            <td>:</td>
                                            <td><?= ($d['JudiciumsDate']!='' && $d['JudiciumsDate']!=null) ? date('d F Y',strtotime($d['JudiciumsDate'])) : ''; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?= ($d['Gender']=='L') ? 'Male' : 'Female'; ?></td>
                                    </tr>
                                    <?php if($d['Mentor']!='' && $d['Mentor']!=null) {
                                        $ta = ($d['TitleAhead']!='' && $d['TitleAhead']!=null) ? $d['TitleAhead'].' ' : '';
                                        $tb = ($d['TitleBehind']!='' && $d['TitleBehind']!=null) ? ' '.$d['TitleBehind'] : '';
                                        ?>
                                        <tr>
                                            <td>Mentor</td>
                                            <td>:</td>
                                            <td><a target="_blank" href="<?= base_url('search-people/detail-employees/'.$d['MentorNIP']) ?>"><?= $ta.$d['Mentor'].$tb; ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container" id="listAcievement">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-trophy"></i> Achievement and Awards</h4>
                            </div>
                            <div class="panel-body">
                                <?php

                                if(count($d['Achievement'])>0)
                                {
                                    echo '<ul class="list-group">';
                                    for($i=0;$i<count($d['Achievement']);$i++)
                                        { $da = $d['Achievement'][$i];
                                        $Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
                                        ?>

                                <li class="list-group-item">
                                    <div class="event-name"><b><?= $da['Event']; ?></b></div>
                                            <div class="event-level">Level : <?= $da['Level'].$Achievement; ?></div>
                                            <div class="event-location"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></div>
                                </li>

                                        <?php }

                                    echo '</ul>';
                                } else {
                                    echo '<div style="text-align: center;margin-top: 15px;margin-bottom: 15px;"><h3 style="color: #a7a7a7;">--- <img src="'.base_url('images/icon/empty-folder.png').'" style="max-width: 50px;margin-top: -14px;margin-right: 10px;"/>No data ---</h3></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-bookmark"></i> Participation in Organization</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                if(count($d['Participation'])>0)
                                {
                                    echo '<ul class="list-group">';
                                    for($i=0;$i<count($d['Participation']);$i++)
                                    { $da = $d['Participation'][$i];
                                        $Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
                                        ?>

                                        <li class="list-group-item">
                                            <div class="event-name"><b><?= $da['Event']; ?></b></div>
                                            <div class="event-level">Level : <?= $da['Level'].$Achievement; ?></div>
                                            <div class="event-location"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></div>
                                        </li>

                                    <?php }

                                    echo '</ul>';
                                } else {
                                    echo '<div style="text-align: center;margin-top: 15px;margin-bottom: 15px;"><h3 style="color: #a7a7a7;">--- <img src="'.base_url('images/icon/empty-folder.png').'" style="max-width: 50px;margin-top: -14px;margin-right: 10px;"/>No data ---</h3></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-star-half-full"></i> Training / Seminar / Workshop</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                if(count($d['Training'])>0)
                                {
                                    echo '<ul class="list-group">';
                                    for($i=0;$i<count($d['Training']);$i++)
                                    { $da = $d['Training'][$i];
                                        $Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
                                        ?>

                                        <li class="list-group-item">
                                            <div class="event-name"><b><?= $da['Event']; ?></b></div>
                                            <div class="event-level">Level : <?= $da['Level'].$Achievement; ?></div>
                                            <div class="event-location"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></div>
                                        </li>

                                    <?php }

                                    echo '</ul>';
                                } else {
                                    echo '<div style="text-align: center;margin-top: 15px;margin-bottom: 15px;"><h3 style="color: #a7a7a7;">--- <img src="'.base_url('images/icon/empty-folder.png').'" style="max-width: 50px;margin-top: -14px;margin-right: 10px;"/>No data ---</h3></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><i class="fa fa-briefcase"></i> Internship</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                if(count($d['Internship'])>0)
                                {
                                    echo '<ul class="list-group">';
                                    for($i=0;$i<count($d['Internship']);$i++)
                                    { $da = $d['Internship'][$i];
                                        $Achievement = ($da['Achievement']!='' && $da['Achievement']!=null) ? ' | <span class="event-juara">'.$da['Achievement'].'</span>' : '';
                                        ?>

                                        <li class="list-group-item">
                                            <div class="event-name"><b><?= $da['Event']; ?></b></div>
                                            <div class="event-level">Level : <?= $da['Level'].$Achievement; ?></div>
                                            <div class="event-location"><i class="fa fa-map-marker"></i> <?= $da['Location']; ?></div>
                                        </li>

                                    <?php }

                                    echo '</ul>';
                                } else {
                                    echo '<div style="text-align: center;margin-top: 15px;margin-bottom: 15px;"><h3 style="color: #a7a7a7;">--- <img src="'.base_url('images/icon/empty-folder.png').'" style="max-width: 50px;margin-top: -14px;margin-right: 10px;"/>No data ---</h3></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="showSP" style="margin-top: 10px;"></div>


    <script>

        $(document).ready(function () {
            loadTranscript();
            dataNotYet();

            window.dt_NPM = "<?= $d['NPM']; ?>";
            window.dt_Name = "<?= ucwords(strtolower($d['Name'])); ?>";

            addingLastSeen(dt_NPM,'std',dt_Name);

        });



        function dataNotYet() {
            setTimeout(function () {
                $('#loadDetails').html('<div style="text-align: center;margin-top: 15px;margin-bottom: 15px;"><h3 style="color: #a7a7a7;">--- <img src="'+dt_base_url_js+'images/icon/empty-folder.png" style="max-width: 50px;margin-top: -14px;margin-right: 10px;"/>No data ---</h3></div>');
            },500);
        };

        function loadTranscript() {
            var url = dt_base_url_pas+'rest/__getTranscript';
            var data = {
                auth : {
                    user : 'students',
                    token :  "<?= $d['Token']; ?>"
                },
                NPM : "<?= $d['NPM']; ?>",
                ClassOf : "<?= $d['Year']; ?>",
                date : moment().format('YYYY-MM-DD'),
                Source : 'Portal'
            };
            var token = jwt_encode(data,'s3Cr3T-G4N');

            $.post(url,{token:token},function (jsonResult) {

                if(jsonResult.dataCourse.length>0){

                    var listSP = '';

                    $.each(jsonResult.dataCourse,function (i,v) {
                        listSP = listSP+'<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td>'+v.MKCode+'</td>' +
                            '<td style="text-align: left;"><b>'+v.CourseEng+'</b><br/>'+v.Course+'</td>' +
                            '<td>'+v.Credit+'</td>' +
                            '</tr>';
                    });


                    $('#showSP').html('<div class="container">' +
                        '            <div class="row">' +
                        '                <div class="col-md-8 col-md-offset-2">' +

                        '                    <div class="panel panel-default">' +

                        '                        <div class="panel-heading"><h4 class="panel-title avatar-name"><i class="fa fa-history" style="margin-right: 5px;"></i> Study History</h4></div>' +
                        '                        <div class="panel-body">' +
                        '                        <div class="table-responsive">' +
                        '                            <table class="table table-centre table-striped table-bordered">' +
                        '                                <thead>' +
                        '                                <tr style="background: #314b61;color: #fff;">' +
                        '                                    <th>No</th>' +
                        '                                    <th>Code</th>' +
                        '                                    <th>Course</th>' +
                        '                                    <th>Credit</th>' +
                        '                                </tr>' +
                        '                                </thead>' +
                        '                                <tbody>'+listSP+'</tbody>' +
                        '                            </table>' +
                        '                        </div>' +
                        '                        </div>' +

                        '                    </div>' +

                        '                </div>' +
                        '            </div>' +
                        '        </div>');
                }

            });
        }

    </script>



<?php } ?>