<div class="newsletter-widget">
  <h4><span class="fa fa-inbox"></span> Newsletter</h4>
  <p>Subscribe to our newsletter to get the latest updated.</p>
  <form action="#" method="post">
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
           placeholder="Your"
           value="<?php if($this->auth->user(false)) echo $this->auth->account('email'); ?>"
           <?php if($this->auth->user(false)) echo 'disabled'; ?>>
    <button type="submit" class="btn w-100">
      <span class="fa fa-paper-plane-o"></span> Subscribe
    </button>
  </form>
</div>
