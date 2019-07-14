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
   * @Route (account/:username)
   */
  public function single($username)
  {
    # get user account by name
    $user_account = $this->account->get(array('username' => $username))[0] ?? false;

    # check if account exist
    if($user_account === false)
    {
      # page details
      $page_details = array(
        'title'       => 'User Account ' . $username . ' Does Not Exist.',
        'description' => 'User account does not exist.',
        'active'      => '404',
        'icon'        => 'fa fa-user-circle-o',
        'message'     => 'User account you are trying to view does not exist it maybe deleted.',
        'navbar_adv'  => false
      );

      # page
      $this->load->view('template/navbar', $page_details);
      $this->load->view('404', $page_details);
      $this->load->view('template/footer', $page_details);

      return;
    }

    # page details
    $page_details = array(
      'title'       => 'User Account ' . $username . ' Does Not Exist.',
      'description' => 'User account does not exist.',
      'active'      => '404',
      'icon'        => 'fa fa-user-circle-o',
      'message'     => 'User account you are trying to view does not exist it maybe deleted.',
      'navbar_adv'  => false,
      'account'     => $user_account
    );

    # page
    $this->load->view('template/navbar', $page_details);
    $this->load->view('account/single', $page_details);
    $this->load->view('template/footer', $page_details);
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

    # check update type
    if(strtolower($this->input->post('type') ?? '') == 'password')
    {
      $this->change_password($page_details);
    }
    else
    {
      $this->update_details($page_details);
    }

  }

  /**
   * Update Account Details
   *
   * @param   array
   * @return  void
   */
  private function update_details($page_details)
  {
    # validate required data
    $this->form_validation->set_rules('name', 'name', 'min_length[3]|max_length[30]');
    $this->form_validation->set_rules('surname', 'surname', 'min_length[3]|max_length[30]');
    $this->form_validation->set_rules('picture', 'profile picture', 'callback_upload_profile_picture');

    if($this->form_validation->run() === false)
    {
      $this->view('update', $page_details);

      return;
    }

    # updated data
    $update = array(
      'name'    => $this->input->post('name'),
      'surname' => $this->input->post('surname')
    );

    # user ID
    $where = array('id' => $this->auth->account('id'));

    # update user account
    if($this->account->update($where, $update) === false)
    {
      $this->session->set_flashdata('update_account_error', 'Something went wrong when tring to connect to database.');
    }
    else
    {
      $this->session->set_flashdata('account_updated', 'Account details updated.');
    }

    $this->view('update', $page_details);
  }

  /**
   * Change Account Password
   *
   * @param   array
   * @return  void
   */
  private function change_password(array $page_details)
  {
    # check required data
    $this->form_validation->set_rules('old_password', 'old password', 'required|callback_password_matches');
    $this->form_validation->set_rules('new_password', 'new password', 'required|min_length[6]|max_length[20]');
    $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[new_password]');

    if($this->form_validation->run() === false)
    {
      $this->view('update', $page_details);

      return;
    }

    $this->view('update', $page_details);
  }

  /**
   * Update Profile Picture
   *
   * @return boolean
   */
  public function upload_profile_picture()
  {
    # check if picture isset
    if(isset($_FILES['picture']))
    {
      return true;
    }

    return true;
  }

  /**
   * Check If Password Match Account Password
   *
   * @param   string
   * @return boolean
   */
  public function password_matches($password)
  {
    # descript account password
    $account_password = $this->encryption->decrypt($this->auth->account('password'));

    # check if passoword matches account password
    if($account_password != $password)
    {
      $this->form_validation->set_message('password_matches', 'The {field} field does not match account passowrd.');

      return false;
    }

    return true;
  }

}
