<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 "> -->
	<title></title>
</head>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<script src="jwt/encode/hmac-sha256.js"></script>
<script src="jwt/encode/enc-base64-min.js"></script>
<script src="jwt/encode/jwt.encode.js"></script>

<script src="md5/md5.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">


body {
       background: #d4dde6;
}

.center {
	position: absolute;
  left: 50%;
  top: 30%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}




</style>

<body>


<!-- <div style="margin-top: 70px;"></div> -->

    <div id="login-overlay" class="modal-dialog center">
      <div class="modal-content">
          <!-- <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to site.com</h4>
          </div> -->
          <div class="modal-body">

          	<div class="row">
          		<div class="col-xs-12" style="text-align: center;margin: 10px;">
          			<img src="logo.jpg" style="max-width: 200px;">
          			<hr/>
          		</div>
          	</div>

              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" placeholder="Input username...">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" placeholder="Input password...">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              
                              <button type="submit" class="btn btn-success btn-block" id="btnLogin">Login</button>
                              <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead"><i class="fa fa-info-circle" style="margin-right: 5px;"></i> Announcement</p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-caret-right text-success"></span> See all your orders</li>
                          <li><span class="fa fa-caret-right text-success"></span> Fast re-order</li>
                          <li><span class="fa fa-caret-right text-success"></span> Save your favorites</li>
                          <li><span class="fa fa-caret-right text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-caret-right text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <li><span class="fa fa-caret-right text-success"></span> Get a gift <small>(only new customers)</small></li>
                      </ul>
                      <p><a href="/new-customer/" class="btn btn-info btn-block">Read more</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>



  <!-- Modal -->
<div class="modal fade" id="modalGlobal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">

  	$(document).ready(function () {
  		window.url_puis = 'http://10.1.10.27:8080/siak3/';
  	});

  	$('#btnLogin').click(function() {
  		loginForm();
  	});

  	$(document).on('keyup','#formNewRePassword',function(){
  		var formNewPassword = $('#formNewPassword').val();
  		var formNewRePassword = $('#formNewRePassword').val();
  		if(formNewPassword==formNewRePassword){
  			$('#btnSaveNewPassword').prop('disabled',false);
				$('#formNewRePassword').css('border','1px solid green');
  			} else {
  				$('#btnSaveNewPassword').prop('disabled',true);
  				$('#formNewRePassword').css('border','1px solid red');
  			}
  	});

  	$(document).on('click','#btnSaveNewPassword',function() {
  		
  		var formNewPassword = $('#formNewPassword').val();
  		var formNewRePassword = $('#formNewRePassword').val();
  		
  		$('#alertPass').html('');
  		if(formNewPassword!='' && formNewPassword!=null && formNewRePassword!='' && formNewRePassword!=null){


  			if(formNewPassword==formNewRePassword){

				var formLastPassword = $('#formLastPassword').val();
  				if(formLastPassword==md5(formNewPassword)){
  					$('#alertPass').html('<div class="alert alert-danger" role="alert">New Password same as the old password</div>');
  					setTimeout(function(){$('#alertPass').html('');},3000);
  				} else {
  					var User = $('#formUser').val();
  					var Username = $('#formUsername').val();
  					var data = {
  						User : User,
  						Username : Username,
  						NewPassword : formNewPassword
  					};
  					updatePassword(data);
  					
  				}

  			} else {
  				$('#formNewRePassword').css('border','1px solid red');
  			}

  		}
  	});

  	function loginForm() {
  		
  		var Username = $('#username').val();
  		var Password = $('#password').val();

  		if(Username!='' && Username!=null && Password!='' && Password!=null){
  			
  			var url = url_puis+'uath/getAuthSSOLogin';
  			var data = {
  				Username : Username,
  				Password : Password
  			};
  			var token = jwt_encode(data);
  			
  			$.post(url,{token:token},function(jsonResult) {
  				console.log(jsonResult);
  				
  					if(jsonResult.Status=='-1'){
  						modalChangePassword(jsonResult.Students);
  					}
  				

  			});
  		}

  	}


  	function modalChangePassword(dataUser){
					var htmlBody = '<div class="row">' +
									    '    <div class="col-xs-3" style="text-align:center;">' +
									    '    <img src="'+dataUser.Path_Photo+'" class="img-rounded" style="width:100%;max-width: 200px;" />'+dataUser.Username+
									    '    </div>' +
									    '    <div class="col-xs-9">' +
									    '    <h4>Hello, '+dataUser.Name+'</h4>' +
									    'Pleace change your password first <i class="fa fa-smile-o" aria-hidden="true"></i>.' +
									    '    <hr/>' +
									    '    <div class="form-group">' +
									    '    <input type="password" class="form-control" id="formNewPassword" placeholder="New password...">' +
									    '    <input type="password" class="form-control hide" id="formUsername" readonly hidden value="'+dataUser.Username+'">' +
									    '    <input type="password" class="form-control hide" id="formLastPassword" readonly hidden value="'+dataUser.LastPassword+'">' +
									    '    <input type="password" class="form-control hide" id="formUser" readonly hidden value="'+dataUser.User+'">' +
									    '    </div>' +
									    '    <div class="form-group">' +
									    '    <input type="password" class="form-control" id="formNewRePassword" placeholder="Re-password...">' +
									    '    </div>' +
									    '<div id="alertPass"></div>' +
									    '    <div style="text-align: right;">' +
									    '    <button class="btn btn-primary" id="btnSaveNewPassword" disabled>Save</button>' +
									    '    </div>' +
									    '    </div>' +
									    '    </div>';

						$('#modalGlobal .modal-header').addClass('hide');
						$('#modalGlobal .modal-footer').addClass('hide');
						$('#modalGlobal .modal-body').html(htmlBody);
  						$('#modalGlobal').modal({
				              'backdrop' : 'static',
				              'show' : true
				          });
  	}



  	function updatePassword(data){
  		var token = jwt_encode(data);
  		var url = url_puis+'uath/updatePassword';

  		$.post(url,{token:token},function(jsonResult){

  		});

  	}
  	
  </script>

</body>
</html>