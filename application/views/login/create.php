<h1>Welcome Back To OrangeFarmNews</h1>
<br/><hr/><br/>
<?php echo form_open('login') ?>
  <?php if(form_error('username') || form_error('password')): ?>
    <h4 style="color: red">Invalid username or password please try correct combinetion.</h4>
  <?php endif; ?>
  <fieldset>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"/>
  </fieldset>
  <fieldset>
    <label for="password">Password</label>
    <input type="text" name="password" id="password" />
  </fieldset>
  <fieldset>
    <label for="stay-logged-in">Stay Logged In</label>
    <input type="checkbox" name="stay_logged_in" id="Stay-logged-in" />
  </fieldset>
  <fieldset>
    <button type="submit">Login</button>
  </fieldset>
<?php echo form_close(); ?>
