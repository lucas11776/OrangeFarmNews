<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
  /**
   * News Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('news/'.$page, $details);
    $this->load->view('template/footer');
  }

  /**
   * Page Pagination Configuration
   *
   * @param   integer
   * @return  array
   */
  private function page_pagination(int $total, int $per_page = 6)
  {
    # pagination configuration
    $config = array(
      'page_query_string'    => true,
      'query_string_segment' => 'page',
      'base_url'             => base_url(uri_string()),
      'total_rows'           => $total,
      'per_page'             => $per_page
    );

    # initialize pagination class
    $this->pagination->initialize($config);
  }

  /**
   * @Route (news)
   */
  public function index($offset = null)
  {
    # get number of news in database
    $total = $this->news->count();

    # number of result to be show per page
    $per_page = 3;

    # config pagination
    $this->page_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $details = array(
      'title'            => 'Get the latest new from Orange Farm.',
      'description'      => null, # defualt description
      'news'             => $this->news->latest($per_page, $page),
      'most_viewed_news' => $this->news->most_viewed(6)
    );

    # page
    $this->view('home', $details);
  }

  /**
   * @Route (news)
   */
  public function single($slug)
  {
    # get news by slug
    $single_news = $this->news->view($slug);

    # check if news item exist
    if($single_news === false)
    {
      # 404 news not found page
      $details = array(
        'title'   => '404 News Not Found.',
        'message' => 'Sorry news does not exist or it may be deleted by editor.'
      );

      # go back one dir to 404 page error
      $this->view('../404', $details);

      return;
    }

    # page details
    $details = array(
      'title'       => $single_news['title'],
      'description' => word_limiter(strip_tags($single_news['post']), 40),
      'single_news' => $single_news,
      'latest_news' => $this->news->latest(6)
    );

    # page
    $this->view('single', $details);
  }

  /**
   * @Route (news)
   */
  public function category($category)
  {
    # check if category exist
    if(array_key_exists(strtolower($category), $this->news::CATEGORY) === false)
    {
      echo '<h1>No Category</h1>';
    }
  }

  /**
   * @Route (news)
   */
  public function most_viewed()
  {

  }

}
