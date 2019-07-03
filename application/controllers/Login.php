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
     $this->load->view('template/navbar', $details);
     $this->load->view('login/'.$page);
     $this->load->view('template/footer');
   }

  /**
   * @Route (login)
   */
  public function index()
  {
    # check if client is not logged in
    

    # page details
    $details = array(
      'title'       => 'Welcome back to OrangeFarmNews.',
      'description' => null,
      'active'      => 'login'
    );

    # validate required data
    $this->form_validation->set_rules('username', 'username', 'required|callback_username_exist');
    $this->form_validation->set_rules('password', 'password', 'required|callback_password_match');

    # check if data if valid
    if($this->form_validation->run() === false)
    {
      # page
      $this->view('create', $details);

      return;
    }

    # check if account is not blocked by administrator
    if($this->client_account['role'] == 0)
    {
      # change page title
      $details['title'] = 'Account Has Been Blocked By Administrator.';

      # page
      $this->view('account_blocked', $details);
    }

    # get account identify and convert data to json and encrypt json data
    $token = json_encode(array(
      'id'         => $this->client_account['id'],
      'username'   => $this->client_account['username'],
      'ip_address' => $this->input->ip_address() # current user ip address to prevent cookie hijecking
    ));

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
   * Check If Username Exist In Account
   *
   * @// NOTE: this function will populate account if account username exist
   *
   * @param   string
   * @return  boolean
   */
  public function username_exist($uid)
  {
    # get account by username or email
    $this->client_account = $this->account->get_account($uid);

    # check if account exist
    if($this->account === false)
    {
      $this->form_validation->set_message('username_exist', 'Sorry {field} does not exist please try correct one.');
      $this->session->set_flashdata('login_fail', 'Invalid creditials please try again.');

      return false;
    }

    return true;
  }

  public function password_match($password)
  {
    # decrypt password
    $decrypted_password = $this->client_account['password'] ?? null;

    # check if account password match account password
    if($password == $decrypted_password)
    {
      $this->form_validation->set_message('password_match', 'Sorry {field} password does not match account password.');
      $this->session->set_flashdata('login_fail', 'Invalid creditials please try again.');

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
    # cookie
    $cookie = array(
            'name'   => 'token',
            'value'  => $token,
            'expire' => (((60*60)*24)*365.242199) + time(), # set cookie expire in a year
            #'domain' => '.some-domain.com',
            'path'   => '/',
            'prefix' => 'tid_',
            'secure' => false
    );

    # store cookie
    $this->input->set_cookie($cookie);
  }

}
