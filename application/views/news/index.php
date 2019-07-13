<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
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
                      <a href="#"><img src="<?php echo $news[$i]['picture']; ?>" alt="<?php echo $news[$i]['title']; ?>"></a>
                    </div>
                    <div class="post-data">
                        <a href="<?php echo base_url('news/category/' . $news[$i]['category']); ?>" class="post-catagory">
                          <?php echo $news[$i]['category']; ?>
                        </a>
                        <a href="<?php echo base_url('news/'.$news[$i]['slug']); ?>" class="post-title">
                          <h5><?php echo word_limiter($news[$i]['title'], 10); ?></h5>
                        </a>
                        <div class="post-meta">
                          <p class="post-author">By <a href="#"><?php echo $this->account->get_account_name($news[$i]); ?></a></p>
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
                      <a href="#"><img src="<?php echo $news[$i]['picture']; ?>" alt="<?php echo $news[$i]['title']; ?>"></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">
                          <?php echo $news[$i]['category']; ?>
                        </a>
                        <a href="<?php echo base_url('news/'.$news[$i]['slug']); ?>" class="post-title">
                          <h5><?php echo word_limiter($news[$i]['title'], 10); ?></h5>
                        </a>
                        <div class="post-meta">
                            <p class="post-author">By <a href="#"><?php echo $this->account->get_account_name($news[$i]); ?></a></p>
                            <p class="post-excerp"><?php echo word_limiter(strip_tags($news[$i]['post']), 50); ?></p>
                            <!-- Post Like & Post Comment -->
                            <div class="d-flex align-items-center">
                                <a href="#" class="post-like"><i class="fa fa-comments-o"></i> <span>392</span></a>
                                <a href="#" class="post-comment"><i class="fa fa-eye"></i> <span>10</span></a>
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

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="img/bg-img/19.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">Finance</a>
                        <div class="post-meta">
                            <a href="#" class="post-title">
                                <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="img/bg-img/20.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">Politics</a>
                        <div class="post-meta">
                            <a href="#" class="post-title">
                                <h6>Sed a elit euismod augue semper congue sit amet ac sapien.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="img/bg-img/21.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">Health</a>
                        <div class="post-meta">
                            <a href="#" class="post-title">
                                <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="img/bg-img/22.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">Finance</a>
                        <div class="post-meta">
                            <a href="#" class="post-title">
                                <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="img/bg-img/23.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">Travel</a>
                        <div class="post-meta">
                            <a href="#" class="post-title">
                                <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Post -->
                <div class="single-blog-post small-featured-post d-flex">
                    <div class="post-thumb">
                        <a href="#"><img src="img/bg-img/24.jpg" alt=""></a>
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">Politics</a>
                        <div class="post-meta">
                            <a href="#" class="post-title">
                                <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Popular News Widget -->
          <div class="popular-news-widget mb-50">
              <h3>4 Most Popular News</h3>

              <!-- Single Popular Blog -->
              <div class="single-popular-post">
                  <a href="#">
                      <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                  </a>
                  <p>April 14, 2018</p>
              </div>

              <!-- Single Popular Blog -->
              <div class="single-popular-post">
                  <a href="#">
                      <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                  </a>
                  <p>April 14, 2018</p>
              </div>

              <!-- Single Popular Blog -->
              <div class="single-popular-post">
                  <a href="#">
                      <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                  </a>
                  <p>April 14, 2018</p>
              </div>

              <!-- Single Popular Blog -->
              <div class="single-popular-post">
                  <a href="#">
                      <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                  </a>
                  <p>April 14, 2018</p>
              </div>
          </div>

          <!-- Newsletter Widget -->
          <div class="newsletter-widget mb-50">
              <h4>Newsletter</h4>
              <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
              <form action="#" method="post">
                  <input type="text" name="text" placeholder="Name">
                  <input type="email" name="email" placeholder="Email">
                  <button type="submit" class="btn w-100">Subscribe</button>
              </form>
          </div>

          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget">
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
