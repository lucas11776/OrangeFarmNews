<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title ?? 'OrangeFarmNews the voice of the people since 2012 (DashBoard)'; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/panel/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/panel/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

  <!-- Quill Text Editor Style and theme -->
  <link href="<?php echo base_url('assets/panel/vendor/quill/quill.core.css'); ?>" rel="stylesheet">

  <!-- Quill Text Editor Style and theme -->
  <link href="<?php echo base_url('assets/panel/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">

</head>

<body <?php echo in_array(strtolower($active), array('register','login','password')) ? 'class="bg-gradient-primary"' : 'id="page-top"'; ?>>

  <?php
  # Hide Navbar If Page (register,login,password)
  if(!in_array(strtolower($active), $this->panel::PAGES_HIDE_NAVBAR)): ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-fw fa-smile"></i>
        </div>
        <div class="sidebar-brand-text mx-1">OrangeFarm<sup class="text-dark">News</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <span class="nav-link">
          <i class="fas fa-fw fa-globe"></i>
          <span><?php echo $active ?? 'panel'; ?></span>
        </span>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Heading -->
      <div class="sidebar-heading">
        Accounts
      </div>
      <!-- Nav Item - My Account -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url($this->auth->administrator(false) ? 'dashboard/my/account' : 'my/account'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>My Account</span></a>
      </li>

      <?php if($this->auth->administrator(false)): ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Accounts</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Accounts By Role:</h6>
              <a class="collapse-item" href="<?php echo base_url('dashboard/accounts?role=0'); ?>">
                <i class="fas fa-exclamation-triangle pr-1 text-primary"></i> Blocked
              </a>
              <a class="collapse-item" href="<?php echo base_url('dashboard/accounts?role=1'); ?>">
                <i class="fas fa-user pr-1 text-primary"></i> User
              </a>
              <a class="collapse-item" href="<?php echo base_url('dashboard/accounts?role=2'); ?>">
                <i class="fas fa-edit pr-1 text-primary"></i> Editor
              </a>
              <a class="collapse-item" href="<?php echo base_url('dashboard/accounts?role=3'); ?>">
                <i class="fas fa-key pr-1 text-primary"></i> Administrator
              </a>
            </div>
          </div>
        </li>
      <?php endif; ?>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php if($this->auth->administrator(false)): ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Manager
        </div>
        <!-- Nav Item - My Account -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('dashboard/accounts');?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Accounts</span>
          </a>
        </li>
        <!-- Nav Item - My Account -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('dashboard/news');?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>News Posts</span>
          </a>
        </li>
        <!-- Nav Item - My Account -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('dashboard/blog');?>">
            <i class="fas fa-fw fa-rss"></i>
            <span>Blog Posts</span>
          </a>
        </li>
         <!-- Divider -->
        <hr class="sidebar-divider">
      <?php endif; ?>

      <?php if($this->auth->editor(false)): ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Manage Content
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Upload</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Upload Content:</h6>
              <a class="collapse-item" href="<?php echo base_url('dashboard/upload/news'); ?>">
                <i class="fas fa-edit pr-1 text-primary"></i> News
              </a>
              <a class="collapse-item" href="<?php echo base_url('dashboard/upload/blog'); ?>">
                <i class="fas fa-rss pr-1 text-primary"></i> Blog
              </a>
            </div>
          </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>My Posts</span>
          </a>
          <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Manage Post:</h6>
              <a class="collapse-item" href="<?php echo base_url('dashboard/my/news'); ?>">
                <i class="fas fa-edit pr-1 text-primary"></i> News
              </a>
              <a class="collapse-item" href="<?php echo base_url('dashboard/my/blog'); ?>">
                <i class="fas fa-rss pr-1 text-primary"></i> Blog
              </a>
            </div>
          </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
      <?php endif; ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <?php if($this->auth->administrator(false)): ?>
            <!-- Topbar Search -->
            <?php echo form_open('dashboard/search', array(
              'method' => 'GET',
              'class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search')) ?>
              <div class="input-group">
                <input type="text"
                      name="term"
                       class="form-control bg-light border-0 small"
                       placeholder="Search..."
                       value="<?php echo $this->input->get('term'); ?>"
                       aria-label="Search"
                       aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          <?php endif; ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <?php if($this->auth->administrator(false)): ?>
              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-envelope fa-fw"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter"><?php echo $summary['message']; ?></span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                  <h6 class="dropdown-header">
                    Unread Messages
                  </h6>
                  <?php for($i = 0; $i < count($unread_messages); $i++): ?>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('dashboard/inbox/' . $unread_messages[$i]['id']); ?>">
                      <div class="<?php echo $unread_messages[$i]['seen'] == 0 ? 'font-weight-bold' : ''; ?>">
                        <div class="text-truncate"><?php echo word_limiter($unread_messages[$i]['message'], 15); ?></div>
                        <div class="small text-gray-500">
                          <?php echo $unread_messages[$i]['name']; ?> <?php echo $unread_messages[$i]['name']; ?> ·
                          <?php echo date('h:ia d F Y'); ?>
                        </div>
                      </div>
                    </a>
                  <?php endfor; ?>
                  <a class="dropdown-item text-center small text-gray-500"
                     href="<?php echo base_url('dashboard/inbox'); ?>">
                    Read More Messages
                  </a>
                </div>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
            <?php endif; ?>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->account->get_account_name($this->auth->account()); ?></span>
                <img class="img-profile rounded-circle"
                     src="<?php echo $this->auth->account('picture'); ?>"
                     alt="<?php echo $this->account->get_account_name($this->auth->account()); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('my/account'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

  <?php
  # End Hide Navbar If Page
  endif; ?>

          <div class="col-12">
            <div class="row align-items-center">
              <div class="col-12">
                <?php if($this->session->flashdata('alert-success')): ?>
                  <!-- Alert Success -->
                  <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <i class="fa fa-check"></i> <?php echo $this->session->flashdata('alert-success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('alert-info')): ?>
                  <!-- Alert Info -->
                  <div class="alert alert-info alert-dismissible fade show mt-5" role="alert">
                    <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('alert-info'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('alert-warning')): ?>
                  <!-- Alert Warning -->
                  <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                    <i class="fa fa-warning"></i> <?php echo $this->session->flashdata('alert-warning'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('alert-danger')): ?>
                  <!-- Alert Danger -->
                  <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                    <i class="fa fa-close"></i>  <?php echo $this->session->flashdata('alert-danger'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
