<link rel="stylesheet" type="text/css" href="<?=base_url('assets/datatables/dataTables.bootstrap.min.css')?>">
<script type="text/javascript" src="<?=base_url('assets/datatables/')?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/datatables/')?>dataTables.bootstrap.min.js"></script>

<style type="text/css">

    body{background: #eaeaea}
    #lost-n-found .head,#list-survey .body,#list-survey .footer{padding: 10px 0px}
    #lost-n-found .head > .logo .picture{max-width: 200px}
    #lost-n-found .head > .logo .title{text-transform: uppercase;font-weight: bold;letter-spacing: 4px;text-align: center;color: #023f87;line-height: 1.2;font-family: calibri}
</style>




<div id="list-survey">
    <div class="container">
        <div class="head">
            <div class="logo">
                <div class="row">
                    <div class="col-sm-9">
                        <img src="<?=base_url('assets/icon/logo_pu.png')?>" class="picture">
                    </div>
                    <div class="col-sm-3">
                        <h3 class="title"><i class="fa fa-archive fa-1x" ></i> Survey Data </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="list-data">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bars"></i> Survey List<label class="month btn btn-xs btn-danger pull-right"><i class="fa fa-calendar"></i> <?=date('F Y')?></label>
                            </div>

                            <div class="panel-body">
                                <div id="loadTable"></div>
                              
                            
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


<div class="modal fade" id="GlobalModalXtraLarge" role="dialog" style="display: none;">
   <div class="modal-dialog" role="document" style="width:1280px;">>
    <div class="modal-content animated jackInTheBox">
      <input type="hidden" name="hiddenInputForRequest" id="hiddenInputForRequest">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title">Show Question</h4>
      </div>
      <div class="modal-body">
        <div id="panelShowQuestion"></div>
      </div>
      <div class="modal-footer">
     	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div> 
</div> 

<script type="text/javascript">


  
	 $(document).ready(function(){	 	 
        listsurvey();     
    });

    function listsurvey() {
        
        $('#loadTable').html('<table id="tableData" class="table table-bordered table-striped table-centre">' +
            '               <thead>' +
            '                <tr style="background: #eceff1;">' +
            '                    <th width="5%">No</th>'+
            '                    <th width="35%">Title</th>'+
            '                    <th width="10%">Question</th>'+
            '                    <th width="10%">Internal</th>'+
            '                    <th width="10%">External</th>'+
            '                    <th width="10%">Total</th>'+
            '                    <th width="20%">Publication Date</th>'+
            '                </tr>' +
            '                </thead>' +
            '           </table>');
        var filterType = $('#filterType').val();
        var data = {
            action : 'getListSurvey',
            DepartmentID : 12,
            filterType:filterType

        };
        var token = jwt_encode(data,'UAP)(*');

        var dataTable = $('#tableData').DataTable( {
            "processing": true,
            "serverSide": true,
            "iDisplayLength" : 10,
            "ordering" : false,
            "language": {
                "searchPlaceholder": "Title..."
            },
            "ajax":{
                url :dt_base_url_js+'data-survey', // json datasource
                data : {token:token},
                ordering : false,
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    //loading_modal_hide();
                    $(".employee-grid-error").html("");
                    $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#employee-grid_processing").css("display","none");
                }
            }
        } );

    }

    function questionlist(id)
    {
        $(document).on('click','.showQuestionList',function () {

        $('#GlobalModalXtraLarge').modal({
            'show' : true,
            'backdrop' : 'static'
        });

        var data = {
            action : 'showQuestionInSurvey',
            SurveyID : id,
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_js+'data-survey';
        
        $.post(url,{token:token},function (jsonResult) {
        
            if(jsonResult.length>0){
                

                var tr = '';
                $.each(JSON.parse(jsonResult),function (i,v) {

                    tr = tr+'<tr>' +
                        '<td>'+(i + 1)+'</td>' +
                        '<td style="text-align: left;"><span class="label label-primary">'+v.Category+'</span>' +
                        ' <span class="label label-success">'+v.Type+'</span>' +
                        '       <div style= "overflow: auto; max-height: 250px;">'+v.Question+'</div></td>' +
                        '<td>'+v.AverageRate+'</td>' +
                        '</tr>';
                   
                })


            }

            var dataListQuestion = '<div class="table-responsive">' +
                '    <table class="table table-bordered table-centre">' +
                '        <thead>' +
                '        <tr style="background: #eceff1;">' +
                '            <th style="width: 3%">No</th>' +
                '            <th>Question</th>' +
                '            <th>Responsden</th>' +
                '        </tr>' +
                '        </thead>' +
                '        <tbody>'+tr+'</tbody>' +
                '    </table>' +
                '</div>';
     
            setTimeout(function () {
                $('#panelShowQuestion').html(dataListQuestion);
            },500);

        });
        });
    }
 
</script>