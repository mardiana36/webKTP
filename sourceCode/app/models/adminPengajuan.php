<?php
class adminPengajuan
{
    private $conn;
    public $id;
    public $tableName = "pengajuan";
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

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readPengajuan()
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE status='PJ' OR status='PJC'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showPengajuan($id)
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
    

    public function updatePengajuan()
    {
        $query = "UPDATE " . $this->tableName . " SET nama=:nama, jk=:jk, nik=:nik, tmpLahir=:tmpLahir, tglLahir=:tglLahir, alamat=:alamat, agama=:agama, statusPerkawinan=:statusPerkawinan, pekerjaan=:pekerjaan, negara=:negara, golDarah=:golDarah, pathKK=:pathKK, pathRekumendasi=:pathRekumendasi WHERE id=:id";
        $stmt =  $this->conn->prepare($query);
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
        $this->pathKK = htmlspecialchars(strip_tags($this->pathKK));
        $this->pathRekumendasi = htmlspecialchars(strip_tags($this->pathRekumendasi));


        $stmt->bindParam(":id", $this->id);
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
        $stmt->bindParam(":pathKK", $this->pathKK);
        $stmt->bindParam(":pathRekumendasi", $this->pathRekumendasi);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

     public function viewPengajuan()
     {
        $query = "UPDATE " . $this->tableName . " SET nama=:nama, jk=:jk, nik=:nik, tmpLahir=:tmpLahir, tglLahir=:tglLahir, alamat=:alamat, agama=:agama, statusPerkawinan=:statusPerkawinan, pekerjaan=:pekerjaan, negara=:negara, golDarah=:golDarah, pathKK=:pathKK, pathRekumendasi=:pathRekumendasi, status=:status WHERE id=:id";
        $stmt =  $this->conn->prepare($query);
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
        $this->pathKK = htmlspecialchars(strip_tags($this->pathKK));
        $this->status = "PJC"; 
        $this->pathRekumendasi = htmlspecialchars(strip_tags($this->pathRekumendasi));


        $stmt->bindParam(":id", $this->id);
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
        $stmt->bindParam(":pathKK", $this->pathKK);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":pathRekumendasi", $this->pathRekumendasi);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function approvePengajuan($id){
    $query = "UPDATE " . $this->tableName . " SET status=:status WHERE id=:id";
    $status = "PB";

    $stmt = $this->conn->prepare($query); 

    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":id", $id);

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
