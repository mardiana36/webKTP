<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "app/controllers/userController.php";
include "app/controllers/dashboardController.php";
include "app/controllers/berandaController.php";
include "app/controllers/pengajuanController.php";
include "app/controllers/pembuatanController.php";
include "app/controllers/hasilController.php";
include "app/controllers/adminPengajuanController.php";
include "app/controllers/adminPembuatanController.php";
include "app/controllers/adminLaporanController.php";
$berandaController = new berandaController();
$userController = new userController();
$adminPengajuanController = new adminPengajuanController();
$adminPembuatanController = new adminPembuatanController();
$dashboardController = new dashboardController();
$pengajuanController = new pengajuanController();
$pembuatanController = new pembuatanController();
$hasilController = new hasilController();
$adminLaporanController = new adminLaporanController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

$id = isset($_GET['id']) ? $_GET['id'] : '';
if (empty($_SESSION["login"]) && ($action == 'pengajuan' ||  $action == 'pembuatan' ||  $action == 'hasil')) {
    echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
    $action = "index.php?action=login";
    echo "<script>document.addEventListener('DOMContentLoaded', () => {
    alertWarning('Peringatan!', 'Halam ini hanya bisa di akses ketika anda sudah login!', 'index.php?action=login');
  })</script>";
}
if (isset($_SESSION['role']) && $_SESSION['role'] != "1") {
    switch ($action) {
        case "dashboard":
        case "radminPengajuan":
        case "radminPembuatan":
        case "uadminPengajuan":
        case "vadminPengajuan":
        case "vadminPembuatan":
        case "radminLaporan":
        case "aLaporan":
        case "aPembuatan":
        case "aPengajuan":
        case "getDashboardData":
        case "getAdminPengajuan":
        case "getAdminPembuatan":
        case "getAdminLaporan":
            echo `
                <script src="app/views/assets/js/templateAlert.js"></script>
                <script src="app/views/assets/js/alert.js"></script>`;
            echo "<script>document.addEventListener('DOMContentLoaded', () => {
                alertWarning('Peringatan!','Hanya Admin yang bisa akses halama ini!!!','index.php');
              })</script>";
            $action = "";
            break;
    }
}
switch ($action) {
    case "hasil":
        $_SESSION['page'] = "Hasil";
        $hasilController->hasil();
        break;
    case "pembuatan":
        $_SESSION['page'] = "Pembuatan";
        $pembuatanController->pembuatan();
        break;
    case "pengajuan":
        $_SESSION['page'] = "Pengajuan";
        $pengajuanController->pengajuan();
        break;
    case "login":
        $_SESSION['page'] = "Login";
        $userController->login();
        break;
    case "regis":
        $_SESSION['page'] = "Registrasi";
        $userController->regis();
        break;
    case "radminPengajuan":
        $_SESSION['page'] = "Admin Pengajuan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPengajuanController->getAdminPengajuan();
        break;
    case "vadminPengajuan":
        $_SESSION['page'] = "Edit Pengajuan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPengajuanController->view($id);
        require "app/views/components/footers.php";
        break;
    case "radminPembuatan":
        $_SESSION['page'] = "Admin Pembuatan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPembuatanController->getAdminPembuatan();
        break;
    case "radminLaporan":
        $_SESSION['page'] = "Admin Pembuatan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminLaporanController->getAdminLaporan();
        break;
    case "vadminPembuatan":
        $_SESSION['page'] = "View Pembuatan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPembuatanController->view($id);
        require "app/views/components/footers.php";
        break;
    case "uadminPengajuan":
        $_SESSION['page'] = "Edit Pengajuan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPengajuanController->update($id);
        require "app/views/components/footers.php";
        break;
    case "aPengajuan":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPengajuanController->approve($id);
        require "app/views/components/footers.php";
        break;
    case "aPembuatan":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPembuatanController->approve($id);
        require "app/views/components/footers.php";
        break;
    case "aLaporan":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminLaporanController->approve($id);
        require "app/views/components/footers.php";
        break;
    case "dashboard":
        $_SESSION['page'] = "Dashboard";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $dashboardController->getDashboardData();
        break;
    case "getDashboardData":
        $dashboardController->getDashboardData();
        break;
    case "getAdminPengajuan":
        $adminPengajuanController->getAdminPengajuan();
        break;
    case "getAdminPembuatan":
        $adminPembuatanController->getAdminPembuatan();
        break;
    case "getAdminLaporan":
        $adminLaporanController->getAdminLaporan();
        break;
    case "logout":
        $userController->logout();
        break;
    default:
        $_SESSION['page'] = "Beranda";
        $berandaController->beranda();
        break;
}
