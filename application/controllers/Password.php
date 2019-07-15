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
  public function recover()
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

  /**
   * @Route (reset/password)
   */
  public function reset()
  {
    # page details
    $page_details = array(
      'title'       => 'Reset your password easy and fast.'
      'description' => 'Resetting your password with us is so easy and simple.',
      'active'      => 'password'
    );
    $id    = $this->input->get('id');
    $token = $this->input->get('key');

    # get password reset item by id
    $reset_item = $this->password->get(array('id' => $id))[0] ?? null;

    if($reset_item === null)
    {
      $this->load->view('template/navbar', $page_details);
      $this->load->view('../404', $page_details);
      $this->load->view('template/footer', $page_details);

      return;
    }



  }
}
