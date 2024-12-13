<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../../controllers/pembuatanController.php";
$pembuatanController = new pembuatanController();
$idP = $_SESSION['idPembuatan'];
$data = $pembuatanController->checkStatus($idP);

if (!empty($data) && isset($data['status'])) {
    echo json_encode(['status' => $data['status']]);
} else {
    echo json_encode(['status' => '']);
}
?>
