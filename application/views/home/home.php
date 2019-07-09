<?php
// Page Work OuterIterator
# latest news (print three news in detail)
$latest = array_splice($latest_news, 0, 3);
# side bar news
$sidebar_news = array_splice($latest_news, 0, 6);
# news form rest api (South African Latest News)
$news_south_africa = array();
# news form rest api (Internation News)
$news_international = array(); ?>
<!-- ##### Featured Post Area Start ##### -->
<div class="featured-post-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-8 mb-4">
        <div class="row">
          <!-- Single Featured Post -->
          <?php for($i = 0; $i < (count($latest ?? array()) >= 1 ? 1 : 0); $i++): ?>
            <div class="col-12 col-lg-7">
              <div class="single-blog-post featured-post">
                  <div class="post-thumb">
                      <a href="#"><img src="<?php echo base_url('assets/default/img/bg-img/16.jpg'); ?>" alt=""></a>
                  </div>
                  <div class="post-data">
                      <a href="#" class="post-catagory"><?php echo $latest[$i]['category']; ?></a>
                      <a href="#" class="post-title">
                          <h6><?php echo word_limiter($latest[$i]['title'], 10); ?></h6>
                      </a>
                      <div class="post-meta">
                          <p class="post-author">By <a href="#">Christinne Williams</a></p>
                          <p class="post-excerp"><?php echo word_limiter(strip_tags($latest[$i]['post']), 40); ?></p>
                          <!-- Post Like & Post Comment -->
                          <div class="d-flex align-items-center">
                              <a href="#" class="post-like"><i class="fa fa-eye color"></i> <span>392</span></a>
                              <a href="#" class="post-comment"><i class="fa fa-comments color"></i> <span>10</span></a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
            <div class="col-12 col-lg-5">
              <?php for($i = 1; $i < (count($latest) >= 3 ? 3 : count($latest)); $i++): ?>
              <!-- Single Featured Post -->
              <div class="single-blog-post featured-post-2">
                <div class="post-thumb">
                  <a href="#"><img src="<?php echo base_url('assets/default/img/bg-img/17.jpg'); ?>" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="#" class="post-catagory"><?php echo $sidebar_news[$i]['category']; ?></a>
                  <div class="post-meta">
                    <a href="#" class="post-title">
                      <h6><?php echo word_limiter($latest[$i]['title'], 15); ?></h6>
                    </a>
                    <!-- Post Like & Post Comment -->
                    <div class="d-flex align-items-center">
                      <a href="#" class="post-like"><i class="fa fa-eye color"></i> <span>392</span></a>
                      <a href="#" class="post-comment"><i class="fa fa-comments color"></i> <span>10</span></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 pb-4">
            <!-- Single Featured Post -->
            <?php for($i = 1; $i < (count($sidebar_news) >= 6 ? 6 : count($sidebar_news)); $i++): ?>
              <div class="single-blog-post small-featured-post d-flex">
                  <div class="post-thumb">
                      <a href="#"><img src="<?php echo base_url('assets/default/img/bg-img/19.jpg'); ?>" alt="<?php echo $sidebar_news[$i]['title']; ?>"></a>
                  </div>
                  <div class="post-data">
                      <a href="#" class="post-catagory"><?php echo $sidebar_news[$i]['category']; ?></a>
                      <div class="post-meta">
                          <a href="#" class="post-title">
                              <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                          </a>
                          <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                      </div>
                  </div>
              </div>
            <?php endfor; ?>
        </div>
    </div>
  </div>
</div>
<!-- ##### Featured Post Area End ##### -->
