<!-- ##### Contact Form Area Start ##### -->
<div class="contact-area section-padding-80">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="contact-title">
          <h2><span class="fa fa-send-o color"></span> Contact us</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="contact-form-area">
          <?php echo form_open('contect'); ?>
            <div class="row">
              <!-- Name -->
              <div class="col-12 col-lg-6">
                <input type="text"
                       name="name"
                       class="form-control <?php if(form_error('name')) echo 'is-invalid'; ?>"
                       id="name"
                       value="<?php echo set_value('name')?>"
                       placeholder="Name (Required)">
                <?php echo form_error('name', '<p class="invalid-feedback">', '</p>'); ?>
              </div>
              <!-- Surname -->
              <div class="col-12 col-lg-6">
                <input type="text"
                       name="surname"
                       class="form-control <?php if(form_error('surname')) echo 'is-invalid'; ?>"
                       id="surname"
                       value="<?php echo set_value('surname')?>"
                       placeholder="Surname (Required)">
                <?php echo form_error('surname', '<p class="invalid-feedback">', '</p>'); ?>
              </div>
              <!-- Phone Number -->
              <div class="col-12 col-lg-6">
                <input type="tel"
                       name="phone_number"
                       class="form-control <?php if(form_error('phone_number')) echo 'is-invalid'; ?>"
                       id="email"
                       value="<?php echo set_value('phone_number')?>"
                       placeholder="Phone Number (Required)">
                <?php echo form_error('phone_number', '<p class="invalid-feedback">', '</p>'); ?>
              </div>
              <!-- Email -->
              <div class="col-12 col-lg-6">
                <input type="email"
                       name="email"
                       class="form-control <?php if(form_error('email')) echo 'is-invalid'; ?>"
                       id="email"
                       value="<?php echo set_value('email')?>"
                       placeholder="Email Address (Optional)">
                <?php echo form_error('email', '<p class="invalid-feedback">', '</p>'); ?>
              </div>
              <!-- Subject -->
              <div class="col-12">
                <select name="subject" class="form-control <?php if(form_error('subject')) echo 'is-invalid'; ?> text-capitalize" id="subject">
                  <?php for($i = 0; $i < count($this->contect::SUBJECT_CATEGORY); $i++): ?>
                    <?php if(!in_array(set_value('subject'), $this->contect::SUBJECT_CATEGORY) && $i == 0): ?>
                      <option value="">--- Subject ---</option>
                    <?php elseif(in_array(set_value('subject'), $this->contect::SUBJECT_CATEGORY) && $i == 0): ?>
                      <option value="<?php echo set_value('subject'); ?>"><?php echo set_value('subject'); ?></option>
                    <?php endif; ?>
                    <?php if(set_value('subject') != $this->contect::SUBJECT_CATEGORY[$i]): ?>
                      <option value="<?php echo $this->contect::SUBJECT_CATEGORY[$i]; ?>"><?php echo $this->contect::SUBJECT_CATEGORY[$i]; ?></option>
                    <?php endif; ?>
                  <?php endfor; ?>
                </select>
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>
              <!-- Message -->
              <div class="col-12">
                <textarea name="message"
                          class="form-control <?php if(form_error('message')) echo 'is-invalid'; ?>"
                          id="message"
                          cols="30"
                          rows="10"
                          placeholder="Message (Required)..."><?php echo set_value('message'); ?></textarea>
                <?php echo form_error('message', '<p class="invalid-feedback">', '</p>'); ?>
              </div>
              <!-- Submit -->
              <div class="col-12 text-center">
                <button class="btn newspaper-btn mt-30 w-100" type="submit"><span class="fa fa-paper-plane-o"></span> Send Message</button>
              </div>
            </div>
          <?php form_close(); ?>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6><span class="fa fa-map-marker"></span> Address:</h6>
          <address><p>1st Floor, Nelgate Shopping Complex,<br/>Office #4, Orange Farm,<br/>Guateng, 1805</p></address>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6><span class="fa fa-phone"></span> Phone:</h6>
          <p>
            <a href="tel:0783297240"><i class="color"><span class="fa fa-shopping-bag"></span> Advertising :</i> 078 329 724</a>
            <i class="color">Or</i> <a href="tel:0118501160">011 850 1160</a><br/>
            <a href="tel:0862639988"><i class="color"><span class="fa fa-newspaper-o"></span> Article :</i> 086 263 9988</a>
          </p>
        </div>
        <!-- Single Contact Information -->
        <div class="single-contact-information mb-30">
          <h6><span class="fa fa-envelope-open-o"></span> Email:</h6>
          <p><a href="mailTo:orangefarmnews@yahoo.com">orangefarmnews@yahoo.com</a></p>
        </div>
      </div>
    </div>
    <!-- Google Maps -->
    <div class="map-area">
        <div id="googleMap"></div>
    </div>
  </div>
</div>
<!-- ##### Contact Form Area End ##### -->
