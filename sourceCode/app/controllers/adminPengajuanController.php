<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
<?php
require_once 'app/config/db.php';
require_once 'app/models/adminPengajuan.php';

class adminPengajuanController
{
    private $db;
    private $adminPengajuan;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->adminPengajuan = new adminPengajuan($this->db);
    }

    public function index()
    {
        $stmt = $this->adminPengajuan->readPengajuan();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/adminPengajuan/index.php";
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $nik = $_POST['nik'];
            $tmpLahir = $_POST['tmpLahir'];
            $tglLahir = $_POST['tglLahir'];
            $alamat = $_POST['alamat'];
            $agama = $_POST['agama'];
            $statusPerkawinan = $_POST['statusPerkawinan'];
            $pekerjaan = $_POST['pekerjaan'];
            $negara = $_POST['negara'];
            $golDarah = $_POST['golDarah'];
            $pathKK = $_POST['pathKK'];
            $pathRekumendasi = $_POST['pathRekumendasi'];

            $this->adminPengajuan->id = $id;
            $this->adminPengajuan->nama = $nama;
            $this->adminPengajuan->jk = $jk;
            $this->adminPengajuan->nik = $nik;
            $this->adminPengajuan->tmpLahir = $tmpLahir;
            $this->adminPengajuan->tglLahir = $tglLahir;
            $this->adminPengajuan->alamat = $alamat;
            $this->adminPengajuan->agama = $agama;
            $this->adminPengajuan->statusPerkawinan = $statusPerkawinan;
            $this->adminPengajuan->pekerjaan = $pekerjaan;
            $this->adminPengajuan->negara = $negara;
            $this->adminPengajuan->golDarah = $golDarah;
            $this->adminPengajuan->pathKK = $pathKK;
            $this->adminPengajuan->pathRekumendasi = $pathRekumendasi;

            if ($this->adminPengajuan->updatePengajuan()) {
                echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat update!');</script>";
            }
        } else {
            $stmt = $this->adminPengajuan->showPengajuan($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/adminPengajuan/update.php';
            } else {
                echo "User not found.";
            }
        }
    }

    public function view($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $nik = $_POST['nik'];
            $tmpLahir = $_POST['tmpLahir'];
            $tglLahir = $_POST['tglLahir'];
            $alamat = $_POST['alamat'];
            $agama = $_POST['agama'];
            $statusPerkawinan = $_POST['statusPerkawinan'];
            $pekerjaan = $_POST['pekerjaan'];
            $negara = $_POST['negara'];
            $golDarah = $_POST['golDarah'];
            $pathKK = $_POST['pathKK'];
            $pathRekumendasi = $_POST['pathRekumendasi'];

            $this->adminPengajuan->id = $id;
            $this->adminPengajuan->nama = $nama;
            $this->adminPengajuan->jk = $jk;
            $this->adminPengajuan->nik = $nik;
            $this->adminPengajuan->tmpLahir = $tmpLahir;
            $this->adminPengajuan->tglLahir = $tglLahir;
            $this->adminPengajuan->alamat = $alamat;
            $this->adminPengajuan->agama = $agama;
            $this->adminPengajuan->statusPerkawinan = $statusPerkawinan;
            $this->adminPengajuan->pekerjaan = $pekerjaan;
            $this->adminPengajuan->negara = $negara;
            $this->adminPengajuan->golDarah = $golDarah;
            $this->adminPengajuan->pathKK = $pathKK;
            $this->adminPengajuan->pathRekumendasi = $pathRekumendasi;

            if ($this->adminPengajuan->viewPengajuan()) {
                echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat update!');</script>";
            }
        } else {
            $stmt = $this->adminPengajuan->showPengajuan($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/adminPengajuan/view.php';
            } else {
                echo "User not found.";
            }
        }
    }

    public function approve($id){
        if ($this->adminPengajuan->approvePengajuan($id)) {
            echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>"; 
        } else {
            echo "<script>alert('Terjadi kesalahan saat approve pengajuan!');</script>";  
        }
    }

    public function tolak($id){
        if ($this->adminPengajuan->tolakPengajuan($id)) {
            echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>"; 
        } else {
            echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>"; 
        }
    }




}
