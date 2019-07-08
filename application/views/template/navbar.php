<!DOCTYPE html>
<html lang="en-za">

<head>
    <meta charset="UTF-8">
    <meta name="description"
          content="<?php echo $description ?? 'OrangeFarmNews local newspaper for the community of OrangeFarm offering free newspaper on a weekly basis.\nOrangeFarmNews the voice of the people since 2012.'; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Application Base Url -->
    <base href="<?php echo base_url(); ?>">

    <!-- Title -->
    <title><?php echo $title ?? 'OrangeFarmNews the voice of the people since 2012.'; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url("assets/default/style.css"); ?>">

</head>

<body>

  <!-- ##### Header Area Start ##### -->
  <header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Logo -->
              <div class="logo">
                 <a href="index.html"><img src="<?php echo base_url('assets/default/img/core-img/orangefarm.png'); ?>" alt=""></a>
              </div>
              <!-- Login Search Area -->
              <div class="login-search-area d-flex align-items-center">
                <!-- Login -->
                <div class="login d-flex">
                  <?php if($this->auth->user(false) === false): ?>
                    <a href="<?php echo base_url('login/'); ?>"><i class="fa fa-user-o"></i> Login</a>
                    <a href="<?php echo base_url('register/'); ?>"><i class="fa fa-edit"></i> Register</a>
                  <?php else: ?>
                    <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-edit"></i> Logout</a>
                  <?php endif; ?>
                </div>
                <!-- Search Form -->
                <div class="search-form">
                  <?php echo form_open('search', array('method' => 'GET')); ?>
                    <input type="text" name="term" class="form-control" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar Area -->
    <div class="newspaper-main-menu" id="stickyMenu">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">

            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="newspaperNav">

              <!-- Logo -->
              <div class="logo">
                <a href="index.html"><span class="white">OrangeFarm</span><span class="black">News</span></a>
              </div>

              <!-- Navbar Toggler -->
              <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
              </div>

              <!-- Menu -->
              <div class="classy-menu">

                <!-- close btn -->
                <div class="classycloseIcon">
                  <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>

                <!-- Nav Start -->
                <div class="classynav">
                  <ul>
                    <li class="<?php echo $active == 'home' || $active == '' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="<?php echo $active == 'news'; ?>"><a href="#">News</a></li>
                    <li class="<?php echo $active == 'blog'; ?>"><a href="#">Blog</a></li>
                    <li class="<?php echo $active == 'category'; ?>"><a href="#">Category</a>
                      <ul class="dropdown">
                        <li><a href="#"><i class="fa fa-newspaper-o color"></i> News</a>
                          <ul class="dropdown">
                            <?php foreach ($this->news::CATEGORY as $value): ?>
                              <li><a href="<?php echo base_url('news/category/'.$value); ?>"><?php echo $value; ?></a></li>
                            <?php endforeach; ?>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li>
                    <!-- Show Category to user and show dashboard and shortcut linlks to dashboard to ++editor -->
                    <?php if($this->auth->editor(false) === false): ?>
                      <?php for($i = 0; $i < 5; $i++): ?>
                        <li class="<?php echo $active == 'news'; ?>">
                          <a href="<?php echo base_url('news/category/'.$this->news::CATEGORY[$i]); ?>"><?php echo $this->news::CATEGORY[$i]; ?></a>
                        </li>
                      <?php endfor; ?>
                    <?php else: ?>
                      <li class="<?php echo $active == 'upload'; ?>"><a href="#"><i class="fa fa-cloud-upload"></i> Upload</a>
                        <ul class="dropdown">
                          <li><a href="<?php echo base_url('dashboard/upload/news'); ?>"><i class="fa fa-newspaper-o color"></i> News</a></li>
                        </ul>
                      </li>
                      <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <?php endif; ?>

                    <li><a href="<?php echo base_url('contact'); ?>"><i class="fa fa-phone"></i> Contact</a></li>
                  </ul>
                </div>
                <!-- Nav End -->
              </div>
            </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ##### Header Area End ##### -->
