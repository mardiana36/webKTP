<?php
if (isset($_SESSION['pembuatan'])) {
    $dtPem = $_SESSION['pembuatan'];
} else {
    $dtPem = null;
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
    <link rel="stylesheet" href="app/views/assets/css/pembuatan.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.2/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app/views/assets/js/templateAlert.js"></script>
    <script src="app/views/assets/js/alert.js"></script>
    <script src="app/views/assets/js/nav.js"></script>
    <script src="app/views/assets/js/pembuatan.js"></script>
    <script src="app/views/assets/js/statusPB.js"></script>
</head>

<body>
    <?php
    require('app/views/components/navbarUser.php')
    ?>
    <main>
        <Section class="container containerPB1">
            <div class="content">
                <div class="divTitle contentP1">
                    <h1><?= isset($dtPem) ? "Status Pembuatan KTP" : "Form Pembuatan KTP" ?></h1>
                    <div class="statusPengajuan" style="<?= isset($dtPem) ? 'display: flex;' : '' ?>">
                        <div>
                            <p class="ps">Pembuatan Diterima</p>
                            <span>Data Anda sudah masuk dalam sistem.</span>
                        </div>
                        <div>
                            <p class="ps">Proses Verifikasi</p>
                            <span>Dokumen sedang diperiksa oleh petugas Dukcapil.</span>
                        </div>
                        <div>
                            <p class="ps">Berhasil Dibuat</p>
                            <span>Selamat KTP Anda Berhasil di buat, silahkan menuju ke menu Hasil Untuk melihat dan menyimpan KTP anda.</span>
                        </div>
                    </div>
                    <p><?= isset($dtPem) ? "Anda Tidak Bisa lagi melakukan pengeditan terhadap Formulir ini karena data anda sudah berhasil terkirim. Silhakan Pantau status dari Pembuatan data KTP anda." : "Silahkan isi Formulir ini dengan teliti dan pastikan semua data yang diisi sudah benar untuk menghindari kesalahan proses Pembuatan." ?></p>
                </div>
                <div class=" contentPB1">
                    <div class="cardPB11">
                        <form method="post" action="index.php?action=pembuatan" enctype="multipart/form-data" id="formPem" class="formPB1">
                            <div>
                                <label for="file-input">Upload Foto</label>
                                <div id="drop-area" class="<?= !empty($dtPem) ? 'disabled' : '' ?>">
                                    <img id="preview-img" src="<?= !empty($dtPem) ? 'app/views/assets/images/pathFoto/' . $dtPem['pathFoto'] : '' ?>" alt="Preview Foto">
                                    <p>Drag & Drop Foto atau Klik untuk Pilih Foto</p>
                                    <input type="file" name="pathFoto" id="file-input" accept=".jpg, .png, .jpeg" <?= !empty($dtPem) ? 'disabled' : '' ?> required>
                                </div>
                            </div>
                            <div>
                                <label>Tanda Tangan</label>
                                <div class="containerCanvas">
                                    <canvas id="canvas"></canvas>
                                    <?php if (!isset($dtPem)): ?>
                                        <Button type="button" id="clear">
                                            <i class='bx bxs-message-square-x'></i>
                                        </Button>
                                        <p class="labelHapus">Hapus</p>
                                    <?php endif; ?>
                                    <input type="file" id="ttdInput" <?= !empty($dtPem) ? 'disabled' : '' ?> accept=".jpg, .png, .jpeg" name="pathTtd" required>
                                    <Button type="button" id="save">Simpan</Button>
                                    <div style="<?= !empty($dtPem) ? 'display:block' : '' ?>" class="imgPemPB1">
                                        <img  src="<?= !empty($dtPem) ? 'app/views/assets/images/pathTtd/' . $dtPem['pathTtd'] : '' ?>"  alt="">
                                    </div>
                                </div>
                            </div>
                            <?php if (!isset($dtPem)): ?>
                                <Button type="submit" id="btnPemNext" class="btnNext">Selanjutnya</Button>
                            <?php endif; ?>
                            <div class="div3Jari">
                                <div>
                                    <p>Tempelkan tiga jari anda dari jari telunuk untuk validasi pembuatan KTP</p>
                                    <button type="submit" class="btn3Jari" id="btnSubmit">
                                        <img src="app/views/assets/images/Group14.png" alt="">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="cardPB11">
                        <h3>Biodata Anda</h3>
                        <form action="" class="formP2">
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
                                    <textarea placeholder="Contoh: BR.Tukad, Bedulu, Tegallalang, Gianyar" name="alamat" id="alamat" <?=isset($data) ? 'readonly' : '';?>><?= isset($data) ? $data['alamat'] : ''?></textarea>
                                </div>
                            </div>
                            <div class="cardFormp2">
                                <div>
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="jk" id="jk" <?= isset($data) ? 'disabled' : ''; ?>>
                                        <option disabled selected hidden>Pilih</option>
                                        <option <?= isset($data) && $data['jk'] == 'P'  ? 'selected' : ''; ?> value="P">Perempuan</option>
                                        <option <?= isset($data) && $data['jk'] == 'L' ? 'selected' : ''; ?> value="L">Laki - Laki</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="golDarah">Golongan darah</label>
                                    <select name="golDarah" <?= isset($data) ? 'disabled' : ''; ?> id="golDarah">
                                        <option disabled selected hidden>Pilih</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'A' ? 'selected' : ''; ?> value="A">A</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'A+' ? 'selected' : ''; ?> value="A+">A+</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'A-' ? 'selected' : ''; ?> value="A-">A-</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'B' ? 'selected' : ''; ?> value="B">B</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'B+' ? 'selected' : ''; ?> value="B+">B+</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'B-' ? 'selected' : ''; ?> value="B-">B-</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'AB' ? 'selected' : ''; ?> value="AB">AB</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'AB+' ? 'selected' : ''; ?> value="AB+">AB+</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'AB-' ? 'selected' : ''; ?> value="AB-">AB-</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'O' ? 'selected' : ''; ?> value="O">O</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'O+' ? 'selected' : ''; ?> value="O+">O+</option>
                                        <option <?= isset($data) && $data['golDarah'] == 'O-' ? 'selected' : ''; ?> value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="cardFormp2">
                                <div>
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" <?= isset($data) ? 'disabled' : ''; ?>>
                                        <option disabled selected hidden>Pilih</option>
                                        <option value="A1" <?= isset($data) && $data['agama'] == 'A1' ? 'selected' : ''; ?>>Hindu</option>
                                        <option value="A2" <?= isset($data) && $data['agama'] == 'A2' ? 'selected' : ''; ?>>Islam</option>
                                        <option value="A3" <?= isset($data) && $data['agama'] == 'A3' ? 'selected' : ''; ?>>Kristen Protestan</option>
                                        <option value="A4" <?= isset($data) && $data['agama'] == 'A4' ? 'selected' : ''; ?>>Kristen Katolik</option>
                                        <option value="A5" <?= isset($data) && $data['agama'] == 'A5' ? 'selected' : ''; ?>>Buddha</option>
                                        <option value="A6" <?= isset($data) && $data['agama'] == 'A6' ? 'selected' : ''; ?>>Konghucu</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="statusPerkawinan">Status Perkawinan</label>
                                    <select name="statusPerkawinan" id="statusPerkawinan" required <?= isset($data) ? 'disabled' : ''; ?>>
                                        <option disabled selected hidden>Pilih</option>
                                        <option value="B" <?= isset($data) && $data['statusPerkawinan'] == 'B' ? 'selected' : ''; ?>>Belum Kawin</option>
                                        <option value="S" <?= isset($data) && $data['statusPerkawinan'] == 'S' ? 'selected' : ''; ?>>Sudah Kawin</option>
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
                            <div class="cardFormp2">
                                <p>Peringatan: Dokumen Ini hanya bisa dilihat dan tidak bisa di edit.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Section>
    </main>
    <?php require("app/views/components/footersUser.php") ?>
    <script src="app/views/assets/js/submitForm.js"></script>
</body>

</html>