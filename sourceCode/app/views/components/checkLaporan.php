<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../../controllers/hasilController.php";

$hasilController = new hasilController();
$id = isset($_SESSION['idLaporan']) ? $_SESSION['idLaporan'] : null;

if ($id) {
    $data = $hasilController->checkStatus($id);

    if (is_array($data) && !empty($data) && isset($data['status'])) {
        echo json_encode(['status' => $data['status']]);
    } else {
        echo json_encode(['status' => '']);
    }
} else {
    echo json_encode(['status' => 'ID tidak ditemukan']);
}
exit;
?>
