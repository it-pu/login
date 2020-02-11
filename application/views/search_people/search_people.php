


<style>

    textarea:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus {
        border-color: #CCCCCC;
        box-shadow: none;
        outline: 0 none;
    }

    #showData a {
        text-decoration: none;
        color: #333333;
    }


    .card {
        background-color: rgba(214, 224, 226, 0.2);
        text-align: center;
        padding: 15px;
        border: 1px solid #cccccc7a;
        border-radius: 5px;
        height: 221px;
        margin-bottom: 25px;
    }
    .card:hover {
        background: rgba(214, 224, 226, 0.59);
        cursor: pointer;
    }
    .card img.avatar {
        width: 75px;
        height: 75px;
        border-radius: 45px;
        border: 1px solid #CCCCCC;
    }

    @keyframes placeHolderShimmer {
        0% {
            background-position: -468px 0
        }
        100% {
            background-position: 468px 0
        }
    }

    .animated-background {
        animation-duration: 1s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: placeHolderShimmer;
        animation-timing-function: linear;
        background: #f6f7f8;
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background-size: 800px 104px;
        height: 221px;
        position: relative;
    }
    .loading-page .col-xs-6{
        margin-bottom: 25px;
    }
</style>



<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12" style="text-align: center;">
            <h1>Search people</h1>
        </div>
        <div class="col-md-8 col-md-offset-2" style="margin-top: 20px;">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" id="formSearch" autofocus placeholder="Search minimum 3 characters . . ." aria-describedby="sizing-addon1">
            </div>
        </div>
    </div>


    <div class="row" style="margin-top: 50px;" id="showData"></div>
    <div class="row" style="margin-top: 50px;" id="showDataStd"></div>
</div>



<script>
    $(document).ready(function () {

        window.defaultPage = '';
        window.defaultPage1 = '<div class="col-md-2 col-md-offset-3">' +
            '            <div class="card">' +
            '                <i class="fa fa-question fa-5x" style="color: #c2c2c27a;"></i>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-2">' +
            '            <div class="card">' +
            '                <i class="fa fa-question fa-5x" style="color: #c2c2c27a;"></i>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-2">' +
            '            <div class="card">' +
            '                <i class="fa fa-question fa-5x" style="color: #c2c2c27a;"></i>' +
            '            </div>' +
            '        </div>';

        window.notFoundPage = function (key) {

            var pg = '<div style="text-align: center;color: #9e9e9ea6;margin-bottom: 15px;">' +
                '            <h1>Sorry we couldn\'t find any matches for  <span style="color: #1e90ffbd;">'+key+'</span></h1>' +
                '        </div>';
            return pg;
        };

        window.loadingPage = '<div class="col-md-4 loading-page">' +
            '            <div class="row">' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-4 loading-page">' +
            '            <div class="row">' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>' +
            '        <div class="col-md-4 loading-page">' +
            '            <div class="row">' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '                <div class="col-xs-6">' +
            '                    <div class="animated-background">' +
            '                        <div class="background-masker header-top"></div>' +
            '                        <div class="background-masker header-left"></div>' +
            '                        <div class="background-masker header-right"></div>' +
            '                        <div class="background-masker header-bottom"></div>' +
            '                        <div class="background-masker subheader-left"></div>' +
            '                        <div class="background-masker subheader-right"></div>' +
            '                        <div class="background-masker subheader-bottom"></div>' +
            '                        <div class="background-masker content-top"></div>' +
            '                        <div class="background-masker content-first-end"></div>' +
            '                        <div class="background-masker content-second-line"></div>' +
            '                        <div class="background-masker content-second-end"></div>' +
            '                        <div class="background-masker content-third-line"></div>' +
            '                        <div class="background-masker content-third-end"></div>' +
            '                    </div>' +
            '                </div>' +
            '            </div>' +
            '        </div>';

        $('#showData').html(defaultPage);

        $('.img-fitter').imgFitter();
    });

    $(document).on('click','#showDataStd .card',function () {
        alert('Coming soon :) ');
    });

    $('#formSearch').keyup(function () {
        var key = $(this).val();

        if(key!='' && key.length>=3){

            $('#showData,#showDataStd').html(loadingPage);

            try {
                $.getJSON("https://api.ipify.org/?format=json", function(e) {
                    getSearchPeople(key,e.ip);
                });
            } catch (e){
                getSearchPeople(key,'');
            }

        } 
        else {
            setTimeout(function () {
                $('#showData,#showDataStd').html(defaultPage);
            },1000);
        }
    });

    function getSearchPeople(key,IPPublic) {

        var token = jwt_encode({
            IPPublic : IPPublic,
            key : key.trim()
        });

        var url = dt_base_url_js+'__getPeople?token='+token;
        $.getJSON(url,function (jsonResult) {

            setTimeout(function () {
                $('#showData,#showDataStd').empty();
                // Employees
                if(jsonResult.Employees.length>0){
                    var isi = 1;
                    var detailList = '';
                    $.each(jsonResult.Employees,function (i,v) {

                        if(isi==3){ isi = 1; }

                        var depan = (isi==1) ? '<div class="col-md-4"><div class="row">' : '';
                        var belakang = ((i+1) == jsonResult.Employees.length || isi==2) ? '</div></div>' : '';

                        detailList = detailList+depan+'<div class="col-xs-6 animated fadeIn">' +
                            '            <a href="'+dt_base_url_js+'search-people/detail-employees/'+v.NIP+'" target="_blank"><div class="card">' +
                            '                <div>' +
                            '                    <img class="avatar img-fitter" data-src="'+v.Photo+'">' +
                            '                </div>' +
                            '                <h4 class="avatar-name">'+v.Name+'<br/><small>'+v.NIP+'</small></h4>' +
                            '                <p>'+v.Dvision+'</p>' +
                            '            </div></a>' +
                            '        </div>'+belakang;

                        isi = isi + 1;
                    });

                    $('#showData').html(detailList);

                    $('.img-fitter').imgFitter();
                }

                if(jsonResult.Students.length>0){
                    var isi = 1;
                    var detailList = '';

                    $.each(jsonResult.Students,function (i,v) {

                        if(isi==3){ isi = 1; }

                        var depan = (isi==1) ? '<div class="col-md-4"><div class="row">' : '';
                        var belakang = ((i+1) == jsonResult.Students.length || isi==2) ? '</div></div>' : '';

                        detailList = detailList+depan+'<div class="col-xs-6 animated fadeIn">' +
                            '            <div class="card">' +
                            '                <div>' +
                            '                    <img class="avatar img-fitter" data-src="'+v.Photo+'">' +
                            '                </div>' +
                            '                <h4 class="avatar-name">'+v.Name+'<br/><small>'+v.NPM+'</small></h4>' +
                            '                <p>'+v.Prodi+'</p>' +
                            '            </div>' +
                            '        </div>'+belakang;

                        isi = isi + 1;
                    });

                    $('#showDataStd').html(detailList);

                    $('.img-fitter').imgFitter();
                }


                if(jsonResult.Employees.length<=0 && jsonResult.Students.length<=0) {
                    var notFoundPageData = notFoundPage(key);
                    $('#showData').html(notFoundPageData);
                }
            },1000);


        });
    }
</script>