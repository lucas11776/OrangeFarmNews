<div class="container">
  <div class="page-404 col-12 text-center">
    <span class="<?php echo $icon ?? 'fa fa-globe'; ?> icon"></span>
    <h1><?php echo $title ?></h1>
    <p><?php echo $message ?? ''; ?></p>
    <br/>
    <a class="btn bg-color btn-lg" href="<?php echo $link['url']; ?>">
      <span class="<?php echo $link['icon'] ?? ''; ?>"></span> <?php echo $link['text']; ?>
    </a>
    <br/>
  </div>
</div>
