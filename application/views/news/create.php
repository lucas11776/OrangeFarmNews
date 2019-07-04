<br/>

<h1>Upload News</h1>

<?php echo form_open_multipart('upload/news') ?>

  <!-- Picture -->
  <fieldset>
    <label for="picture">News Cover Picture</label>
    <input type="file" name="picture" id="picture" />
    <?php if(form_error('picture')): ?>
      <?php echo form_error('picture'); ?>
    <?php endif; ?>
  </fieldset>

  <!-- Title -->
  <fieldset>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>"/>
    <?php if(form_error('title')): ?>
      <?php echo form_error('title'); ?>
    <?php endif; ?>
  </fieldset>

  <!-- Category -->
  <fieldset>
    <label for="category">Category</label>
    <select name="category">
      <?php if(empty(set_value('category')) || !isset($this->news::CATEGORY[set_value('category') ?? 'none'])): ?>
        <option value="">--- select news category ---</option>
      <?php else: ?>
        <option value="<?php echo set_value('category'); ?>"><?php echo $this->news::CATEGORY[set_value('category')]; ?></option>
      <?php endif; ?>
      <?php foreach ($this->news::CATEGORY as $key => $value): ?>
        <?php if($key != set_value('category')): ?>
          <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
    <?php if(form_error('category')): ?>
      <?php echo form_error('category'); ?>
    <?php endif; ?>
  </fieldset>

  <!-- Post -->
  <fieldset>
    <label for="post">News Post</label>
    <br/>
    <textarea name="post" id="post" cols="12" rows="12"><?php echo set_value('post'); ?></textarea>
    <?php if(form_error('post')): ?>
      <?php echo form_error('post'); ?>
    <?php endif; ?>
  </fieldset>

  <!-- Submit -->
  <fieldset>
    <button type="submit">Register Now!!!</button>
  </fieldset>

<?php echo form_close(); ?>
