<?php 
$action = isset($_GET['action']) ? $_GET['action'] : '';
$a = $action == 'login' || $action == 'regis';
?>
<header class="container site-header <?= !empty($a)? 'navLogin' : ''?>">
    <nav class="content nav-content">
        <ul class="nav-card">
            <i class='bx bx-menu' id="iconNavResponsif"></i>
            <li>
                <a class="logo-web" href="index.php?action=">E-KTP</a>
            </li>
            <div id="divNavResponsif">
                <li class="showHideNav">
                    <a href="index.php?action=pengajuan" style="<?= isset($_SESSION['page']) && $_SESSION['page'] == 'Pengajuan' ? 'border-bottom: 5px solid var(--Blue)' : '' ?>">Pengajuan</a>
                </li>
                <li class="showHideNav">
                    <a href="index.php?action=pembuatan" style="<?= isset($_SESSION['page']) && $_SESSION['page'] == 'Pembuatan' ? 'border-bottom: 5px solid var(--Blue)' : '' ?>">Pembuatan</a>
                </li>
                <li class="showHideNav">
                    <a href="index.php?action=hasil" style="<?= isset($_SESSION['page']) && $_SESSION['page'] == 'Hasil' ? 'border-bottom: 5px solid var(--Blue)' : '' ?>">Hasil</a>
                </li>
            </div>
        </ul>
        <ul class="nav-card">
            <li class="onLogout" style="<?= isset($_SESSION['login']) && $_SESSION['login'] == true ? 'display: none;' : 'display: inline-block;' ?>">
                <a class="nav-login" href="index.php?action=login">Login</a>
            </li>
            <li class="onLogout" style="<?= isset($_SESSION['login']) && $_SESSION['login'] == true ? 'display: none;' : 'display: inline-block;' ?>">
                <a class="nav-regis" href="index.php?action=regis">Registrasi</a>
            </li>
            <li class="onLogin" style="<?= isset($_SESSION['login']) && $_SESSION['login'] == true ? 'display: inline-block;' : 'display: none;' ?>">
                <div>
                    <div class="container-drop container-drop2" id="dropDown2">
                        <a id="drop">
                            <span> <i class='bx bxs-user-pin nav-iconUser'></i> <i class='bx bx-chevron-down'
                                    id="iconDown2"></i></span>
                        </a>
                        <ol class="content-drop nav-dropUser">
                            <div>
                                <li style="padding: 10px;">
                                    <p>Username: <b> <?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ?></b></p>
                                </li>
                                <li class="li-dropUser">
                                    <p>Email: <b> <?= isset($_SESSION['username']) ? $_SESSION['email'] : '' ?></b></p>
                                </li>
                                <li>
                                    <a href="index.php?action=dashboard">
                                        <i class='bx bxs-dashboard'></i> Dashboard
                                    </a>
                                </li>
                                <li class="li-dropUserLast">
                                    <a href="index.php?action=logout" id="logout"><i class='bx bx-log-out'></i> Keluar
                                    </a>
                                </li>
                            </div>
                        </ol>
                    </div>
                </div>
            </li>
            <li class="onLogin">
                <div>
                    <div class="container-drop container-drop2" id="dropDown3">
                        <a>
                            <span> <i class='bx bx-bell nav-notif'></i></span>
                        </a>
                        <ol class="content-drop nav-dropUser nav-dropNotif">
                            <div>
                                <li>
                                    <p class="titleNotif">Notifikasi</p>
                                    <div id="divNotif">
                                        <div>
                                            <div>
                                                <h4>Progarm Baru Untuk Anda</h4>
                                                <p>3 menit lalu</p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                                        </div>
                                        <div>
                                            <div>
                                                <h4>Progarm Baru Untuk Anda</h4>
                                                <p>3 menit lalu</p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </ol>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>
<?php if ($a): ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const navBar = document.querySelector('.site-header');
                window.addEventListener('scroll', function() {
                    const scrollTop = window.scrollY;
                    if (scrollTop > 100) {
                        navBar.classList.add('navLoginActif');
                    } else {
                        navBar.classList.remove('navLoginActif');
                    }
                });
            });
        </script>
    <?php endif; ?>