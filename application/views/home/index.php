<?php
// Page Work Out Position
$display_news         = array_splice($latest_news, 0, 2);
$dsiplay_summary_news = array_splice($latest_news, 0, 3);
$sidebar_news         = array_splice($latest_news, 0, 8);
// End Page Work Out
?>
<!-- ##### Featured Post Area Start ##### -->
<div class="featured-post-area">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-8 mb-4">
        <div class="row">
          <!-- Single Featured Post -->

          <div class="col-12 col-lg-7">
            <?php for($i = 0; $i < (count($display_news ?? array()) >= 2 ? 2 : count($display_news)); $i++): ?>
              <div class="single-blog-post featured-post">
                  <div class="post-thumb">
                      <a href="<?php echo base_url("news/{$display_news[$i]['slug']}"); ?>">
                        <img src="<?php echo $display_news[$i]['picture']; ?>" alt="<?php echo $display_news[$i]['title']; ?>">
                      </a>
                  </div>
                  <div class="post-data">
                      <a href="<?php echo base_url("news/category/{$display_news[$i]['category']}"); ?>" class="post-catagory">
                        <?php echo $display_news[$i]['category']; ?>
                      </a>
                      <a href="<?php echo base_url("news/{$display_news[$i]['slug']}"); ?>" class="">
                          <h4><?php echo word_limiter($display_news[$i]['title'], 10); ?></h4>
                      </a>
                      <div class="post-meta">
                          <p class="post-author">By
                            <a href="<?php echo $this->auth->editor(false) ? base_url('account/' . $display_news[$i]['username']) : '#'; ?>">
                              <?php echo $this->account->get_account_name($display_news[$i]); ?>
                            </a>
                          </p>
                          <p class="post-excerp"><?php echo word_limiter(strip_tags($display_news[$i]['post']), 40); ?></p>
                          <!-- Post Like & Post Comment -->
                          <div class="d-flex align-items-center">
                              <a class="post-like"><i class="fa fa-eye color"></i> <span><?php echo $display_news[$i]['views'] ?></span></a>
                              <a class="post-comment"><i class="fa fa-comments color"></i> <span><?php echo $display_news[$i]['comments']; ?></span></a>
                          </div>
                      </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
            <div class="col-12 col-lg-5">
              <?php for($i = 0; $i < count($dsiplay_summary_news); $i++): ?>
              <!-- Single Featured Post -->
              <div class="single-blog-post featured-post-2">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/'.$dsiplay_summary_news[$i]['slug']); ?>">
                    <img src="<?php echo $dsiplay_summary_news[$i]['picture']; ?>" alt="<?php echo $dsiplay_summary_news[$i]['title']; ?>">
                  </a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/category/'.$dsiplay_summary_news[$i]['category']); ?>" class="post-catagory">
                    <?php echo $dsiplay_summary_news[$i]['category']; ?>
                  </a>
                  <div class="post-meta">
                    <a href="<?php echo base_url('news/'.$dsiplay_summary_news[$i]['slug']); ?>" class="post-title">
                      <h6><?php echo word_limiter($dsiplay_summary_news[$i]['title'], 15); ?></h6>
                    </a>
                    <!-- Post Like & Post Comment -->
                    <div class="d-flex align-items-center">
                      <a class="post-like"><i class="fa fa-eye color"></i> <span><?php echo $dsiplay_summary_news[$i]['views'] ?></span></a>
                      <a class="post-comment"><i class="fa fa-comments color"></i> <span><?php echo $dsiplay_summary_news[$i]['comments']; ?></span></a>
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
            <?php for($i = 0; $i < count($sidebar_news); $i++): ?>
              <div class="single-blog-post small-featured-post d-flex">
                  <div class="post-thumb">
                      <a href="<?php echo base_url('news/'.$sidebar_news[$i]['slug']); ?>">
                        <img src="<?php echo $sidebar_news[$i]['picture']; ?>" alt="<?php echo $sidebar_news[$i]['title']; ?>">
                      </a>
                  </div>
                  <div class="post-data">
                      <a href="<?php echo base_url('news/category/' . $sidebar_news[$i]['category']); ?>" class="post-catagory">
                        <?php echo $sidebar_news[$i]['category']; ?>
                      </a>
                      <div class="post-meta">
                          <a href="<?php echo base_url('news/'.$sidebar_news[$i]['slug']); ?>" class="post-title">
                              <h6><?php echo word_limiter($sidebar_news[$i]['title'], 10); ?></h6>
                          </a>
                          <p class="post-date"><span class="fa fa-clock-o color"></span> <?php echo date('h:i A | F d', strtotime($sidebar_news[$i]['date'])); ?></p>
                      </div>
                  </div>
              </div>
            <?php endfor; ?>
            <!-- Newsletter Widget -->
            <?php $this->load->view('template/newsletter'); ?>
        </div>
        <div class="col-12 pb-5">
          <nav aria-label="Home Pagination">
            <?php echo $this->pagination->create_links(); ?>
          </nav>
        </div>
    </div>
  </div>
