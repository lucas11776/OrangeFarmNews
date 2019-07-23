<!-- ##### Footer Area Start ##### -->
  <footer class="footer-area">

    <!-- Main Footer Area -->
    <div class="main-footer-area">
      <div class="container">
        <div class="row">

          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-4">
              <div class="footer-widget-area mt-80">
                  <!-- Footer Logo -->
                  <div class="footer-logo">
                      <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                  </div>
                  <!-- List -->
                  <ul class="list">
                      <li><a href="mailto:orangefarmnews@yahoo.com"><span class="fa fa-envelope-open-o"></span> orangefarmnews@yahoo.com</a></li>
                      <li><a href="tel:0118501160"><span class="fa fa-shopping-bag"></span> <i>Advertising : </i> 011 850 1160</a></li>
                      <li><a href="tel:078329724"><span class="fa fa-shopping-bag"></span> <i>Advertising : </i> 078 329 724</a></li>
                      <li><a href="tel:0862639988"><span class="fa fa-newspaper-o"></span> <i>Article</i> : 086 263 9988</a></li>
                      <li><a href="<?php echo base_url(''); ?>"><span class="fa fa-globe"></span>  www.orangefarmnews.co.za</a></li>
                  </ul>
              </div>
          </div>

          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-2">
              <div class="footer-widget-area mt-80">
                  <!-- Title -->
                  <h4 class="widget-title">Account</h4>
                  <!-- List -->
                  <ul class="list">
                      <?php if($this->auth->user(false) === false): ?>
                        <li><a href="<?php echo base_url('login'); ?>"><span class="fa fa-user-o"></span> Login</a></li>
                        <li><a href="<?php echo base_url('register'); ?>"><span class="fa fa-edit"></span> Register</a></li>
                      <?php else: ?>
                        <li><a href="<?php echo base_url('my/account'); ?>"><span class="fa fa-user-o"></span> My Account</a></li>
                        <li><a href="<?php echo base_url('logout'); ?>"><span class="fa fa-edit"></span> Logout</a></li>
                      <?php endif; ?>
                  </ul>
              </div>
          </div>

          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-4 col-lg-2">
              <div class="footer-widget-area mt-80">
                  <!-- Title -->
                  <h4 class="widget-title">News</h4>
                  <!-- List -->
                  <ul class="list">
                    <?php for($i = 0; $i < (count($this->news::CATEGORY) > 8 ? 8 : count($this->news::CATEGORY)); $i++): ?>
                      <li>
                        <a href="<?php echo base_url('news/category/' . $this->news::CATEGORY[$i]); ?>">
                          <?php echo $this->news::CATEGORY[$i]; ?>
                        </a>
                      </li>
                    <?php endfor; ?>
                  </ul>
              </div>
          </div>

          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-4 col-lg-2">
              <div class="footer-widget-area mt-80">
                  <!-- Title -->
                  <h4 class="widget-title">Blog</h4>
                  <!-- List -->
                  <ul class="list">
                    <?php for($i = 0; $i < (count($this->blog::CATEGORY) > 8 ? 8 : count($this->blog::CATEGORY)); $i++): ?>
                      <li>
                        <a href="<?php echo base_url('blog/category/' . $this->blog::CATEGORY[$i]); ?>">
                          <?php echo $this->blog::CATEGORY[$i]; ?>
                        </a>
                      </li>
                    <?php endfor; ?>
                  </ul>
              </div>
          </div>

          <!-- Footer Widget Area -->
          <div class="col-12 col-sm-4 col-lg-2">
              <div class="footer-widget-area mt-80">
                  <!-- Title -->
                  <h4 class="widget-title">+ Quick Links</h4>
                  <!-- List -->
                  <ul class="list">
                      <li><a href="<?php echo base_url('news'); ?>"><span class="fa fa-newspaper-o"></span> News</a></li>
                      <li><a href="<?php echo base_url('blog'); ?>"><span class="fa fa-rss"></span> Blog</a></li>
                      <li><a href="<?php echo base_url('contect'); ?>"><span class="fa fa-phone"></span> Contect</a></li>
                      <!-- <li><a href="<?php echo base_url(''); ?>"><span class="fa fa-users"></span> About Us</a></li> -->
                  </ul>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-sm-6">
            <!-- Copywrite -->
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a class="text-white" href="<?php echo base_url(); ?>" target="_blank">Orange Farm News</a>
              <!-- This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          <div class="col-sm-6 text-right">
            <p><span class="fa fa-laptop"></span> <i>Web Developer <a class="text-white" href="https://www.facebook.com/themba.ngubeni.129" target="_blank">T.L Ngubeni</a></i></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ##### Footer Area Start ##### -->

  <!-- ##### All Javascript Files ##### -->
  <!-- jQuery-2.2.4 js -->
  <script src="<?php echo base_url('assets/default/js/jquery/jquery-2.2.4.min.js'); ?>"></script>
  <!-- Popper js -->
  <script src="<?php echo base_url('assets/default/js/bootstrap/popper.min.js'); ?>"></script>
  <!-- Bootstrap js -->
  <script src="<?php echo base_url('assets/default/js/bootstrap/bootstrap.min.js'); ?>"></script>
  <!-- All Plugins js -->
  <script src="<?php echo base_url('assets/default/js/plugins/plugins.js'); ?>"></script>
  <!-- Active js -->
  <script src="<?php echo base_url('assets/default/js/active.js'); ?>"></script>

</body>

</html>
