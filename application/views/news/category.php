<!-- ##### Footer Add Area Start ##### -->
<div class="footer-add-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
        <div class="footer-add">
          <a href="#"><img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/topband.gif'); ?>" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Footer Add Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80 pt-2">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">

        <div class="">
          <!-- Single Featured Post -->
          <div class="row">
            <?php for($i = 0; $i < count($category_result); $i++): ?>
              <?php if($i == 0): ?>
                <div class="single-blog-post featured-post mb-30 col-lg-12">
                  <div class="post-thumb">
                     <a href="<?php echo base_url('news/'.$category_result[$i]['slug']); ?>">
                       <img src="<?php echo $category_result[$i]['picture']; ?>" alt="<?php echo $category_result[$i]['title']; ?>">
                     </a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo base_url('news/category/'.$category_result[$i]['category']); ?>" class="post-catagory">
                      <?php echo $category_result[$i]['category']; ?>
                    </a>
                    <a href="<?php echo base_url('news/'.$category_result[$i]['slug']); ?>" class="post-title">
                      <h6><?php echo $category_result[$i]['title'] ?></h6>
                    </a>
                    <div class="post-meta">
                      <p class="post-author">By <a href="#"><?php echo $this->account->get_account_name($category_result[$i]); ?></a></p>
                      <p class="post-excerp"><?php echo word_limiter(strip_tags($category_result[$i]['post']), 100); ?></p>
                      <!-- Post Like & Post Comment -->
                      <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $category_result[$i]['views']; ?></span></a>
                        <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $category_result[$i]['comments']; ?></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php else: ?>
                <div class="single-blog-post featured-post mb-30 col-md-6">
                  <div class="post-thumb">
                    <a href="<?php echo base_url('news/'.$category_result[$i]['slug']); ?>">
                      <img src="<?php echo $category_result[$i]['picture']; ?>" alt="<?php echo $category_result[$i]['title']; ?>">
                    </a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo base_url('news/category/'.$category_result[$i]['slug']); ?>" class="post-catagory">
                      <?php echo $category_result[$i]['category']; ?>
                    </a>
                    <a href="<?php echo base_url('news/'.$category_result[$i]['slug']); ?>" class="post-title">
                      <h5><?php echo $category_result[$i]['title'] ?></h5>
                    </a>
                    <div class="post-meta">
                      <p class="post-author">By <a href="#"><?php echo $this->account->get_account_name($category_result[$i]); ?></a></p>
                      <p class="post-excerp"><?php echo word_limiter(strip_tags($category_result[$i]['post']), 50); ?></p>
                      <!-- Post Like & Post Comment -->
                      <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $category_result[$i]['views']; ?></span></a>
                        <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $category_result[$i]['comments']; ?></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($i % 4 == 0 && $i != 0): ?>
                <div class="col-12 text-center pb-5">
                    <div class="footer-add">
                      <a href="#"><img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/topband.gif'); ?>" alt=""></a>
                    </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
            <?php if(count($category_result) == 0): ?>
              <div class="alert alert-info alert-dismissible fade show col-12" role="alert">
                <h4 class="alert-heading">Ops Sorry!</h4>
                <p class="text-info">The are not result found under that category.</p>
                <hr>
                <p class="mb-0 text-info">Please check back later.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- ##### Pagination ##### -->
        <nav aria-label="Page navigation">
          <?php echo $this->pagination->create_links(); ?>
        </nav>
      </div>

      <div class="col-12 col-lg-4">
        <div class="blog-sidebar-area">

          <!-- Latest Posts Widget -->
          <div class="latest-posts-widget mb-50">
            <?php for($i = 0; $i < count($most_commented); $i++): ?>
              <!-- Single Featured Post -->
              <div class="single-blog-post small-featured-post d-flex">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/' . $most_commented[$i]['slug']); ?>">
                    <img src="<?php echo $most_commented[$i]['picture']; ?>" alt="<?php echo $most_commented[$i]['title']; ?>">
                  </a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/category/' . $most_commented[$i]['category']); ?>" class="post-catagory">
                    <?php echo $most_commented[$i]['category']; ?>
                  </a>
                  <div class="post-meta">
                    <a href="<?php echo base_url('news/' . $most_commented[$i]['slug']); ?>" class="post-title">
                      <h6><?php echo word_limiter($most_commented[$i]['title'], 15); ?></h6>
                    </a>
                    <p class="post-date"><span class="fa fa-clock-o color"></span> <?php echo date('h:i A | F d', strtotime($most_commented[$i]['date'])); ?></p>
                  </div>
                </div>
              </div>
              <?php if((count($most_commented) - 1) == $i): ?>
                <div class="col-12 text-center pt-5 pb-0">
                    <div class="footer-add">
                      <a href="#"><img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/front-banner.jpg'); ?>" alt=""></a>
                    </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
          </div>

          <!-- Newsletter Widget -->
          <?php $this->load->view('template/newsletter'); ?>

          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget mt-5 pt-4 pb-5">
            <h3 class="text-center">Latest Blog</h3>
            <?php for($i = 0; $i < count($latest_blog); $i++): ?>
              <!-- Single Comments -->
              <div class="single-comments d-flex">
                <div class="comments-thumbnail mr-15">
                  <img src="<?php echo $latest_blog[$i]['picture']; ?>" alt="<?php echo $latest_blog[$i]['title']; ?>">
                </div>
                <div class="comments-text">
                <a href="<?php echo base_url('blog/' . $latest_blog[$i]['slug']); ?>">
                  <?php echo word_limiter($latest_blog[$i]['title'], 10); ?>
                </a>
                <p><?php echo date('h:i a, F d, Y', strtotime($latest_blog[$i]['date'])); ?></p>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->
