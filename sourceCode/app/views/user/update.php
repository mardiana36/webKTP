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
                                    <form class="" action="index.php?action=uUser&id=<?= $id ?>" method="post" >
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['username']?>" id="username" name="username" placeholder="Input Username..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">NIK<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="" id="username" name="username" placeholder="Input Username..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="jk">Jenis Kelamin<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="jk" name="jk" required>
                                                    <option value="" hidden>Pilih...</option>
                                                    <option value="admin">Laki-Laki</option>
                                                    <option value="staff">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tmpLahir">Tempat Lahir<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="" id="tmpLahir" name="tmpLahir" placeholder="Tempat Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tglLahir">Tanggal Lahir<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                             <input type="date" class="form-control" id="tglLahir" value="" name="tglLahir" placeholder="Tanggal Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                         <label class="col-lg-4 col-form-label" for="alamat">Alamat<span class="text-danger">*</span>
                                         </label>
                                         <div class="col-lg-6">
                                           <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat" style="height: 138px;"></textarea>
                                         </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="agama">Agama<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="agama" name="agama" required>
                                                    <option value="" hidden>Pilih...</option>
                                                    <option value="admin">Hindu</option>
                                                    <option value="staff">Islam</option>
                                                    <option value="admin">Budha</option>
                                                    <option value="staff">Protestan</option>
                                                    <option value="admin">Katolik</option>
                                                    <option value="staff">Konghucu</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="sKawin">Status Perkawinan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="sKawin" name="sKawin" required>
                                                    <option value="" hidden>Pilih...</option>
                                                    <option value="1">Belum</option>
                                                    <option value="2">Sudah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaan">Pekerjaan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="negara">Kewarganegaraan<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="" id="negara" name="negara" placeholder="Kewarganegaraan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="negara">Golongan Darah<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="" id="golDarah" name="golDarah" placeholder="Golongan darah...." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="fotoKK">Foto KK<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img src="app/views/assets/images/foto/" width="80" alt="">
                                                <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="fotoKK" name="fotoKK" placeholder="Foto KK">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="fotoSurat">Foto Surat Rekomendasi<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img src="app/views/assets/images/foto/" width="80" alt="">
                                                <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="fotoSurat" name="fotoSurat" placeholder="Foto Surat Rekomendasi">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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