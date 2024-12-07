<?php 
class pengajuan {
    private $conn;
    public $id;
    public $table_name = "pengajuan";
    public $nama;
    public $jk;
    public $nik;
    public $tmpLahir;
    public $tglLahir;
    public $alamat;
    public $agama;
    public $statusPerkawinan;
    public $pekerjaan;
    public $negara;
    public $golDarah;
    public $status;
    public $pathKK;
    public $pathRekumendasi;
    public $id_user;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function show($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function uploadFile($path, $name)
    {
        $namaFile = $_FILES[$name]["name"];
        $ukuranFile = $_FILES[$name]["size"];
        $tmpFile = $_FILES[$name]["tmp_name"];
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            return 401;
        }
        if ($ukuranFile > 1000000) {
            return 402;
        }
        if (!isset($_SESSION["fileLPengajuan"])) {
            $_SESSION["fileLPengajuan"] = [];
        }
        $_SESSION["fileLPengajuan"][$name] = $namaFile;
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpFile, "app/views/assets/images/".$path ."/" . $namaFileBaru);
        return $namaFileBaru;
    }

    public function create()
    {

        $query = "INSERT INTO " . $this->table_name . " SET nama=:nama, jk=:jk, nik=:nik, tmpLahir=:tmpLahir, tglLahir=:tglLahir, alamat=:alamat, agama=:agama, statusPerkawinan=:statusPerkawinan, pekerjaan=:pekerjaan, negara=:negara, golDarah=:golDarah, status=:status, pathKK=:pathKK, pathRekumendasi=:pathRekumendasi, id_user=:id_user";
        $stmt = $this->conn->prepare($query);

        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->jk = htmlspecialchars(strip_tags($this->jk));
        $this->nik = htmlspecialchars(strip_tags($this->nik));
        $this->tmpLahir = htmlspecialchars(strip_tags($this->tmpLahir));
        $this->tglLahir = htmlspecialchars(strip_tags($this->tglLahir));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->agama = htmlspecialchars(strip_tags($this->agama));
        $this->statusPerkawinan = htmlspecialchars(strip_tags($this->statusPerkawinan));
        $this->pekerjaan = htmlspecialchars(strip_tags($this->pekerjaan));
        $this->negara = htmlspecialchars(strip_tags($this->negara));
        $this->golDarah = htmlspecialchars(strip_tags($this->golDarah));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->pathKK = htmlspecialchars(strip_tags($this->pathKK));
        $this->pathRekumendasi = htmlspecialchars(strip_tags($this->pathRekumendasi));
        $this->id_user = 1;

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":jk", $this->jk);
        $stmt->bindParam(":nik", $this->nik);
        $stmt->bindParam(":tmpLahir", $this->tmpLahir);
        $stmt->bindParam(":tglLahir", $this->tglLahir);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":agama", $this->agama);
        $stmt->bindParam(":statusPerkawinan", $this->statusPerkawinan);
        $stmt->bindParam(":pekerjaan", $this->pekerjaan);
        $stmt->bindParam(":negara", $this->negara);
        $stmt->bindParam(":golDarah", $this->golDarah);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":pathKK", $this->pathKK);
        $stmt->bindParam(":pathRekumendasi", $this->pathRekumendasi);
        $stmt->bindParam(":id_user", $this->id_user);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }
}
?>