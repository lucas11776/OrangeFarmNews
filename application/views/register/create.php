<br/>

<h1>Register</h1>

<?php echo form_open('register') ?>
  <fieldset>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" />
    <?php if(form_error('username')): ?>
      <?php echo form_error('username'); ?>
    <?php endif; ?>
  </fieldset>
  <fieldset>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" />
    <?php if(form_error('email')): ?>
      <?php echo form_error('email'); ?>
    <?php endif; ?>
  </fieldset>
  <fieldset>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" />
    <?php if(form_error('password')): ?>
      <?php echo form_error('password'); ?>
    <?php endif; ?>
  </fieldset>
  <fieldset>
    <label for="confirm_password">Confrim Password</label>
    <input type="text" name="confirm_password" id="confirm_password" />
    <?php if(form_error('confirm_password')): ?>
      <?php echo form_error('confirm_password'); ?>
    <?php endif; ?>
  </fieldset>
  <fieldset>
    <button type="submit">Register Now!!!</button>
  </fieldset>
<?php echo form_close(); ?>
