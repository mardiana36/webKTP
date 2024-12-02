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
            <div class="content">
                <h1>Form Pengajuan KTP</h1>
                <p>Silahkan isi form ini dengan teliti dan pastikan semua data yang diisi sudah benar untuk menghindari
                    kesalahan proses pengajuan.</p>
            </div>
        </Section>
        <Section class="container containerP2">
            <div class="content contentP2">
                
                <div class="contentFormP2">
                    <h1>Input Data Anda</h1>
                    <form action="" class="formP2">
                        <div class="cardFormp2">
                            <div>
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" required>
                            </div>
                            <div>
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" name="nik" required>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="tmpLahir">Tempat Lahir</label>
                                <input type="text" id="tmpLahir" name="tmpLahir" required>
                            </div>
                            <div>
                                <label for="tglLahir">Tempat Lahir</label>
                                <input type="date" id="tglLahir" name="tglLahir" required>
                            </div>
    
                        </div>
                        <div class="cardFormp2">
                            <div class="divAlamat">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat"></textarea>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk">
                                    <option value="0">Perempuan</option>
                                    <option value="1">Laki - Laki</option>
                                </select>
                            </div>
                            <div>
                                <label for="golDarah">Golongan darah</label>
                                <select name="golDarah" id="golDarah">
                                    <option value="1">A</option>
                                    <option value="2">A+</option>
                                    <option value="3">A-</option>
                                    <option value="4">B</option>
                                    <option value="5">B+</option>
                                    <option value="6">B-</option>
                                    <option value="7">AB</option>
                                    <option value="8">AB+</option>
                                    <option value="9">AB-</option>
                                    <option value="10">O</option>
                                    <option value="11">O+</option>
                                    <option value="12">O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="agama">Agama</label>
                                <select name="agama" id="agama">
                                    <option value="A1">Hindu</option>
                                    <option value="A2">Islam</option>
                                    <option value="A3">Kristen Protestan</option>
                                    <option value="A4">Kristen Katolik</option>
                                    <option value="A5">Buddha</option>
                                    <option value="A6">Konghucu</option>
                                </select>
                            </div>
                            <div>
                                <label for="statusPerkawinan">Status Perkawinan</label>
                                <select name="statusPerkawinan" id="statusPerkawinan" required>
                                    <option value="0">Belum Kawin</option>
                                    <option value="1">Sudah Kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" required>
                            </div>
                            <div>
                                <label for="negara">Kewarganegaraan</label>
                                <input type="text" name="negara" id="negara" required>
                            </div>
                        </div>
                        <div class="cardDocx">
                            <h1>Upload Dokumen</h1>
                            <div>
                                <div class="divDocxP2">
                                    <label for="pathKK">Foto KK(Kartu Keluarga)</label>
                                    <input type="file" id="pathKK" name="pathKK" required>
                                </div>
                                <div class="divDocxP2">
                                    <label for="pathKK">Foto Surat Pengantar</label>
                                    <input type="file" id="pathKK" name="pathKK" required>
                                </div>
                            </div>
                            <div class="btnP2">
                                <button  type="submit">Ajukan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </Section>
    </main>
    <?php require("app/views/components/footers.php") ?>
</body>

</html>