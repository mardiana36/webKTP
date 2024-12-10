<?php
class hasil{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function show($id_user){
        $query = "SELECT pj.nama, pj.jk, pj.nik, pj.tmpLahir, pj.tglLahir, pj.alamat, pj.agama, pj.statusPerkawinan, pj.pekerjaan, pj.negara, pj.golDarah, pj.pathKK, pj.pathRekumendasi, pb.pathFoto, pb.pathTtd, pb.tanggal_pembuatan
        FROM pengajuan pj JOIN pembuatan pb ON pj.id = pb.id_pengajuan
        WHERE pj.id_user =:id_user AND pj.status ='PJA' AND pb.status = 'PBA' LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_user", $id_user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>