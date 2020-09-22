
<style>
    body {
        background: #eaeaea;
    }

    .panel-question {
        border: 1px solid #dddddd;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        margin-right: 25px;
    }

    .panel-answer {
        margin-top: 15px;
        min-height: 30px;
        background: #f4f4f4;
        padding: 15px;
    }
</style>



<?php if($Status==1 || $Status=='1'){ ?>

    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-bottom: 20px;">
                <img src="<?= base_url('assets/icon/logo_pu.png'); ?>"
                     style="width: 100%; max-width: 250px;">
            </div>
        </div>
        <div class="row">

            <div class="col-md-10 col-md-offset-1">


                <div class="row">
                    <div class="col-md-8">
                        <h2 style="margin-top: 0px;"><?= $Survey['Name']; ?></h2>
                    </div>
                    <div class="col-md-4">
                        <div class="text-right"><?= date('d F Y H.i',strtotime($Survey['EntredAt'])); ?></div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= $Survey['Title']; ?></h4>
                    </div>
                    <div class="panel-body">

                        <ol>
                            <?php foreach ($MyAnswer AS $item){ ?>
                                <li>
                                    <div class="panel-question">
                                        <?= $item['Question']; ?>

                                        <?php
                                        $viewANswer = '';
                                        if($item['QTID']=='3' || $item['QTID']==3){
                                            $viewANswer = $item['Answer'];
                                        } else if($item['QTID']=='4' || $item['QTID']==4){

                                            $Bintang = '';
                                            for($b=1;$b<=4;$b++){

                                                $Bintang = ($b<=$item['Rate'])
                                                    ? $Bintang.' <i class="fa fa-star fa-2x" style="color: orange;" aria-hidden="true"></i>'
                                                    : $Bintang.' <i class="fa fa-star-o fa-2x" style="color: #dddddd;" aria-hidden="true"></i>';
                                            }

                                            $viewANswer = $Bintang;

                                        } else if($item['QTID']=='5' || $item['QTID']==5){
                                            $viewANswer = ($item['IsTrue']==1 || $item['IsTrue']=='1')
                                                ? 'Ya' : 'Tidak';
                                        }

                                        ?>

                                        <div class="panel-answer">
                                            <?= $viewANswer; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else {
        echo '<div style="margin-top: 30px;text-align: center;"><h4>No valid</h4></div>';
    } ?>