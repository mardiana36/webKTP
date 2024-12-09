
<?php
echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/models/pengajuan.php');
class pengajuanController
{
    private $db;
    private $pengajuan;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pengajuan = new pengajuan($this->db);
    }
    public function checkPengajuan($id)
    {
        $data = $this->pengajuan->checkUser($id);
        if (!empty($data)) {
            $_SESSION['idPengajuan'] = $id;
            $_SESSION['pengajuan'] = $data;
            session_write_close();
        } else {
            $_SESSION['idPengajuan'] = null;
            $_SESSION['pengajuan'] = null;
        }
    }

    public function pengajuan()
    {
        $id_user = 1;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_FILES["pathKK"]) && $_FILES["pathKK"]["error"] === UPLOAD_ERR_OK) {
                $pathKK = $this->pengajuan->uploadFile("kk", "pathKK");
                if (isset($_FILES["pathRekumendasi"]) && $_FILES["pathRekumendasi"]["error"] === UPLOAD_ERR_OK) {
                    $pathRekumendasi = $this->pengajuan->uploadFile("ssR", "pathRekumendasi");
                    if ($pathKK != 401 && $pathKK != 402 && $pathRekumendasi != 401 && $pathRekumendasi != 402) {
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
                        $status = "PJ";

                        $this->pengajuan->nama = $nama;
                        $this->pengajuan->jk = $jk;
                        $this->pengajuan->nik = $nik;
                        $this->pengajuan->tmpLahir = $tmpLahir;
                        $this->pengajuan->tglLahir = $tglLahir;
                        $this->pengajuan->alamat = $alamat;
                        $this->pengajuan->agama = $agama;
                        $this->pengajuan->statusPerkawinan = $statusPerkawinan;
                        $this->pengajuan->pekerjaan = $pekerjaan;
                        $this->pengajuan->negara = $negara;
                        $this->pengajuan->golDarah = $golDarah;
                        $this->pengajuan->status = $status;
                        $this->pengajuan->pathKK = $pathKK;
                        $this->pengajuan->pathRekumendasi = $pathRekumendasi;
                        $this->pengajuan->id_user = $id_user;

                        $newID = $this->pengajuan->create();
                        if ($newID) {
                            $data = $this->pengajuan->show($newID);
                            $_SESSION['idPengajuan'] = $newID;
                            $_SESSION['pengajuan'] = $data;
                            session_write_close();
                            echo "<script>window.location.href = 'index.php?action=pengajuan';</script>";
                        } else {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', () => {
                                    alertWarning('Oops!','Terjadi kesalahan, pada saat Create data','index.php?action=pengajuan');
                              });</script>";
                        }
                    } else {
                        $this->handleFileUploadError($pathRekumendasi, "index.php?action=pengajuan");
                    }
                } else {
                    echo "<script>
                    document.addEventListener('DOMContentLoaded', () => {
                            alertWarning('Oops!','Terjadi kesalahan, pada file Surat Pengantar','index.php?action=pengajuan');
                      });</script>";
                }
            } else {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', () => {
                            alertWarning('Oops!','Terjadi kesalahan, pada file KK','index.php?action=pengajuan');
                      });</script>";
            }
        } else {
            $this->checkPengajuan($id_user);
            include "app/views/pengajuan/index.php";
        }
    }
    private function handleFileUploadError($errorCode, $redirectUrl)
    {
        if ($errorCode == 401) {
            echo "<script>document.addEventListener('DOMContentLoaded', () => {
                alertWarning('Oops!','Pastikan File yang ada upload dengan format .jpg/.jpeg/.png','$redirectUrl');
              })</script>";
        } elseif ($errorCode == 402) {
            echo "<script>document.addEventListener('DOMContentLoaded', () => {
                alertWarning('Oops!','Maksimal ukuran Foto = 1MB','$redirectUrl');
              })</script>";
        } else {
            echo "<script>document.addEventListener('DOMContentLoaded', () => {
                alertWarning('Oops!','Terjadi kesalahan, coba ulang!','$redirectUrl');
              })</script>";
        }
    }

    public function checkStatus($id)
    {
        if (isset($_SESSION['idPengajuan'])) {
            return $this->pengajuan->checkUser($id);
        } else {
        }
        return false;
    }
}
