<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['page'] ?></title>
    <link rel="stylesheet" href="app/views/assets/css/styleUmum.css">
    <link rel="stylesheet" href="app/views/assets/css/beranda.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.2/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app/views/assets/js/nav.js"></script>
    <script src="app/views/assets/js/typing.js"></script>
</head>

<body>
    <?php
    require('app/views/components/navbarUser.php');
    ?>
    <main>
        <section class="container containerB1">
            <img class="img-outside" src="app/views/assets/images/Frame33.png" alt="">
            <div class="containB1">
                <div class="cardImgB1">
                    <img src="app/views/assets/images/userKTP.png" alt="">
                </div>
                <div class="cardImgB12">
                    <h1 id="type"></h1>
                    <p>Kini, tak perlu antre di kantor Dukcapil! Ajukan pembuatan KTP dari rumah dengan layanan online yang praktis dan efisien.</p>
                    <ul class="ulB1">
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            <p>Hemat waktu</p>
                        </li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            <p>Proses transparan</p>
                        </li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            <p>Bisa diakses kapan saja</p>
                        </li>
                    </ul>
                    <a class="btnB1" href="">
                        <span>Ajukan Sekarang</span>
                        <i class='bx bxs-chevrons-right'></i>
                    </a>
                </div>
            </div>
            <img class="img-outside" src="app/views/assets/images/Frame32.png" alt="">
        </section>
        <section class="container containerB2">
            <h1 class="titleCB2">Apa saja yang bisa Anda lakukan ?</h1>
            <div class="content contentB2">
                <div class="cardB2">
                    <img src="app/views/assets/images/img1.jpg" alt="">
                    <h3>Ajukan KTP Baru</h3>
                    <p>Anda dapat mengajukan Pembuatan KTP dimana saja dan kapan saja tanpa ribet.</p>
                </div>
                <div class="cardB2">
                    <img src="app/views/assets/images/img2.jpg" alt="">
                    <h3>Pantau Status Pembuatan & Pengajuan KTP</h3>
                    <p>Anda dapat memantau proses dari KTP yang telah anda ajukan. Anda akan melihat tahapan proses, seperti Pengajuan Diterima,Proses Verifikasi, KTP Siap Dicetak.</p>
                </div>
                <div class="cardB2">
                    <img src="app/views/assets/images/img3.jpg" alt="">
                    <h3>Cetak KTP</h3>
                    <p>Anda dapat mendownload KTP yang telah di ajukan dan dibuat dengan cara menuju ke halaman Hasil.</p>
                </div>
            </div>
        </section>

        <section class="container containerMain4">
            <div class="content contentMain4">
                <div class="cardMain4-1">
                    <h3>Cara Pembuatan KTP Online</h3>
                    <p>Anda Bisa mengikuti langkah langkah di bawah ini untuk melakukan pembuatan KTP secara online</p>
                </div>
                <div class="cardMain4-2">
                    <div>
                        <ul class="containerDropList">
                            <li>
                                <h3 class="btnShowHideDropList">Siapkan foto KK dan Suarat Pengantar<i
                                        class='bx bxs-chevron-down iconDropList'></i></h3>
                                <div class="showHideDropList">
                                    <p>Pertama anda harus memiliki foto KK (Kartu Keluarga) anda dan foto Surat Pengatar dari RT atau RW.</p>
                                </div>
                            </li>
                            <li>
                                <h3 class="btnShowHideDropList">Masuk ke menu pengajuan<i
                                        class='bx bxs-chevron-down iconDropList'></i></h3>
                                <div class="showHideDropList">
                                    <p>Selanjutnya klik menu Pengajuan dan isi formulir yang diminta dengan benar lalu klik Ajukan. Jika sudah mengajukan ada bisa memeriksa status pengajuan KTP anda. Pada status pengajuan Anda akan melihat tahapan proses, seperti:</p>
                                    <ul>
                                        <li>Pengajuan Diterima: Data Anda sudah masuk dalam sistem.</li>
                                        <li>Proses Verifikasi: Dokumen sedang diperiksa oleh petugas Dukcapil.</li>
                                        <li>Berhasil Diajukan: KTP Anda Siap untuk di buat dengan cara menuju ke menu Pembuatan.</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <h3 class="btnShowHideDropList">Masuk ke menu Pembuatan<i
                                        class='bx bxs-chevron-down iconDropList'></i></h3>
                                <div class="showHideDropList">
                                    <p>Pada menu ini anda akan diminta mengupload foto dari ktp, menulis tanda tangan, dan melakukan cap 3 jari. Jika sudah mengisi semua hal yang di minta anda akan melihat satatus dari pembuatan KTP anda, seperti:</p>
                                    <ul>
                                        <li>Pembuatan Diterima: Data Anda sudah masuk dalam sistem.</li>
                                        <li>Proses Verifikasi: Dokumen sedang diperiksa oleh petugas Dukcapil.</li>
                                        <li>Berhasil Dibuat: KTP Anda Siap untuk cetak dengan cara menuju ke menu Hasil.</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <h3 class="btnShowHideDropList">Masuk ke menu Hasil<i
                                        class='bx bxs-chevron-down iconDropList'></i></h3>
                                <div class="showHideDropList">
                                    <p>Pada menu ini ada bisa melihat tampilan KTP dan Anda bisa mendownload KTP anda dengan cara mengklik tombol Download, KTP anda akan didownload dalam format pdf. Jika anda ingin mencetak KTP Anda bisa mencetakanya  di RT/RW Anda.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img class="imgDropList" src="app/views/assets/images/cara1.png" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require("app/views/components/footers.php") ?>
</body>

</html>