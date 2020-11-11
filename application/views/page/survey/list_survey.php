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
                            
                            <div class="">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Date</label>
                                                    <select class="form-control" id="filterType">
                                                        <option value="">--- All Date ---</option>
                                                        <option disabled>-----------------------</option>
                            
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<div class="modal fade" id="GlobalModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated jackInTheBox">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title">Show Detail Already Fill Out</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">


function loadSelectOptionSurvQuestionType(element,selected) {

        var data = {action : 'getSurvQuestionType'};

        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_js+'data-survey';

        $.post(url,{token:token},function (jsonResult) {
            $.each(JSON.parse(jsonResult),function (i,v) {
            	
                var sc = (selected==v.tgl) ? 'selected' : '';
                $(element).append('<option value="'+v.tgl+'" '+sc+'>'+v.tgl+'</option>');
            });
        });

    }

function totallist(id)
  {
      $(document).on('click','.showAlreadyFillTotal',function () {

        var htmlss = '<div class="">' +
            '    <table class="table table-bordered table-striped table-centre" id="tableShowUserAlreadyFillTotal" style="width: 100%;">' +
            '        <thead>' +
            '        <tr>' +
            '            <th style="width: 1%;">No</th>' +
            '            <th>User</th>' +
            '            <th style="width: 10%;">Type</th>' +
            '            <th style="width: 25%;">Entred At</th>' +
            '        </tr>' +
            '        </thead>' +
            '    </table>' +
            '</div>';

    
        $('#GlobalModal .modal-body').html(htmlss);

        var filterType = $('#filterType').val();
        var Status = $(this).attr('data-status');
        var Type = $(this).attr('data-type');
        var data = {
            action : 'showUserAlreadyFill',
            SurveyID : id,
            Status : Status,
            Type : Type,
            filterType:filterType
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_js+'data-survey';


        var dataTable = $('#tableShowUserAlreadyFillTotal').DataTable( {
            "processing": true,
            "serverSide": true,
            "iDisplayLength" : 10,
            "ordering" : false,
            "language": {
                "searchPlaceholder": "Username, Name..."
            },
            "ajax":{
                url :url, // json datasource
                data : {token:token},
                ordering : false,
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    loading_modal_hide();
                    $(".employee-grid-error").html("");
                    $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#employee-grid_processing").css("display","none");
                }
            }
        } );

        $('#GlobalModal').modal({
            'show' : true,
            'backdrop' : 'static'
        });

    });
  }

	function ekslist(id)
  {
      $(document).on('click','.showAlreadyFillOut',function () {

        var htmlss = '<div class="">' +
            '    <table class="table table-bordered table-striped table-centre" id="tableShowUserAlreadyFillOut" style="width: 100%;">' +
            '        <thead>' +
            '        <tr>' +
            '            <th style="width: 1%;">No</th>' +
            '            <th>User</th>' +
            '            <th style="width: 10%;">Type</th>' +
            '            <th style="width: 25%;">Entred At</th>' +
            '        </tr>' +
            '        </thead>' +
            '    </table>' +
            '</div>';

    
        $('#GlobalModal .modal-body').html(htmlss);

      	var filterType = $('#filterType').val();
        var Status = $(this).attr('data-status');
        var Type = $(this).attr('data-type');
        var data = {
            action : 'showUserAlreadyFill',
            SurveyID : id,
            Status : Status,
            Type : Type,
            filterType:filterType
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_js+'data-survey';


        var dataTable = $('#tableShowUserAlreadyFillOut').DataTable( {
            "processing": true,
            "serverSide": true,
            "iDisplayLength" : 10,
            "ordering" : false,
            "language": {
                "searchPlaceholder": "Username, Name..."
            },
            "ajax":{
                url :url, // json datasource
                data : {token:token},
                ordering : false,
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    loading_modal_hide();
                    $(".employee-grid-error").html("");
                    $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#employee-grid_processing").css("display","none");
                }
            }
        } );

        $('#GlobalModal').modal({
            'show' : true,
            'backdrop' : 'static'
        });

    });
  }

	function intlist(id)
  {
      $(document).on('click','.showAlreadyFillIn',function () {

        var htmlss = '<div class="">' +
            '    <table class="table table-bordered table-striped table-centre" id="tableShowUserAlreadyFillIn" style="width: 100%;">' +
            '        <thead>' +
            '        <tr>' +
            '            <th style="width: 1%;">No</th>' +
            '            <th>User</th>' +
            '            <th style="width: 10%;">Type</th>' +
            '            <th style="width: 25%;">Entred At</th>' +
            '        </tr>' +
            '        </thead>' +
            '    </table>' +
            '</div>';

    
        $('#GlobalModal .modal-body').html(htmlss);

        var filterType = $('#filterType').val();
        var Status = $(this).attr('data-status');
        var Type = $(this).attr('data-type');
        var data = {
            action : 'showUserAlreadyFill',
            SurveyID : id,
            Status : Status,
            Type : Type,
            filterType:filterType
        };
        var token = jwt_encode(data,'UAP)(*');
        var url = dt_base_url_js+'data-survey';


        var dataTable = $('#tableShowUserAlreadyFillIn').DataTable( {
            "processing": true,
            "serverSide": true,
            "iDisplayLength" : 10,
            "ordering" : false,
            "language": {
                "searchPlaceholder": "Username, Name..."
            },
            "ajax":{
                url :url, // json datasource
                data : {token:token},
                ordering : false,
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    loading_modal_hide();
                    $(".employee-grid-error").html("");
                    $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#employee-grid_processing").css("display","none");
                }
            }
        } );

        $('#GlobalModal').modal({
            'show' : true,
            'backdrop' : 'static'
        });

    });
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
                '            <th>Average</th>' +
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




	 $(document).ready(function(){
	 	 
        listsurvey();
        loadSelectOptionSurvQuestionType('#filterType','');
       
    });
     $('#filterType').change(function () {
        listsurvey();
    });

    function listsurvey() {

        //var filtering = $("#form-filter").serialize();     

        
        $('#loadTable').html('<table id="tableData" class="table table-bordered table-striped table-centre">' +
            '               <thead>' +
            '                <tr style="background: #eceff1;">' +
            '                    <th width="5%">No</th>'+
            '                    <th width="50%">Title</th>'+
            '                    <th width="15%">Question</th>'+
            // '                    <th>Internal</th>'+
            // '                    <th>External</th>'+
            // '                    <th>Total</th>'+
            '                    <th>Publication Date</th>'+
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
                "searchPlaceholder": "Question..."
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

 
</script>