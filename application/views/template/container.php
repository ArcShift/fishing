
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fisherman</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/plugins/bootstrap/bootstrap-4.1.1/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/plugins/font-awesome/5.1/css/all.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/style.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
        <link href="<?php echo base_url() ?>assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL CSS STYLE ================== -->

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!--[if lt IE 9]>
            <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap/bootstrap-4.1.1/js/bootstrap.bundle.min.js"></script>
        <!--[if lt IE 9]>
            <script src="../assets/crossbrowserjs/html5shiv.js"></script>
            <script src="../assets/crossbrowserjs/respond.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url() ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/chart-js/Chart.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="<?php echo base_url() ?>assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script src="<?php echo base_url() ?>/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/chart-js/Chart.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->

    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-container page-header-fixed page-sidebar-fixed page-with-two-sidebar page-with-footer">
            <!-- begin #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <!-- begin container-fluid -->
                <div class="container-fluid">
                    <!-- begin mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="<?php echo site_url() ?>" class="navbar-brand"><img src="<?php echo base_url('assets/gambar/') ?>logo.png" class="logo" /><?php echo $this->config->item("app_name") ?></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end mobile sidebar expand / collapse button -->

                    <!-- begin navbar-right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="image"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png" alt="" /></span>
                                <span class="hidden-xs"><?php echo $this->session->userdata('user') ?></span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo site_url('user/profile') ?>">Edit Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('login/logout') ?>">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end navbar-right -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end #header -->

            <!-- begin #sidebar -->
            <div id="sidebar" class="sidebar">
                <!-- begin sidebar scrollbar -->
                <div data-scrollbar="true" data-height="100%">
                    <!-- begin sidebar nav -->
                    <ul class="nav">
                        <li class="nav-user">
                            <div class="image">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png" alt="" />
                            </div>
                            <div class="info">
                                <div class="name dropdown">
                                    <a href="javascript:;" data-toggle="dropdown"><?php echo $this->session->userdata('user') ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('user/profile') ?>">Edit Profile</a></li>
<!--                                        <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                                        <li><a href="javascript:;">Calendar</a></li>
                                        <li><a href="javascript:;">Setting</a></li>-->
                                        <li class="divider"></li>
                                        <li><a href="<?php echo site_url('login/logout') ?>">Log Out</a></li>
                                    </ul>
                                </div>
                                <div class="position"><?php echo $this->session->userdata('role') ?></div>
                            </div>
                        </li>
                        <li class="nav-header">Navigation</li>
                        <?php
                        $modules = array(
                            array("id" => "adm", "nama" => "user", "icon" => "user-secret"),
                            array("id" => "fsrm", "nama" => "nelayan", "icon" => "user"),
                            array("id" => "map", "nama" => "peta", "icon" => "map-marked"),
                            array("id" => "fish", "nama" => "ikan", "icon" => "fish"),
                            array("id" => "cmpl", "nama" => "pengaduan", "icon" => "phone-volume"),//finding
                            array("id" => "", "nama" => "tangkapan", "icon" => "shopping-basket"),
                            array("id" => "", "nama" => "peralatan", "icon" => "toolbox"),
                            array("id" => "", "nama" => "pengumuman", "icon" => "bullhorn"),
                            array("id" => "", "nama" => "dokumen", "icon" => "file")
                        );
                        ?>
                        <?php foreach ($modules as $m) { ?>
                            <?php if (in_array($m['nama'], $aksesModule)) { ?>
                                <li class="<?php echo $m['nama'] == $this->uri->segment(1) ? 'active' : '' ?>">
                                    <a href="<?php echo site_url($m['nama']) ?>">
                                        <i class="fa fa-<?php echo $m['icon'] ?>"></i>
                                        <span><?php echo ucfirst($m['nama']) ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <li class="divider has-minify-btn">
                            <!-- begin sidebar minify button -->
                            <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-left"></i></a>
                            <!-- end sidebar minify button -->
                        </li>
                    </ul>
                    <!-- end sidebar nav -->
                </div>
                <!-- end sidebar scrollbar -->
            </div>
            <div class="sidebar-bg"></div>
            <!-- end #sidebar -->

            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->
                <!--                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard v2</li>
                                </ol>-->
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header"><?php echo ucfirst($module) ?> <small><?php echo ucfirst($subTitle) ?></small>
                <?php if (preg_match("#^nelayan/detail#", uri_string())) { ?>
                    <button class="btn btn-primary pull-right" onclick="window.history.back()">Kembali</button>
                <?php } ?>
                </h1>
                <!-- end page-header -->
                <?php if (!empty($this->session->flashdata('msgSuccess'))) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-thumbs-o-up"></i> Sukses</h4>
                        <?php echo $this->session->flashdata('msgSuccess') ?>
                    </div>
                <?php } else if (!empty($this->session->flashdata('msgError'))) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('msgError') ?>
                    </div>
                <?php } ?>
                <?php $this->load->view($view) ?>
                <!-- begin #footer -->
                <div id="footer" class="footer">
                    <span class="pull-right">
                        <a href="javascript:;" class="btn-scroll-to-top" data-click="scroll-top">
                            <i class="fa fa-arrow-up"></i> <span class="hidden-xs">Back to Top</span>
                        </a>
                    </span>
                    &copy; 2018 <b>Source Admin</b> All Right Reserved
                </div>
                <!-- end #footer -->
            </div>
            <!-- end #content -->
            <div class="sidebar-bg sidebar-right"></div>
            <!-- end #sidebar-right -->
        </div>
        <!-- end page container -->
        <script>
            $(document).ready(function () {
                App.init();
            });
        </script>
    </body>
</html>