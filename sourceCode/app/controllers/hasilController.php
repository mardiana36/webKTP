<?php
echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/EPemerintah/sourceCode/app/models/hasil.php');
class hasilController
{
    private $db;
    private $hasil;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->hasil = new hasil($this->db);
    }

    public function hasil()
    {
        $id_user = !empty($_SESSION['idU']) ?  $_SESSION['idU'] : '';
        $data = $this->hasil->show($id_user);
        if (!empty($data)) {
            $alamat = explode(',', $data['alamat']);
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $keterangan = $_POST['keterangan'];
                $status = 'PL';

                $this->hasil->keterangan = $keterangan;
                $this->hasil->status = $status;
                $this->hasil->id_user = $id_user;
                $newID = $this->hasil->createLaporan();
                if ($newID) {
                    $_SESSION['idLaporan'] = $newID;
                    session_write_close();
                    echo "<script>document.addEventListener('DOMContentLoaded', () => {
                        alertSuksessH(
                            'Selamat!',
                            'Laporan anda berhasil di kirim. Mohon tunggu tanggapan dari admin.',
                            'index.php?action=hasil'
                        );
                      })</script>";
                } else {
                    echo "<script>alertWarning('Oops!','Something went wrong in Models','index.php?action=hasil');</script>";
                }
            } else {
                $dataL = $this->hasil->showLaporan($id_user);
                $_SESSION['idLaporan'] = !empty($dataL) ? $dataL['id'] : null;
                require "app/views/hasil/index.php";
            }
        } else {
            echo "<script>document.addEventListener('DOMContentLoaded', () => {
                alertWarning('Peringatan!', 'Anda Haya bisa mengakses Halaman Hasil ketika status Pembuatan (Berhasil DiBuat).', 'index.php?action=pembuatan');
              })</script>";
        }
    }

    public function checkStatus($id){
        if(isset($_SESSION['idLaporan'])){
            return  $this->hasil->statusL($id);
        }
        return false;
    }

}
