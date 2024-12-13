<body>
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="index.php?action=beranda">
                <b class="logo-abbr"><img src="" alt=""></b>
                <span class="logo-compact"> <img src="" alt=""></span>
                <span class="brand-title">
                    <h4 style="font-size:30px; font-weight: bolder; color: #fff;">E-KTP</h4>
                </span>
            </a>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="fas fa-bars"></i></span>
                </div>
            </div>
            <div class="header-right">
                <ul class="clearfix">
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        
                        <i class="fas fa-user-circle" style="font-size: 40px; color: #009BF4;"></i> 
                        </div>
                        <div class="drop-down dropdown-profile   dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <p>Username: <?= $_SESSION['username']; ?></p>
                                    </li>
                                    <li>
                                        <p>Role: <?= $_SESSION['role']; ?></p>
                                    </li>

                                    <hr class="my-2">
                                    <li><a href="index.php?action=logout" onclick="alertConfirm('Do you want to log out?','If you log out you will exit the current session', 'index.php?action=logout');"><i class="icon-key"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->


    <!--**********************************
            Sidebar start
    ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a href="index.php?action=dashboard">
                        <i class="fas fa-chart-line"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-label">Apps</li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-address-card menu-icon"></i> <span class="nav-text">Validasi</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.php?action=radminPengajuan">Pengajuan</a></li>
                        <li><a href="index.php?action=radminPembuatan">Pembuatan</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-flag menu-icon"></i> <span class="nav-text">Laporan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.php?action=radminLaporan">Laporan Hasil KTP</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>