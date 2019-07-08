<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller
{
  public function index()
  {
    # page details
    $page_details = array(
      'title'       => '404 page not found',
      'description' => null, # defualt description
      'message'     => 'Page your are looking for does not exist.',
      'active'      => 'contect'
    );

    #page
    $this->load->view('template/navbar', $page_details);
    $this->load->view('404', $page_details);
    $this->load->view('template/footer');
  }
}
