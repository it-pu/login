

<style>
    body {
        background: #eaeaea;
    }

    .item-question {
        margin-bottom: 10px;
        padding: 10px;
    }
    .item-answer {
        background: #f4f4f4;
        padding: 10px;
        border-radius: 5px;
    }

    .btn-rate {
        padding: 0px 5px;
        border-radius: 35px;
        color: #ccc;
        background: transparent;
        border: none;
        font-size: 21px;
    }

    .btn-rate:hover {
        background: transparent;
        color: #ccc;
    }
</style>

<div class="container" style="margin-top: 40px;">
    
    <div class="col-md-12 text-center" style="margin-bottom: 20px;">
        <img src="<?= base_url('assets/icon/logo_pu.png'); ?>"
             style="width: 100%; max-width: 250px;">
    </div>

    <pre>
        <?php print_r($this->session->all_userdata()); ?>
    </pre>

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">

            <div class="panel-heading">
                <h4 class="panel-title">Judul survey yah gan</h4>
            </div>

            <div class="panel-body" style="min-height: 200px;">

                <ol>
                    <li>
                        <div class="thumbnail item-question">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncha</p>
                            <div class="item-answer">
                                <input class="form-control">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="thumbnail item-question">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncha</p>

                            <div class="item-answer">
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="thumbnail item-question">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncha</p>
                            <div class="item-answer" id="rateAnw">
                                <button class="btn btn-default btn-rate" data-no="1"><i class="fa fa-star-o"></i></button>
                                <button class="btn btn-default btn-rate" data-no="2"><i class="fa fa-star-o"></i></button>
                                <button class="btn btn-default btn-rate" data-no="3"><i class="fa fa-star-o"></i></button>
                                <button class="btn btn-default btn-rate" data-no="4"><i class="fa fa-star-o"></i></button>
                                | <span>-</span>
                            </div>
                        </div>
                        <script>
                            $('.btn-rate').click(function () {
                                $(this).blur();
                                var noStop = $(this).attr('data-no');
                                var id = $(this).parent().attr('id');
                                $('#'+id+' .btn-rate').each(function () {
                                    var no = $(this).attr('data-no');
                                    if(no<=noStop){
                                        $(this).html('<i class="fa fa-star"></i>').css('color','orange');
                                    } else {
                                        $(this).html('<i class="fa fa-star-o"></i>').css('color','#ccc');
                                    }
                                });
                                var arrRate = ['Kurang','Sedang','Cukup','Baik'];
                                $('#'+id+' span').html(arrRate[noStop-1]);
                            });
                        </script>
                    </li>
                    <li>
                        <div class="thumbnail item-question">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially uncha</p>
                        </div>
                    </li>
                </ol>

            </div>

        </div>

    </div>
    
</div>


<script>
    
    $(document).ready(function () {

    });
    
    function getSurveyList() {

    }
    
</script>