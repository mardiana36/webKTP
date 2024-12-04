<script src="app/views/assets/js/templateAlert.js"></script>
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
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showPembuatan($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id AND ";
        $stmt = $this->conn->prepare($query);
        $status = "PB";
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        return $stmt;
    }

    function uploadFile()
    {
        $namaFile = $_FILES["foto"]["name"];
        $ukuranFile = $_FILES["foto"]["size"];
        $tmpFile = $_FILES["foto"]["tmp_name"];

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            return 401;
        }
        if ($ukuranFile > 1000000) {
            return 402;
        }
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpFile, 'app/views/assets/images/foto/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function updatePembuatan()
    {
        $query = "UPDATE " . $this->table_name . " SET pathFoto=:pathFoto, pathTtd=:pathTtd, status=:status WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->pathFoto = htmlspecialchars(strip_tags($this->pathFoto));
        $this->pathTtd = htmlspecialchars(strip_tags($this->pathTtd));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":pathFoto", $this->pathFoto);
        $stmt->bindParam(":pathTtd", $this->pathTtd);
        $stmt->bindParam(":status", $this->status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function approvePembuatan(){
        $query = "UPDATE " . $this->tableName . " SET status=:status WHERE id=:id";
        $status = "PBA";

        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);
        $stmt =  $this->conn->prepare($query);

        if($stmt->execute()){
        return true;

        }

        return false;
    }

    public function tolakPengajuan(){
        $query = "UPDATE " . $this->tableName . " SET status=:status WHERE id=:id";
        $status = "PJT";

        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);
        $stmt =  $this->conn->prepare($query);

        if($stmt->execute()){
        return true;

        }

        return false;
    }


}
?>