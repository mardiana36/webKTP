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
    <script src="app/views/assets/js/templateAlert.js"></script>
    <script src="app/views/assets/js/alert.js"></script>
    <script src="app/views/assets/js/nav.js"></script>
    <script src="app/views/assets/js/hasil.js"></script>
    <script src="app/views/assets/js/statusPL.js"></script>

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
                            <div id="ktp">
                                <div class="containerKTP">
                                    <div class="titleKTP">
                                        <h3>PROVINSI BALI</h3>
                                        <h3 class="kab">KABUPATEN <?= isset($alamat[3]) ? $alamat[3] : '' ?></h3>
                                    </div>
                                    <div class="contentKTP">
                                        <div class="cardKTP">
                                            <table class="tabelKTP">
                                                <tr>
                                                    <td>
                                                        <h3>NIK</h3>
                                                    </td>
                                                    <td>
                                                        <h3>: <?= $data['nik'] ?></h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Nama</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['nama'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Tempat/Tgl Lahir</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['tmpLahir'] . ", " . date('d-m-Y', strtotime($data['tglLahir'])) ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Jenis Kelamin</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['jk'] == 'P' ? 'perempuan' : ($data['jk'] == 'L' ? 'laki-laki' : '') ?></p>
                                                    </td>
                                                    <td>
                                                        <p>Gol.Darah: <span> <?= $data['golDarah'] ?></span></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Alamat</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= isset($alamat[0]) && isset($alamat[1]) ? $alamat[0] . ' ' . $alamat[1] : '' ?></p>
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
                                                        <p>: <?= isset($alamat[1]) ? $alamat[1] : '' ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="tdAlamat">Kecamatan</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= isset($alamat[2]) ? $alamat[2] : '' ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Agama</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['agama'] == 'A1' ? 'hindu' : ($data['agama'] == 'A2' ? 'islam' : ($data['agama'] == 'A3' ? 'Kristen Protestan' : ($data['agama'] == 'A4' ? 'Kristen Katolik' : ($data['agama'] == 'A5' ? 'Buddha' : ($data['agama'] == 'A6' ? 'konghucu' : ''))))) ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Status Perkawinan</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['statusPerkawinan'] == 'B' ? 'belum kawin' : ($data['statusPerkawinan'] == 'S' ? 'sudah kawin' : '') ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Pekerjaan</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['pekerjaan'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Kewarganegaraan</p>
                                                    </td>
                                                    <td>
                                                        <p>: <?= $data['negara'] ?></p>
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
                                                <img src="app/views/assets/images/pathFoto/<?= $data['pathFoto'] ?>" alt="foto profile KTP">
                                            </div>
                                            <p><?= isset($alamat[3]) ? $alamat[3] : '' ?></p>
                                            <p><?= date('d-m-Y', strtotime($data['tanggal_pembuatan'])) ?></p>
                                            <div class="imgTTD">
                                                <img src="app/views/assets/images/pathTtd/<?= $data['pathTtd'] ?>" alt="tanda tangan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ktpBelakang">
                                    <img src="app/views/assets/images/ktpBelakang.jpg" alt="ktp belakang">
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
                        <form action="index.php?action=hasil" method="post">
                            <label for="keterangan">Form Pelaporan</label>
                            <textarea <?= !empty($dataL) ? 'disabled' : '' ?> name="keterangan" id="keterangan"
                                placeholder="Deskripsikan kesalahan yang terjadiapp/views."><?= !empty($dataL) ? $dataL['keterangan'] : ''  ?></textarea>
                            <div>
                                <?php if (empty($dataL)): ?>
                                    <button class="btnSend">
                                        <i class='bx bxs-send'></i>
                                        <p>KIRIM</p>
                                    </button>
                                <?php endif; ?>
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