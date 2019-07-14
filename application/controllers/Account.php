<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
  /**
   * Account View Pages
   *
   * @param   string
   * @param   array
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('account/' . $page , $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (my/account)
   */
  public function index()
  {
    # check if user logged in
    $this->auth->user();

    # page details
    $page_details = array(
      'title'           => "Edit Account {$this->auth->account('username')}",
      'descript'        => 'Edit your account',
      'active'          => 'My Account',
      'summary'         => $this->stats->summary(),
      'unread_messages' => $this->contect->get(array('seen' => 0), 5)
    );

    # validate required data
    $this->form_validation->set_rules('name', 'name', 'min_length[3]|max_length[30]');
    $this->form_validation->set_rules('surname', 'surname', 'min_length[3]|max_length[30]');
    $this->form_validation->set_rules('picture', 'profile picture', 'callback_upload_picture');

    if($this->form_validation->run() === false)
    {
      $this->view('update', $page_details);

      return;
    }
  }
}
