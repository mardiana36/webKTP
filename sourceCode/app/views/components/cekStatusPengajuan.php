<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../../controllers/pengajuanController.php";
$pengajuanController = new pengajuanController();
$idP = $_SESSION['idPengajuan'];
$data = $pengajuanController->checkStatus($idP);

if (isset($data) && isset($data['status'])) {
    echo json_encode(['status' => $data['status']]);
} else {
    echo json_encode(['status' => '']);
}
?>
