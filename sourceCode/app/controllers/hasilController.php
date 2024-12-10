<?php
echo `
<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>`;
require_once 'app/config/db.php';
require_once 'app/models/hasil.php';
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
        $id_user = 1;
        $data = $this->hasil->show($id_user);
        if (!empty($data)) {
            $alamat = explode(',', $data['alamat']);
            require "app/views/hasil/index.php";
        } else {
            echo "<script>document.addEventListener('DOMContentLoaded', () => {
                alertWarning('Peringatan!', 'Anda Haya bisa mengakses Halaman Hasil ketika status Pembuatan (Berhasil DiBuat).', 'index.php?action=pembuatan');
              })</script>";
        }
    }
}
