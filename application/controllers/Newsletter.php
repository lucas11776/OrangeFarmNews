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
    # valid required data
    $this->form_validation->set_rules('email', 'email address', 'required|valid_email|callback_email_subscribed');

    # check if data is valid
    if($this->form_validation->run() === false)
    {
      # alert user of error
      $this->session->set_flashdata('alert-danger', form_error('newsletter_email', '<span>', '</span>'));
      $this->session->set_flashdata('newsletter_error', form_error('newsletter_email', '<span>', '</span>'));

      $this->redirect($this->input->post('redirect'));
    }

    # newsletter data
    $newsletter = array(
      'email'      => $this->input->post('email'),
      'subscribed' => 1
    );

    # check if account exist has prev subscribe to newsletter
    if(count($this->newsletter_account) === 0)
    {
      # create new newsletter item
      if($this->newsletter->create($newsletter) === false)
      {
        # alert user
        $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to database.');
        $this->session->set_flashdata('newsletter_error', 'Something went wrong when tring to connect to database.');

        $this->redirect($this->input->post('redirect'));
      }
    }
    else
    {
      $where  = array('email' => $newsletter['email']);
      $update = array('subscribed' => 1);

      # update news letter
      if($this->newsletter->update($where, $update) === false)
      {
        # alert user
        $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to database.');
        $this->session->set_flashdata('newsletter_error', 'Something went wrong when tring to connect to database.');

        $this->redirect($this->input->post('redirect'));
      }
    }

    # success
    $this->session->set_flashdata('alert-success', 'Thank your for subscribing to our newsletter your will now get the latest content from OrangeFarmNews.');

    $this->redirect($this->input->post('redirect'));
  }

  /**
   * @Route ()
   *
   */
  public function unsubscribe()
  {
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_unsubscribed');

    # check if data is valid
    if($this->form_validation->run() === false)
    {
      # alert user of error
      $this->session->set_flashdata('alert-danger', form_error('email', '<span>', '</span>'));
      $this->session->set_flashdata('newsletter_error', form_error('email', '<span>', '</span>'));

      $this->redirect($this->input->post('redirect'));
    }

    # where
    $where = array('email' => $this->newsletter_account['email']);
    # update
    $update = array('subscribed' => 0);

    # unsubscribe to news letter
    if($this->newsletter->update($where, $update) === false)
    {
      # alert user
      $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to database.');
      $this->session->set_flashdata('newsletter_error', 'Something went wrong when tring to connect to database.');
    }
    else
    {
      # success
      $this->session->set_flashdata('alert-success', 'You have successfully unsubscribe to Orange Farm Newsletter.');
    }

    $this->redirect($this->input->post('redirect'));
  }

  /**
   * Redirect With GET params
   *
   * @param   string
   * @return  void
   */
  private function redirect(string $url)
  {
    # get params
    $params = '';

    # check if the search term
    if($this->input->post('term'))
    {
      $params .= '?term=' . $this->input->post('term');
    }

    # check if the page
    if(is_numeric($this->input->post('page')))
    {
      $params = empty($params) ? '?' : $params;
      $params .= '&page=' . $this->input->post('page');
    }

    # check if the page
    if(is_string($this->input->post('newsletter')))
    {
      $params = empty($params) ? '?' : $params;
      $params .= '&newsletter=' . $this->input->post('newsletter');
    }

    redirect($url . $params);
  }

  /**
   * Check Is Email Is Not Subscribe To Newsletter
   *
   * @param   string
   * @return  boolean
   */
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

  /**
   * Check Is Email Is Subscribe To Newsletter
   *
   * @param   string
   * @return  boolean
   */
  public function email_unsubscribed($email)
  {
    # populate newsletter account
    $this->newsletter_account = $this->newsletter->get(array('email' => $email))[0] ?? array();

    # check if email exist in newsletter
    if(count($this->newsletter_account) === 0)
    {
      $this->form_validation->set_message('email_unsubscribed', 'The {field} your enter is not subscribed to our newsletter.');

      return false;
    }

    # check if email is subscribe to newsletter
    if($this->newsletter_account['subscribed'] == 0)
    {
      $this->form_validation->set_message('email_unsubscribed', 'The {field} you enter is already unsubscribe to our newsletter.');

      return false;
    }

    return true;
  }

}
