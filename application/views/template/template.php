<html>
    <head>
        <title>{appHeader}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--<meta name="viewport" content="width=1024">-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

        <!-- Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/bower_components/jquery-ui-1.12.1/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/dist/css/AdminLTE.min.css?version=2.4">
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/dist/css/skins/_all-skins.min.css?version=2.4">
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/plugins/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/cus-loader.css">
        <!--select2-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/select2/dist/css/select2.css">
        <!--Data Table-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/custom.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
        <!--ICheck-->
        <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/plugins/iCheck/all.css">
        <!---------------------------------------------------------------------------------------------------------------------------------------- -->


        <!-- JS -->
        <!-- Scripts -->
        <script src="<?php echo base_url('asset'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url('asset'); ?>/bower_components/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url('asset'); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('asset'); ?>/dist/js/adminlte.min.js"></script>
        <!--select2-->
        <script src="<?php echo base_url(); ?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>asset/bower_components/datatables.net/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>asset/bower_components/notify/bootstrap-notify.min.js"></script>
        <!--ICheck-->
        <script src="<?php echo base_url(); ?>asset/plugins/iCheck/icheck.min.js"></script>
        <script>
            function autoSelect(id, val) {
                $('select#' + id + ' option').each(function () {
                    this.selected = (this.value == val);
                });
            }
        </script>
    </head>

    <body class="hold-transition {appColor} sidebar-mini animated fadeIn">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <input type="hidden" id="base_uri" value="<?php echo base_url(); ?>" >
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>MT</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">{appName}</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?php echo base_url(); ?>asset/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{gelar_d}. {nama}, {gelar_b}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            {gelar_d}. {nama}, {gelar_b}
                                            <small>{nip}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <!--                                        <div class="pull-left">
                                                                                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                                                              </div>-->
                                        <div class="pull-right">
                                            <a href="/Login/DoLogout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form method="get" class="sidebar-form" id="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li id="Dasboard"><a href="{base_url}"><i class="fa fa-dashboard"></i> <span>Dasboard</span></a></li>
                        <li class="treeview ">
                            <a href="#"><i class="fa fa-th"></i> <span>Master Data</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li id="Jabatan">
                                    <a href="/Jabatan"><i class="fa fa-circle-o"></i> Jabatan</a>
                                </li>
                                <li id="Level">
                                    <a href="/Level"><i class="fa fa-circle-o"></i> User Level</a>
                                </li>
                                <li id="Pegawai">
                                    <a href="/Pegawai"><i class="fa fa-circle-o"></i> Pegawai</a>
                                </li>
                                <li id="Pokjar">
                                    <a href="/Pokjar"><i class="fa fa-circle-o"></i> Pokjar</a>
                                </li>
                                <li id="Tutor">
                                    <a href="/Tutor"><i class="fa fa-circle-o"></i> Tutor</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview ">
                            <a href="#"><i class="fa fa-th"></i> <span>Monitoring</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li id="Jadwal">
                                    <a href=<?php echo base_url("/Jadwal"); ?>><i class="fa fa-circle-o"></i> Jadwal</a>
                                </li>
                                <li id="Monitoring">
                                    <a href=<?php echo base_url("/Monitoring"); ?>><i class="fa fa-circle-o"></i> Monitoring</a>
                                </li>
                                <li id="LaporanMonitoring">
                                    <a href=<?php echo base_url("/LaporanMonitoring"); ?>><i class="fa fa-circle-o"></i> Laporan Monitoring</a>
                                </li>
                                <li id="UploadBuktiMonitoring">
                                    <a href=<?php echo base_url("/UploadBuktiMonitoring"); ?>><i class="fa fa-circle-o"></i> Upload Bukti Monitoring</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview ">
                            <a href="#"><i class="fa fa-th"></i> <span>Report</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li id="Jadwal">
                                    <a href=<?php echo base_url("/Report"); ?>><i class="fa fa-circle-o"></i> Report Monitoring</a>
                                </li>
                                <li id="Monitoring">
                                    <a href=<?php echo base_url("/Report/hasil"); ?>><i class="fa fa-circle-o"></i> Hasil Monitoring</a>
                                </li>
<!--                                <li id="Monitoring">
                                    <a href=<?php echo base_url("/Report/Lokasi"); ?>><i class="fa fa-circle-o"></i> Lokasi Monitoring</a>
                                </li>-->
                                <li id="Petugas">
                                    <a href=<?php echo base_url("/Report/Petugas"); ?>><i class="fa fa-circle-o"></i> Petugas Monitoring</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>


            <div class="content-wrapper">
                <article id="content">
                    {view}
                </article>
            </div>
        </div>
    </body>
</html>