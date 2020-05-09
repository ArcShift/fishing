<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Source Admin | Login Page</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />
        <link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap/bootstrap-4.1.1/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/plugins/font-awesome/5.1/css/all.css" rel="stylesheet" />
        <link href="../assets/css/animate.min.css" rel="stylesheet" />
        <link href="../assets/css/style.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->
        <!-- ================== BEGIN BASE JS ================== -->
        <script src="../assets/plugins/pace/pace.min.js"></script>
        <!-- ================== END BASE JS ================== -->
        <style>
            #page-container{
                background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200');
                background-size: cover;
                background-repeat: no-repeat;
                /*transform:scaleX(-1);*/
            }
            #custom{
                background-color: rgba(255,255,255,0.5);
                width: 480px;
                height: 100vh;
                float: right;
            }
        </style>
    </head>
    <body class="pace-top">
        <!-- begin #page-loader -->
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-container">
            <!-- begin login -->
            <div>
                
            <div id="custom">
                <!--<div class="login">-->
                    <!-- begin login-brand -->
                    <div class="login-brand">
                        <img src="<?php echo base_url('assets/gambar/') ?>Logo Smart Fishing.png" height="36" class="pull-right" alt="" />
                        <?php echo $this->config->item("app_name") ?>
                    </div>
                    <!-- end login-brand -->
                    <!-- begin login-content -->
                    <div class="login-content">
                        <?php if ($this->input->post('login')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Login Gagal</h4>
                                Username/ password salah
                            </div>
                        <?php } ?>
                        <h4 class="text-center m-t-0 m-b-20">Log in</h4>
                        <form method="POST" name="login_form" class="form-input-flat">
                            <div class="form-group">
                                <input type="text" name="user" value="<?php echo $this->input->post('user') ?>" class="form-control input-lg" placeholder="Username" required=""/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control input-lg" placeholder="Password"  required=""/>
                            </div>
                            <div class="row m-b-20">
                                <div class="col-lg-12">
                                    <button type="submit" name="login" value="ok" class="btn btn-primary btn-lg btn-block">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end login-content -->
                <!--</div>-->
                <!-- end login -->
            </div>
            </div>
        </div>
        <!-- end page container -->


        <!-- ================== BEGIN BASE JS ================== -->
        <script src="../assets/plugins/jquery/jquery-3.3.1.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/bootstrap/bootstrap-4.1.1/js/bootstrap.bundle.min.js"></script>
        <!--[if lt IE 9]>
            <script src="../assets/crossbrowserjs/html5shiv.js"></script>
            <script src="../assets/crossbrowserjs/respond.min.js"></script>
        <![endif]-->
        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="../assets/js/demo.min.js"></script>
        <script src="../assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->

        <script>
            $(document).ready(function () {
                App.init();
                Demo.initThemePanel();
            });
        </script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.goo  gle-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-53034621-1', 'auto');
            ga('send', 'pageview');

        </script>
    </body>
</html>
