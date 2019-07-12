<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
  /**
   * Register Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
   private function view($page, $details)
   {
     # page
     $this->load->view('template/_navbar', $details);
     $this->load->view('register/'.$page);
     $this->load->view('template/_footer');
   }

  /**
   * @Route (register)
   */
  public function index()
  {
    # check if client is not logged in
    if($this->auth->user(false)) # disable redirect
    {
      redirect('');
    }

    # validate required data
    $this->form_validation->set_rules('username', 'username', 'required|callback_username_exist');
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_exist');
    $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[20]');
    $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

    # page details
    $page_details = array(
      'title'       => 'Register and join the community of OrangeFarm.',
      'description' => 'Join Orange Farm News community by registering to our easy form application it only '.
                       'takes 15 seconds so register now.',
      'active'      => 'register',
      'login_page'  => true
    );

    # check if data if valid
    if($this->form_validation->run('create') === false)
    {
      # page
      $this->view('create', $page_details);

      return;
    }

    # encrypt password
    $encrypted_password = $this->encryption->encrypt($this->input->post('password'));

    # account details
    $account = array(
      'username' => $this->input->post('username'),
      'email'    => $this->input->post('email'),
      'password' => $encrypted_password
    );

    # create account
    if(!$this->account->create($account))
    {
      # set register error
      $this->session->set_flashdata('register_error', 'Something went wrong when tring to connect to database.');

      # page
      $this->view('create', $page_details);

      return;
    }

    # add link btn to page_details
    $page_details = array(
      'title'       => 'Thank your for registering now you are a member.',
      'description' => null, # no description
      'active'      => 'password',
      'navbar_adv'  => false,
      'icon'        => 'fa fa-users',
      'message'     => 'Please login to your account by clicking to login button and stay communicating with your community.',
      'link'        => array(
        'url'  => base_url('login'),
        'icon' => 'fa fa-user-o',
        'text' => 'Login Account'
      )
    );

    # page (success register view)
    $this->load->view('template/navbar', $page_details);
    $this->load->view('message', $page_details);
    $this->load->view('template/footer', $page_details);
  }


  /**
   * Check If Username Exist In Database
   *
   * @param   string
   * @return  boolean
   */
  public function username_exist($username)
  {
    # check if user name exist in accounts
    if(count($this->account->get(array('username' => $username))) !== 0)
    {
      $this->form_validation->set_message('username_exist', 'Sorry {field} already exist please try again later.');

      return false;
    }

    return true;
  }

  /**
   * Check If Emial Exist In Database
   *
   * @param   string
   * @return  boolean
   */
  public function email_exist($email)
  {
    # check if user name exist in accounts
    if(count($this->account->get(array('email' => $email))) !== 0)
    {
      $this->form_validation->set_message('email_exist', 'Sorry {field} already exist please try again another one.');

      return false;
    }

    return true;
  }

}
