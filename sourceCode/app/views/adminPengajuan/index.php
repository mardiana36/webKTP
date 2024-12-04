 <div class="content-body">


     <!-- row -->

     <div class="container-fluid">
         <div class="row">
            </div>
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">Validasi Pengajuan KTP</h4>
                         <div class="table-responsive">
                             <table class="table table-hover  zero-configuration">
                                 <thead>
                                     <tr class="gradient-1" style="text-wrap: nowrap">
                                         <th>Number</th>
                                         <th>Foto KK</th>
                                         <th>Foto Surat Pengantar</th>
                                         <th>Nama</th>
                                         <th>NIK</th>
                                         <th>Status</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        if (isset($data)) :
                                            $no = 0;
                                        ?>
                                         <?php foreach ($data as $u) : ?>
                                             <tr>
                                                 <td><?= ++$no ?></td>
                                                 <td><img src="app/views/assets/images/foto/<?=$u['pathKK'] ?>" width="100" alt=""></td>
                                                 <td><img src="app/views/assets/images/foto/<?=$u['pathRekumendasi'] ?>" width="100" alt=""></td>
                                                 <td><?= $u['nama'] ?></td>
                                                 <td><?= $u['nik'] ?></td>
                                                 <td><?= $u['status'] == 'PJ' ? 'Pengajuan' : ($u['status'] == 'PJC' ? 'Pengajuan Dicek' : '') ?></td>
                                                 <td>
                                                     <span>
                                                        <a href="index.php?action=vadminPengajuan&id=<?= $u['id'] ?>" data-toggle="tooltip" data-placement="top" title="View">
                                                        <button class="button-aksi">
                                                             <i class="fa fa-eye color-muted m-r-5 "></i>
                                                        </button>
                                                        </a>
                                                        <a href="index.php?action=uadminPengajuan&id=<?= $u['id'] ?>"  class=""  data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <button class="button-aksi">
                                                             <i class="fa fa-pencil color-muted m-r-5 "></i>
                                                            </button>
                                                        </a>
                                                         <a href="index.php?action=aPengajuan&id=<?= $u['id'] ?>" data-toggle="tooltip" data-placement="top" title="Approve">
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
                                         <th>Foto KK</th>
                                         <th>Foto Surat Pengantar</th>
                                         <th>Nama</th>
                                         <th>NIK</th>
                                         <th>Aksi</th>
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