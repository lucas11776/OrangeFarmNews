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
      <li class="list-group-item bg-color"><strong><i class="fa fa-user-circle-o"></i> Personal Information</strong></li>
      <li class="list-group-item pb-0">
        <div class="form-group row">
           <label for="usernmae" class="col-sm-3 col-form-label col-form-label-md font-weight-bolder">Username</label>
           <div class="col-sm-9">
             <input type="text"
                    class="form-control form-control-md"
                    value="<?php echo $account['username']; ?>"
                    disabled>
           </div>
         </div>
      </li>

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
    </ul>
  </div>
</div>
