
<style>
    body {
        background: #eaeaea;
    }
    #pageDownload {
        margin-top: 20px;
    }
    #pageDownload h2 {
        /*color: red;*/
        font-family: "MavenPro-SemiBold";
    }
    #pageDownload img {
        width: 100%;
        max-width: 250px;
    }

    #pageDownload p {
        font-size: 17px;
        font-family: "MavenPro-Medium";
        color: #8c8c8c;
    }

    #pageDownload li {
        color: #8c8c8c;
    }
</style>

<div class="container" id="pageDownload">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="">Download Portal Versi Mobile</h2>
            <div class="panel panel-default">
                <div class="panel-body" style="min-height: 100px;">
                    <p>
                        Currently the android version of the portal can be installed via Playstore
                    </p>
                    <a href="https://play.google.com/store/apps/details?id=com.ypap.StudentPU">
                        <img src="<?= base_url('images/icon/google-play-icon-png-3.png'); ?>">
                    </a>

                    <hr/>
                    <div class="well">
                        <p>If you experience problems in <span style="color: #0000ff91;">the installation or problems when logging in</span>, please use the alternative lank that we have provided</p>

                        <ol>
                            <li><span style="color: #ff4242;">Uninstall</span> the previous application</li>
                            <li>Allow install from unknown source </li>
                            <li>Download this application and install <i class="fa fa-arrow-right" style="margin-right: 7px; margin-left: 7px;"></i> <a href="https://drive.google.com/open?id=1_LM0YSQF9erzcDuQ3g8tuuLvsYSKCKmi" class="btn btn-default" style="color: blue;">Alternative link</a></li>
                        </ol>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $('#btnAlternative').click(function () {

    });
</script>