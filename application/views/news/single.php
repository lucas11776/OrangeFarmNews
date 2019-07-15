<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
  <div class="container">
    <div class="row">

      <div class="col-12 col-lg-8">
          <div class="blog-posts-area">

            <!-- Single Featured Post -->
            <div class="single-blog-post featured-post single-post">
              <div class="post-thumb">
                  <a><img class="single" src="<?php echo base_url('assets/default/img/bg-img/25.jpg'); ?>" alt=""></a>
              </div>
              <div class="post-data">
                <a href="#" class="post-catagory">
                  <?php echo $single_news['category']; ?>
                </a>
                <a class="post-title">
                    <h1><?php echo $single_news['title']; ?> </h1>
                </a>
                <div class="post-meta">
                    <p class="post-author">By <a href="#">Christinne Williams</a></p>
                    <div class="news-post">
                      <?php echo $single_news['post']; ?>
                    </div>
                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                        <!-- Tags -->
                        <div class="newspaper-tags d-flex">
                            <span>News Category:</span>
                            <ul class="d-flex">
                              <?php for($i = 0; $i < 6; $i++): ?>
                                <li>
                                  <?php if(5 != $i): ?>
                                    <a href="<?php echo base_url('news/category/'.$this->news::CATEGORY[$i]); ?>">
                                      <?php echo $this->news::CATEGORY[$i]; ?>,
                                    </a>
                                  <?php else: ?>
                                    <a href="<?php echo base_url('news/category/'.$this->news::CATEGORY[$i]); ?>">
                                      <?php echo $this->news::CATEGORY[$i]; ?>
                                    </a>
                                  <?php endif; ?>
                                </li>
                              <?php endfor; ?>
                            </ul>
                        </div>

                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center post-like--comments">
                            <a class="post-like"><i class="fa fa-eye color"></i> <span>392</span></a>
                            <a class="post-comment"><i class="fa fa-comments-o color"></i> <span>10</span></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- About Author -->
            <div class="blog-post-author d-flex">
                <div class="author-thumbnail">
                    <img src="img/bg-img/32.jpg" alt="">
                </div>
                <div class="author-info">
                    <a href="#" class="author-name">James Smith, <span>The Author</span></a>
                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                </div>
            </div>

            <div class="section-heading pt-5">
                <h6><span class="fa fa-flag"></span> South Africa Latest</h6>
            </div>

              <div class="row">
                <?php for($i = 0; $i < 2; $i++): ?>
                  <!-- Single Post -->
                  <div class="col-12 col-md-6">
                      <div class="single-blog-post style-3 mb-80">
                          <div class="post-thumb">
                              <a href="#"><img src="<?php echo base_url('assets/default/img/bg-img/12.jpg'); ?>" alt=""></a>
                          </div>
                          <div class="post-data">
                              <a href="#" class="post-catagory">Finance</a>
                              <a href="#" class="post-title">
                                  <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                              </a>
                              <div class="post-meta d-flex align-items-center">
                                  <a href="#" class="post-like"><i class="fa fa-comments-o"></i> <span>392</span></a>
                                  <a href="#" class="post-comment"><i class="fa fa-eye"></i> <span>10</span></a>
                              </div>
                          </div>
                      </div>
                  </div>
                <?php endfor; ?>
              </div>

              <!-- Comment Area Start -->
              <div class="comment_area clearfix">
                  <h5 class="title">3 Comments</h5>

                  <ol>
                      <!-- Single Comment Area -->
                      <li class="single_comment_area">
                          <!-- Comment Content -->
                          <div class="comment-content d-flex">
                              <!-- Comment Author -->
                              <div class="comment-author">
                                  <img src="<?php echo base_url('assets/default/img/bg-img/30.jpg'); ?>" alt="author">
                              </div>
                              <!-- Comment Meta -->
                              <div class="comment-meta">
                                  <a href="#" class="post-author">Christian Williams</a>
                                  <a href="#" class="post-date">April 15, 2018</a>
                                  <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                              </div>
                          </div>
                          <ol class="children">
                              <li class="single_comment_area">
                                  <!-- Comment Content -->
                                  <div class="comment-content d-flex">
                                      <!-- Comment Author -->
                                      <div class="comment-author">
                                          <img src="<?php echo base_url('assets/default/img/bg-img/31.jpg'); ?>" alt="author">
                                      </div>
                                      <!-- Comment Meta -->
                                      <div class="comment-meta">
                                          <a href="#" class="post-author">Sandy Doe</a>
                                          <a href="#" class="post-date">April 15, 2018</a>
                                          <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                      </div>
                                  </div>
                              </li>
                          </ol>
                      </li>

                      <!-- Single Comment Area -->
                      <li class="single_comment_area">
                          <!-- Comment Content -->
                          <div class="comment-content d-flex">
                              <!-- Comment Author -->
                              <div class="comment-author">
                                  <img src="<?php echo base_url('assets/default/img/bg-img/32.jpg'); ?>" alt="author">
                              </div>
                              <!-- Comment Meta -->
                              <div class="comment-meta">
                                  <a href="#" class="post-author">Christian Williams</a>
                                  <a href="#" class="post-date">April 15, 2018</a>
                                  <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                              </div>
                          </div>
                      </li>
                  </ol>
              </div>

              <div class="post-a-comment-area section-padding-80-0">
                  <h4>Leave a comment</h4>

                  <!-- Reply Form -->
                  <div class="contact-form-area">
                      <form action="#" method="post">
                          <div class="row">
                              <div class="col-12">
                                  <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                              </div>
                              <div class="col-12 text-center">
                                  <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-12 col-lg-4">
          <div class="blog-sidebar-area">

              <!-- Latest Posts Widget -->
              <div class="latest-posts-widget mb-50">

                  <?php for($i = 0; $i < 8; $i++): ?>
                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#">
                              <img src="<?php echo base_url('assets/default/img/bg-img/19.jpg'); ?>" alt="">
                            </a>
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
                  <?php endfor; ?>

              </div>

              <!-- Popular News Widget -->
              <div class="popular-news-widget mb-50 pt-4 pb-5">
                  <h3 class="text-center">Popular News</h3>

                  <?php for($i = 0; $i < 5; $i++): ?>
                    <!-- Single Popular Blog -->
                    <div class="single-popular-post">
                        <a href="#">
                            <h6>
                              <span><?php echo $i+1; ?>.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.
                            </h6>
                        </a>
                        <p>April 14, 2018</p>
                    </div>
                  <?php endfor; ?>

              </div>

              <!-- Newsletter Widget -->
              <?php $this->load->view('template/newsletter'); ?>

              <!-- Latest Comments Widget -->
              <div class="latest-comments-widget mt-5 pt-4 pb-5">
                  <h3 class="text-center color">Latest Blog Post</h3>

                  <?php for($i = 0; $i < 5; $i++): ?>
                    <!-- Single Comments -->
                    <div class="single-comments d-flex">
                        <div class="comments-thumbnail mr-15">
                            <img src="<?php echo base_url('assets/default/img/bg-img/29.jpg'); ?>" alt="">
                        </div>
                        <div class="comments-text">
                            <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                            <p>06:34 am, April 14, 2018</p>
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
