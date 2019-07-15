<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_blog extends CI_Controller
{
  /**
   * Upload Blog View Pages
   *
   * @param   string
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('blog/' . $page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   *
   */
  public function index()
  {
    $this->form_validation->set_rules('picture', 'picture', 'callback_upload_picture');
  }
}
