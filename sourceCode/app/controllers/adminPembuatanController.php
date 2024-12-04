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

    public function index()
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

            $this->adminPembuatan->id = $id;
            $this->adminPembuatan->pathFoto = $pathFoto;
            $this->adminPembuatan->pathTtd = $pathTtd;
            $this->adminPembuatan->status = $status;


            if ($this->adminPembuatan->updatePembuatan()) {
                echo "<script>window.location.href = 'index.php?action=rUser';</script>";
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

    public function approve($id){
        if ($this->adminPembuatan->approvePembuatan($id)) {
            echo "<script>window.location.href = 'index.php?action=rUser';</script>"; 
        } else {
            echo "<script>window.location.href = 'index.php?action=rUser';</script>"; 
        }
    }

    public function tolak($id){
        if ($this->adminPembuatan->tolakPembuatan($id)) {
            echo "<script>window.location.href = 'index.php?action=rUser';</script>"; 
        } else {
            echo "<script>window.location.href = 'index.php?action=rUser';</script>"; 
        }
    }




}
