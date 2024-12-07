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
    <script src="app/views/assets/js/nav.js"></script>
    <script src="app/views/assets/js/pembuatan.js"></script>
</head>

<body>
    <?php
    require('app/views/components/navbarUser.php')
    ?>
    <main>
        <Section class="container containerPB1">
           <div class="content">
           <div class="divTitle">
                    <h1>Form Pembuatan KTP</h1>
                    <p>Silahkan isi form ini dengan teliti dan pastikan semua data yang diisi sudah benar untuk menghindari
                        kesalahan proses Pembuatan.</p>
                </div>
           <div class=" contentPB1">
                <div class="cardPB11">
                    <form action="" class="formPB1">
                        <div>
                            <label for="file-input">Upload Foto</label>
                            <div id="drop-area">
                                <img id="preview-img" src="" alt="Preview Foto">
                                <p>Drag & Drop Foto atau Klik untuk Pilih Foto</p>
                                <input type="file" id="file-input" accept=".jpg, .png, .jpeg" required>
                            </div>
                        </div>
                        <div>
                            <label>Tanda Tangan</label>
                            <div class="containerCanvas">
                                <canvas id="canvas"></canvas>
                                <Button type="button" id="clear">
                                    <i class='bx bxs-message-square-x'></i>
                                </Button>
                                <p class="labelHapus">Hapus</p>
                                <input type="file" id="ttdInput" accept=".jpg, .png, .jpeg" required>
                                <Button type="button" id="save">Simpan</Button>
                            </div>
                        </div>
                        <Button type="submit" class="btnNext">Selanjutnya</Button>
                        <div class="div3Jari">
                            <div>
                                <p>Tempelkan tiga jari anda dari jari telunuk untuk validasi pembuatan KTP</p>
                                <button class="btn3Jari">
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
                                <input type="text" id="nama" name="nama" readonly>
                            </div>
                            <div>
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" name="nik" readonly>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="tmpLahir">Tempat Lahir</label>
                                <input type="text" id="tmpLahir" name="tmpLahir" readonly>
                            </div>
                            <div>
                                <label for="tglLahir">Tempat Lahir</label>
                                <input type="date" id="tglLahir" name="tglLahir" readonly>
                            </div>

                        </div>
                        <div class="cardFormp2">
                            <div class="divAlamat">
                                <label for="alamat">Alamat</label>
                                <textarea readonly name="alamat" id="alamat"></textarea>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="jk">Jenis Kelamin</label>
                                <select disabled name="jk" id="jk">
                                    <option value="0">Perempuan</option>
                                    <option value="1">Laki - Laki</option>
                                </select>
                            </div>
                            <div>
                                <label for="golDarah">Golongan darah</label>
                                <select disabled name="golDarah" id="golDarah">
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
                                <select disabled name="agama" id="agama">
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
                                <select disabled name="statusPerkawinan" id="statusPerkawinan" readonly>
                                    <option value="0">Belum Kawin</option>
                                    <option value="1">Sudah Kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="cardFormp2">
                            <div>
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" readonly>
                            </div>
                            <div>
                                <label for="negara">Kewarganegaraan</label>
                                <input type="text" name="negara" id="negara" readonly>
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
    <?php require("app/views/components/footers.php") ?>
</body>

</html>