<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
  /**
   * Home Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('home/'.$page, $details);
    $this->load->view('template/footer', $details);
  }

  public function index()
  {

    # get latest news
    $news = $this->news->latest(9);

    # page details
    $page_details = array(
      'titlt'         => 'OrangeFarmNews news report for the community.',
      'description'   => null, # defualt description
      'active'        => 'home',
      'latest_news'   => $news,
      'news_updated'  => $news
    );


    #page
    $this->view('home', $page_details);
  }

}
