<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_news extends CI_Controller
{
  /**
   * Dashboard News View Pages
   * 
   * @param   string
   * @param   array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('administrator/' . $page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (dashboard/news)
   */
  public function index()
  {
    # check if user administrator
    $this->auth->administrator();

    # page details
    $page_details = array(
      'title'           => 'OrangeFarmNews Administrator (Themba)',
      'description'     => 'OrangeFarmNews Administrator Panel.',
      'active'          => 'Dashboard',
      'summary'         => $this->stats->summary(),
      'news'            => $this->news->latest(10),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('news', $page_details);
  }
}
