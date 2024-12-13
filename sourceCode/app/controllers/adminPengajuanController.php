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

    public function getAdminPengajuan()
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

        $stmt = $this->adminPengajuan->showUpdate($id);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $pathKK = $this->processFileUpload('pathKK', $data['pathKK']); 
        if ($pathKK === false) {
            echo "<script>alert('Terjadi kesalahan saat upload foto KK!');</script>";
            return; 
        }

        $pathRekumendasi = $this->processFileUpload('pathRekumendasi', $data['pathRekumendasi']);
        if ($pathRekumendasi === false) {
            echo "<script>alert('Terjadi kesalahan saat upload foto Rekomendasi!');</script>";
            return;
        }

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
            $stmt = $this->adminPengajuan->showUpdate($id);
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
        $stmt = $this->adminPengajuan->showPengajuan($id);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>";
                exit();
            } else { 
                include 'app/views/adminPengajuan/view.php'; 
            }
        } else {
            echo "Data not found."; 
        }
    }

        private function processFileUpload($fieldName, $oldFilePath) {
        if ($_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            if ($fieldName == 'pathKK') {
                $target_dir = "app/views/assets/images/kk/";
            } elseif ($fieldName == 'pathRekumendasi') {
                $target_dir = "app/views/assets/images/ssR/";
            }
            $target_file = $target_dir . basename($_FILES[$fieldName]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "<script>alert('Tipe file $fieldName tidak valid!');</script>";
                return false;
            } elseif ($_FILES[$fieldName]["size"] > 2000000) {
                echo "<script>alert('Ukuran file $fieldName terlalu besar!');</script>";
                return false;
            } else {
                if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) {
                    return basename($_FILES[$fieldName]["name"]); 
                } else {
                    return false; 
                }
            }
        } else {
            return $oldFilePath; 
        }
    }

    public function approve($id){
        if ($this->adminPengajuan->approvePengajuan($id)) {
            echo "<script>window.location.href = 'index.php?action=radminPengajuan';</script>"; 
        } else {
            echo "<script>alert('Terjadi kesalahan saat approve pengajuan!');</script>";  
        }
    }

}
