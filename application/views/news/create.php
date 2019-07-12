<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-upload text-primary"></span> Upload News</h1>
</div>
<div class="row">
  <div class="col-lg-8 offset-lg-2">
    <div class="p-5">

      <!-- Upload News Form -->
      <?php echo form_open_multipart('dashboard/upload/news'); ?>

        <!-- Picture -->
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Picture<strong></label>
          <input type="file"
                 name="picture"
                 class="form-control-file <?php echo !empty(form_error('picture')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
                 id="picture">
          <?php echo form_error('picture', '<strong class="invalid-feedback">', '</strong>'); ?>
        </div>

        <!-- Titile -->
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Title<strong></label>
          <input type="text"
                 name="title"
                 class="form-control form-control-user form-control-lg <?php echo !empty(form_error('title')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
                 id="exampleFormControlInput1"
                 placeholder="News title."
                 value="<?php echo set_value('title'); ?>">
          <?php echo form_error('title', '<strong class="invalid-feedback">', '</strong>'); ?>
        </div>

        <!-- Category -->
        <div class="form-group">
          <label for="category"><strong>Category<strong></label>
          <select class="form-control text-capitalize form-control-lg <?php echo !empty(form_error('category')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
                  name="category"
                  id="category">
            <?php for($i = 0; $i < count($this->news::CATEGORY); $i++): ?>
              <?php if(!isset($this->news::CATEGORY[set_value('category')]) && $i == 0): ?>
                <option value="">--- Select Category ---</option>
              <?php elseif(isset($this->news::CATEGORY[set_value('category')]) && $i == 0): ?>
                <option value="<?php echo set_value('category'); ?>"><?php echo $this->news::CATEGORY[set_value('category')]; ?></option>
              <?php endif; ?>
              <?php if(set_value('category') !== array_keys($this->news::CATEGORY)[$i]): ?>
                <option value="<?php echo array_keys($this->news::CATEGORY)[$i]; ?>"><?php echo array_values($this->news::CATEGORY)[$i]; ?></option>
              <?php endif; ?>
            <?php endfor; ?>
          </select>
          <?php echo form_error('category', '<strong class="invalid-feedback">', '</strong>'); ?>
        </div>

        <!-- Post -->
        <div class="form-group">
          <label for="post"><strong>Content<strong></label>
          <textarea class="quill-textarea d-none"
                    name="post" id="post"><?php echo set_value('post'); ?></textarea>
          <div class="form-control <?php echo !empty(form_error('post')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
            id="editor" style="min-height: 400px;"></div>
          <?php echo form_error('post', '<strong class="invalid-feedback">', '</strong>'); ?>
        </div>

        <!-- Submit -->
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-user btn-lg btn-block">Upload News</button>
        </div>

      <?php echo form_close(); ?>

      <hr>
    </div>
  </div>
</div>
