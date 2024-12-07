<?php
if (isset($_SESSION['pengajuan'])) {
    $data = $_SESSION['pengajuan'];
} else {
    $data = null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $_SESSION['page'] ?>
    </title>
    <link rel="stylesheet" href="app/views/assets/css/styleUmum.css">
    <link rel="stylesheet" href="app/views/assets/css/pengajuan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.2/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app/views/assets/js/nav.js"></script>
</head>

<body>
    <?php
    require('app/views/components/navbarUser.php')
    ?>
    <main>
        <img class="imgOutside" src="app/views/assets/images/Frame34.png" alt="">
        <img class="imgOutside2" src="app/views/assets/images/Frame34.png" alt="">
        <Section class="container containerP1">
            <div class="content contentP1">
                <h1><?= isset($data) ? "Status Pengajuan KTP" : "Form Pengajuan KTP" ?></h1>
                <div class="statusPengajuan" style="<?= isset($data) ? 'display: flex;' : '' ?>">
                    <div>
                        <p class="ps">Pengajuan Diterima</p>
                        <span>Data Anda sudah masuk dalam sistem.</span>
                    </div>
                    <div>
                        <p class="ps">Proses Verifikasi</p>
                        <span>Dokumen sedang diperiksa oleh petugas Dukcapil.</span>
                    </div>
                    <div>
                        <p class="ps">Berhasil Diajukan</p>
                        <span>Selamat KTP Anda Siap untuk di buat dengan cara menuju ke menu Pembuatan.</span>
                    </div>
                </div>
                <p><?= isset($data) ? "Anda Tidak Bisa lagi melakukan pengeditan terhadap Formulir ini karena data anda sudah berhasil terkirim. Silhakan Pantau status dari Pengajuan data KTP anda." : "Silahkan isi Formulir ini dengan teliti dan pastikan semua data yang diisi sudah benar untuk menghindari kesalahan proses pengajuan." ?></p>
            </div>
        </Section>
        <Section class="container containerP2" style="<?= isset($data) ? 'margin-top: -200px; filter:brightness(80%);' : '' ?>">
            <div class="content contentP2">

                <div class="contentFormP2">
                    <h1>Input Data Anda</h1>
                    <form action="index.php?action=pengajuan" method="post" enctype="multipart/form-data" class="formP2">
                        <div class="cardFormp2">
                            <div>
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" value="<?= isset($data) ? $data['nama'] : ''; ?>" <?= isset($data) ? 'readonly' : ''; ?> required placeholder="Nama lengkap anda sesuai KK">
                            </div>
                            <div>
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" name="nik" value="<?= isset($data) ? $data['nik'] : ''; ?>" <?= isset($data) ? 'readonly' : ''; ?> required placeholder="NIK anda yang ada di KK">
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="tmpLahir">Tempat Lahir</label>
                                <input type="text" value="<?= isset($data) ? $data['tmpLahir'] : ''; ?>" <?= isset($data) ? 'readonly' : ''; ?> id="tmpLahir" name="tmpLahir" required placeholder="Tempat Lahir anda">
                            </div>
                            <div>
                                <label for="tglLahir">Tanggal Lahir</label>
                                <input type="date" id="tglLahir" name="tglLahir" required value="<?= isset($data) ? $data['tglLahir'] : ''; ?>" <?= isset($data) ? 'readonly' : ''; ?>>
                            </div>

                        </div>
                        <div class="cardFormp2">
                            <div class="divAlamat">
                                <div class="itemAlamat">
                                    <label for="alamat">Alamat</label>
                                    <i class='bx bx-question-mark'></i>
                                    <p class="helpAlamat">Format alamat harus dipisahkan dengan tanda koma, seperti: Nama Banjar, Nama Desa, Nama Kecamatan, Nama Kabupaten.</p>
                                </div>
                                <textarea name="alamat" id="alamat" <?= isset($data) ? 'readonly' : ''; ?> placeholder="Contoh: BR.Tukad, Bedulu, Tegallalang, Gianyar"> <?= isset($data) ? $data['alamat'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" <?= isset($data) ? 'disabled' : ''; ?>>
                                    <option disabled selected hidden>Pilih</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="P">Perempuan</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="L">Laki - Laki</option>
                                </select>
                            </div>
                            <div>
                                <label for="golDarah">Golongan darah</label>
                                <select name="golDarah" <?= isset($data) ? 'disabled' : ''; ?> id="golDarah">
                                    <option disabled selected hidden>Pilih</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="A">A</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="A+">A+</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="A-">A-</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="B">B</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="B+">B+</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="B-">B-</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="AB">AB</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="AB+">AB+</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="AB-">AB-</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="O">O</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="O+">O+</option>
                                    <option <?= isset($data) ? 'selected' : ''; ?> value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama" <?= isset($data) ? 'disabled' : ''; ?>>
                                    <option disabled selected hidden>Pilih</option>
                                    <option value="A1" <?= isset($data) ? 'selected' : ''; ?>>Hindu</option>
                                    <option value="A2" <?= isset($data) ? 'selected' : ''; ?>>Islam</option>
                                    <option value="A3" <?= isset($data) ? 'selected' : ''; ?>>Kristen Protestan</option>
                                    <option value="A4" <?= isset($data) ? 'selected' : ''; ?>>Kristen Katolik</option>
                                    <option value="A5" <?= isset($data) ? 'selected' : ''; ?>>Buddha</option>
                                    <option value="A6" <?= isset($data) ? 'selected' : ''; ?>>Konghucu</option>
                                </select>
                            </div>
                            <div>
                                <label for="statusPerkawinan">Status Perkawinan</label>
                                <select name="statusPerkawinan" id="statusPerkawinan" required <?= isset($data) ? 'disabled' : ''; ?>>
                                    <option disabled selected hidden>Pilih</option>
                                    <option value="B" <?= isset($data) ? 'selected' : ''; ?>>Belum Kawin</option>
                                    <option value="S" <?= isset($data) ? 'selected' : ''; ?>>Sudah Kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" value="<?= isset($data) ? $data['pekerjaan'] : ''; ?>" <?= isset($data) ? 'readonly' : ''; ?> id="pekerjaan" required placeholder="Masukan Pekerjaan anda saat ini">
                            </div>
                            <div>
                                <label for="negara">Kewarganegaraan</label>
                                <input type="text" name="negara" id="negara" value="<?= isset($data) ? $data['negara'] : ''; ?>" <?= isset($data) ? 'readonly' : ''; ?> required placeholder="masukan kewarganegaraan anda">
                            </div>
                        </div>
                        <div class="cardDocx">
                            <h1>Upload Dokumen</h1>
                            <div>
                                <div class="divDocxP2">
                                    <label for="pathKK">Foto KK(Kartu Keluarga)</label>
                                    <input type="file" id="pathKK" <?= isset($data) ? 'disabled' : ''; ?> name="pathKK" required>
                                    <p><?= isset($data) ? $_SESSION["fileLPengajuan"]['pathKK'] : ''; ?></p>
                                </div>
                                <div class="divDocxP2">
                                    <label for="pathRekumendasi">Foto Surat Pengantar</label>
                                    <input type="file" id="pathRekumendasi" name="pathRekumendasi" required <?= isset($data) ? 'disabled' : ''; ?>>
                                    <p><?= isset($data) ? $_SESSION["fileLPengajuan"]['pathRekumendasi'] : ''; ?></p>
                                </div>
                            </div>
                            <div class="btnP2">
                                <?php if (!isset($data)): ?>
                                    <button type="submit">Ajukan</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </Section>
    </main>
    <?php require("app/views/components/footers.php") ?>
    <script src="app/views/assets/js/status.js"></script>
</body>

</html>