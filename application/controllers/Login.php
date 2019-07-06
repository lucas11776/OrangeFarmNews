<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
  /**
   * Client Account By Username
   *
   * @// NOTE: This var is populated by client post ('username');
   *
   * @var array
   */
   public $client_account;

   /**
    * Login Pages View
    *
    * @param    string
    * @param    array
    * @return   void
    */
   private function view(string $page, array $details)
   {
     $this->load->view('template/_navbar', $details);
     $this->load->view('login/'.$page);
     $this->load->view('template/_footer');
   }

  /**
   * @Route (login)
   */
  public function index()
  {
    # check if client is not logged in
    if($this->auth->user(false)) # disable redirect
    {
      redirect('');
    }

    # page details
    $page_details = array(
      'title'       => 'Welcome back to OrangeFarmNews.',
      'description' => null,
      'active'      => 'login'
    );

    # validate required data
    $this->form_validation->set_rules('username', 'email/username', 'callback_username_exist');
    $this->form_validation->set_rules('password', 'password', 'required');

    # check if data if valid
    if($this->form_validation->run() === false)
    {
      # page
      $this->view('create', $page_details);

      return;
    }

    # check if client password matches account password
    if($this->password_matches($this->input->post('password')) === false)
    {
      # page
      $this->view('create', $page_details);

      return;
    }

    # check if account is not blocked by administrator
    if($this->client_account['role'] == 0)
    {
      # change page title
      $page_details['title'] = 'Account Has Been Blocked By Administrator.';

      # page
      $this->view('account_blocked', $page_details);
    }

    # client account uid and current client ip address to prevent cookie hijecking and convert token to json object
    $token = json_encode(array(
      'id'         => $this->client_account['id'],
      'ip_address' => $this->input->ip_address()
    ));

    # decrypt token
    $token = $this->encryption->encrypt($token);

    # check if user wants to stay logged in
    if($this->input->post('stay_logged_in') == 'on')
    {
      $this->stay_logged_in($token);
    }

    # assign token to session
    $this->session->set_userdata('token', $token);

    # redirect user to old page or home page
    empty($this->input->post('redirect')) ? redirect($this->input->post('redirect')) : redirect('');
  }

  /**
   * Check Is Password Matches Account Passsowrd
   *
   * @param   string
   * @return  boolean
   */
  public function password_matches(string $password)
  {
    # decrypt account password
    $account_password = $this->encryption->decrypt($this->client_account['password']);

    # check if password matches account password
    if($account_password != $password)
    {
      $this->session->set_flashdata('login_error', 'Incorrect username or password.');

      return false;
    }

    return true;
  }

  /**
   * Check If Username Exist In Account
   *
   * @// NOTE: this function will populate account if account username exist
   *
   * @param   string
   * @return  boolean
   */
  public function username_exist($uid)
  {
    # check if user identity is not empty
    if(empty($uid))
    {
      $this->form_validation->set_message('username_exist', 'Your {field} is required to login.');

      return false;
    }

    # get account ty username or email
    $this->client_account = $this->account->get_account($uid);

    # check if account exist
    if($this->client_account === false)
    {
      $this->form_validation->set_message('username_exist', 'The {field} your entered does not exist.');

      return false;
    }

    return true;
  }

  /**
   * create a cookie and store cookie
   *
   * @param   string
   * @return  void
   */
  private function stay_logged_in(string $token)
  {
    $cookie = array(
      'name'   => 'token',
      'value'  => $token,
      'expire' => ((60*60)*24) * 365.242199, # set cookie expire in a year full year(365.242199)
      #'domain' => '.some-domain.com',
      'path'   => '/',
      'prefix' => 'tid_',
      'secure' => false
    );
    $this->input->set_cookie($cookie); # store cookie
  }

}
