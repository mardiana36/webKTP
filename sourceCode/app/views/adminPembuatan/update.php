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
                        <h4 class="card-title">Edit Data Pembuatan KTP</h4>
                        <div class="form-validation">
                            <form class="" action="index.php?action=uadminPembuatan&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="pasFoto">Pas Foto<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <img src="app/views/assets/images/foto/<?= $data['pathFoto'] ?>" width="80" alt="">
                                        <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="pathFoto" name="pathFoto" placeholder="Pas Foto">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="fotoTT">Tanda Tangan<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <img src="app/views/assets/images/foto/<?= $data['pathTtd'] ?>" width="80" alt="">
                                        <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="pathTtd" name="pathTtd" placeholder="Pas Foto">
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