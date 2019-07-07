  <?php
  # Hide Navbar If Page (register,login,password)
  if(!in_array(strtolower($active), $this->panel::PAGES_HIDE_NAVBAR)): ?>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; OrangeFarmNews <?php echo date('Y'); ?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
  # if is found in (template/_navbar)
  endif; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/panel/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/panel/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/panel/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Quill TextArea Editor-->
  <script src="<?php echo base_url('assets/panel/vendor/quill/quill.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/panel/js/sb-admin-2.min.js'); ?>"></script>

  </body>

</html>
