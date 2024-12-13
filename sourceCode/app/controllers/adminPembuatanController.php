<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
<?php
require_once 'app/config/db.php';
require_once 'app/models/adminPembuatan.php';
class adminPembuatanController
{
    private $db;
    private $adminPembuatan;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->adminPembuatan = new adminPembuatan($this->db);
    }

    public function getAdminPembuatan()
    {
        $stmt = $this->adminPembuatan->readPembuatan();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/adminPembuatan/index.php";
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pathFoto = $_POST['pathFoto'];
            $pathTtd = $_POST['pathTtd'];
            $status = $_POST['status'];

            $stmt = $this->adminPembuatan->showPembuatan($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            $pathFoto = $this->processFileUpload('pathFoto', $data['pathFoto']); 
            if ($pathKK === false) {
            echo "<script>alert('Terjadi kesalahan saat upload foto KK!');</script>";
            return; 
            }

             $pathTtd = $this->processFileUpload('pathTtd', $data['pathTtd']);
             if ($pathRekumendasi === false) {
            echo "<script>alert('Terjadi kesalahan saat upload foto Rekomendasi!');</script>";
            return;
            }

            $this->adminPembuatan->id = $id;
            $this->adminPembuatan->pathFoto = $pathFoto;
            $this->adminPembuatan->pathTtd = $pathTtd;
            $this->adminPembuatan->status = $status;

            if ($this->adminPembuatan->updatePembuatan()) {
                echo "<script>window.location.href = 'index.php?action=radminPembuatan';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat update!');</script>";
            }
        } else {
            $stmt = $this->adminPembuatan->showPembuatan($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/adminPembuatan/update.php';
            } else {
                echo "User not found.";
            }


        }
    }

    public function view($id){
        $stmt = $this->adminPembuatan->showPembuatan($id);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                echo "<script>window.location.href = 'index.php?action=radminPembuatan';</script>";
                exit();
            } else { 
                include 'app/views/adminPembuatan/view.php'; 
            }
        } else {
            echo "Data not found."; 
        }
    }

    public function approve($id){
        if ($this->adminPembuatan->approvePembuatan($id)) {
            echo "<script>window.location.href = 'index.php?action=radminPembuatan';</script>"; 
        } else {
            echo "<script>alert('Terjadi kesalahan saat approve pengajuan!');</script>";  
        }
    }




}
