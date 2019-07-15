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
    $this->load->view('template/footer', $details);
  }

  /**
   * @Route (news)
   */
  public function index()
  {
    # get number of news in database
    $total = $this->news->count();

    # number of result to be show per page
    $per_page = 2;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'            => 'Get the latest news from Orange Farm and surounding areas.',
      'description'      => 'At Orange Farm News we try to give you the latest news so you can stay up to date '.
                            'with what happing around Orange Farm.',
      'active'           => 'news',
      'navbar_adv'       => false,
      'news'             => $this->news->latest($per_page, $page),
      'most_viewed_news' => $this->news->most_viewed(6)
    );

    # page
    $this->view('index', $page_details);
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
      $page_details = array(
        'title'       => '404 News Not Found',
        'message'     => 'News not found they maybe deleted by editor.',
        'description' => 'News not found they maybe deleted by editor.',
        'icon'        => 'fa fa-newspaper-o',
        'active'      => '',
        'navbar_adv'  => false
      );

      # go back one dir to 404 page error
      $this->view('../404', $page_details);

      return;
    }

    # page details
    $page_details = array(
      'title'       => $single_news['title'],
      'description' => word_limiter(strip_tags($single_news['post']), 40),
      'active'      => 'news',
      'single_news' => $single_news,
      'latest_news' => $this->news->latest(6),
      'navbar_adv'  => false
    );

    # page
    $this->view('single', $page_details);
  }

  /**
   * @Route (news)
   */
  public function category($category)
  {
    # page details
    $page_details = array(
      'title'       => 'OrangeFarmNews ' . $category . ' news category.',
      'description' => null, # defualt description
    );

    # check if category exist
    if(array_key_exists(strtolower($category), $this->news::CATEGORY) === false)
    {
      $this->view('../404', $page_details);
    }
  }

}