</div>
<!-- ##### Featured Post Area End ##### -->

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

<!-- ##### Editorial Post Area Start ##### -->
<div class="editors-pick-post-area section-padding-80-50">
  <div class="container">
    <div class="row">
      <!-- South African News -->
      <div class="col-12 col-md-7 col-lg-9">
          <div class="section-heading">
              <h6><span class="fa fa-flag"></span> South Africa News</h6>
          </div>
          <div class="row">
          <?php if(is_array($local_news)): ?>
            <?php for($i = 0; $i < count($local_news); $i++): ?>
              <!-- Single Post -->
              <div class="col-12 col-lg-4">
                <div class="single-blog-post">
                  <div class="post-thumb">
                    <a href="<?php echo $local_news[$i]['url']; ?>" target="_blank">
                      <img src="<?php echo $local_news[$i]['urlToImage']; ?>" alt="<?php echo $local_news[$i]['title']; ?>">
                    </a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo $local_news[$i]['url']; ?>" class="post-title" target="_blank">
                      <h6><?php echo word_limiter($local_news[$i]['title'], 10); ?></h6>
                    </a>
                    <div class="post-meta">
                      <div class="post-date"><a href="#"><?php echo date('F d, Y',strtotime($local_news[$i]['publishedAt'])); ?></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if(($i+1) % 3 == 0 && $i != (9-1)): ?>
                <div class="col-12 text-center pt-1 pb-5">
                  <div class="footer-add">
                    <a href="#">
                      <img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/holy.gif'); ?>" alt="">
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
          <?php else: ?>
            <p class="text-danger">
              <strong><i class="fa fa-close"></i> Something went wrong when tring to get South African popular news.</strong>
            </p>
          <?php endif; ?>
          </div>
      </div>
      <!-- World News -->
      <div class="col-12 col-md-5 col-lg-3">
        <div class="section-heading">
          <h6><span class="fa fa-football"></span> Sport</h6>
        </div>
        <?php if($sport_news !== false): ?>
          <?php for($i = 0; $i < count($sport_news); $i++): ?>
            <!-- Single Post -->
            <div class="single-blog-post style-2">
              <div class="post-thumb">
                <a href="<?php echo $sport_news[$i]['url']; ?>" target="_blank">
                  <img src="<?php echo $sport_news[$i]['urlToImage']; ?>" alt="<?php echo $sport_news[$i]['urlToImage']; ?>">
                </a>
              </div>
              <div class="post-data">
                <a href="<?php echo $sport_news[$i]['url']; ?>" class="post-title" target="_blank">
                  <h6><?php echo word_limiter($sport_news[$i]['title'], 10); ?></h6>
                </a>
                <div class="post-meta">
                  <div class="post-date"><a href="#"><?php echo date('F d, Y',strtotime($local_news[$i]['publishedAt'])); ?></a></div>
                </div>
              </div>
            </div>
            <?php if(($i+1) % 3 == 0 && $i != (5-1)): ?>
              <div class="col-12 text-center pt-1 pb-4">
                <div class="footer-add">
                  <a href="#">
                    <img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/front-banner.jpg'); ?>" alt="">
                  </a>
                </div>
              </div>
            <?php endif; ?>
          <?php endfor; ?>
        <?php else: ?>
          <p class="text-danger"><strong><i class="fa fa-close"></i> Something went wrong when tring to get SPORT news.</strong></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- ##### Editorial Post Area End ##### -->
