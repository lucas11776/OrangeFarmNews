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
                  <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-key text-primary"></i> Reset Account Password</h1>
                </div>

                <!-- Login Form -->
                <?php echo form_open('reset/account/password?token=' . urlencode($this->input->get('token')), array('class' => 'user', 'novalidate')); ?>

                  <!-- Log In Error -->
                  <div class="form-group">
                    <?php if(!empty($this->session->flashdata('change_password_error'))): ?>
                      <div class="alert alert-danger">
                        <span aria-invalid="false" class="small">
                          <span class="fas fa-fw fa-server"></span> <?php echo $this->session->flashdata('change_password_error'); ?>
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Username -->
                  <div class="form-group">
                    <input type="password"
                           name="password"
                           class="form-control form-control-user <?php echo !empty(form_error('password')) || !empty($this->session->flashdata('recover_password_error')) ? 'is-invalid' : null; ?>"
                           id="password"
                           placeholder="New pasword."
                           value="<?php echo set_value('password'); ?>">
                    <?php echo form_error('password', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>

                  <!-- Username -->
                  <div class="form-group">
                    <input type="password"
                           name="confirm_password"
                           class="form-control form-control-user <?php echo !empty(form_error('confirm_password')) || !empty($this->session->flashdata('recover_password_error')) ? 'is-invalid' : null; ?>"
                           id="confirm-password"
                           placeholder="Confirm new password."
                           value="<?php echo set_value('confirm_password'); ?>">
                    <?php echo form_error('confirm_password', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>

                  <!-- Submit -->
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Change Password
                  </button>

                <?php echo form_close(); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
