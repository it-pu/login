

<style>

    body {
        background: #eaeaea !important;
        /*background-image: url("*/<?//= base_url('images/bg-eula.png'); ?>/*") !important;*/
    }

    .panel {
        /*-webkit-box-shadow: 0px 0px 37px -25px rgba(0,0,0,0.75);*/
        /*-moz-box-shadow: 0px 0px 37px -25px rgba(0,0,0,0.75);*/
        /*box-shadow: 0px 0px 37px -25px rgba(0,0,0,0.75);*/
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
        height: 6px;
        background-color: #F5F5F5;
    }
    #EULABody::-webkit-scrollbar-thumb {
        background-color: #607d8b;
    }
    #EULABody::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    /*#EULABody img {*/
    /*    width: 100% !important;*/
    /*    max-width: 500px;*/
    /*}*/

    /*#EULABody iframe {*/
    /*    width: 100% !important;*/
    /*}*/
</style>


<div class="container" style="margin-top: 20px;margin-bottom: 20px;">
    <div class="row">
        <div class="col-md-12" style="text-align: center;margin-bottom: 20px;">
            <img src="https://portal.podomorouniversity.ac.id/assets/icon/logo_pu.png" style="width: 250px;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body" style="padding-right: 3px;">

                    <h3 style="margin-top: 0px;" id="EULATitle"></h3>

                    <div id="EULABody"></div>

                </div>
                <div class="panel-footer" style="text-align: right;">
                    <div style="float: left;" id="countEula">
                        <span id="EULAActive">-</span> of <span id="EULATotal">-</span>
                    </div>
                    <div id="btnAct">
                        <button class="btn btn-default" id="EULABtnClose">Close</button>
                        <button class="btn btn-success" id="EULAID">I understood</button>
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
                $('#EULATitle').html('');
                $('#EULABody').html('<div class="" style="text-align: center;">' +
                    '<div class="col-md-6 col-md-offset-3">' +
                    '<img src="'+dt_base_url_js+'images/checkmark.png" style="width: 100%;max-width: 100px;" />' +
                    '<h3>Thank you for understanding the usage agreement</h3>' +
                    '<div class="alert alert-info" role="alert">please relogin to be able to access your portal</div>' +
                    '</div></div>');
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