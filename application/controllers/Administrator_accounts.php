<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_accounts extends CI_Controller
{
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
   *
   *
   *
   */
  public function single($user_id)
  {
    # Administrator
    $this->auth->administrator();

    $account = $this->account->get(array('id' => $user_id))[0] ?? false;

    if($account == false)
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

    $this->view('account_single', $page_details);
  }
}
