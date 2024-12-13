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
                        <h4 class="card-title">View Data Pembuatan KTP</h4>
                        <div class="form-validation">
                            <form class="" action="index.php?action=vadminPembuatan&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="pasFoto">Pas Foto<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <img src="app/views/assets/images/foto/<?= $data['pathFoto'] ?>" width="160" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="fotoTT">Tanda Tangan<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <img src="app/views/assets/images/foto/<?= $data['pathTtd'] ?>" width="160" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary" style="background-color: #009BF4;">Kembali</button>
                                    <a href="index.php?action=aPembuatan&id=<?= $data['id'] ?>"  class="sweet-confirm"  data-toggle="tooltip" data-placement="top" title="Approve">
                                        <button class="btn btn-primary" style="background-color: #009BF4;">Approve</button>
                                    </a>
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