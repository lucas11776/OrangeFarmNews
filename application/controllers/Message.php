<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{
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
   * @Route (dashboard/message)
   */
  public function index()
  {
    # page details
    $page_details = array(
      'title'           => 'Inbox (messages).',
      'description'     => 'Message Center For Administrator.',
      'active'          => 'Inbox',
      'summary'         => $this->stats->summary(),
      'unread_messages' => $this->contect->get(array('seen' => 0), 5),
      'messages'        => $this->contect->get(null, 10)
    );

    $this->view('index', $page_details);
  }

  /**
   * @Route (dashboard/message/:id)
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
}
