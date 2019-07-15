<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12 text-right pt-5 pb-4">
        <?php echo form_open('search', array('method' => 'GET')); ?>
          <div class="input-group input-group-md mb-3">
            <select class="form-control border-color"
                    placeholder="Recipient's username"
                    aria-label="Filter"
                    aria-describedby="button-filter">
              <option value=""> --- Filter Search By ---</option>
              <option value="news">News</option>
              <option value="blog">Blog</option>
            </select>
            <div class="input-group-append">
              <button class="btn bg-color text-uppercase" type="submit" id="button-filter">
                <strong><span class="fa fa-search"></span> Search</strong>
              </button>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
      <div class="col-12 col-lg-8">

        <div class="">
          <!-- Single Featured Post -->
          <div class="row">
            <?php for($i = 0; $i < count($search_result); $i++): ?>
              <?php if($i == 0): ?>
                <div class="single-blog-post featured-post mb-30 col-lg-12">
                  <div class="post-thumb">
                     <a href="#">
                       <img src="<?php echo base_url('assets/default/img/bg-img/25.jpg'); ?>" alt="">
                     </a>
                  </div>
                  <div class="post-data">
                     <a href="#" class="post-catagory">Finance</a>
                     <a href="<?php echo base_url('news/'.$search_result[$i]['slug']); ?>" class="post-title">
                         <h6><?php echo $search_result[$i]['title'] ?></h6>
                     </a>
                     <div class="post-meta">
                         <p class="post-author">By <a href="#">Christinne Williams</a></p>
                         <p class="post-excerp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem. </p>
                         <!-- Post Like & Post Comment -->
                         <div class="d-flex align-items-center">
                             <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                             <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                         </div>
                     </div>
                  </div>
                </div>
              <?php else: ?>
                <div class="single-blog-post featured-post mb-30 col-md-6">
                  <div class="post-thumb">
                     <a href="#">
                       <img src="<?php echo base_url('assets/default/img/bg-img/25.jpg'); ?>" alt="">
                     </a>
                  </div>
                  <div class="post-data">
                     <a href="#" class="post-catagory">Finance</a>
                     <a href="<?php echo base_url('news/'.$search_result[$i]['slug']); ?>" class="post-title">
                         <h5><?php echo $search_result[$i]['title'] ?></h5>
                     </a>
                     <div class="post-meta">
                         <p class="post-author">By <a href="#">Christinne Williams</a></p>
                         <p class="post-excerp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem. </p>
                         <!-- Post Like & Post Comment -->
                         <div class="d-flex align-items-center">
                             <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                             <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
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

            <?php for($i = 0; $i < 6; $i++): ?>
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
            <?php endfor; ?>

          </div>

          <!-- Newsletter Widget -->
          <?php $this->load->view('template/newsletter'); ?>

          <!-- Latest Comments Widget -->
          <div class="latest-comments-widget mt-5">
             <h3>Blog Post</h3>

             <?php for($i = 0; $i < 5; $i++): ?>
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
             <?php endfor; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Area End ##### -->
