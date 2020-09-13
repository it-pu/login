

<style>
    body {
        /*background: #eaeaea;*/
    }

    .panel {
        -webkit-box-shadow: 3px 3px 10px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 3px 3px 10px -4px rgba(0,0,0,0.75);
        box-shadow: 3px 3px 10px -4px rgba(0,0,0,0.75);
    }
</style>

<div class="container" style="margin-top: 30px;">

    <div class="row">
        <div class="col-md-12 text-center" style="margin-bottom: 20px;">
            <img src="<?= base_url('assets/icon/logo_pu.png'); ?>"
                 style="width: 100%; max-width: 250px;">
        </div>
    </div>

    <?php if($ValidSurvey=='1' || $ValidSurvey==1) { ?>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Survey kehadiran</h4>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Participant as</label>
                            <select class="form-control form-req" id="formParticipant">
                                <option value="emp">Employee / Lecturer</option>
                                <option value="std">Student</option>
                                <option value="other">Other</option>
                            </select>
                            <input id="SurveyID" value="<?= $ID; ?>" class="hide">
                        </div>
                        <div id="typeInput"></div>




                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-success" id="btnSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <img src="<?= base_url('images/confused.jpg'); ?>"
                     style="width: 100%;max-width: 250px;">
                <h1 style="    color: #8479e6;font-weight: bold;">Invalid key or survey is not valid</h1>
            </div>
        </div>

    <?php } ?>
</div>


<script>

    $(document).ready(function () {
        loadTypeForm();
    });


    $('#formParticipant').change(function () {
        loadTypeForm();
    });

    $(document).on('click','.toggle-password',function () {
        var inputPass = $('#formPassword');

        if (inputPass.attr("type") == "password") {
            inputPass.attr("type", "text");
            $('.toggle-password i').removeClass('fa fa-eye-slash');
            $('.toggle-password i').addClass('fa fa-eye');
        } else {
            inputPass.attr("type", "password");
            $('.toggle-password i').removeClass('fa fa-eye');
            $('.toggle-password i').addClass('fa fa-eye-slash');
        }
    });

    function loadTypeForm(){
        var formParticipant = $('#formParticipant').val();
        if(formParticipant=='emp' || formParticipant=='std') {

            var lbl = (formParticipant=='emp') ? 'NIP / NIK' : 'NIM';

            $('#typeInput').html('<div class="form-group">' +
                '                        <label>'+lbl+'</label>' +
                '                        <input class="form-control form-req" id="formUsername">' +
                '                    </div>' +
                '                    <div class="form-group">' +
                '                        <label>Password</label>' +
                '                        <div class="input-group">' +
                '                          <input type="password" class="form-control form-req" id="formPassword" placeholder="Input password...">' +
                '                           <span class="input-group-btn">' +
                '                               <button class="btn btn-default toggle-password" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>' +
                '                           </span>' +
                '                       </div>' +
                '                   </div>');

        } else {

            $('#typeInput').html('<div class="form-group">' +
                '                        <label>Full name</label>' +
                '                        <input id="formFullname" class="form-control form-req">' +
                '                    </div>' +
                '                    <div class="form-group">' +
                '                        <label>E-mail</label>' +
                '                        <input id="formEmail" type="email" class="form-control form-req">' +
                '                    </div>' +
                '                    <div class="form-group">' +
                '                        <label>Phone</label>' +
                '                        <input id="formPhone" type="text" class="form-control form-req">' +
                '                    </div>');

        }
    }

    $('#btnSubmit').click(function () {

        var formParticipant = $('#formParticipant').val();
        var formUsername = $('#formUsername').val();
        var formPassword = $('#formPassword').val();

        var formFullname = $('#formFullname').val();
        var formEmail = $('#formEmail').val();
        var formPhone = $('#formPhone').val();

        var next = true;
        $('.form-req').each(function (i,v) {
            var cl = $(this).val();
            if(cl!='' && cl!=null){
                $(this).css('border','1px solid green');
            } else {
                $(this).css('border','1px solid red');
                next = false;
            }
        });

        if(next){

            var data = {
                action : 'submitForm',
                SurveyID : $('#SurveyID').val(),
                Key : "<?= $Key; ?>",
                Participant : formParticipant,
                Username : formUsername,
                Password : formPassword,
                FullName : formFullname,
                Email : formEmail,
                Phone : formPhone
            };

            var token = jwt_encode(data,"s3Cr3T-G4N");

            var url = dt_base_url_js+'submitChecksurvey';

            $.post(url,{token:token},function (jsonResult) {

                if(parseInt(jsonResult.Status)==1){
                    window.location.replace(dt_base_url_js+'survey');
                } else {
                    toastr.error('Username & Password not match!','Error');
                }

            })

        } else {
            toastr.warning('Form are required','Warning');
        }


    });


</script>
