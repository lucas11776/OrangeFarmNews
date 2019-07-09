<!-- ##### Contact Form Area Start ##### -->
<div class="contact-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="contact-title">
          <h2>Contact us</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="contact-form-area">
          <form action="#" method="post">
            <div class="row">
              <!-- Name -->
              <div class="col-12 col-lg-6">
                <input type="text"
                       name="name"
                       class="form-control"
                       id="name"
                       placeholder="Name (Required)">
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>

              <!-- Surname -->
              <div class="col-12 col-lg-6">
                <input type="text"
                       name="surname"
                       class="form-control"
                       id="surname"
                       placeholder="Surname (Required)">
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>

              <!-- Phone Number -->
              <div class="col-12 col-lg-6">
                <input type="tel"
                       name="phone_number"
                       class="form-control"
                       id="email"
                       placeholder="Email Address (Optional)">
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>

              <!-- Email -->
              <div class="col-12 col-lg-6">
                <input type="email"
                       name="email"
                       class="form-control"
                       id="email"
                       placeholder="Email Address (Optional)">
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>

              <!-- Subject -->
              <div class="col-12">
                <select class="form-control" id="subject">
                  <option value="">--- Subject ---</option>
                </select>
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>

              <!-- Message -->
              <div class="col-12">
                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                <?php echo form_error('subject', '<p class="invalid-feedback">', '</p>'); ?>
              </div>

              <!-- Submit -->
              <div class="col-12 text-center">
                <button class="btn newspaper-btn mt-30 w-100" type="submit"><span class="fa fa-paper-plane-o"></span> Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>

        <div class="col-12 col-lg-4">
            <!-- Single Contact Information -->
            <div class="single-contact-information mb-30">
                <h6><span class="fa fa-map-marker"></span> Address:</h6>
                <address><p>1st Floor, Nelgate Shopping Complex, Office #4,<br/> Orange Farm, Guateng, 1805</p></address>
            </div>
            <!-- Single Contact Information -->
            <div class="single-contact-information mb-30">
                <h6><span class="fa fa-phone"></span> Phone:</h6>
                <p></p>
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
