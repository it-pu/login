
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

    .table-contre th, .table-contre td {
        text-align:center;
    }
</style>

<div class="container" id="pageDownload">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="">Mobile Application</h2>
            <div class="panel panel-default">
            <!-- <div class="panel-heading">
                <h4 class="panel-title">
                <i class="fa fa-bars" style="margin-right:5px;"></i>
                Portal Student</h4>
            </div> -->
                <div class="panel-body" style="min-height: 100px;">
                <p>
                        Currently the android version of the portal can be installed via Playstore
                    </p>
                    <hr/>
                <table class="table table-bordered table-striped table-contre">
                    <thead>
                    <tr>
                        <th style="width:1%;">No</th>
                        <th style="width:50%;">Application Name</th>
                        <th>Download On</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td style="text-align:left;"><b>Portal Student</b></td>
                        <td style="text-align:left;">
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.ypap.StudentPU">
                                <img src="<?= base_url('images/icon/google-play-icon-png-3.png'); ?>" style="width:77px;" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td style="text-align:left;"><b>Cosmas Batubara Library</b></td>
                        <td style="text-align:left;">
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=io.ypap.library">
                                <img src="<?= base_url('images/icon/google-play-icon-png-3.png'); ?>" style="width:77px;" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td style="text-align:left;"><b>CRM Mobile</b></td>
                        <td style="text-align:left;">
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.ypap.CRM">
                                <img src="<?= base_url('images/icon/google-play-icon-png-3.png'); ?>" style="width:77px;" />
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
               
                    
                    <!-- <a href="https://play.google.com/store/apps/details?id=com.ypap.StudentPU">
                        <img src="<?= base_url('images/icon/google-play-icon-png-3.png'); ?>">
                    </a> -->

                    <!-- <hr/>
                    <div class="well">
                        <p>If you experience problems in <span style="color: #0000ff91;">the installation or problems when logging in</span>, please use the alternative link that we have provided</p>

                        <ol>
                            <li><span style="color: #ff4242;">Uninstall</span> the previous application</li>
                            <li>Allow install from unknown source </li>
                            <li>Download this application and install <i class="fa fa-arrow-right" style="margin-right: 7px; margin-left: 7px;"></i> <a href="https://drive.google.com/open?id=1_LM0YSQF9erzcDuQ3g8tuuLvsYSKCKmi" class="btn btn-default" style="color: blue;">Alternative link</a></li>
                        </ol>


                    </div> -->
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $('#btnAlternative').click(function () {

    });
</script>