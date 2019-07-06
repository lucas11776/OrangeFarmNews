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
      'title'       => 'Forgot your password don`t worry recover your password.',
      'description' => `Have you forgot your password don\`t worry recover your password easy and fast.
                        Just enter your password and we will send your a reset passwoord message in your email address,
                        and enter your new password and you will be logged in to your new your account.`,
      'active'      => 'password'
    );
  }
}
