<div class="newsletter-widget">
  <h4><span class="fa fa-inbox"></span> Newsletter</h4>
  <p>
    <?php echo $this->auth->account('subscribed') == 1 || $this->input->get('newsletter') == 'unsubscribe' ? 'Want to to unsubscribe to our newsletter just click unsubscribe.' :
                      'Subscribe to our newsletter to get the latest updated.'; ?>
  </p>
  <?php if($this->auth->account('subscribed') != 1 && $this->input->get('newsletter') != 'unsubscribe'): ?>
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
    <input type="hidden" name="redirect" value="<?php echo uri_string(); ?>">
    <input type="hidden" name="page" value="<?php echo $this->input->get('page'); ?>">
    <input type="hidden" name="term" value="<?php echo $this->input->get('term'); ?>">
    <input type="hidden" name="newsletter" value="<?php echo $this->input->get('newsletter'); ?>">
    <input class="<?php if($this->session->flashdata('newsletter_exist')) echo 'is-invalid'; ?>"
           type="email"
           name="email"
           placeholder="Email Address..."
           value="<?php if($this->auth->user(false)) echo $this->auth->account('email'); ?>"
           <?php if($this->auth->user(false)) echo 'disabled'; ?>>
    <?php if($this->auth->user(false)): ?>
      <input class="<?php if($this->session->flashdata('newsletter_exist')) echo 'is-invalid'; ?>"
             type="hidden"
             name="email"
             placeholder="Email Address..."
             value="<?php if($this->auth->user(false)) echo $this->auth->account('email'); ?>">
    <?php endif; ?>
    <?php if($this->session->flashdata('newsletter_error')): ?>
      <p class="text-danger"><?php echo $this->session->flashdata('newsletter_error'); ?></p>
    <?php endif; ?>
    <button type="submit" class="btn w-100">
      <span class="fa fa-paper-plane-o"></span>
      <?php echo $this->auth->account('subscribed') == 1 || $this->input->get('newsletter') == 'unsubscribe' ? 'Unsubscribe' : 'Subscribe'; ?>
    </button>
    <?php if($this->auth->account('subscribed') == 1 || $this->auth->user(false) === false && $this->input->get('newsletter') != 'unsubscribe'): ?>
      <hr/>
      <a href="<?php echo base_url(uri_string() . '?newsletter=unsubscribe'); ?>">
        Want to unsubscribe <strong class="color">click this link</strong> and come fill in your email and hit unsubscribe
      </a>
    <?php else: ?>
      <hr/>
      <a href="<?php echo base_url(uri_string()); ?>">
        Want to subscribe our newsletter <strong class="color">click this link</strong>.
      </a>
    <?php endif; ?>
  <?php echo form_close(); ?>
</div>
