<?php
class hasil{
    private $conn;
    public $tabelName = 'laporan';
    public $keterangan;
    public $status;
    public $id_user;
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

    public function createLaporan(){
        $query = "INSERT INTO " . $this->tabelName . " SET keterangan=:keterangan, status=:status, id_user=:id_user";
        $stmt = $this->conn->prepare($query);

        $this->keterangan = htmlspecialchars(strip_tags($this->keterangan));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));

        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id_user", $this->id_user);
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function showLaporan($id_user){
        $query = "SELECT * FROM ".$this->tabelName." WHERE id_user=:id_user AND status = 'PL'";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
    public function statusL($id){
        $query = "SELECT * FROM ".$this->tabelName." WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
    
}
?>