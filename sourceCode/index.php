<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "app/controllers/userController.php";
include "app/controllers/tamuController.php";
include "app/controllers/kamarController.php";
include "app/controllers/pembayaranController.php";
include "app/controllers/pemesananController.php";
include "app/controllers/dashboardController.php";
include "app/controllers/berandaController.php";
include "app/controllers/pengajuanController.php";
include "app/controllers/pembuatanController.php";
include "app/controllers/hasilController.php";
include "app/controllers/adminPengajuanController.php";
include "app/controllers/adminPembuatanController.php";
$berandaController = new berandaController();
$userController = new userController();
$tamuController = new tamuController();
$kamarController = new kamarController();
$pembayaranController = new pembayaranController();
$pemesananController = new pemesananController();
$adminPengajuanController = new adminPengajuanController();
$adminPembuatanController = new adminPembuatanController();
$dashboardController = new dashboardController();
$pengajuanController = new pengajuanController();
$pembuatanController = new pembuatanController();
$hasilController = new hasilController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

$id = isset($_GET['id']) ? $_GET['id'] : '';
// if (!isset($_SESSION["login"]) && $action != '') {
//     $action = "index.php";
// }
if (isset($_SESSION['role']) && $_SESSION['role'] != "admin") {
    switch ($action) {
        case "rUser":
        case "uUser":
        case "dUser":
        case "cUser":
        case "cInfokamar":
        case "uInfokamar":
        case "dInfokamar":
            echo "<script>alert('Only Admin Can Access This Page!!!');</script>";
            $action = "dashboard";
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
    case "rTamu":
        $_SESSION['page'] = "Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $tamuController->index();
        require "app/views/components/footers.php";
        break;
    case "rUser":
        $_SESSION['page'] = "User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $userController->index();
        require "app/views/components/footers.php";
        break;
    case "rInfokamar":
        $_SESSION['page'] = "Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $kamarController->index();
        require "app/views/components/footers.php";
        break;
    case "rPembayaran":
        $_SESSION['page'] = "Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pembayaranController->index();
        require "app/views/components/footers.php";
        break;
    case "rPemesanan":
        $_SESSION['page'] = "Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pemesananController->index();
        require "app/views/components/footers.php";
        break;
    case "radminPengajuan":
        $_SESSION['page'] = "Admin Pengajuan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPengajuanController->index();
        require "app/views/components/footers.php";
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
        $adminPembuatanController->index();
        require "app/views/components/footers.php";
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
    case "uadminPembuatan":
        $_SESSION['page'] = "Edit Pembuatan";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $adminPembuatanController->update($id);
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
    case "cTamu":
        $_SESSION['page'] = "Add Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $tamuController->create();
        require "app/views/components/footers.php";
        break;
    case "cUser":
        $_SESSION['page'] = "Add User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $userController->create();
        require "app/views/components/footers.php";
        break;
    case "cInfokamar":
        $_SESSION['page'] = "Add Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $kamarController->create();
        require "app/views/components/footers.php";
        break;
    case "cPembayaran":
        $_SESSION['page'] = "Add Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pembayaranController->create($pemesananController->get());
        require "app/views/components/footers.php";
        break;
    case "cPemesanan":
        $_SESSION['page'] = "Add Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pemesananController->create($tamuController->get(), $kamarController->get());
        require "app/views/components/footers.php";
        break;
    case "uTamu":
        $_SESSION['page'] = "Edit Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $tamuController->update($id);
        require "app/views/components/footers.php";
        break;
    case "uUser":
        $_SESSION['page'] = "Edit User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $userController->update($id);
        require "app/views/components/footers.php";
        break;
    case "uInfokamar":
        $_SESSION['page'] = "Edit Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $kamarController->update($id);
        require "app/views/components/footers.php";
        break;
    case "uPembayaran":
        $_SESSION['page'] = "Edit Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pembayaranController->update($id, $pemesananController->get());
        require "app/views/components/footers.php";
        break;
    case "uPemesanan":
        $_SESSION['page'] = "Edit Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pemesananController->update($id, $tamuController->get(), $kamarController->get());
        require "app/views/components/footers.php";
        break;
    case "dashboard":
        $_SESSION['page'] = "Dashboard";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $dashboardController->getDashboardData();
        require "app/views/components/footers.php";
        break;
    case "dTamu":
        require "app/views/components/headers.php";
        $tamuController->delete($id);
        require "app/views/components/footers.php";
        break;
    case "dUser":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $userController->delete($id);
        require "app/views/components/footers.php";
        break;
    case "dInfokamar":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $kamarController->delete($id);
        require "app/views/components/footers.php";
        break;
    case "dPembayaran":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pembayaranController->delete($id);
        require "app/views/components/footers.php";
        break;
    case "dPemesanan":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $pemesananController->delete($id);
        require "app/views/components/footers.php";
        break;
    case "loginFalse":
        $_SESSION['page'] = "Login";
        require "app/views/components/headers.php";
        echo "<script src='app/views/assets/js/alert.js'></script>";
        $userController->login();
        echo "<script>showSweetAlert('Oops...', 'The email/username or password you entered is incorrect!!!');</script>";
        break;
    case "logout":
        $userController->logout();
        break;
    default:
        $_SESSION['page'] = "Beranda";
        $berandaController->beranda();
        break;
}

// supuningsih