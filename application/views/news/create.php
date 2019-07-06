<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><span class="fas fa-upload text-primary"></span> Upload News</h1>
</div>

<div class="row">
  <div class="col-lg-8 offset-lg-2">
    <div class="p-5">
      <?php echo form_open_multipart('dashboard/upload/news'); ?>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Picture<strong></label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Title<strong></label>
          <input type="email"
                 class="form-control form-control-user form-control-lg"
                 id="exampleFormControlInput1"
                 placeholder="News title.">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Category<strong></label>
          <select class="form-control form-control-lg" id="exampleFormControlSelect1">
            <option value="">--- Select Category ---</option>
            <?php foreach ($this->news::CATEGORY as $key => $value): ?>
              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Content<strong></label>
          <textarea class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="6"
                    placeholder="News content."></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-user btn-lg btn-block">Upload News</button>
        </div>
      <?php echo form_close(); ?>
      <hr>
    </div>
  </div>
</div>
