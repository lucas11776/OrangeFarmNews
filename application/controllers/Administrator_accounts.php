<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_accounts extends CI_Controller
{
  /**
   *
   */
  private const SUPER_ADMIN = array(
    'thembangubeni04@gmail.com'
  );

  /**
   * Dashboard News View Pages
   *
   * @param   string
   * @param   array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('administrator/' . $page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (dashboard/news)
   */
  public function index()
  {
    # check if user administrator
    $this->auth->administrator();

    # get number of news in database
    $total = $this->account->count();

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage Accounts',
      'description'     => 'OrangeFarmNews Dashboard',
      'active'          => 'Blog Posts',
      'summary'         => $this->stats->summary(),
      'accounts'        => $this->account->get(array('id'), $per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('accounts', $page_details);
  }

  /**
   * @Route (dashboard/news/search)
   */
  public function search()
  {
    # check if user administrator
    $this->auth->administrator();

    # get number of news in database
    $total = $this->stats->search_result($this->input->get('term'))['accounts'] ?? 0;

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage Blog Posts',
      'description'     => 'OrangeFarmNews Dashboard',
      'active'          => 'Blog Posts',
      'summary'         => $this->stats->summary(),
      'accounts'        => $this->account->search(array('username' => $this->input->get('term'), 'email' => $this->input->get('term')), $per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('accounts', $page_details);
  }

  /**
   *
   *
   *
   */
  public function single($user_id)
  {
    # Administrator
    $this->auth->administrator();

    // get user account
    $account = $this->account->get(array('id' => $user_id))[0] ?? false;

    # check if user exist
    if($this->account_exist($account, $user_id) === false)
    {
      return;
    }

    # page details
    $page_details = array(
      'title'           => $this->account->get_account_name($account),
      'description'     => '',
      'picture'         => $account['picture'],
      'active'          => 'Edit Account',
      'account'         => $account,
      'summary'         => $this->stats->summary(),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # check if role is valid
    $this->form_validation->set_rules('role', 'role', 'callback_role_exist');

    # check if user has submit role change
    if($this->form_validation->run() === false)
    {
      # page
      $this->view('account_single', $page_details);

      return;
    }
    if($this->account->change_role($account['id'], $this->input->post('role')));
    {
      // updated account is changed
      $page_details['account']['role'] = $this->input->post('role');

      # page
      $this->view('account_single', $page_details);
    }

    redirect(uri_string());
  }

  public function role_exist($role)
  {
    # check if role exist
    if(isset($this->account::ROLE[$role]) === false)
    {
      $this->form_validation->set_message('role_exist', 'The {field} field does not exist please select correct role.');

      return false;
    }
    
    return true;
  }

  private function account_exist($account, $user_id)
  {
    // check if user id is interge
    if(is_numeric($user_id) === false)
    {
      return false;
    }

    # super administrator validation
    if($account == false || $this->account->user_super_admin($account))
    {
      # page details
      $page_details = array(
        'title'       => 'Account does not exist',
        'message'     => 'Account you are trying to view does not exist in database.',
        'description' => 'User account does not exist',
        'icon'        => 'fa fa-user',
        'active'      => '404',
        'navbar_adv'  => false
      );

      # page
      $this->load->view('template/navbar', $page_details);
      $this->load->view('404', $page_details);
      $this->load->view('template/footer', $page_details);

      return false;
    }

    return true;
  }
}
