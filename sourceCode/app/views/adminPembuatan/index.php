<div class="content-body">


    <!-- row -->

    <div class="container-fluid" >
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Validasi Pembuatan KTP</h4>
                        <div class="table-responsive">
                            <table class="table table-hover  zero-configuration">
                                <thead>
                                    <tr class="gradient-1" style="text-wrap: nowrap">
                                        <th>Number</th>
                                        <th>Pas Foto</th>
                                        <th>Tanda Tangan</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data)) :
                                        $no = 0;
                                    ?>
                                        <?php foreach ($data as $ik) : ?>
                                            <tr>
                                                <td><?= ++$no?></td>
                                                <td><img src="app/views/assets/images/pathFoto/<?=$ik['pathFoto'] ?>" width="100" alt=""></td>
                                                <td><img src="app/views/assets/images/pathTtd/<?=$ik['pathTtd'] ?>" width="100" alt=""></td>
                                                <td><?= $ik['nik'] ?></td>
                                                <td><?= $ik['nama'] ?></td>
                                                <td><?= ($ik['status'] == 'PB') ? "Pembuatan" : (($ik['status'] == 'PBC') ? 'Pembuatan <i class="fas fa-check color-muted m-r-5" style="color: #009bf4;"></i>' : ""); ?></td>
                                                <td>
                                                    <span>
                                                        <a href="index.php?action=vadminPembuatan&id=<?=$ik['id']?>" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <button class="button-aksi">
                                                             <i class="fa fa-eye color-muted m-r-5 "></i>
                                                            </button>
                                                        </a>
                                                        <a href="index.php?action=aPembuatan&id=<?=$ik['id']?>" class="sweet-confirm" data-toggle="tooltip"  data-placement="top" title="Approve">
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
                                        <th>Pas Foto</th>
                                        <th>Tanda Tangan</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Status</th>
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

</div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; 2024 Dinas Kependudukan dan Pencatatan Sipil</p>
            </div>
        </div>
  
</div>
<?php
include "app/views/components/scripts.php"
?>

<script src='app/views/assets/js/getDataPembuatan.js'></script>
  
</body>
</html>