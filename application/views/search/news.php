<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12 pt-5 pb-4">
        <hr/>
        <?php echo form_open('search', array('method' => 'GET')); ?>
          <div class="form-row align-items-center">
            <input type="hidden" name="term" value="<?php echo $this->input->get('term'); ?>">
            <div class="col-auto">
              <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="type"
                       id="inlineRadio1"
                       value="news"
                       <?php if(strtolower($this->input->get('type')) == 'news' || $this->input->get('type') == '') echo 'checked'; ?>>
                <label class="form-check-label" for="inlineRadio1">News</label>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-check form-check-inline">
                <input class="form-check-input"
                       type="radio"
                       name="type"
                       id="inlineRadio2"
                       value="blog"
                       <?php if(strtolower($this->input->get('type')) == 'blog') echo 'checked'; ?>>
                <label class="form-check-label" for="inlineRadio2">Blog</label>
              </div>
            </div>
            <div class="col-auto">
              <button class="btn bg-color" type="submit"><span class="fa fa-retweet"></span> switch search</button>
            </div>
          </div>
        <?php echo form_close(); ?>
        <hr/>
      </div>
      <div class="col-12 col-lg-8">

        <div class="">
          <!-- Single Featured Post -->
          <div class="row">
            <?php for($i = 0; $i < count($search_result); $i++): ?>
              <?php if($i == 0): ?>
                <div class="single-blog-post featured-post mb-30 col-lg-12">
                  <div class="post-thumb">
                     <a href="<?php echo base_url('news/'.$search_result[$i]['slug']); ?>">
                       <img src="<?php echo $search_result[$i]['picture']; ?>" alt="<?php echo $search_result[$i]['title']; ?>">
                     </a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo base_url('news/category/'.$search_result[$i]['category']); ?>" class="post-catagory">
                      <?php echo $search_result[$i]['category']; ?>
                    </a>
                    <a href="<?php echo base_url('news/'.$search_result[$i]['slug']); ?>" class="post-title">
                      <h6><?php echo $search_result[$i]['title'] ?></h6>
                    </a>
                    <div class="post-meta">
                      <p class="post-author">By <a href="#"><?php echo $this->account->get_account_name($search_result[$i]); ?></a></p>
                      <p class="post-excerp"><?php echo word_limiter(strip_tags($search_result[$i]['post']), 100); ?></p>
                      <!-- Post Like & Post Comment -->
                      <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $search_result[$i]['views']; ?></span></a>
                        <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $search_result[$i]['comments']; ?></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php else: ?>
                <div class="single-blog-post featured-post mb-30 col-md-6">
                  <div class="post-thumb">
                    <a href="<?php echo base_url('news/category/'.$search_result[$i]['slug']); ?>">
                      <img src="<?php echo $search_result[$i]['picture']; ?>" alt="">
                    </a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo base_url('news/category/'.$search_result[$i]['slug']); ?>" class="post-catagory">
                      <?php echo $search_result[$i]['category']; ?>
                    </a>
                    <a href="<?php echo base_url('news/'.$search_result[$i]['slug']); ?>" class="post-title">
                      <h5><?php echo $search_result[$i]['title'] ?></h5>
                    </a>
                    <div class="post-meta">
                      <p class="post-author">By <a href="#"><?php echo $this->account->get_account_name($search_result[$i]); ?></a></p>
                      <p class="post-excerp"><?php echo word_limiter(strip_tags($search_result[$i]['post']), 50); ?></p>
                      <!-- Post Like & Post Comment -->
                      <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><i class="fa fa-eye"></i> <span><?php echo $search_result[$i]['views']; ?></span></a>
                        <a href="#" class="post-comment"><i class="fa fa-comments-o"></i> <span><?php echo $search_result[$i]['comments']; ?></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endfor; ?>
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
            <?php for($i = 0; $i < count($most_viewed); $i++): ?>
              <!-- Single Featured Post -->
              <div class="single-blog-post small-featured-post d-flex">
                <div class="post-thumb">
                  <a href="#">
                    <img src="<?php echo $most_viewed[$i]['picture'] ?>" alt="">
                  </a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/category/' . $most_viewed[$i]['category']); ?>" class="post-catagory">
                    <?php echo $most_viewed[$i]['category']; ?>
                  </a>
                  <div class="post-meta">
                    <a href="#" class="post-title">
                      <h6><?php echo word_limiter($most_viewed[$i]['title'], 15); ?></h6>
                    </a>
                    <p class="post-date"><?php echo date('h:i A | F d', strtotime($most_viewed[$i]['date'])); ?></p>
                  </div>
                </div>
              </div>
            <?php endfor; ?>
          </div>

          <!-- Newsletter Widget -->
          <?php $this->load->view('template/newsletter'); ?>

          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget mt-5 pt-4 pb-5">
            <h3 class="text-center">Blog Post</h3>
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
