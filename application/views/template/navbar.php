<!DOCTYPE html>
<html lang="en-za">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $description; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Application Base Url -->
    <base href="<?php echo base_url(); ?>">

    <!-- Title -->
    <title><?php echo $title ?? 'OrangeFarmNews the voice of the people since 2012.'; ?></title>

    <!-- Twitter API -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="<?php echo $website ?? 'http://www.orangefarmnews.co.za'; ?>">
    <meta name="twitter:creator" content="<?php echo $author ?? 'OrangeFarmNews'; ?>">
    <meta name="twitter:title" content="<?php echo $title ?? 'OrangeFarmNews the voice of the people since 2012.'; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <meta name="twitter:image" content="">

    <!-- Facebook API (OpenGraph) -->
    <meta property="og:url" content="">
    <meta property="og:title" content="<?php echo $title ?? 'OrangeFarmNews the voice of the people since 2012.'; ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:type" content="">
    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:image:type" content="">
    <meta property="og:image:width" content="">
    <meta property="og:image:height" content="">

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

                    <li><a href="<?php echo base_url('contect'); ?>"><i class="fa fa-phone"></i> Contect</a></li>
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

  <!--- ##### Global Alerts ##### -->
  <div class="hero-area p-0">
    <div class="container">
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
  </div>
  <!-- ##### Global Alerts End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <?php if(($navbar_adv ?? null) === true || is_null($navbar_adv ?? null)): ?>
    <div class="hero-area p-0">
      <div class="container pt-5 pb-5">
        <div class="row align-items-center">
          <div class="col-12 col-lg-8">

            <!-- Breaking News Widget -->
            <?php if(empty($news_updated) === false): ?>
              <div class="breaking-news-area d-flex align-items-center">
                  <div class="news-title">
                      <p><span class="fa fa-newspaper-o"></span> News</p>
                  </div>
                  <div id="breakingNewsTicker" class="ticker">
                      <ul>
                        <?php for($i = 0; $i < (count($news_updated) >= 5 ? 5 : count($news_updated)); $i++): ?>
                          <li>
                            <a href="<?php echo base_url(); ?>">
                              <?php echo character_limiter($news_updated[$i]['title'], 20); ?>
                            </a>
                          </li>
                        <?php endfor; ?>
                      </ul>
                  </div>
              </div>
            <?php endif; ?>

            <!-- Breaking News Widget -->
            <?php if(empty($blog_updated) === false): ?>
              <div class="breaking-news-area d-flex align-items-center mt-15">
                  <div class="news-title title2">
                      <p><span class="fa fa-rss"></span> Blog</p>
                  </div>
                  <div id="internationalTicker" class="ticker">
                      <ul>
                        <?php for($i = 0; $i < (count($blog_updated) >= 5 ? 5 : count($blog_updated)); $i++): ?>
                          <li>
                            <a href="<?php echo base_url(); ?>">
                              <?php echo character_limiter($blog_updated[$i]['title'], 20); ?>
                            </a>
                          </li>
                        <?php endfor; ?>
                      </ul>
                  </div>
              </div>
            <?php endif; ?>
          </div>

          <!-- Ads Add -->
          <div class="col-12 text-center <?php echo !empty($news_updated) == false && !empty($blog_updated) ? 'col-lg-6 offset-lg-3' : 'col-lg-4'; ?>">
              <div class="hero-add">
                  <a href="#"><img src="<?php echo base_url('assets/default/img/bg-img/hero-add.gif'); ?>" alt=""></a>
              </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- ##### Hero Area End ##### -->
