<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
  /**
   * blog Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('blog/' . $page, $details);
    $this->load->view('template/footer', $details);
  }

  /**
   * @Route (blog)
   */
  public function index()
  {
    # get number of blog in database
    $total = $this->blog->count();

    # number of result to be show per page
    $per_page = 6;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'            => 'Get the latest blog from Orange Farm and surounding areas.',
      'description'      => 'At Orange Farm blog we try to give you the latest blog so you can stay up to date '.
                            'with what happing around Orange Farm.',
      'active'           => 'blog',
      'navbar_adv'       => false,
      'blog'             => $this->blog->latest($per_page, $page),
      'most_viewed'      => $this->blog->most_viewed($per_page, $page),
      'most_commented'   => $this->blog->most_commented(5, $page == 0 ? 0 : $page - 1)
    );

    # page
    $this->view('index', $page_details);
  }

  /**
   * @Route (blog)
   */
  public function single($slug)
  {
    # get blog by slug
    $single_blog = $this->blog->view($slug);

    # check if blog item exist
    if($single_blog === false)
    {
      # 404 blog not found page
      $page_details = array(
        'title'       => '404 blog Not Found',
        'message'     => 'blog not found they maybe deleted by editor.',
        'description' => 'blog not found they maybe deleted by editor.',
        'icon'        => 'fa fa-blogpaper-o',
        'active'      => '',
        'navbar_adv'  => false
      );

      # go back one dir to 404 page error
      $this->view('../404', $page_details);

      return;
    }

    # page details
    $page_details = array(
      'title'       => $single_blog['title'],
      'description' => word_limiter(strip_tags($single_blog['post']), 40),
      'active'      => 'blog',
      'single_blog' => $single_blog,
      'latest_blog' => $this->blog->latest(8),
      'most_viewed' => $this->blog->most_viewed(5),
      'navbar_adv'  => false
    );

    # page
    $this->view('single', $page_details);
  }

  /**
   * @Route (blog)
   */
  public function category($category)
  {
    # check if category exist
    if(in_array(strtolower($category), $this->blog::CATEGORY) === false)
    {
      # add page 404 error messages
      $page_details = array(
        'icon'        => 'fa fa-blogpaper-o',
        'description' => 'Category you are trying to view does not exist.',
        'title'       => 'blog category your selected does not exist.',
        'message'     => 'Please do not change url manual site will handle url change.',
        'active'      => '404',
        'navbar_adv'  => false
      );

      # 404 page not found
      $this->view('../404', $page_details);
    }

    # get number of blog in database
    $total = $this->blog->count('where', array('category' => $category));

    # number of result to be show per page
    $per_page = 7;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'OrangeFarmblog ' . $category . ' blog category.',
      'description'     => null, # defualt description
      'active'          => strtolower('category-' . $category),
      'navbar_adv'      => false,
      'category_result' => $this->blog->get(array('category' => $category), $per_page, $page),
      'most_commented'  => $this->blog->most_commented(6, $page)
    );

    $this->view('category', $page_details);
  }

}
