<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-5 pb-2 pt-2">
  <h1 class="h3 mb-0 text-gray-800">
    <span class="fas fa-newspaper text-primary"></span> Manage Blog
  </h1>
</div>
<!-- Content Row -->
<div class="card-columns col-12">
  <?php for($i = 0; $i < count($blog); $i++): ?>
    <!-- News Item -->

      <div class="card mb-3 shadow-sm">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?php echo $blog[$i]['picture']; ?>"
                 height="100%;"
                 class="card-img"
                 style="border-top-right-radius: 0; border-bottom-right-radius: 0;"
                 alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h6 class="card-title"><?php echo word_limiter($blog[$i]['title'], 8); ?></h6>
              <p class="card-text">
                <small class="text-muted">
                  Posted <span class="fas fa-clock text-primary"></span> <?php echo date('d F, Y', strtotime($blog[$i]['date'])); ?>
                  <i class="fas fa-user text-primary"></i> <i>by</i>
                  <a href="<?php echo base_url('dashboard/account/' . $blog[$i]['id']); ?>">
                    <?php echo $blog[$i]['username']; ?>
                  </a>
                </small>
              </p>
              <ul class="list-group list-group-sm list-group-horizontal">
                <li style="padding: 10px;"  class="list-group-item list-group-item-light" title="View news post">
                  <a class="btn btn-circle btn-sm" href="<?php echo base_url('blog/' . $blog[$i]['slug']); ?>">
                    <i class="fas fa-glasses"></i>
                  </a>
                </li>
                <li style="padding: 10px;" class="list-group-item list-group-item-danger" title="Delete news post">
                  <button class="btn btn-circle btn-sm p-0 m-0" data-toggle="modal" data-target="#delete-news-model">
                    <i class="fas fa-trash text-danger"></i>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  <?php endfor; ?>
</div>
<div class="col-12 pt-4 pb-4 mt-4 mb-4">
  <nav aria-label="Pagination for news">
    <!-- ##### Pagination Link ##### -->
    <?php echo $this->pagination->create_links(); ?>
  </nav>
</div>
<!-- Content Row -->


<!-- ##### Delete Comment Model Start ##### -->
<div class="modal fade" id="delete-news-model" tabindex="-1" role="dialog" aria-labelledby="News comment confirmation model" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content border border-danger">
      <div class="modal-header">
        <h5 class="modal-title text-muted" id="exampleModalCenterTitle"><span class="fa fa-trash-o color"></span> Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span> Cancel</button>
        <button type="button" class="btn btn-danger">
          <span class="fa fa-trash-o"></span> Delete
        </button>
      </div>
    </div>
  </div>
</div>
<!-- ##### Delete Comment Model End ##### -->
