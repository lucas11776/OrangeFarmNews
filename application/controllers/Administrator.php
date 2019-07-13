<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller
{
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('administrator/'.$page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (panel)
   */
  public function index()
  {
    # page details
    $page_details = array(
      'title'           => 'OrangeFarmNews Administrator (Themba)',
      'description'     => 'OrangeFarmNews Administrator Panel.',
      'active'          => 'panel',
      'summary'         => $this->stats->summary(), # get number post from (accounts,blog,news)
      'latest_messages' => $this->contect->get(null, 5)
    );

    # page
    $this->view('panel', $page_details);
  }
}
