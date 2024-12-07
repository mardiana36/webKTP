<?php
require_once 'app/config/db.php';
require_once 'app/models/adminPembuatan.php';
require_once 'app/models/adminPengajuan.php';

class dashboardController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

        public function getDashboardData() {
        $query = "SELECT
        p.id AS pengajuan_id,  
        pb.id AS pembuatan_id, 
        p.nama,
        COALESCE(pb.tanggal_pembuatan, p.tanggal_pengajuan) AS tanggal,
        CASE
            WHEN p.status = 'PJA' AND (pb.status = 'PB' OR pb.status = 'PBC') THEN pb.status
            WHEN p.status = 'PJA' AND pb.status = 'PBA' THEN NULL
            ELSE COALESCE(p.status, pb.status)
        END AS status
        FROM
        pengajuan p
        LEFT JOIN
        pembuatan pb ON p.id = pb.id_pengajuan
        WHERE
        p.status IN ('PJ', 'PJC') OR pb.status IN ('PB', 'PBC');";

        
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $queryPengajuan = "SELECT COUNT(*) AS total_pengajuan FROM pengajuan WHERE status='PJ' OR status='PJC'";
        $stmtPengajuan = $this->db->prepare($queryPengajuan);
        $stmtPengajuan->execute();
        $totalPengajuan = $stmtPengajuan->fetch(PDO::FETCH_ASSOC)['total_pengajuan'];

        $queryPembuatan = "SELECT COUNT(*) AS total_pembuatan FROM pembuatan WHERE status='PB' OR status='PBC'";
        $stmtPembuatan = $this->db->prepare($queryPembuatan);
        $stmtPembuatan->execute();
        $totalPembuatan = $stmtPembuatan->fetch(PDO::FETCH_ASSOC)['total_pembuatan'];

        setlocale(LC_TIME, 'id_ID');
        $tanggal_hari_ini = date('d F Y');

        require "app/views/dashboard/dashboard.php";
    }
}
