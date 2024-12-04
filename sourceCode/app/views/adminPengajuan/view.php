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
                        <h4 class="card-title">Data Detail Pengajuan</h4>
                        <div class="form-validation">
                            <form class="" action="index.php?action=vadminPengajuan&id=<?= $id ?>" method="post">
                                 <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama">Nama<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['nama']?>" id="nama" name="nama" placeholder="Nama" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="NIK">NIK<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['nik']?>" id="nik" name="nik" placeholder="NIK" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="jk">Jenis Kelamin<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['jk'] == 'L' ? 'Laki-laki' : ($data['jk'] == 'P' ? 'Perempuan' : '')?>" id="jk" name="jk" placeholder="Jenis Kelamin" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tmpLahir">Tempat Lahir<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['tmpLahir']?>" id="tmpLahir" name="tmpLahir" placeholder="Tempat Lahir" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tglLahir">Tanggal Lahir<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                             <input type="date" class="form-control" id="tglLahir" value="<?=$data['tglLahir']?>" name="tglLahir" placeholder="Tanggal Lahir" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                         <label class="col-lg-4 col-form-label" for="alamat">Alamat<span class="text-danger"></span>
                                         </label>
                                         <div class="col-lg-6">
                                           <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat" style="height: 138px;"><?=$data['alamat']?></textarea>
                                         </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="agama">Agama<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?= $data['agama'] == 'HI' ? 'Hindu' : ($data['agama'] == 'IS' ? 'Islam' : ($data['agama'] == 'KH' ? 'Konghucu' : ($data['agama'] == 'KS' ? 'Kristen' : ($data['agama'] == 'BD' ? 'Budha' : '')))) ?>" id="agama" name="agama" placeholder="Agama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="sKawin">Status Kawin<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['statusPerkawinan']?>" id="statusPerkawinan" name="statusPerkawinan" placeholder="Status Kawin">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pekerjaan">Pekerjaan<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['pekerjaan']?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="negara">Kewarganegaraan<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['negara']?>" id="negara" name="negara" placeholder="Kewarganegaraan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="golDarah">Golongan Darah<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['golDarah']?>" id="golDarah" name="golDarah" placeholder="Golongan darah....">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pathKK">Foto KK<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img src="app/views/assets/images/foto/<?=$data['pathKK']?>" width="80" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="pathRekumendasi">Foto Surat Rekomendasi<span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img src="app/views/assets/images/foto/<?=$data['pathRekumendasi']?>" width="80" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary" style="background-color: #009BF4;">Kembali</button>
                                        <a href=""  class="sweet-confirm"  data-toggle="tooltip" data-placement="top" title="Approve">
                                            <button class="btn btn-primary" style="background-color: #009BF4;">Approve</button>
                                        </a>
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