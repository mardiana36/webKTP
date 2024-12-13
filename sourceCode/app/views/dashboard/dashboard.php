<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <div class="row page-titles mx-0">
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="javascript:void(0)">Home</a>
        </li>
      </ol>
    </div>
  </div>
  <!-- row -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
          <div class="card-body">
            <h3 class="card-title text-white">Pengajuan</h3>
            <div class="d-inline-block">
              <h2 class="text-white" id="totalPengajuan"><?= $totalPengajuan ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-users"><a href="index.html"></a></i></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
          <div class="card-body">
            <h3 class="card-title text-white">Pembuatan</h3>
            <div class="d-inline-block">
              <h2 class="text-white" id="totalPembuatan"><?= $totalPembuatan ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
          <div class="card-body">
            <h3 class="card-title text-white">Laporan</h3>
            <div class="d-inline-block">
              <h2 class="text-white" id="totalLaporan"><?= $totalLaporan ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-flag"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="active-member">
              <div class="table-responsive">
                <table class="table table-xs mb-0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Tanggal Pengajuan/Pembuatan</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($data as $row): ?>
                          <tr>
                              <td><?= $row['nama'] ?></td>
                              <td><?= $row['tanggal'] ?></td>
                              <td>
                                  <?php
                                      if ($row['status'] == 'PJ') {
                                          echo 'Pengajuan';
                                      } elseif ($row['status'] == 'PJC') {
                                          echo 'Pengajuan <i class="fas fa-check color-muted m-r-5" style="color: #009bf4;"></i>';
                                      } elseif ($row['status'] == 'PB') {
                                          echo 'Pembuatan';
                                      } elseif ($row['status'] == 'PBC') {
                                          echo 'Pembuatan <i class="fas fa-check color-muted m-r-5" style="color: #009bf4;"></i>';
                                      }
                                  ?>
                              </td>
                              <td>
                                  <a href="<?php
                                      if (isset($row['status'])) {
                                          if ($row['status'] == 'PJ' || $row['status'] == 'PJC') {
                                              echo "index.php?action=vadminPengajuan&id=" . $row['pengajuan_id']; 
                                          } elseif ($row['status'] == 'PB' || $row['status'] == 'PBC') {
                                              echo "index.php?action=vadminPembuatan&id=" . $row['pembuatan_id'];  
                                          }
                                      }
                                  ?>">
                                      <button class="detail-button">
                                          <i class="fas fa-eye"></i> Detail
                                      </button>
                                  </a>
                            </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>     
    </div>
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
<script src='app/views/assets/js/count.js'></script>
</body>
</html>