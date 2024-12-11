<?php
include "../../controllers/userController.php";
$userController = new userController();
$rows = $userController->checkUser();

    if (!empty($rows)) {
        echo json_encode($rows);
    } else {
        echo json_encode([]);
    }

?>
