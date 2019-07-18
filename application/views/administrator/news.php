<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">
    <span class="fas fa-newspaper"></span> Manage News Posts
  </h1>
</div>
<!-- Content Row -->
<div class="card-columns col-12">
  <?php for($i = 0; $i < count($news); $i++): ?>
    <!-- News Item -->

      <div class="card mb-3 shadow-sm">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?php echo $news[$i]['picture']; ?>" 
                 height="100%;" 
                 class="card-img"
                 style="border-top-right-radius: 0; border-bottom-right-radius: 0;"
                 alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo word_limiter($news[$i]['title'], 8); ?></h5>
              <p class="card-text small">This is a wider card with supporting text below.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
    </div>
  <?php endfor; ?>
</div>
 <div class="col-12">
  <nav aria-label="Page navigation example">
    <ul class="pagination mt-3 mb-5">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <strong aria-hidden="true">&laquo;</strong>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#"><strong>1</strong></a></li>
      <li class="page-item"><a class="page-link" href="#"><strong>2</strong></a></li>
      <li class="page-item"><a class="page-link" href="#"><strong>3</strong></a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <strong aria-hidden="true">&raquo;</strong>
        </a>
      </li>
    </ul>
  </nav>
</div>
<!-- Content Row -->
