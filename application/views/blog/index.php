<!-- ##### Footer Add Area Start ##### -->
<div class="footer-add-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
        <div class="footer-add">
          <a href="#"><img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/holy.gif'); ?>" alt=""></a>
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
        <div class="blog-posts-area">

          <div class="row">
            <?php for($i = 0; $i < count($blog); $i++): ?>
              <?php if($i == 0 || $i == 1): ?>
                <!-- Single Featured Post -->
                <div class="col-12">
                  <div class="single-blog-post featured-post mb-30">
                    <div class="post-thumb">
                      <a href="<?php echo base_url('blog/' . $blog[$i]['slug']); ?>">
                        <img src="<?php echo $blog[$i]['picture']; ?>" alt="<?php echo $blog[$i]['title']; ?>">
                      </a>
                    </div>
                    <div class="post-data">
                        <a href="<?php echo base_url('blog/category/' . $blog[$i]['category']); ?>" class="post-catagory">
                          <?php echo $blog[$i]['category']; ?>
                        </a>
                        <a href="<?php echo base_url('blog/'.$blog[$i]['slug']); ?>" class="post-title">
                          <h5><?php echo word_limiter($blog[$i]['title'], 20); ?></h5>
                        </a>
                        <div class="post-meta">
                          <p class="post-author">By
                            <a href="<?php echo $this->auth->editor(false) ? base_url('account/' . $blog[$i]['username']) : '#'; ?>">
                              <?php echo $this->account->get_account_name($blog[$i]); ?>
                            </a>
                          </p>
                          <p class="post-excerp"><?php echo word_limiter(strip_tags($blog[$i]['post']), 100); ?></p>
                          <!-- Post Like & Post Comment -->
                          <div class="d-flex align-items-center">
                            <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $blog[$i]['views']; ?></span></a>
                            <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $blog[$i]['comments']; ?></span></a>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              <?php else: ?>
                <!-- Single Featured Post -->
                <div class="col-md-6">
                  <div class="single-blog-post featured-post mb-30">
                    <div class="post-thumb">
                      <a href="<?php echo base_url('blog/' . $blog[$i]['slug']); ?>">
                        <img src="<?php echo $blog[$i]['picture']; ?>" alt="<?php echo $blog[$i]['title']; ?>">
                      </a>
                    </div>
                    <div class="post-data">
                      <a href="<?php echo base_url('blog/category/' . $blog[$i]['category']); ?>" class="post-catagory">
                        <?php echo $blog[$i]['category']; ?>
                      </a>
                      <a href="<?php echo base_url('blog/'.$blog[$i]['slug']); ?>" class="post-title">
                        <h5><?php echo word_limiter($blog[$i]['title'], 10); ?></h5>
                      </a>
                      <div class="post-meta">
                        <p class="post-author">By
                          <a href="<?php echo $this->auth->editor(false) ? base_url('account/' . $blog[$i]['username']) : '#'; ?>">
                            <?php echo $this->account->get_account_name($blog[$i]); ?>
                          </a>
                        </p>
                        <p class="post-excerp">
                          <?php echo word_limiter(strip_tags($blog[$i]['post']), 50); ?>
                        </p>
                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center">
                          <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $blog[$i]['views']; ?></span></a>
                          <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $blog[$i]['comments']; ?></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
            <?php if(count($blog) == 0): ?>
              <div class="alert alert-info alert-dismissible fade show col-12" role="alert">
                <h4 class="alert-heading">Ops Sorry!</h4>
                <p class="text-info">The are not result found under blog.</p>
                <hr>
                <p class="mb-0 text-info">Please check back later.</p>
              </div>
            <?php endif; ?>
          </div>

        </div>

        <nav aria-label="Pagination for news">
          <!-- ##### Pagination Link ##### -->
          <?php echo $this->pagination->create_links(); ?>
        </nav>
      </div>

      <div class="col-12 col-lg-4">
        <div class="blog-sidebar-area">

          <!-- Latest Posts Widget -->
          <div class="latest-posts-widget mb-50">

            <?php for($i = 0; $i < count($most_viewed_news); $i++): ?>
              <!-- Single Featured Post -->
              <div class="single-blog-post small-featured-post d-flex">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/' . $most_viewed_news[$i]['slug']); ?>">
                    <img src="<?php echo $most_viewed_news[$i]['picture']; ?>" alt="<?php echo $most_viewed_news[$i]['title']; ?>">
                  </a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/category/' . $most_viewed_news[$i]['category']); ?>" class="post-catagory">
                    <?php echo $most_viewed_news[$i]['category']; ?>
                  </a>
                  <div class="post-meta">
                    <a href="<?php echo base_url('news/' . $most_viewed_news[$i]['slug']); ?>" class="post-title">
                      <h6><?php echo word_limiter($most_viewed_news[$i]['title'], 15); ?></h6>
                    </a>
                    <p class="post-date">
                      <span class="fa fa-clock-o color"></span> <?php echo date('h:i A | F d', strtotime($most_viewed_news[$i]['date'])); ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php endfor; ?>

          </div>

          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget mt-5 mb-5 pt-4 pb-4">
              <h4 class="text-center color pb-2">Most Viewed Blog Post</h4>
              <?php for($i = 0; $i < (count($most_viewed) > 5 ? 5 : count($most_viewed)); $i++): ?>
                <!-- Single Comments -->
                <div class="single-comments d-flex">
                    <div class="comments-thumbnail mr-15">
                        <img src="<?php echo $most_viewed[$i]['picture']; ?>" alt="<?php echo $most_viewed[$i]['title']; ?>">
                    </div>
                    <div class="comments-text">
                        <a href="<?php echo base_url('blog/' . $most_viewed[$i]['slug']); ?>">
                          <?php echo word_limiter($most_viewed[$i]['title'], 10); ?>
                        </a>
                        <p><?php echo date('h:i a, F d, Y', strtotime($most_viewed[$i]['date'])); ?></p>
                    </div>
                </div>
              <?php endfor; ?>
          </div>

          <!-- Newsletter Widget -->
          <?php $this->load->view('template/newsletter'); ?>

          <!-- Popular News Widget -->
          <div class="popular-news-widget mb-50 pt-4 pb-4 mt-5">
            <h4 class="text-center color pb-3"><?php echo count($most_commented); ?> Most Commented Blog Post</h4>

            <?php for($i = 0; $i < count($most_commented); $i++): ?>
              <!-- Single Popular Blog -->
              <div class="single-popular-post">
                <a href="<?php echo base_url('blog/' . $most_commented[$i]['slug']); ?>">
                  <h6>
                    <span><?php echo $i+1; ?>.</span> <?php echo word_limiter($most_commented[$i]['title'], 15); ?>
                  </h6>
                </a>
                <p><?php echo date('F d, Y', strtotime($most_commented[$i]['date'])); ?></p>
              </div>
            <?php endfor; ?>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->
