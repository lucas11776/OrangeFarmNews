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


<!-- ##### Reply Comment Model Start ##### -->
<div class="modal fade" id="reply-comment-model" tabindex="-1" role="dialog" aria-labelledby="reply-comment-model" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Reply <span class="fa fa-comments-o color"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="post-a-comment-area pt-0 pb-0">
            <!-- Reply Form -->
            <div class="contact-form-area">
                <?php echo form_open('blog/comment/reply?r=' . uri_string()); ?>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="redirect" value="<?php echo uri_string(); ?>">
                            <input type="hidden" name="comment_id" class="comment-reply-id">
                            <input type="hidden" name="blog_id" value="<?php echo $single_blog['id']; ?>">
                            <textarea name="comment"
                                      class="form-control"
                                      id="message"
                                      cols="30"
                                      rows="10"
                                      placeholder="Reply to comment..."></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn newspaper-btn w-100" type="submit"><span class="fa fa-reply"></span> Reply</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Reply Comment Model End ##### -->

<!-- ##### Delete Comment Model Start ##### -->
<div class="modal fade" id="delete-comment-model" tabindex="-1" role="dialog" aria-labelledby="News comment confirmation model" aria-hidden="true">
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

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80 pt-2">
  <div class="container">
    <div class="row">

      <div class="col-12 col-lg-8">

          <div class="blog-posts-area">

            <!-- Single Featured Post -->
            <div class="single-blog-post featured-post single-post">
              <div class="post-thumb" style="height: auto;">
                  <a><img class="single" style="height: auto;" src="<?php echo $single_blog['picture']; ?>" alt="<?php echo $single_blog['title']; ?>"></a>
              </div>
              <div class="post-data">
                <a href="#" class="post-catagory">
                  <?php echo $single_blog['category']; ?>
                </a>
                <a class="post-title">
                    <h1><?php echo $single_blog['title']; ?> </h1>
                </a>
                <div class="post-meta">
                    <p class="post-author">By
                      <a href="<?php echo base_url('account/' . $single_blog['username']); ?>">
                        <?php echo $this->account->get_account_name($single_blog); ?>
                      </a>
                    </p>
                    <div class="news-post">
                      <?php echo $single_blog['post']; ?>
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
                            <a class="post-like"><i class="fa fa-eye color"></i> <span><?php echo $single_blog['views']; ?></span></a>
                            <a class="post-comment"><i class="fa fa-comments-o color"></i> <span><?php echo $single_blog['comments']; ?></span></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- About Author -->
            <div class="blog-post-author d-flex">
                <div class="author-thumbnail">
                    <img src="<?php echo $single_blog['profile_picture']; ?>" alt="<?php echo $this->account->get_account_name($single_blog); ?>">
                </div>
                <div class="author-info">
                    <a href="<?php echo $this->auth->editor(false) ? base_url('account/' . $single_blog['username']) : '#'; ?>" class="author-name">
                      <?php echo $this->account->get_account_name($single_blog); ?>, <span>The Author</span>
                    </a>
                    <p>
                      <i class="fa fa-key"></i> <strong class="color">Account Type :</strong>
                      <strong class="text-muted"><?php echo strtoupper($this->account::ROLE[$single_blog['role']]); ?></strong>
                    </p>
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

              <!-- ####### PRINT NEW COMMENTS ######## -->
              <?php $this->comments_view->view($comments); ?>

              <div class="post-a-comment-area section-padding-80-0">
                  <h4>Leave a comment</h4>
                  <?php if($this->auth->user(false)): ?>
                    <!-- Reply Form -->
                    <div class="contact-form-area">
                        <?php echo form_open('blog/comment'); ?>
                            <input type="hidden" name="redirect" value="<?php echo uri_string(); ?>">
                            <input type="hidden"
                                   name="blog_id"
                                   value="<?php echo $single_blog['id']; ?>">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="comment"
                                              class="form-control"
                                              id="message"
                                              cols="30"
                                              rows="10"
                                              placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                  <?php else: ?>
                    <div class="alert alert-info col-12" role="alert">
                      <h4 class="alert-heading text-info">Want to express your comment!</h4>
                      <p class="text-info">Join the <span class="fa fa-users"></span> community by becoming a member.</p>
                      <hr>
                      <p class="mb-0">
                        <a class="color" href="<?php echo base_url('register?r=' . uri_string()); ?>"><i class="fa fa-edit"></i> <strong>Register</strong></a>
                        or <a class="color" href="<?php echo base_url('login?r=' . uri_string()); ?>"><i class="fa fa-user-o"></i> <strong>Login</strong></a>
                      </p>
                    </div>
                  <?php endif; ?>
              </div>
          </div>
      </div>

      <div class="col-12 col-lg-4">
          <div class="blog-sidebar-area">

              <!-- Latest Posts Widget -->
              <div class="latest-posts-widget mb-50">

                  <?php for($i = 0; $i < count($latest_blog); $i++): ?>
                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="<?php echo base_url('news/' . $latest_blog[$i]['slug']); ?>">
                              <img src="<?php echo $latest_blog[$i]['picture']; ?>" alt="<?php echo $latest_blog[$i]['title']; ?>">
                            </a>
                        </div>
                        <div class="post-data">
                            <a href="<?php echo base_url('news/category/' . $latest_blog[$i]['category']); ?>" class="post-catagory">
                              <?php echo $latest_blog[$i]['category']; ?>
                            </a>
                            <div class="post-meta">
                                <a href="<?php echo base_url('news/' . $latest_blog[$i]['slug']); ?>" class="post-title">
                                    <h6><?php echo word_limiter($latest_blog[$i]['title'], 15); ?></h6>
                                </a>
                                <p class="post-date"><?php echo date('h:i A | F d', strtotime($latest_blog[$i]['date'])); ?></p>
                            </div>
                        </div>
                    </div>
                  <?php endfor; ?>

              </div>

              <!-- ##### Advert ##### -->
              <div class="col-12 text-center pt-0 pb-5">
                  <div class="footer-add">
                    <a href="#"><img class="advert advert-wide" src="<?php echo base_url('uploads/adverts/front-banner.jpg'); ?>" alt=""></a>
                  </div>
              </div>

              <!-- Popular News Widget -->
              <div class="popular-news-widget mb-50 pt-4 pb-5">
                  <h3 class="text-center">Popular Blog Post</h3>

                  <?php for($i = 0; $i < count($most_viewed); $i++): ?>
                    <!-- Single Popular Blog -->
                    <div class="single-popular-post">
                        <a href="<?php echo base_url('blog/' . $most_viewed[$i]['slug']); ?>">
                            <h6>
                              <span><?php echo $i+1; ?>.</span> <?php echo word_limiter($most_viewed[$i]['title'], 15); ?>
                            </h6>
                        </a>
                        <p><?php echo date('h:i a F d, Y', strtotime($most_viewed[$i]['date'])); ?></p>
                        <!-- <p>April 14, 2018</p> -->
                    </div>
                  <?php endfor; ?>

              </div>

              <!-- Newsletter Widget -->
              <?php $this->load->view('template/newsletter'); ?>

          </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->
