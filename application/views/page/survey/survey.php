

<style>
    body {
        background: #eaeaea;
    }

    .label {
        font-size: 82%;
        font-weight: 100;
    }

    .item-question {
        position: relative;
        margin-bottom: 15px;
        padding: 10px;
    }
    .label-required {
        position: absolute;
        top: -7px;
        right: 0px;
    }
    .item-answer {
        margin-top: 15px;
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

    .warning-required {
        border: 1px solid #f9b6b6;
        background: #ffdede5c;
    }
</style>

<div class="container" style="margin-top: 40px;">
    
    <div class="col-md-12 text-center" style="margin-bottom: 20px;">
        <img src="<?= base_url('assets/icon/logo_pu.png'); ?>"
             style="width: 100%; max-width: 250px;">
    </div>

<!--    <pre>-->
<!--        --><?php //print_r($this->session->all_userdata()); ?>
<!--    </pre>-->

    <div class="col-md-10 col-md-offset-1">

        <div id="viewListQuestion" style="margin-bottom: 50px;"></div>

        <div class="panel panel-default hide">
            <div class="panel-heading">
                <h4 class="panel-title">Judul survey yah gan</h4>
            </div>
            <div class="panel-body">
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
        getSurveyList();
    });

    $(document).on('click','.btn-rate', function () {
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
        $('#'+id+' input').val(noStop);
    });

    $(document).on('click','#btnSubmitSurvey',function () {

        if(confirm('Are you sure?')){
            // loading_button('#btnSubmitSurvey');
            var token_q = localStorage.getItem('token-question');
            var d = jwt_decode(token_q,'UAP)(*');

            var submitAns = true;

            if(d.length>0){

                var dataAnsw = [];

                $.each(d,function (i,v) {

                    var ans = $('#formAnsw_'+v.QuestionID).val();

                    // cek required
                    if(parseInt(v.IsRequired)==1 && ans==''){
                        $('#panel_question_'+v.QuestionID).addClass('warning-required');
                        $('#panel_question_'+v.QuestionID+' .label-required')
                            .removeClass('label-default').addClass('label-danger');

                        setTimeout(function () {
                            $('#panel_question_'+v.QuestionID).css('background','#fff');
                        },5000);
                        submitAns = false;
                    } else {
                        $('#panel_question_'+v.QuestionID).removeClass('warning-required');
                        $('#panel_question_'+v.QuestionID+' .label-required')
                            .removeClass('label-danger').addClass('label-default');
                    }


                    var Rate = (parseInt(v.QTID)==4)
                        ? ans  : '';

                    var Answer = (parseInt(v.QTID)==3)
                        ? ans : '';

                    var IsTrue = (parseInt(v.QTID)==5)
                        ? ans : '';

                    var arr = {
                        SurveyID : "<?= $this->session->userdata('portal_SurveyID'); ?>",
                        QuestionID : v.QuestionID,
                        QTID : v.QTID,
                        Rate : Rate,
                        Answer : Answer,
                        IsTrue : ''+IsTrue
                    };
                    dataAnsw.push(arr);

                });

                // console.log(dataAnsw);

                if(submitAns){
                    loading_page_modal();
                    var data = {
                        action : 'setDataSurvey',
                        InsAnswer : {
                            Username : "<?= $this->session->userdata('portal_Username'); ?>",
                            Type : "<?= $this->session->userdata('portal_UserType'); ?>",
                            SurveyID : "<?= $this->session->userdata('portal_SurveyID'); ?>",
                        },
                        dataAnsw : dataAnsw
                    };
                    var token = jwt_encode(data,'UAP)(*');
                    var url = dt_base_url_pas+'apisurvey/__crudSurvey';

                    $.post(url,{token:token},function (jsonResult) {

                        setTimeout(function () {

                            loading_page_modal('hide');

                            var htmlBody = '<div class="" style="text-align: center;">'+
                                '                <div style="margin-bottom: 20px;">'+
                                '                   <img src="'+dt_base_url_js+'images/checkmark.png" style="width: 100%;max-width: 100px;" />' +
                                '                </div>'+
                                '               <h3 style="margin-bottom: 25px;"><small>= = =</small> Thank you <small>= = =</small></h3>' +
                                '                  <div class="alert alert-info" role="alert"><b>Directly to the portal in <span id="showCountDown" style="color: red;">-</span> seconds</b></div>' +
                                '<p>if not automatically login to the portal please re-login, <a href="'+dt_base_url_js+'portal-login">re-login</a></p>'+
                                '            </div>';

                            $('#modalGlobal .modal-header').addClass('hide');
                            $('#modalGlobal .modal-dialog').css('max-width','600px');
                            $('#modalGlobal .modal-footer').addClass('hide');
                            $('#modalGlobal .modal-body').html(htmlBody);

                            var tm = 3;
                            $('#showCountDown').html(tm);
                            var intLogin = setInterval(function () {
                                $('#showCountDown').html(tm);
                                tm = tm - 1;
                                if(tm<0){
                                    clearInterval(intLogin);
                                    getRelogin();
                                }

                            },1000);

                            $('#modalGlobal').modal({
                                'backdrop' : 'static',
                                'show' : true
                            });



                        },500);

                    });
                } else {
                    toastr.error('Please, fill in the mandatory form','Warning');
                }



            }
        }




    });

    $(document).on('change','.radio-select',function () {

        var ID = $(this).attr('data-id');
        var v = $('input[name="opt_true_false_'+ID+'"]:checked').val();

        $('#formAnsw_'+ID).val(v);

    });
    
    function getSurveyList() {

        loading_page_modal();

        var data = {
            action : 'getDataSurvey',
            SurveyID : "<?= $this->session->userdata('portal_SurveyID'); ?>"
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_pas+'apisurvey/__crudSurvey';

        $.post(url,{token:token},function (jsonResult) {



            if(jsonResult.Status==1){

                var d = jsonResult.Data;

                localStorage.setItem('token-question',jwt_encode(d.Quesions,'UAP)(*'));

                var li = '';
                $.each(d.Quesions,function (i,v) {

                    var showAnswer = '';
                    if(v.QTID==4){
                        showAnswer = '<div class="item-answer" id="rateAnw_'+v.QuestionID+'">' +
                            '<button class="btn btn-default btn-rate" data-no="1"><i class="fa fa-star-o"></i></button>' +
                            '<button class="btn btn-default btn-rate" data-no="2"><i class="fa fa-star-o"></i></button>' +
                            '<button class="btn btn-default btn-rate" data-no="3"><i class="fa fa-star-o"></i></button>' +
                            '<button class="btn btn-default btn-rate" data-no="4"><i class="fa fa-star-o"></i></button>' +
                            ' | <span>-</span> <input class="hide" id="formAnsw_'+v.QuestionID+'">' +
                            '</div>';
                    } else if(v.QTID==3){
                        var typeInput = (v.AnswerType=='textarea')
                            ? '<textarea class="form-control" id="formAnsw_'+v.QuestionID+'" rows="4"></textarea>'
                            : '<input class="form-control" id="formAnsw_'+v.QuestionID+'">';

                        showAnswer = '<div class="item-answer">'+typeInput+'</div>';
                    } else if(v.QTID==5){
                        showAnswer = '<div class="item-answer" >' +
                            '<label class="radio-inline">' +
                            '  <input type="radio" name="opt_true_false_'+v.QuestionID+'" class="radio-select" data-id="'+v.QuestionID+'" value="1"> Ya ' +
                            '</label>' +
                            '<label class="radio-inline">' +
                            '  <input type="radio" name="opt_true_false_'+v.QuestionID+'" class="radio-select" data-id="'+v.QuestionID+'" value="0"> Tidak ' +
                            '</label>' +
                            '<input class="hide" id="formAnsw_'+v.QuestionID+'" />' +
                            '</div>';
                    }

                    var isRequired = (parseInt(v.IsRequired)==1)
                        ? '<div class="label label-default label-required">Required</div>' : '';

                    li = li+'<li>' +
                        '<div class="thumbnail item-question" id="panel_question_'+v.QuestionID+'">' +
                        ' '+v.Question+' ' +
                        '' +isRequired+
                        ''+showAnswer+
                        '' +
                        '</div>' +
                        '</li>';

                });

                $('#viewListQuestion').html('<div class="panel panel-default">' +
                    '            <div class="panel-heading">' +
                    '                <h4 class="panel-title">'+d.Title+'</h4>' +
                    '            </div>' +
                    '            <div class="panel-body">' +
                    '                <ol>'+li+'</ol>   ' +
                    '            </div>' +
                    '            <div class="panel-footer text-right">' +
                    '               <button class="btn btn-success" id="btnSubmitSurvey">Submit</button>' +
                    '            </div>'+
                    '        </div>');

                setTimeout(function () {
                    loading_page_modal('hide');
                },500);

            } else {
                alert('Survey can not showing!');
                window.location.replace(dt_base_url_js);
            }

        })

    }
    
    function getRelogin() {
        var urlDest = dt_base_url_js+'uath/__destroySessionEULA';
        $.getJSON(urlDest,function (result) {
            loadNewLogin();
        });

    }

    function loadNewLogin() {
        var data = {
            action : 'getListDirection',
            Username : "<?= $this->session->userdata('portal_Username'); ?>"
        };

        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_pas+'apisurvey/__crudSurvey';

        $.post(url,{token:token},function (jsonResult) {

            var dataToken = jsonResult.DetailsData;
            var d = jwt_decode(dataToken);

            if(d.url_direct.length==1){

                var url = d.url_direct[0].url_login;
                var token = d.url_direct[0].token;
                FormSubmitAuto(url, 'POST', [
                    { name: 'token', value: token },
                ],'');


            } else if(d.url_direct.length>1){
                loadPagePanel(d.url_direct);
            }


        });
    }


    
</script>