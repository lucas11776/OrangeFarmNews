<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller
{
  /**
   * Client Newsletter Account
   *
   * @var array
   */
  private $newsletter_account;

  public function subscribe()
  {
    $this->form_validation->set_rules('newsletter_email', 'email address', 'required|email_valid|callback_email_exist');
  }

  public function unsubscribe()
  {

  }

  public function email_subscribed($email)
  {
    # populate newsletter account
    $this->newsletter_account = $this->newsletter->get(array('email' => $email))[0] ?? array();

    # check if email exist in newsletter
    if(count($this->newsletter_account) !== 0)
    {
      # check if user is subscribe to newletter
      if($this->newsletter_account['subscribed'] == 1)
      {
        $this->form_validation->set_message('email_subscribed', 'The {field} your enter is subscribed to newsletter.');

        return false;
      }
    }

    return true;
  }

  public function email_unsubscribed($email)
  {
    
