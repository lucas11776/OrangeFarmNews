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
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <?php echo form_open('login', array('class' => 'user', 'novalidate')); ?>
                  <div class="form-group">
                    <?php if(!empty($this->session->flashdata('login_error'))): ?>
                      <div class="alert alert-danger">
                        <span aria-invalid="false" class="small">
                          <span class="fas fa-fw fa-server"></span> <?php echo $this->session->flashdata('login_error'); ?>
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <input type="text"
                           name="username"
                           class="form-control form-control-user <?php echo !empty(form_error('username')) || !empty($this->session->flashdata('login_error')) ? 'is-invalid' : null; ?>"
                           id="username"
                           aria-describedby="emailHelp"
                           placeholder="Username/Email"
                           value="<?php echo set_value('username'); ?>">
                    <?php echo form_error('username', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password"
                           name="password"
                           class="form-control form-control-user <?php echo !empty(form_error('password')) || !empty($this->session->flashdata('login_error')) ? 'is-invalid' : null; ?>"
                           id="exampleInputPassword"
                           placeholder="Password">
                    <?php echo form_error('password', '<strong class="invalid-feedback">', '</strong>'); ?>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox"
                             name="stay_logged_in"
                             class="custom-control-input"
                             id="stay-logged-in"
                             value="<?php echo !empty(set_value('stay_logged_in')) ? set_value('stay_logged_in') : ''; ?>">
                      <label class="custom-control-label" for="stay-logged-in">Remember Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?php echo base_url('forgot/password'); ?>">
                    <strong>Forgot Your Password?</strong>
                  </a>
                </div>
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
