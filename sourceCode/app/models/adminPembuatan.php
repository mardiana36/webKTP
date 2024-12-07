
<?php
class adminPembuatan
{
    private $conn;
    private $table_name = "pembuatan";
    public $id;
    public $pathFoto;
    public $pathTtd;
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readPembuatan() 
    { 
        $query = "SELECT 
                pembuatan.id, 
                pembuatan.pathFoto, 
                pembuatan.pathTtd, 
                pembuatan.status, 
                pengajuan.nik, 
                pengajuan.nama
              FROM pembuatan
              JOIN pengajuan ON pembuatan.id_pengajuan = pengajuan.id
              WHERE pembuatan.status IN ('PB', 'PBC')";
        $stmt = $this->conn->prepare($query); 
        $stmt->execute(); 
        return $stmt; 
    }

    public function showPembuatan($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function updatePembuatan()
    {
        $query = "UPDATE " . $this->table_name . " SET pathFoto=:pathFoto, pathTtd=:pathTtd WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->pathFoto = htmlspecialchars(strip_tags($this->pathFoto));
        $this->pathTtd = htmlspecialchars(strip_tags($this->pathTtd));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":pathFoto", $this->pathFoto);
        $stmt->bindParam(":pathTtd", $this->pathTtd);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function viewPembuatan()
    {
        $query = "UPDATE " . $this->table_name . " SET pathFoto=:pathFoto, pathTtd=:pathTtd, status=:status WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->pathFoto = htmlspecialchars(strip_tags($this->pathFoto));
        $this->pathTtd = htmlspecialchars(strip_tags($this->pathTtd));
        $this->status = "PBC"; 

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":pathFoto", $this->pathFoto);
        $stmt->bindParam(":pathTtd", $this->pathTtd);
        $stmt->bindParam(":status", $this->status);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function approvePembuatan($id){
        $query = "UPDATE " . $this->table_name . " SET status=:status WHERE id=:id";
        $status = "PBA";

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