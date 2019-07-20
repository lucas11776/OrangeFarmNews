<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">
    <i class="fas fa-search text-primary"></i> Search Result Summary
  </h1>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?php echo base_url('dashboard/accounts') ?>" style="text-decoration: none;">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Accounts</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $summary['accounts'] ?? 0; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?php echo base_url('dashboard/news') ?>" style="text-decoration: none;">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">News (Posts)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $summary['news'] ?? 0; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-newspaper fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
    <a href="<?php echo base_url('dashboard/news') ?>" style="text-decoration: none;">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Blog (Posts)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $summary['blog'] ?? 0; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-rss fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
<!-- Content Row -->
