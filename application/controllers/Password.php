<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller
{
  /**
   * User Account
   */
  private $user_account; 

  private $token;

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
    $this->load->view('password/'.$page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (forgot/password)
   */
  public function recover()
  {
    # page details
    $page_details = array(
      'title'       => 'Forgot your password don`t worry recover your password.',
      'description' => "Have you forgot your password don\`t worry recover your password easy and fast.
                        Just enter your password and we will send your a reset passwoord message in your email address,
                        and enter your new password and you will be logged in to your new your account.",
      'active'      => 'password'
    );

    # validate required data
    $this->form_validation->set_rules('email', 'email address', 'required|valid_email|callback_email_exist');

    # check if data is valid
    if($this->form_validation->run() === false)
    {
      # page
      $this->view('forgot', $page_details);

      return;
    }

    # reset token to be sent to user
    $token = json_encode(array(
      'id'     => $this->user_account['id'],
      'expire' => time() + ((60*60)*48) # token expire two days
    ));

    # decrypt token for security
    $token = urlencode($this->encryption->encrypt($token));

    # notify template details for password recovery
    $data = array(
      'title'    => 'Reset Password Link',
      'text'     => 'Recover your password by clicking on reset password link',
      'btn_text' => 'Reset Password',
      'url'      => base_url('reset/account/password?token=' . $token)
    );

    # mail details
    $data = array(
      'html'    => $this->notify_template->html($data),
      'email'   => $this->user_account['email'],
      'subject' => 'Reset Password Link.'
    );

    # send mail
    if($this->mail->send($data) === false)
    {
      $this->session->set_flashdata('recover_password_error', 'Something went wrong when trying to send reset link to your mail');

      $this->view('forgot', $page_details);

      return;
    }

    $page_details = array(
      'icon'        => 'fa fa-envelope-o',
      'title'       => 'Recovery email has been sent to your email address.',
      'description' => null,
      'message'     => 'Please check your email for rest account password link it may take some time...',
      'active'      => 'password',
      'navbar_adv'  => false,
      'link'        => array(
        'text' => 'Go Home',
        'url'  => base_url(),
        'icon' => 'fa fa-home'
      )
    );

    # page
    $this->load->view('template/navbar', $page_details);
    $this->load->view('message', $page_details);
    $this->load->view('template/footer', $page_details);
  }

  /**
   * @Route (reset/password)
   */
  public function reset($show_view = true)
  {
    # page details
    $page_details = array(
      'title'       => 'Reset your password easy and fast.',
      'description' => 'Resetting your password with us is so easy and simple.',
      'active'      => 'password'
    );

    # check if token is valid
    $token = $this->token_valid($this->input->get('token'));
    
    # check if token is valid
    if(is_string($token))
    {
      $page_details['icon']       = 'fa fa-key';
      $page_details['title']      = $token;
      $page_details['navbar_adv'] = false;
      $page_details['message']    = 'Please notice your must use reset password link within 48Hours';
      $page_details['link']       = array(
        'url'  => base_url('forgot/password'),
        'text' => 'Recover Password ',
        'icon' => 'fa fa-user-circle-o'
      );
      
      # page
      $this->load->view('template/navbar', $page_details);
      $this->load->view('message', $page_details);
      $this->load->view('template/footer', $page_details);

      return false;
    }

    if($show_view)
    {
      # page
      $this->view('reset', $page_details);
    }

    return true;
  }

  /**
   * @Route (reset/account/password)
   */
  public function change_password()
  {
    # check if token is valid
    if($this->reset(false) == false)
    {
      return;
    }

    # page details
    $page_details = array(
      'title'       => 'Reset your password easy and fast.',
      'description' => 'Resetting your password with us is so easy and simple.',
      'active'      => 'password'
    );
    
    # validate required date
    $this->form_validation->set_rules('password', 'new password', 'required|min_length[6]|max_length[20]');
    $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

    # check if required data is valid
    if($this->form_validation->run() === false)
    {
      $this->view('reset', $page_details);

      return;
    }

    # decrypt password
    $password = $this->encryption->encrypt($this->input->post('password'));

    # change password
    if($this->account->change_password($this->token['id'], $password) == false)
    {
      $this->session->set_flashdata('change_password_error', 'Something went wrong when tring to connect to database');

      # page
      $this->view('reset', $page_details);

      return;
    }

    # page details
    $page_details = array(
      'icon'        => 'fa fa-unlock',
      'title'       => 'Password Has Been Successfully Changed.',
      'description' => null,
      'message'     => 'Please login in to your account with a new password a remember your password.',
      'active'      => 'password',
      'navbar_adv'  => false,
      'link'        => array(
        'text' => 'Login',
        'url'  => base_url('login'),
        'icon' => 'fa fa-user-o'
      )
    );

    # page
    $this->load->view('template/navbar', $page_details);
    $this->load->view('message', $page_details);
    $this->load->view('template/footer', $page_details);
  }

  /**
   * Check if token is valid
   * 
   * @param   string
   * @return  array  
   */
  public function token_valid($token)
  {
    # decryt token
    $this->token = json_decode($this->encryption->decrypt($token), true);

    # check if token is valid
    if(is_array($this->token) === false)
    {
      return 'Invalid token please recover your password again.';
    }

    # check if token has not expire
    if(time() > $this->token['expire'])
    {
      return 'Token has expired please recover your password again';
    }

    return $this->token;
  }

  /**
   * Check If Email Exist
   * 
   * @param   string
   * @return  boolean
   */
  public function email_exist($email)
  {
    # get account by email
    $this->user_account = $this->account->get(array('accounts.email' => $email))[0] ?? false;

    if($this->user_account === false)
    {
      $this->form_validation->set_message('email_exist', 'The {field} you enter does not exist in Orange Farm News database.');

      return false;
    }
    
    return true;
  }

  
}
