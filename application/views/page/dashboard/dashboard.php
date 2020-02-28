
<style>
    body {
        background-color: #eaeaea;
    }
    #listApps, #listProdi {
        margin-bottom: 30px;
    }

    #listApps .row {
        margin-bottom: 15px;
    }

    .apps-grid {
        margin-bottom: 0px !important;
    }

    #listApps .thumbnail {
        padding: 10px;
        text-align: center;
        height: 130px;
        border-radius: 5px;
        border: none;
    }

    #listApps a {
        text-decoration: none;
        color: #333333;
    }

    #listApps .thumbnail p {
        font-size: 15px;
        margin-top: 10px;
        color: #7b7b7b;
        font-family: "MavenPro-SemiBold";
    }

    #listApps .thumbnail img {
        width: 100%;
        max-width: 50px;
        padding-top: 10px;
    }

    #listProdi .thumbnail {
        border: none;
        border-radius: 0px;
        padding: 0px;
    }

    .page-label {
        position: absolute;
        top: -6px;
        right: 18px;
        color: #fff;
        font-size: 10px;
        padding: 0px 5px 3px 5px;
        border-radius: 3px;
    }

    .page-label .fa {
        margin-right: 2px;
    }

    .page-coming-soon {
        background: #FF5722;
    }


    .page-maintenance {
        background: #607D8B;
    }

    #listProdi img {
        width: 100%;
        border-radius: 5px;
    }

    #listProdi .col-md-6 {
        margin-bottom: 20px;
    }

    .carousel-inner {
        height: 128px;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-bottom: 15px;margin-top: 15px;">
            <a href="https://podomorouniversity.ac.id/" target="_blank">
                <img src="<?= base_url(); ?>assets/icon/logo_pu.png" style="width: 100%; max-width: 200px;">
            </a>
        </div>
    </div>
</div>

<div class="container" id="listApps">

    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="row apps-grid">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="<?= base_url('portal-login'); ?>">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/idea.png">
                                    <p>Login Portal</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="<?= base_url('mobile'); ?>">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/android.png">
                                    <p>Student Mobile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="<?= base_url('search-people'); ?>">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/searc-people.png">
                                    <p>Search People</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <!--                            <a href="https://alumni.podomorouniversity.ac.id/">-->
                            <a href="javascript:void(0)" class="coming-soon">
                                <div class="thumbnail">
                                    <div class="page-label page-coming-soon"><i class="fa fa-puzzle-piece"></i> Coming soon</div>
                                    <img src="<?= base_url(); ?>images/icon/alumni.png">
                                    <p>Alumni</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row apps-grid">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://podivers.org/">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/bem.png">
                                    <p>Podivers</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <!--                            <a href="https://career.podomorouniversity.ac.id/">-->
                            <a href="javascript:void(0)" class="coming-soon">
                                <div class="thumbnail">
                                    <div class="page-label page-coming-soon"><i class="fa fa-puzzle-piece"></i> Coming soon</div>
                                    <img src="<?= base_url(); ?>images/icon/career.png">
                                    <p>Career</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://cblibrary.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/student.png">
                                    <p>CB Library</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://journal.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/journal.png">
                                    <p>Journal</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row apps-grid">

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://portal.podomorouniversity.ac.id/assets/documents/PARENT_PORTAL.pdf" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/parents.png">
                                    <p>Parent Portal</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://repository.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/repository.png">
                                    <p>Repository</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://sister.podomorouniversity.ac.id/auth/login" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/sister.png">
                                    <p>Sister</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://blogs.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/blogs.png">
                                    <p>Blogs</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row apps-grid">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="http://pucel.co/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/pucel.png">
                                    <p>Pucel</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://pu-x.com/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/pux.png">
                                    <p>PU-X</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://play.google.com/store/apps/details?id=com.ypap.CRM" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/crm.png">
                                    <p>CRM Mobile</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6 hvr-grow-rotate">
                            <a href="https://admission.podomorouniversity.ac.id/" target="_blank">
                                <div class="thumbnail">
                                    <img src="<?= base_url(); ?>images/icon/registration.png">
                                    <p>Online Registrations</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <style>
                .glyphicon {
                    margin-right: 5px !important; /*override*/
                }
                .pagination .glyphicon {
                    margin-right: 0px !important; /*override*/
                }
                .pagination a {
                    color: #555;
                }
                .panel ul {
                    padding: 0px;
                    margin: 0px;
                    list-style: none;
                }
                .news-item {
                    padding: 4px 4px;
                    margin: 0px;
                    border-bottom: 1px dotted #555;
                }

                #listBlogs .panel-body {
                    padding: 10px 15px 0px 15px !important;
                }
                #listBlogs a:hover {
                    color: blue;
                }



                #listBlogs .panel, #listBlogs .panel-heading, #listBlogs .panel-footer {
                    border: none !important;
                }

                #listBlogs .news-item {
                    border-bottom: 1px solid #cccccc4f;
                }

                #listBlogs .panel-default>.panel-heading {
                    color: #7b7b7b;
                }

                #listApps a.next, #listApps a.prev {
                    color: #7b7b7b !important;
                }

                /*#listBlogs .pagination>li>a, #listBlogs .pagination>li>span {*/
                /*    padding: 5px 5px;*/
                /*}*/
            </style>
            <div id="listBlogs">

                <?php if(count($Recomend)>0){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"> <span style="color: #FF5722;" class="glyphicon glyphicon-fire"></span><b><span style="border-bottom: 2px solid #ff572266;">Rec</span>ommend Post</b></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="demo">
                                        <?php foreach ($Recomend AS $item) {
                                            $expTitle = explode(' ',$item['Title']);
                                            $viewTitle = (strlen($item['Title'])>=40) ? $expTitle[0].' '.$expTitle[1].' '.$expTitle[2].' '.$expTitle[3].'...' : $item['Title'];
                                            ?>
                                            <li class="news-item">
                                                <table cellpadding="4">
                                                    <tr>
                                                        <td><img data-src="https://adminblogs.podomorouniversity.ac.id/upload/<?= $item['Images']; ?>" width="40" class="img-circle img-fitter" /></td>
                                                        <td><a href="https://blogs.podomorouniversity.ac.id/details/<?= $item['ID_title']; ?>"><?= $viewTitle; ?></a></td>
                                                    </tr>
                                                </table>
                                            </li>
                                        <?php } ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer"> </div>
                    </div>
                <?php } ?>

                <?php if(count($Recent)>0){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"> <span style="color: #2196F3;" class="glyphicon glyphicon-bookmark"></span><b><span style="border-bottom: 2px solid #2196f385;">Rec</span>ent Post</b></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="demo2">

                                        <?php foreach ($Recent AS $item) {
                                            $expTitle = explode(' ',$item['Title']);
                                            $viewTitle = (strlen($item['Title'])>=40) ? $expTitle[0].' '.$expTitle[1].' '.$expTitle[2].' '.$expTitle[3].'...' : $item['Title'];
                                            ?>
                                            <li class="news-item">
                                                <table cellpadding="4">
                                                    <tr>
                                                        <td><img data-src="https://adminblogs.podomorouniversity.ac.id/upload/<?= $item['Images']; ?>" width="40" class="img-circle img-fitter" /></td>
                                                        <td><a href="https://blogs.podomorouniversity.ac.id/details/<?= $item['ID_title']; ?>"><?= $viewTitle; ?></a></td>
                                                    </tr>
                                                </table>
                                            </li>
                                        <?php } ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer"> </div>
                    </div>
                <?php } ?>

            </div>

            <script type="text/javascript">
                $(function () {
                    $(".demo").bootstrapNews({
                        newsPerPage: 3,
                        navigation: true,
                        autoplay: true,
                        direction:'up', // up or down
                        animationSpeed: 'normal',
                        newsTickerInterval: 4000, //4 secs
                        pauseOnHover: true,
                        onStop: null,
                        onPause: null,
                        onReset: null,
                        onPrev: null,
                        onNext: null,
                        onToDo: null
                    });
                    $(".demo2").bootstrapNews({
                        newsPerPage: 3,
                        navigation: true,
                        autoplay: true,
                        direction:'down', // up or down
                        animationSpeed: 'normal',
                        newsTickerInterval: 4000, //4 secs
                        pauseOnHover: true,
                        onStop: null,
                        onPause: null,
                        onReset: null,
                        onPrev: null,
                        onNext: null,
                        onToDo: null
                    });
                });
            </script>
        </div>
    </div>


</div>

<div class="container" id="listProdi">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row hide" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <h4 style="border-left: 7px solid #FF5722;padding-left: 7px;">Undergraduate Programs</h4>
                </div>
            </div>

            <div class="row" style="">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://acc.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/acc.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://arc.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/arc.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://law.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/blp.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://cem.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/cem.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://ent.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/ent.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://hbp.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/hbp.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-md-6 hvr-grow">
                            <a href="https://urp.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/urp.png">
                            </a>
                        </div>
                        <div class="col-md-6 hvr-grow">
                            <a href="https://pdp.podomorouniversity.ac.id/" target="_blank">
                                <img src="<?= base_url(); ?>images/prodi/pdp.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div style="text-align: center;">
                <a href="<?= base_url('meet-our-team'); ?>" target="_blank" style="color: #333333;">
                    <i class="fa fa-copyright" aria-hidden="true"></i> 2020 Universitas Agung Podomoro
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('.img-fitter').imgFitter();

    $('.coming-soon').click(function () {
        alert('Coming soon :)');
    });
    $('.maintenance').click(function () {
        alert('Maintenance :)');
    });

</script>