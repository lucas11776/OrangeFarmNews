<html>
  <head>
    <title><?php echo $title ?? 'OrangeFarmNews For The Community By The Community' ?></title>
  </head>
  <style>
    .clear{
      clear: both;
    }
    .navbar{
      width: 100%;
      padding: 0;
      margin: 0;
      background-color: Orange;
    }
    .navbar li{
      padding: 20px;
      float: left;
      list-style: none;
    }
  </style>
  <body>

<fieldset>
  <ul class="navbar">
    <li><a href="<?php echo base_url(''); ?>">Home</a></li>
    <li><a href="<?php echo base_url('news'); ?>">News</a></li>
    <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
    <?php if($this->auth->user(false)): ?>
      <li><a href="<?php echo base_url('my/account'); ?>">My Account</a></li>
    <?php endif; ?>
    <?php if($this->auth->editor(false)): ?>
      <li><a href="<?php echo base_url('editor'); ?>">Editor Panel</a></li>
    <?php endif;?>
    <?php if($this->auth->editor(false)): ?>
      <li><a href="<?php echo base_url('editor'); ?>">Administrator Panel</a></li>
    <?php endif;?>
    <?php if($this->auth->user(false) === false): ?>
      <li><a href="<?php echo base_url('login'); ?>">Login</a></li>
      <li><a href="<?php echo base_url('register'); ?>">Regster</a></li>
    <?php else: ?>
      <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
    <?php endif; ?>
    <div class="clear"></div>
  <ul>
</fieldset>
<div class="clear"></div>
<br/>
