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
                 class="form-control-file <?php echo !empty(form_error('picture')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
                 id="picture">
          <?php echo form_error('picture', '<strong class="invalid-feedback">', '</strong>'); ?>
        </div>

        <!-- Titile -->
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Title<strong></label>
          <input type="email"
                 class="form-control form-control-user form-control-lg <?php echo !empty(form_error('title')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
                 id="exampleFormControlInput1"
                 placeholder="News title.">
          <?php echo form_error('title', '<strong class="invalid-feedback">', '</strong>'); ?>
        </div>

        <!-- Category -->
        <div class="form-group">
          <label for="category"><strong>Category<strong></label>
          <select class="form-control form-control-lg <?php echo !empty(form_error('category')) || !empty($this->session->flashdata('upload_error')) ? 'is-invalid' : null; ?>"
                  name="category"
                  id="category">
            <option value="">--- Select Category ---</option>
            <?php foreach ($this->news::CATEGORY as $key => $value): ?>
              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php endforeach; ?>
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
