<div class="content-body">


    <!-- row -->

    <div class="container-fluid" >
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Laporan</h4>
                        <div class="table-responsive">
                            <table class="table table-hover  zero-configuration">
                                <thead>
                                    <tr class="gradient-1" style="text-wrap: nowrap">
                                        <th>Number</th>
                                        <th>Nama</th>
                                        <th>Laporan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data)) :
                                        $no = 0;
                                    ?>
                                        <?php foreach ($data as $il) : ?>
                                            <tr>
                                                <td><?= ++$no?></td>
                                                <td><?= $il['nama'] ?></td>
                                                <td><?= $il['keterangan'] ?></td>
                                                <td>
                                                    <span>
                                                        <a href="index.php?action=uadminPengajuan&id=<?=$il['id_pengajuan']?>" data-toggle="tooltip" data-placement="top" title="Perbaiki Pengajuan">
                                                            <button class="button-aksi">
                                                             Pengajuan <i class="fa fa-pencil color-muted m-r-5 "></i>
                                                            </button>
                                                        </a>
                                                        <a href="index.php?action=vadminPembuatan&id=<?=$il['id_pembuatan']?>" data-toggle="tooltip" data-placement="top" title="Perbaiki Pembuatan">
                                                            <button class="button-aksi">
                                                             Pembuatan <i class="fa fa-pencil color-muted m-r-5 "></i>
                                                            </button>
                                                        </a>
                                                        <a href="index.php?action=aLaporan&id=<?=$il['id_laporan']?>" class="sweet-confirm" data-toggle="tooltip"  data-placement="top" title="Approve">
                                                            <button class="button-aksi">
                                                             <i class="fa fa-check color-muted m-r-5 "></i>
                                                            </button>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Number</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
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
</div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; 2024 Dinas Kependudukan dan Pencatatan Sipil</p>
            </div>
        </div>
  
</div>
<?php
include "app/views/components/scripts.php"?>

<script src='app/views/assets/js/getDataLaporan.js'></script>
  
</body>
</html>