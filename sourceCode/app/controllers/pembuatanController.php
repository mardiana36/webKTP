<?php
echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/models/pengajuan.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/models/pembuatan.php');
class pembuatanController
{
    private $db;
    private $pembuatan;
    private $pengajuan;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pembuatan = new pembuatan($this->db);
        $this->pengajuan = new pengajuan($this->db);
    }
    public function checkStatusPengajuan($id)
    {
        $data = $this->pengajuan->checkUser($id);
        if (!empty($data)) {
            if ($data['status'] == 'PJA') {
                return $data;
            }
        }
        return false;
    }
    public function checkStatusPembuatan($id)
    {
        $data = $this->pembuatan->checkP($id);
        if (!empty($data)) {
            $_SESSION['idPembuatan'] = $id;
            $_SESSION['pembuatan'] = $data;
            session_write_close();
        } else {
            $_SESSION['idPembuatan'] = null;
            $_SESSION['pembuatan'] = null;
        }
    }
    private function handleFileUploadError($errorCode, $redirectUrl)
    {
        if ($errorCode == 401) {
            echo "<script>alertWarning('Oops!','Pastikan File yang ada upload dengan format .jpg/.jpeg/.png','$redirectUrl');</script>";
        } elseif ($errorCode == 402) {
            echo "<script>alertWarning('Oops!','Maksimal ukuran Foto = 1MB','$redirectUrl');</script>";
        } else {
            echo "<script>alertWarning('Oops!','Terjadi kesalahan, coba ulang!','$redirectUrl');</script>";
        }
    }
    public function pembuatan()
    {
        $id_user = 1;
        $data = $this->checkStatusPengajuan($id_user);
        $id_pengajuan = !empty($data) ? $data['id'] : null ;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_FILES["pathFoto"]) && $_FILES["pathFoto"]["error"] === UPLOAD_ERR_OK) {
                $pathFoto = $this->pembuatan->uploadFile("pathFoto");
                if (isset($_FILES["pathTtd"]) && $_FILES["pathTtd"]["error"] === UPLOAD_ERR_OK) {
                    $pathTtd = $this->pembuatan->uploadFile("pathTtd");
                    if ($pathFoto != 401 && $pathFoto != 402 && $pathTtd != 401 && $pathTtd != 402) {
                        $status = "PB";

                        $this->pembuatan->pathFoto = $pathFoto;
                        $this->pembuatan->pathTtd = $pathTtd;
                        $this->pembuatan->status = $status;
                        $this->pembuatan->id_pengajuan = $id_pengajuan;

                        $newID = $this->pembuatan->create();
                        if ($newID) {
                            $dataPJ = $this->pembuatan->show($newID);
                            $_SESSION['idPembuatan'] = $newID;
                            $_SESSION['pembuatan'] = $dataPJ;
                            session_write_close();
                            echo "<script>window.location.href = 'index.php?action=pembuatan';</script>";
                        } else {
                            echo "<script>alertWarning('Oops!','Something went wrong in Models','index.php?action=pembuatan');</script>";
                        }
                    } else {
                        $this->handleFileUploadError($pathTtd, "index.php?action=pembuatan");
                    }
                } else {
                    $this->handleFileUploadError($pathFoto, "index.php?action=pembuatan");
                }
            } else {
                echo "<script>alertWarning('Oops!','Something went wrong!','index.php?action=pembuatan');</script>";
            }
        } else {
            if (!empty($data)) {
                $this->checkStatusPembuatan($id_pengajuan);
                require "app/views/pembuatan/index.php";
            } else {
                echo "<script>document.addEventListener('DOMContentLoaded', () => {
  alertWarning('Peringatan!', 'Anda Haya bisa mengakses Halaman Pembuatan ketika status Pengajuan (Berhasil Diajukan).', 'index.php?action=pengajuan');
})</script>";
            }
        }
    }
    public function checkStatus($id)
    {
        if (isset($_SESSION['idPembuatan'])) {
            return $this->pembuatan->checkP($id);
        } else {
        }
        return false;
    }
}
