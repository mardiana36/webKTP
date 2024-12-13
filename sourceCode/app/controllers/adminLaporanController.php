<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
<?php
require_once 'app/config/db.php';
require_once 'app/models/adminLaporan.php';
class adminLaporanController
{
    private $db;
    private $adminLaporan;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->adminLaporan = new adminLaporan($this->db);
    }

    public function getAdminLaporan()
    {
        $stmt = $this->adminLaporan->readLaporan();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/adminLaporan/index.php";
    }

     public function approve($id){
        if ($this->adminLaporan->approveLaporan($id)) {
            echo "<script>window.location.href = 'index.php?action=radminLaporan';</script>"; 
        } else {
            echo "<script>alert('Terjadi kesalahan saat approve pengajuan!');</script>";  
        }
    }


}
