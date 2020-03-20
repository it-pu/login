<link rel="stylesheet" type="text/css" href="<?=base_url('assets/datatables/dataTables.bootstrap.min.css')?>">
<script type="text/javascript" src="<?=base_url('assets/datatables/')?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/datatables/')?>dataTables.bootstrap.min.js"></script>

<style type="text/css">
    body{background: #eaeaea}
    #lost-n-found .head,#lost-n-found .body,#lost-n-found .footer{padding: 10px 0px}
    #lost-n-found .head > .logo .picture{max-width: 200px}
    #lost-n-found .head > .logo .title{text-transform: uppercase;font-weight: bold;letter-spacing: 4px;text-align: center;color: #023f87;line-height: 1.2;font-family: calibri}
</style>
<div id="lost-n-found">
    <div class="container">
        <div class="head">
            <div class="logo">
                <div class="row">
                    <div class="col-sm-9">
                        <img src="<?=base_url('assets/icon/logo_pu.png')?>" class="picture">
                    </div>
                    <div class="col-sm-3">
                        <h3 class="title"><i class="fa fa-archive fa-1x" ></i> lost <small style="color:#d71921">&</small> found</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-sm-9">
                    <div class="list-data">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bars"></i> List of lost items <label class="month btn btn-xs btn-danger pull-right"><i class="fa fa-calendar"></i> <?=date('F Y')?></label>
                            </div>
                            <div class="panel-body">
                                <div class="fetch-data-tables">
                                    <table class="table table-bordered" id="table-list-data">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Code</th>
                                                <th>Item Name</th>
                                                <th>Location</th>
                                                <th>Date Discover</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Received</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="10">No data available in table</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="widget">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="fa fa-sticky-note-o"></i> Attention
                            </div>
                            <div class="panel-body">
                                bla bla bla
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-sticky-note-o"></i> Terms and Conditions
                            </div>
                            <div class="panel-body">
                                bla bla bla
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2020 - Podomoro University</p>
        </div>
    </div>
</div>


<script type="text/javascript">
    function fetchPackageOrder() {

        //var filtering = $("#form-filter").serialize();     

        var filtering = null;
        var token = jwt_encode({Filter : filtering},'UAP)(*');

        var dataTable = $('#table-list-data').DataTable( {
            
            "ajax":{
                url : dt_base_url_pas+'general-affair/fetch-lost-and-found', // json datasource
                ordering : false,
                data : {token:token},
                type: "post",  // method  , by default get
                error: function(jqXHR){  // error handling
                    loading_modal_hide();
                    $('#GlobalModal .modal-header').html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                        '<h4 class="modal-title">Error Fetch Student Data</h4>');
                    $('#GlobalModal .modal-body').html(jqXHR.responseText);
                    $('#GlobalModal .modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>');
                    $('#GlobalModal').modal({
                        'show' : true,
                        'backdrop' : 'static'
                    });
                }
            },
            "initComplete": function(settings, json) {
                //loading_modal_hide();
            },
            "columns": [
                {
                    "data":"ID",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data":"Code"
                },
                {
                    "data":"Name"                   
                },
                {
                    "data":"Location"               
                },
                {
                    "data":"DateDiscover"                   
                },
                {
                    "data":"Description"                    
                },
                {
                    "data":"Status",
                    "render": function (data, type, row, meta) {
                        var label = (data == 1) ? "Available":"Unvailable";
                        return label;
                    }                   
                },
                {
                    "data":"Receivedby",
                    "render": function (data, type, row, meta) {
                        var label = "";
                        if($.trim(row.Receivedby).length > 0 && $.trim(row.DateReceiver).length > 0){
                            label = '<p><span class="received"><i class="fa fa-user"></i> '+data+'</span><br><span class="date"><i class="fa fa-calendar"></i> '+row.DateReceiver+'</span></p>';
                        }else{label='<p class="text-center text-danger"><i class="fa fa-exclamation-triangle"></i> Things has not been taken</p>';}
                        return label;
                    }               
                },  
            ]
        });
    }
    $(document).ready(function(){
        fetchPackageOrder();
    });
</script>