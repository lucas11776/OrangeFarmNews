<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller
{
  /**
   * Password Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('password/'.$page);
    $this->load->view('template/_footer');
  }

  /**
   * @Route (forgot/password)
   */
  public function recover_password()
  {
    # page details
    $page_details = array(
      ''
    );
  }
}
