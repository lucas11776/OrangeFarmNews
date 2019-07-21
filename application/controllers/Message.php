<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{
  /**
   * Message
   * 
   * @var array
   */
  private $message;

  /**
   * Message View Pages
   *
   * @param   string
   * @return  boolean
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('message/' . $page , $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (dashboard/inbox)
   */
  public function index()
  {
    # check if user is admin
    $this->auth->administrator();

    # get number of news in database
    $total = $this->contect->count();

    # number of result to be show per page
    $per_page = 20;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Inbox (messages).',
      'description'     => 'Message Center For Administrator.',
      'active'          => 'Inbox',
      'summary'         => $this->stats->summary(),
      'unread_messages' => $this->contect->get(array('seen' => 0), 10),
      'messages'        => $this->contect->get(null, $per_page, $page)
    );

    $this->view('index', $page_details);
  }

  /**
   * @Route (dashboard/inbox/:id)
   */
  public function single_message($message_id)
  {

    # get message
    $message = $this->contect->view($message_id);

    if($message === false)
    {
      # message
      $page_details = array(
        'title'       => 'Message Your are tring to read does not exist.',
        'message'     => 'Message does not exist or the meant be database connection try again later',
        'description' => 'Message not found',
        'active'      => '404',
        'icon'        => 'fa fa-inbox',
        'navbar_adv'  => false,
        'link'        => array(
          'url'  => base_url('dashboard/inbox'),
          'text' => 'GoTo Inbox'
        )
      );

      # page
      $this->load->view('template/navbar', $page_details);
      $this->load->view('message', $page_details);
      $this->load->view('template/footer', $page_details);

      return;
    }

    $page_details = array(
      'title'           => 'Read Message.',
      'description'     => 'Read Message',
      'active'          => 'Read Message',
      'summary'         => $this->stats->summary(),
      'unread_messages' => $this->contect->get(array('seen' => 0), 5),
      'message'         => $message
    );

    $this->view('single', $page_details);
  }

  /**
   * @Route (dashboard/inbox/delete)
   */
  public function delete()
  {
    $this->form_validation->set_rules('message_id', 'message id', 'required|integer|callback_message_exist');

    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', $this->form_validtion->error_array()['message_id'] ?? '');

      # redirect
      $this->redirect($this->input->post('redirect'));

      return;
    }

    if($this->contect->delete(array('id' => $this->message['id'])) === false)
    {

      return;
    }
  }

  /**
   * Check If Message Exist
   * 
   * @param   news_id
   * @return  boolean
   */
  public function message_exist($message_id)
  {
    $this->message = $this->contect->get(array('id' => $message_id))[0] ?? false;

    if($this->message === false)
    {
      $this->form_validation->set_message('message_exist', 'The {field} does not exist.');

      return false;
    }

    return true;
  }

  private function redirect()
  {
    echo 423423;
  }
}
