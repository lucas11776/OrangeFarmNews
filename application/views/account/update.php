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
    <!-- ##### Change User Details Form ##### -->
    <ul class="list-group mb-5">
      <?php echo form_open('dashboard/my/account'); ?>
        <li class="list-group-item active"><strong><i class="fas fa-user"></i> Personal Information</strong></li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Profile Picture</label>
             <div class="col-sm-9">
               <input type="file"
                      style="position: relative; top: 5px;"
                      class="form-control-file"
                      id="exampleFormControlFile1">
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Username</label>
             <div class="col-sm-9">
               <input type="text"
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
               <input type="email"
                      class="form-control form-control-md"
                      id=""
                      value="<?php echo $this->auth->account('name'); ?>"
                      placeholder="Enter your name.">
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Surname</label>
             <div class="col-sm-9">
               <input type="email"
                      class="form-control form-control-md"
                      id=""
                      value="<?php echo $this->auth->account('surname'); ?>"
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
    <ul class="list-group mt-5">
      <?php echo form_open('dashboard/my/account'); ?>
        <li class="list-group-item active"><strong><i class="fas fa-key"></i> Change Password</strong></li>
        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Old Password</label>
             <div class="col-sm-9">
               <input type="email"
                      class="form-control form-control-md"
                      id=""
                      value=""
                      placeholder="Account password (old)."
                      disabled>
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">News Password</label>
             <div class="col-sm-9">
               <input type="email"
                      class="form-control form-control-md"
                      id=""
                      value=""
                      placeholder="New password.">
             </div>
           </div>
        </li>

        <li class="list-group-item pb-0">
          <div class="form-group row">
             <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Confirm Password</label>
             <div class="col-sm-9">
               <input type="email"
                      class="form-control form-control-md"
                      id=""
                      value=""
                      placeholder="Confirm new pasword.">
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
