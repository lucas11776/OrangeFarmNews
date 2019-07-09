<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller
{
  /**
   * PageNotFound Page View
   *
   * @param   string
   * @param   array
   * @param   void
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view($page, $details);
    $this->load->view('template/footer', $details);
  }

  public function index()
  {
    # page details
    $page_details = array(
      'title'       => '404 page not found',
      'description' => null, # defualt description
      'message'     => 'Page your are looking for does not exist.',
      'active'      => 'contect',
      'navbar_adv'  => false
    );

    #page
    $this->view('404', $page_details);
  }
}
