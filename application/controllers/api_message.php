<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_message extends CI_Controller
{
  /**
   * @Route (api/message/send)
   */
  public function send()
  {
    # post data from php stream
    $post = file_get_contents('php://input');
    $post = json_decode($post, true);

    # check if is array
    if(is_array($post)) {
      $_POST = array_merge($post, $_POST);
    }

    # validate required data
    $this->form_validation->set_rules('name', 'name', 'required|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('surname', 'surname', 'required|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('phone_number', 'phone number', 'callback_phone_number_valid');
    $this->form_validation->set_rules('subject', 'subject', 'required');
    $this->form_validation->set_rules('email', 'email address', 'valid_email');
    $this->form_validation->set_rules('message', 'message', 'required|min_length[10]|max_length[2500]');

    # check if data is valid
    if($this->form_validation->run() === false)
    {
      # error response
      echo json_encode(array(
        'status' => false,
        'data'   => $this->form_validation->error_array()
      ));

      return;
    }

    # message data
    $data = array(
      'name'         => $this->input->post('name'),
      'surname'      => $this->input->post('surname'),
      'phone_number' => $this->input->post('phone_number'),
      'subject'      => $this->input->post('subject'),
      'email'        => $this->input->post('email'),
      'message'      => $this->input->post('message')
    );

    # insert message in Database
    if($this->contect->create($data) === false)
    {
      # error response
      echo json_encode(array(
        'status' => false,
        'data'   => array(
          'message' => 'Something went wrong when trying to connect to database'
        )
      ));

      return;
    }

    # success response
    echo json_encode(array(
      'status' => true,
      'data'   => array(
        'message' => 'Thank your for your message.'
      )
    ));
  }

  /**
   * @Route (api/message/subject)
   */
  public function subjects()
  {
    echo json_encode($this->contect::SUBJECT_CATEGORY);
  }

  /**
   * Check If Phone Number is a valid
   *
   * @// NOTE: Check if phone number is a valid south africa phone number
   *
   * @param   string
   * @return  boolean
   */
  public function phone_number_valid($phone_number)
  {
    # check if phone number is valid
    if(preg_match($this->contect::PHONE_NUMBER_REGEX, $phone_number) == 0)
    {
      $this->form_validation->set_message('phone_number_valid', 'The {field} field is invalid please enter a valid south african phone number.');

      return false;
    }

    return true;
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
