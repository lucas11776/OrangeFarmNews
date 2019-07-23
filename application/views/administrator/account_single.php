<div class="col-12 pt-5 pb-5 mt-5 mb-5">
  <div class="text-center mt-5 mb-5">
    <img src="<?php echo $account['picture']; ?>"
         class="shadow-lg img-thumbnail"
         style="border-radius: 100%;"
         alt="<?php echo $account['picture']; ?>">
    <strong class="text-center pl-3">
      <?php echo $this->account->get_account_name($account); ?>
    </strong>
  </div>
  <div class="col-lg-6 offset-lg-3 mt-5 mb-5 pb-3">
    <!-- ##### Change User Details Form ##### -->
    <ul class="list-group mb-5">
      <?php echo form_open(uri_string()); ?>
          <li class="list-group-item bg-color"><strong><i class="fa fa-user-circle-o"></i> Personal Information</strong></li>

          <!-- Email -->
          <li class="list-group-item pb-0">
            <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Email</label>
               <div class="col-sm-9">
                 <input type="email"
                        class="form-control form-control-md"
                        value="<?php echo $account['email']; ?>"
                        disabled>
               </div>
             </div>
          </li>

          <!-- Name -->
          <li class="list-group-item pb-0">
            <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Name</label>
               <div class="col-sm-9">
                 <input type="text"
                        class="form-control form-control-md"
                        value="<?php echo $account['name']; ?>"
                        disabled>
               </div>
             </div>
          </li>

          <!-- Surname -->
          <li class="list-group-item pb-0">
            <div class="form-group row">
               <label for="surname" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Surname</label>
               <div class="col-sm-9">
                 <input type="text"
                        class="form-control form-control-md"
                        id="surname"
                        value="<?php echo $account['surname']; ?>"
                        disabled>
               </div>
             </div>
          </li>

          <!-- Account Role -->
          <li class="list-group-item pb-0">
            <div class="form-group row">
               <label for="surname" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Account Type</label>
               <div class="col-sm-9">
                  <select name="role" class="form-control form-control-md" id="category">
                    <?php for($i = 0; $i < count($this->account::ROLE); $i++): ?>
                      <?php if($i == 0): ?>
                        <option value="<?php echo $account['role']; ?>">
                          <?php echo $this->account::ROLE[$account['role']]; ?>
                        </option>
                      <?php endif; ?>
                      <?php if($this->account::ROLE[$account['role']] != $this->account::ROLE[$i] && isset($this->account::ROLE[$i])): ?>
                        <option value="<?php echo $i; ?>">
                          <?php echo $this->account::ROLE[$i]; ?>
                        </option>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </select>
               </div>
             </div>
          </li>

          <!-- Submit -->
          <li class="list-group-item pb-0">
            <div class="form-group row">
               <label for="surname" class="col-sm-3 col-form-label col-form-label-sm">Update Account</label>
               <div class="col-sm-9 text-right">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-key"></i> Update
                </button>
               </div>
             </div>
          </li>
      <?php echo form_close(); ?>
    </ul>
  </div>
</div>
