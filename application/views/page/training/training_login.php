<style>
    body {
        background: #eaeaea;
    }

    </style>


<div class="container">
    <div class="col-md-4 col-md-offset-4" style="margin-top:7%;">
        <h2><b>Portal Training</b></h2>

        <div id="showPanel">
            
            
        </div>
    </div>
</div>

<script>

    var panelLogin = `<div id="panellogin">
    <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" id="username" placeholder="Username . . ." />
                </div>
                <div class="form-group">
                <label>Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Password . . ." />
                            <span class="input-group-btn">
                                <button class="btn btn-default" id="showPassword" type="button"><i class="fa fa-lock" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </div>
                
                <div style="text-align:right;">
                    <a href="javascript:void(0);" id="goto_forgotpassword">Forgot your Password ? </a>
                    <button class="btn btn-success" id="submit">Submit</button>
                </div>
            </div>
        </div>
        <button class="btn btn-danger btn-block btn-lg"><b>Sign in with Google</b></button></div>`;

    var panelforgotpass = `<div id="panelforgotpass">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Enter your registered email</label>
                            <input type="email" class="form-control" placeholder="Type here . . ." />
                        </div>
                        <div style="text-align:right;">
                            <a href="javascript:void(0);" id="goto_loginpage"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to login page</a>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>`;

var url_rest_api = "<?= url_rest_api; ?>";

$(document).ready(function() {

    $('#showPanel').html(panelLogin);
    
});

$(document).on('click','#showPassword',function() {
    var t = $('#password').attr('type');
    if(t=='password'){
        $('#password').attr('type','text');
        $('#showPassword').removeClass('btn-default').addClass('btn-info')
        .html('<i class="fa fa-unlock" aria-hidden="true"></i>');
    } else {
        $('#password').attr('type','password');
        $('#showPassword').removeClass('btn-info').addClass('btn-default')
        .html('<i class="fa fa-lock" aria-hidden="true"></i>');
    }
});

$(document).on('click','#submit',function() {
    var username = $('#username').val();
    var password = $('#password').val();
    if(username !='' && username!=null &&
        password !='' && password!=null){

            loading_page_modal();

            setTimeout(() => {
                loading_page_modal('hide');
            }, 3000);

            var url = url_rest_api+'training/login'
            $.post(url,{Username : username, Password : password
                },function(result) {
                    if(result.status){
                        var d = result.data[0];
                        var pathLogin = (d.UserType=='participant') ? '<?= url_participant; ?>' : '<?= url_trainer; ?>';
                        // console.log(d);
                        // var newToken = jwt_encode(d);
                        // console.log(newToken);
                        window.location.replace(pathLogin+'auth/'+d.APIKey);
                    } else {
                        toastr.warning('Please, contact admin','Error');
                        $('#panellogin .panel-default').animateCss('shake');
                    }
                    
                }).fail(function(xhr, status, error) {
                    if(xhr.status==401){
                        toastr.warning('Username & Password not match','Fail');
                    } else {
                        toastr.warning('Please, contact admin','Error');
                    }
                    $('#panellogin .panel-default').animateCss('shake');
                });
        
    } else {
        $('#panellogin .panel-default').animateCss('shake');
        toastr.info('Username & Password are required','Info');
    }    
});

$(document).on('click','#goto_forgotpassword',function() {
    $('#panellogin').animateCss('slideOutLeft',function() {

        $('#showPanel').html(panelforgotpass);

        $('#panelforgotpass').animateCss('slideInRight');
        
    });
});

$(document).on('click','#goto_loginpage',function() {
    $('#panelforgotpass').animateCss('slideOutRight',function() {

        $('#showPanel').html(panelLogin);

        $('#panellogin').animateCss('slideInLeft');
        
    });
});

</script>