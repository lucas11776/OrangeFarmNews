<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7 pt-5 pb-5">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>

              <?php echo form_open('register', 'class="user" novalidate'); ?>
                <div class="form-group row">

                  <!-- Username -->
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text"
                           name="username"
                           class="form-control form-control-user <?php echo !empty(form_error('username')) ? 'is-invalid' : null; ?>"
                           id="username"
                           placeholder="username"
                           value="<?php echo set_value('username'); ?>">
                    <?php echo form_error('username', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>

                  <!-- Email -->
                  <div class="col-sm-6">
                    <input type="email"
                           name="email"
                           class="form-control form-control-user <?php echo !empty(form_error('email')) ? 'is-invalid' : null; ?>"
                           id="email"
                           placeholder="Email"
                           value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>
                </div>

                <!-- Password -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password"
                           name="password"
                           class="form-control form-control-user <?php echo !empty(form_error('password')) ? 'is-invalid' : null; ?>"
                           aria-describedby="emailHelp"
                           id="password"
                           placeholder="Password">
                    <?php echo form_error('password', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>

                  <!-- Confirm Password -->
                  <div class="col-sm-6">
                    <input type="password"
                           name="confirm_password"
                           class="form-control form-control-user <?php echo !empty(form_error('confirm_password')) ? 'is-invalid' : null; ?>"
                           id="confirm_password"
                           placeholder="Repeat Password">
                    <?php echo form_error('confirm_password', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Create Account
                </button>

              <?php echo form_close(); ?>
              <hr>

              <div class="text-center">
                <a class="small" href="<?php echo base_url('login'); ?>">
                  <strong>Already have an <span class="fas fa-fw fa-user"></span> account? Login!</strong>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
