<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
  /**
   * News Page View
   *
   * @param   String
   * @param   array
   * @return void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('news/'.$page);
    $this->load->view('template/footer');
  }

  /**
   * @Route (news)
   */
  public function index($offset = null)
  {

    print_r($offset);

    # config pagination
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['base_url'] = base_url(uri_string());
    $config['total_rows'] = $this->news->count(); # number of news in database
    $config['per_page'] = 3;

    # initialize pagination class
    $this->pagination->initialize($config);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # get latest news
    $latest_news = $this->news->latest($config['per_page'], $page);

    # get most viewed news

    print_r($latest_news);

    echo $this->pagination->create_links();

    # get news
  }

  /**
   * @Route (news)
   */
  public function single($slug)
  {

  }

  /**
   * @Route (news)
   */
  public function category()
  {

  }

  /**
   * @Route (news)
   */
  public function most_viewed()
  {

  }

}
