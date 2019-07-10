<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contect extends CI_Controller
{

  /**
   * Contect Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('contect/'.$page, $details);
    $this->load->view('template/footer', $details);
  }

  /**
   * @Route (contect)
   */
  public function index()
  {
    # page details
    $page_details = array(
      'title'       => 'Getting in touch with OrangeFarmNews is so easy and simple',
      'description' => `Getting in touch with us is so simple you can go to are office at Nelgate, call us or use
                        our simple form application by just filling in your details and sending them to us.`,
      'active'       => 'contact',
      'navbar_adv' => false
      //'news_updated' => $this->news->random_pick(5),
      //'blog_updated' => $this->news->random_pick(5)
    );

    # validate required data
    $this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[20]');
    $this->form_validation->set_rules('surname', 'surname', 'required|min_length[2]|max_length[20]');
    $this->form_validation->set_rules('phone_number', 'phone number', 'required|callback_phone_number_valid');
    $this->form_validation->set_rules('subject', 'subject', 'required');
    $this->form_validation->set_rules('email', 'email address', 'valid_email');
    $this->form_validation->set_rules('message', 'message', 'required|min_length[10]|max_length[2500]');

    # check if data is valid
    if($this->form_validation->run() === false)
    {
      $this->view('create', $page_details);

      return;
    }

    # client message data
    $message = array(
      'name'         => $this->input->post('name'),
      'surname'      => $this->input->post('surname'),
      'phone_number' => $this->input->post('phone_number'),
      'email'        => $this->input->post('email'),
      'subject'      => $this->input->post('subject'),
      'message'      => $this->input->post('message')
    );

    print_r($message);

    die('--------------------------');

    # insert message to database
    if($this->contect->create($message))
    {
      # page
      $this->view('create', $details);

      return;
    }

    // success page details
    $page_success_details = array(
      'icon'    => 'fa fa-envelope-open-o',
      'title'   => 'Message Sent Successfully.',
      'message' => 'Your message has been sent successfully we will get back to your'
    );

    # page
    $this->view('../404', $page_success_details);
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
    #print_r(preg_match($this->contect::PHONE_NUMBER_REGEX, $phone_number));
    #die("----------------- {$phone_number} -------------------");
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
      $this->form_validation->set_massage('subject_valid', 'The {} field is invalid please select correct category.');
    }

    return true;
  }
}
