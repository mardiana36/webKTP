<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Edit Data Pengajuan KTP</h4>
                                <div class="form-validation">
                                    <form class="" action="index.php?action=uadminPengajuan&id=<?= $id ?>" method="post" >
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama">Nama<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['nama']?>" id="nama" name="nama" placeholder="Input Nama..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nik">NIK<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['nik']?>" id="nik" name="nik" placeholder="Input NIK..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="jk">Jenis Kelamin<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="jk" name="jk" required>
                                                    <option value="" hidden>Pilih...</option>
                                                    <option value="L" <?= $data["jk"]=="L"? "selected": '';?>>Laki-Laki</option>
                                                    <option value="P" <?= $data["jk"]=="P"? "selected": '';?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tmpLahir">Tempat Lahir<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['tmpLahir']?>" id="tmpLahir" name="tmpLahir" placeholder="Tempat Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tglLahir">Tanggal Lahir<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                             <input type="date" class="form-control" id="tglLahir" value="<?=$data['tglLahir']?>" name="tglLahir" placeholder="Tanggal Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                         <label class="col-lg-4 col-form-label" for="alamat">Alamat<span class="text-danger">*</span>
                                         </label>
                                         <div class="col-lg-6">
                                           <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat" style="height: 138px;"><?=$data['alamat']?></textarea>
                                         </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="agama">Agama<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="agama" name="agama" required>
                                                    <option value="" hidden>Pilih...</option>
                                                    <option value="A1" <?= $data["agama"]=="A1"? "selected": '';?>>Hindu</option>
                                                    <option value="A2" <?= $data["agama"]=="A2"? "selected": '';?>>Islam</option>
                                                    <option value="A3" <?= $data["agama"]=="A3"? "selected": '';?>>Kristen Protestan</option>
                                                    <option value="A4" <?= $data["agama"]=="A4"? "selected": '';?>>Kristen Katolik</option>
                                                    <option value="A5" <?= $data["agama"]=="A5"? "selected": '';?>>Budha</option>
                                                    <option value="A6" <?= $data["agama"]=="A6"? "selected": '';?>>Konghucu</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="statusPerkawinan">Status Perkawinan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="statusPerkawinan" name="statusPerkawinan" required>
                                                    <option value="" hidden>Pilih...</option>
                                                    <option value="B"<?= $data["statusPerkawinan"]=="B"? "selected": '';?>>Belum</option>
                                                    <option value="S"<?= $data["statusPerkawinan"]=="S"? "selected": '';?>>Sudah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaan">Pekerjaan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['pekerjaan']?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="negara">Kewarganegaraan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['negara']?>" id="negara" name="negara" placeholder="Kewarganegaraan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="golDarah">Golongan Darah<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['golDarah']?>" id="golDarah" name="golDarah" placeholder="Golongan darah...." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pathKK">Foto KK<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img src="app/views/assets/images/foto/<?=$data['pathKK']?>" width="80" alt="">
                                                <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="pathKK" name="pathKK" placeholder="Foto KK">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pathRekumendasi">Foto Surat Rekomendasi<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img src="app/views/assets/images/foto/<?=$data['pathRekumendasi']?>" width="80" alt="">
                                                <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="pathRekumendasi" name="pathRekumendasi" placeholder="Foto Surat Rekomendasi">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" style="background-color: #009BF4;">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <script src="app/views/assets/js/login.js"></script>