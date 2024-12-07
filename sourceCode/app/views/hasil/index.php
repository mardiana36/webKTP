<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $_SESSION['page'] ?>
    </title>
    <link rel="stylesheet" href="app/views/assets/css/styleUmum.css">
    <link rel="stylesheet" href="app/views/assets/css/hasil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.2/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="app/views/assets/js/nav.js"></script>
    <script src="app/views/assets/js/hasil.js"></script>
</head>

<body>
<?php
    require('app/views/components/navbarUser.php')
    ?>
    <main>
        <section class="container containerH1">
            <div class="content contentH1">
                <div class="cardH1">
                    <div>
                        <h3>Preview KTP Anda</h3>
                        <div class="containerKTPSc">
                            <div  id="ktp">
                                <div class="containerKTP">
                                    <div class="titleKTP">
                                        <h3>PROVINSI BALI</h3>
                                        <h3 class="kab">KABUPATEN </h3>
                                    </div>
                                    <div class="contentKTP">
                                        <div class="cardKTP">
                                            <table class="tabelKTP">
                                                <tr>
                                                    <td>
                                                        <h3>NIK</h3>
                                                    </td>
                                                    <td>
                                                        <h3>: 510406090705004</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Nama</p>
                                                    </td>
                                                    <td>
                                                        <p>: Sumato atmajo</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Tempat/Tgl Lahir</p>
                                                    </td>
                                                    <td>
                                                        <p>: Sumato atmajo</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Jenis Kelamin</p>
                                                    </td>
                                                    <td>
                                                        <p>: Laki-laki</p>
                                                    </td>
                                                    <td>
                                                        <p>Gol.Darah: <span>o</span></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Alamat</p>
                                                    </td>
                                                    <td>
                                                        <p>: BR taysyatsy Jasan</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="tdAlamat">RT/RW</p>
                                                    </td>
                                                    <td>
                                                        <p>: 000/000</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="tdAlamat">Kel/Desa</p>
                                                    </td>
                                                    <td>
                                                        <p>: Bondowoso</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="tdAlamat">Kecamatan</p>
                                                    </td>
                                                    <td>
                                                        <p>: Bondowoso</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Agama</p>
                                                    </td>
                                                    <td>
                                                        <p>: Bondowoso</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Status Perkawinan</p>
                                                    </td>
                                                    <td>
                                                        <p>: Bondowoso</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Pekerjaan</p>
                                                    </td>
                                                    <td>
                                                        <p>: Bondowoso</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Kewarganegaraan</p>
                                                    </td>
                                                    <td>
                                                        <p>: Bondowoso</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Berlaku Hingga</p>
                                                    </td>
                                                    <td>
                                                        <p>: seumur hidup</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="cardKTP">
                                            <div class="fotoKTP">
                                                <img src="app/views/assets/images/ktp1.png" alt="">
                                            </div>
                                            <p>Bondowoso</p>
                                            <p>23-03-2022</p>
                                            <div class="imgTTD">
                                                <img src="app/views/assets/images/ttd.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ktpBelakang">
                                    <img src="app/views/assets/images/ktpBelakang.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="containerUnduh">
                        <div>
                            <button id="download-btn">
                                <i class='bx bx-down-arrow-alt'></i>
                                SIMPAN</button>
                            <button class="share-btn" id="share-btn">
                                <i class='bx bxs-share-alt'></i>
                                BAGIKAN</button>
                            <div class="alert">
                                <i class='bx bx-error'></i>
                                <p>Segera simpan hasil KTP Anda!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cardH1">
                    <h3>Pemberitahuan</h3>
                    <div class="divDetailAlert">
                        <h3>Tata Cara Menyimpan E-KTP</h3>
                        <ul>
                            <li>
                                <i class='bx bxs-check-square'></i>
                                <p>
                                    Pastikan tampilan E-KTP sudah sesuai
                                </p>
                            </li>
                            <li>
                                <i class='bx bxs-check-square'></i>
                                <p>
                                    Pastikan tampilan E-KTP sudah sesuai
                                </p>
                            </li>
                            <li>
                                <i class='bx bxs-check-square'></i>
                                <p>
                                    Klik tombol SIMPAN untuk dapat menyimpan E-KTP anda
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="divFormAlert">
                        <form action="">
                            <label for="lapor">Form Pelaporan</label>
                            <textarea name="lapor" id="lapor"
                                placeholder="Deskripsikan kesalahan yang terjadiapp/views."></textarea>
                            <div>
                                <button class="btnSend">
                                    <i class='bx bxs-send'></i>
                                    <p>KIRIM</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require("app/views/components/footers.php") ?>
</body>

</html>