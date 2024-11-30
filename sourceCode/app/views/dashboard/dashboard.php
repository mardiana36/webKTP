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
              <h2 class="text-white"><?= $totalGuest ?></h2>
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
              <h2 class="text-white"><?= $totalRoom ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
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
                    <?php
                    if (isset($data)) :
                      $no = 0;
                    ?>
                      <?php foreach ($data as $ds) : ?>
                        <tr>
                          <td><?= $ds['nama'] ?></td>
                          <td><?= $ds['tglCheckin'] ?></td>
                          <td><?= $ds['status'] == 'con' ? 'Confirmed' : ($ds['status'] == 'can' ? 'Cancelled' : ($ds['status'] == 'pen' ? 'Pending' : '')); ?></td>
                          <td>  <button class="detail-button">
                                 <i class="fas fa-eye"></i> Detail
                                </button></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>     
    </div>
  </div>
  <!-- #/ container -->
</div>