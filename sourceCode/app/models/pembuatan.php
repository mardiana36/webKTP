<?php
class pembuatan{
    private $conn;
    public $table_name = "pembuatan";
    public $pathFoto;
    public $pathTtd;
    public $status;
    public $id_pengajuan;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    function uploadFile($path)
    {
        $namaFile = $_FILES[$path]["name"];
        $ukuranFile = $_FILES[$path]["size"];
        $tmpFile = $_FILES[$path]["tmp_name"];
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

        move_uploaded_file($tmpFile, "app/views/assets/images/".$path ."/" . $namaFileBaru);
        return $namaFileBaru;
    }

    public function create()
    {

        $query = "INSERT INTO " . $this->table_name . " SET pathFoto=:pathFoto, pathTtd=:pathTtd, status=:status, id_pengajuan=:id_pengajuan";
        $stmt = $this->conn->prepare($query);

        $this->pathFoto = htmlspecialchars(strip_tags($this->pathFoto));
        $this->pathTtd = htmlspecialchars(strip_tags($this->pathTtd));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id_pengajuan = htmlspecialchars(strip_tags($this->id_pengajuan));

        $stmt->bindParam(":pathFoto", $this->pathFoto);
        $stmt->bindParam(":pathTtd", $this->pathTtd);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id_pengajuan", $this->id_pengajuan);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }
    public function checkP($id_pengajuan){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_pengajuan=:id_pengajuan";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_pengajuan", $id_pengajuan);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function show($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>