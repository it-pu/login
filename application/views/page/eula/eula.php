

<style>

    body {
        background: #3e3e3e !important;
    }

    .panel {
        -webkit-box-shadow: 0px 0px 37px -25px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 37px -25px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 37px -25px rgba(0,0,0,0.75);
    }

    .panel-footer button {
        /*font-weight: bold;*/
    }

    #EULABody {
        overflow: auto;
        min-height: 100px;
        max-height: 400px;
        padding-right: 12px;
    }

    #EULABody::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
    }
    #EULABody::-webkit-scrollbar-thumb {
        background-color: #607d8b;
    }
    #EULABody::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }
</style>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="glyphicon glyphicon-fire" style="margin-right: 3px;color: #FF5722;"></i> <span id="EULATitle"></span>
                    </h4>
                </div>
                <div class="panel-body" style="padding-right: 3px;">

                    <div id="EULABody"></div>

                </div>
                <div class="panel-footer" style="text-align: right;">
                    <div style="float: left;" id="countEula">
                        <span id="EULAActive">-</span> of <span id="EULATotal">-</span>
                    </div>
                    <div id="btnAct">
                        <button class="btn btn-default" id="EULABtnClose">Close</button>
                        <button class="btn btn-success" id="EULAID">I understand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        window.portal_Username = "<?= $this->session->userdata('portal_Username'); ?>";
        window.portal_EDID = "<?= $this->session->userdata('portal_EDID'); ?>";
        window.portal_UserType = "<?= $this->session->userdata('portal_UserType'); ?>";

        if(portal_EDID!=''){
            loadDataEULA();
        } else {
            window.location.replace(dt_base_url_js+'portal-login');
        }


    });

    function loadDataEULA() {

        var data = {
            action : 'getListEULAForUser',
            EDID : portal_EDID,
            Username : portal_Username
        };

        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_pas+'/api4/__crudEula';

        $.post(url,{token:token},function (jsonResult) {

            var next = true;

            var FillReady = 0;
            var no = 0;

            $('#EULATotal').html(jsonResult.length);

            $.each(jsonResult,function (i,v) {
                no = no+1;
                if(v.Username!=null && v.Username!=''){
                    FillReady+=1;
                } else {

                    if(next) {

                        $('#EULATitle').html(v.Title);
                        $('#EULABody').html(v.Description);
                        $('#EULAID').attr('data-id', v.ELID);
                        $('#EULAActive').html(no);

                        next = false;
                    }
                }

            });

            if(FillReady==jsonResult.length){
                $('#EULATitle').html('Finish');
                $('#EULABody').html('<div style="text-align: center;">' +
                    '<img src="'+dt_base_url_js+'images/checkmark.png" style="width: 100%;max-width: 100px;" />' +
                    '<h3>Thank you for understanding the usage agreement</h3>' +
                    '<div class="alert alert-info" role="alert">please relogin to be able to access your portal</div></div>');
                $('#btnAct').html('<a href="'+dt_base_url_js+'portal-login" class="btn btn-primary">Relogin</a>');
                $('#countEula').remove();
            }

        });

    }

    $(document).on('click','#EULAID',function () {

        if(confirm('Are you sure?')){
            var ID = $(this).attr('data-id');
            var data = {
                action : 'insertEULAForUser',
                ELID : ID,
                Username : portal_Username,
                UserType : portal_UserType
            };

            var token = jwt_encode(data,'UAP)(*');
            var url = dt_base_url_pas+'/api4/__crudEula';

            $.post(url,{token:token},function (result) {
                $('#EULAID').blur();
                loadDataEULA();
            });
        }

    });

    $('#EULABtnClose').click(function () {
        if(confirm('Are you sure?')){
            window.location.replace(dt_base_url_js+'portal-login');
        }
    });

</script>