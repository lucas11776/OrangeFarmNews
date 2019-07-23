<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6 pt-5 pb-5">
              <div class="p-5">

                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-key text-primary"></i> Forget Password</h1>
                </div>

                <!-- Login Form -->
                <?php echo form_open('forgot/password', array('class' => 'user', 'novalidate')); ?>

                  <input type="hidden" name="redirect" value="<?php echo $this->input->get('r') ?? set_value('redirect'); ?>">

                  <!-- Log In Error -->
                  <div class="form-group">
                    <?php if(!empty($this->session->flashdata('recover_password_error'))): ?>
                      <div class="alert alert-danger">
                        <span aria-invalid="false" class="small">
                          <span class="fas fa-fw fa-server"></span> <?php echo $this->session->flashdata('recover_password_error'); ?>
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Username -->
                  <div class="form-group">
                    <input type="email"
                           name="email"
                           class="form-control form-control-user <?php echo !empty(form_error('email')) || !empty($this->session->flashdata('recover_password_error')) ? 'is-invalid' : null; ?>"
                           id="email"
                           aria-describedby="emailHelp"
                           placeholder="Enter account email address."
                           value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>

                  <!-- Submit -->
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </button>

                <?php echo form_close(); ?>

                <hr>

                <!-- Register Account Link -->
                <div class="text-center">
                  <a class="small" href="<?php echo base_url('register'); ?>">
                    <strong>Not <span class="fas fa-fw fa-user"></span> Member Create Account!</strong>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
