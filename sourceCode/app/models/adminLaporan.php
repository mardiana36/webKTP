
<?php
class adminLaporan
{
    private $conn;
    private $table_name = "laporan";
    private $table_akses = "pengajuan";
    public $id;
    public $keterangan;
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readLaporan() 
    { 
          $query = "SELECT pengajuan.nama, laporan.keterangan, laporan.id AS id_laporan, pengajuan.id AS id_pengajuan, pembuatan.id AS id_pembuatan
          FROM user
          JOIN laporan ON user.id = laporan.id_user
          JOIN pengajuan ON user.id = pengajuan.id_user
          JOIN pembuatan ON pengajuan.id = pembuatan.id_pengajuan
          WHERE laporan.status = 'LP';";

        $stmt = $this->conn->prepare($query); 
        $stmt->execute(); 
        return $stmt; 
    }

    public function beriAkses(){
    
    $query = "SELECT pengajuan.nama, laporan.keterangan, pengajuan.id AS id_pengajuan, pembuatan.id AS id_pembuatan FROM user JOIN laporan ON user.id = laporan.id_user JOIN pengajuan ON user.id = pengajuan.id_user JOIN pembuatan ON pengajuan.id = pembuatan.id_pengajuan;";
    $stmt = $this->conn->prepare($query);
    $id = htmlspecialchars(strip_tags($id));
    $stmt->bindParam(1, $id);
    if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function approveLaporan($id){
        $query = "UPDATE " . $this->table_name . " SET status=:status WHERE id=:id";
        $status = "LPA";

        $stmt = $this->conn->prepare($query); 

        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }


} 
?>