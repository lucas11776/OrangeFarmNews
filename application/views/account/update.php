<div class="col-12">
  <h1 class="pt-3 pb-4"><span class="fas fa-edit"></span> Edit Account</h1>
  <div class="text-center mt-5 mb-5">
    <img src="<?php echo $this->auth->account('picture'); ?>"
         class="shadow-lg img-thumbnail"
         style="border-radius: 100%;"
         alt="<?php echo $this->account->get_account_name($this->auth->account()); ?>">
    <strong class="text-center pl-3">
      <?php echo $this->account->get_account_name($this->auth->account()); ?>
    </strong>
  </div>
  <div class="col-lg-6 offset-lg-3 mt-5">
    <?php if($this->session->flashdata('update_account_error')): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> <?php echo $this->session->flashdata('update_account_error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('account_updated')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?php echo $this->session->flashdata('account_updated'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <!-- ##### Change User Details Form ##### -->
    <ul class="list-group mb-5">
      <?php echo form_open('dashboard/my/account'); ?>
        <li class="list-group-item active"><strong><i class="fas fa-user"></i> Personal Information</strong></li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Profile Picture</label>
             <div class="col-sm-9">
               <input type="file"
                      name="picture"
                      style="position: relative; top: 5px;"
                      class="form-control-file is-invalid"
                      id="exampleFormControlFile1">
                <?php echo form_error('picture', '<p class="invalid-feedback">', '</p>'); ?>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Username</label>
             <div class="col-sm-9">
               <input type="text"
                      name="username"
                      class="form-control form-control-md"
                      id=""
                      value="<?php echo $this->auth->account('username'); ?>"
                      placeholder="Username."
                      disabled>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Email</label>
             <div class="col-sm-9">
               <input type="email"
                      name="email"
                      class="form-control form-control-md"
                      id=""
                      value="<?php echo $this->auth->account('email'); ?>"
                      placeholder="Email Address."
                      disabled>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Name</label>
             <div class="col-sm-9">
               <input type="text"
                      name="name"
                      class="form-control form-control-md"
                      id=""
                      value="<?php echo empty(set_value('name')) ? $this->auth->account('name') : set_value('name'); ?>"
                      placeholder="Enter your name.">
                <?php echo form_error('name', '<p class="invalid-feedback">', '</p>'); ?>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Surname</label>
             <div class="col-sm-9">
               <input type="text"
                      name="surname"
                      class="form-control form-control-md"
                      id=""
                      value="<?php echo empty(set_value('surname')) ? $this->auth->account('surname') : set_value('surname'); ?>"
                      placeholder="Enter your surname.">
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0 text-right">
          <div class="form-group">
            <button class="btn btn-primary">Update</button>
          </div>
        </li>
      <?php echo form_close(); ?>
    </ul>
    <!-- ##### Change User Password Account #### -->
    <ul class="list-group mt-5 mb-5">
      <?php echo form_open('dashboard/my/account'); ?>
        <input type="hidden" name="type" value="password">
        <li class="list-group-item active"><strong><i class="fas fa-key"></i> Change Password</strong></li>
        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Old Password</label>
             <div class="col-sm-9">
               <input type="password"
                      name="old_password"
                      class="form-control form-control-md <?php if(form_error('old_password')) echo 'is-invalid'; ?>"
                      id=""
                      value="<?php echo set_value('old_password'); ?>"
                      placeholder="Account password (old).">
                <?php echo form_error('old_password', '<strong class="invalid-feedback">', '</strong>'); ?>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">News Password</label>
             <div class="col-sm-9">
               <input type="password"
                      name="new_password"
                      class="form-control form-control-md <?php if(form_error('new_password')) echo 'is-invalid'; ?>"
                      id=""
                      value=""
                      placeholder="New password.">
                <?php echo form_error('new_password', '<strong class="invalid-feedback">', '</strong>'); ?>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Confirm Password</label>
             <div class="col-sm-9">
               <input type="password"
                      name="confirm_password"
                      class="form-control form-control-md <?php if(form_error('confirm_password')) echo 'is-invalid'; ?>"
                      id=""
                      value=""
                      placeholder="Confirm new pasword.">
                <?php echo form_error('confirm_password', '<strong class="invalid-feedback">', '</strong>'); ?>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0 text-right">
          <div class="form-group">
            <button class="btn btn-primary">Change Password</button>
          </div>
        </li>
      <?php echo form_close(); ?>
    </ul>
  </div>
</div>
