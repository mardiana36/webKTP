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
            <h3 class="card-title text-white">Guest</h3>
            <div class="d-inline-block">
              <h2 class="text-white"><?= $totalGuest ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-users"><a href="index.html"></a></i></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
          <div class="card-body">
            <h3 class="card-title text-white">Room</h3>
            <div class="d-inline-block">
              <h2 class="text-white"><?= $totalRoom ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-building"></i></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
          <div class="card-body">
            <h3 class="card-title text-white">Profit</h3>
            <div class="d-inline-block">
              <h2 class="text-white"><?= $totalProfit ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fas fa-money-bill-wave"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
          <div class="card-body">
            <h3 class="card-title text-white">Booking</h3>
            <div class="d-inline-block">
              <h2 class="text-white"><?= $totalBooking ?></h2>
              <p class="text-white mb-0"><?= $tanggal_hari_ini  ?></p>
            </div>
            <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="active-member">
              <div class="table-responsive">
                <table class="table table-xs mb-0">
                  <thead>
                    <tr>
                      <th>Guest</th>
                      <th>Reservation Number</th>
                      <th>Checkin</th>
                      <th>Checkout</th>
                      <th>Status Reservation</th>
                      <th>Payment</th>
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
                          <td><?= $ds['kodeReservasi'] ?></td>
                          <td><?= $ds['tglCheckin'] ?></td>
                          <td><?= $ds['tglCheckout'] ?></td>
                          <td><?= $ds['status'] == 'con' ? 'Confirmed' : ($ds['status'] == 'can' ? 'Cancelled' : ($ds['status'] == 'pen' ? 'Pending' : '')); ?></td>
                          <td><?= $ds['pembayaran_status'] == 'PA' ? 'Payed' : ($ds['pembayaran_status'] == 'PE' ? 'Pending' : ($ds['pembayaran_status'] == 'FA' ? 'Failed' : '')); ?></td>
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
      <div class="col-lg-4">

        <body class="dark" id="calendar-body">
          <div class="calendar">
            <!-- CALENDAR HEADER START -->
            <div class="calendar-header">
              <span class="month-picker" id="month-picker">
                February
              </span>
              <div class="year-picker">
                <span class="year-change mt-3" id="prev-year">
                  <pre> < </pre>
                </span>
                <span id="year">2023</span>
                <span class="year-change mt-3" id="next-year">
                  <pre> > </pre>
                </span>
              </div>


            </div>

            <!-- CALENDAR BODY START -->
            <div class="calendar-body">
              <div class="calendar-week-day">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
              </div>
              <div class="calendar-day">
                <div>
                  1
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
              </div>
            </div>

            <!-- CALENDAR FOOTER START -->
            <div class="calendar-footer">
              <div class="toggle">
                <span>Dark Mode</span>
                <div class="dark-mode-switch">
                  <div class="dark-mode-switch-ident"></div>
                </div>
              </div>
            </div>

            <div class="month-list"></div>
          </div>

      </div>
    </div>
  </div>
  <!-- #/ container -->
</div>