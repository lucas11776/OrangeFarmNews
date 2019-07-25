<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_message extends CI_Controller
{
  /**
   * @Route (api/message/send)
   */
  public function send()
  {
    # validate required data
    $this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('surname', 'surname', 'required|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('phone_number', 'phone number', 'callback_phone_number_valid');
    $this->form_validation->set_rules('subject', 'subject', 'required');
    $this->form_validation->set_rules('email', 'email address', 'valid_email');
    $this->form_validation->set_rules('message', 'message', 'required|min_length[10]|max_length[2500]');
  }

  /**
   * @Route (api/message/subject)
   */
  public function subjects()
  {
    echo json_encode($this->contect::SUBJECT_CATEGORY);
  }

  /**
   * Check If Message Subject Is Valid
   *
   * @param   int
   * @return  boolean
   */
  public function subject_valid($subject)
  {
    # check if subjeck exist in category
    if(in_array($subject, $this->contect::SUBJECT_CATEGORY) === false)
    {
      $this->form_validation->set_massage('subject_valid', 'The {field} is invalid please select correct category.');
    }

    return true;
  }
}
