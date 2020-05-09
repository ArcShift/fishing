<html lang="en"><head>
        <meta charset="utf-8">
        <title>Color Admin | Login Page</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="https://seantheme.com/color-admin/admin/assets/css/default/app.min.css" rel="stylesheet">
        <!-- ================== END BASE CSS STYLE ================== -->
        <!-- ================== BEGIN BASE JS ================== -->
        <!--<script async="" src="https://www.google-analytics.com/analytics.js"></script>-->
        <script src="https://seantheme.com/color-admin/admin/assets/js/app.min.js"></script>
        <!--<script src="https://seantheme.com/color-admin/admin/assets/js/theme/default.min.js"></script>-->
        <!-- ================== END BASE JS ================== -->
    </head>
    <body class="pace-top  pace-done">
        <div class="pace  pace-inactive">
            <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div></div>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade show d-none">
            <span class="spinner"></span>
        </div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade show">
            <!-- begin login -->
            <div class="login login-with-news-feed">
                <!-- begin news-feed -->
                <div class="news-feed">
                    <div class="news-image" style="background-image: url('https://seantheme.com/color-admin/admin/assets/img/login-bg/login-bg-11.jpg')"></div>
                    <div class="news-caption">
                        <h4 class="caption-title"><b>Smart Fishing Jatim</b></h4>
                        <p>Aplikasi dan Sistem Informasi untuk Perencanaan Perikanan Jawa Timur</p>
                    </div>
                </div>
                <!-- end news-feed -->
                <!-- begin right-content -->
                <div class="right-content">
                    <!-- begin login-header -->
                    <div class="login-header">
                        <div class="brand">
                            <span class="logo"></span>
                            <b>Smart Fishing</b>
                            <small>Halaman Login untuk Smart Fishing</small>
                        </div>
                        <div class="icon">
                            <img src="//bumi.id/smartfishing/assets/gambar/Logo Smart Fishing.png" class="pull-right" alt="" height="36">
                        </div>
                    </div>
                    <!-- end login-header -->
                    <!-- begin login-content -->
                    <div class="login-content">
                        <?php if ($this->input->post('login')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4>Login Gagal</h4>
                                Username/ password salah
                            </div>
                        <?php } ?>
                        <form  method="POST" name="login_form" class="margin-bottom-0">
                            <div class="form-group m-b-15">
                                <input type="text" class="form-control form-control-lg" name="user" value="<?php echo $this->input->post('user') ?>" placeholder="Masukkan Username" required="">
                            </div>
                            <div class="form-group m-b-15">
                                <input type="password" class="form-control form-control-lg" name="pass" placeholder="Masukkan Password" required="">
                            </div>
                            <div class="login-buttons">
                                <button type="submit" name="login" value="ok" class="btn btn-success btn-block btn-lg">Sign me in</button>
                            </div>
                            <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                                Hubungi admin untuk mendapatkan akses login
                            </div>
                            <hr>
                            <p class="text-center text-grey-darker mb-0">
                                © PT. Delta Sinergi Prima All Right Reserved 2020
                            </p>
                        </form>
                    </div>
                    <!-- end login-content -->
                </div>
                <!-- end right-container -->
            </div>
            <!-- end login -->


            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

    </body>
</html>