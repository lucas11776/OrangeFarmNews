<div class="newsletter-widget">
  <h4><span class="fa fa-inbox"></span> Newsletter</h4>
  <p>
    <?php echo true ? 'Want to to unsubscribe to our newsletter just click unsubscribe.' :
                      'Subscribe to our newsletter to get the latest updated.'; ?>
  </p>
  <?php if(false): ?>
    <?php echo form_open('newsletter/subscribe'); ?>
  <?php else: ?>
    <?php echo form_open('newsletter/unsubscribe'); ?>
  <?php endif; ?>
    <?php if($this->session->flashdata('newsletter_exist')): ?>
      <div class="alert alert-danger">
        <strong>
          <i class="fa fa-envelope"></i> Sorry email address is address Subscribe to newsletter
        </strong>
      </div>
    <?php endif; ?>
    <input type="hidden"
           name="redirect"
           value="<?php echo base_url(); ?>">
    <input class="<?php if($this->session->flashdata('newsletter_exist')) echo 'is-invalid'; ?>"
           type="email"
           name="newsletter_email"
           placeholder="Email Address..."
           value="<?php if($this->auth->user(false)) echo $this->auth->account('email'); ?>"
           <?php if($this->auth->user(false)) echo 'disabled'; ?>>
    <?php if($this->session->flashdata('newsletter_error')): ?>
      <p class="text-danger"><?php echo $this->session->flashdata('newsletter_error'); ?></p>
    <?php endif; ?>
    <button type="submit" class="btn w-100">
      <span class="fa fa-paper-plane-o"></span> <?php echo true ? 'Unsubscribe' : 'Subscribe'; ?>
    </button>
  <?php echo form_close(); ?>
</div>
