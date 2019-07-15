<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80 pt-2">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="blog-posts-area">

          <div class="row">
            <?php for($i = 0; $i < count($news); $i++): ?>
              <?php if($i == 0 || $i == 1): ?>
                <!-- Single Featured Post -->
                <div class="col-12">
                  <div class="single-blog-post featured-post mb-30">
                    <div class="post-thumb">
                      <a href="<?php echo base_url('news/' . $news[$i]['slug']); ?>">
                        <img src="<?php echo $news[$i]['picture']; ?>" alt="<?php echo $news[$i]['title']; ?>">
                      </a>
                    </div>
                    <div class="post-data">
                        <a href="<?php echo base_url('news/category/' . $news[$i]['category']); ?>" class="post-catagory">
                          <?php echo $news[$i]['category']; ?>
                        </a>
                        <a href="<?php echo base_url('news/'.$news[$i]['slug']); ?>" class="post-title">
                          <h5><?php echo word_limiter($news[$i]['title'], 10); ?></h5>
                        </a>
                        <div class="post-meta">
                          <p class="post-author">By
                            <a href="<?php echo $this->auth->editor(false) ? base_url('account/' . $news[$i]['username']) : '#'; ?>">
                              <?php echo $this->account->get_account_name($news[$i]); ?>
                            </a>
                          </p>
                          <p class="post-excerp"><?php echo word_limiter(strip_tags($news[$i]['post']), 100); ?></p>
                          <!-- Post Like & Post Comment -->
                          <div class="d-flex align-items-center">
                            <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $news[$i]['views']; ?></span></a>
                            <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $news[$i]['comments']; ?></span></a>
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
                      <a href="<?php echo base_url('news/' . $news[$i]['slug']); ?>">
                        <img src="<?php echo $news[$i]['picture']; ?>" alt="<?php echo $news[$i]['title']; ?>">
                      </a>
                    </div>
                    <div class="post-data">
                      <a href="<?php echo base_url('news/category/' . $news[$i]['category']); ?>" class="post-catagory">
                        <?php echo $news[$i]['category']; ?>
                      </a>
                      <a href="<?php echo base_url('news/'.$news[$i]['slug']); ?>" class="post-title">
                        <h5><?php echo word_limiter($news[$i]['title'], 10); ?></h5>
                      </a>
                      <div class="post-meta">
                        <p class="post-author">By
                          <a href="<?php echo $this->auth->editor(false) ? base_url('account/' . $news[$i]['username']) : '#'; ?>">
                            <?php echo $this->account->get_account_name($news[$i]); ?>
                          </a>
                        </p>
                        <p class="post-excerp">
                          <?php echo word_limiter(strip_tags($news[$i]['post']), 50); ?>
                        </p>
                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center">
                          <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $news[$i]['views']; ?></span></a>
                          <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $news[$i]['comments']; ?></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
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

            <?php for($i = 0; $i < count($most_viewed); $i++): ?>
              <!-- Single Featured Post -->
              <div class="single-blog-post small-featured-post d-flex">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/' . $most_viewed[$i]['slug']); ?>">
                    <img src="<?php echo $most_viewed[$i]['picture']; ?>" alt="<?php echo $most_viewed[$i]['title']; ?>">
                  </a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/category/' . $most_viewed[$i]['category']); ?>" class="post-catagory">
                    <?php echo $most_viewed[$i]['category']; ?>
                  </a>
                  <div class="post-meta">
                    <a href="<?php echo base_url($most_viewed[$i]['slug']); ?>" class="post-title">
                      <h6><?php echo word_limiter($most_viewed[$i]['title'], 15); ?></h6>
                    </a>
                    <p class="post-date"><span class="fa fa-clock-o color"></span> <?php echo date('h:i A | F d', strtotime($most_viewed[$i]['date'])); ?></p>
                  </div>
                </div>
              </div>
            <?php endfor; ?>

          </div>

          <!-- Popular News Widget -->
          <div class="popular-news-widget mb-50 pt-4 pb-4">
            <h4 class="text-center color pb-3"><?php echo count($most_commented); ?> Most Commented News</h4>

            <?php for($i = 0; $i < count($most_commented); $i++): ?>
              <!-- Single Popular Blog -->
              <div class="single-popular-post">
                <a href="<?php echo base_url('news/' . $most_commented[$i]['slug']); ?>">
                  <h6>
                    <span><?php echo $i+1; ?>.</span> <?php echo word_limiter($most_commented[$i]['title'], 15); ?>
                  </h6>
                </a>
                <p><?php echo date('F d, Y', strtotime($most_viewed[$i]['date'])); ?></p>
              </div>
            <?php endfor; ?>

          </div>

          <!-- Newsletter Widget -->
          <?php $this->load->view('template/newsletter'); ?>

          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget mt-5">
              <h3>Latest Comments</h3>

              <!-- Single Comments -->
              <div class="single-comments d-flex">
                  <div class="comments-thumbnail mr-15">
                      <img src="img/bg-img/29.jpg" alt="">
                  </div>
                  <div class="comments-text">
                      <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                      <p>06:34 am, April 14, 2018</p>
                  </div>
              </div>

              <!-- Single Comments -->
              <div class="single-comments d-flex">
                  <div class="comments-thumbnail mr-15">
                      <img src="img/bg-img/30.jpg" alt="">
                  </div>
                  <div class="comments-text">
                      <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                      <p>06:34 am, April 14, 2018</p>
                  </div>
              </div>

              <!-- Single Comments -->
              <div class="single-comments d-flex">
                  <div class="comments-thumbnail mr-15">
                      <img src="img/bg-img/31.jpg" alt="">
                  </div>
                  <div class="comments-text">
                      <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                      <p>06:34 am, April 14, 2018</p>
                  </div>
              </div>

              <!-- Single Comments -->
              <div class="single-comments d-flex">
                  <div class="comments-thumbnail mr-15">
                      <img src="img/bg-img/32.jpg" alt="">
                  </div>
                  <div class="comments-text">
                      <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                      <p>06:34 am, April 14, 2018</p>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->
