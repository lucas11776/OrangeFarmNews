<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
  /**
   * @Route (register)
   */
  public function index()
  {
    # page details
    $details = array(
      'title'       => 'Welcome back to OrangeFarmNews.',
      'description' => null, # defualt description
      'active'      => 'register'
    );

    $this->form_validation->set_rules('username', 'username', 'required|callback_username_exist');
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_exist');
    $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[20]');
    $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

    # check if form validation is valid
    if($this->form_validation->run() === false)
    {
      # page
      $this->load->view('template/navbar', $details);
      $this->load->view('register/create');
      $this->load->view('template/footer');

      return;
    }

    # encrypt password
    $encrypted_password = $this->input->post('password');

    # account details
    $account = array(
      'username' => $this->input->post('username'),
      'email'    => $this->input->post('email'),
      'password' => $encrypted_password
    );

    # create account
    if(!$this->account->create($account))
    {
      $this->session->set_flashdata('register_error', 'Something went wrong when tring to connect to database.');

      # page
      $this->load->view('template/navbar', $details);
      $this->load->view('register/create');
      $this->load->view('template/footer');

      return;
    }

    # page
    $this->load->view('template/navbar', $details);
    $this->load->view('register/success');
    $this->load->view('template/footer');
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
