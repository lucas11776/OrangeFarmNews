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
      'description' => 'Want to get in touch with OrangeFarmNews do worry your can get in touch with us using contect form.\n'.
                       'It is so easy just fill in your details and click send and we will get back to your with response.',
      'active'      => 'contact',
      'news_updated' => $this->news->random_pick(5)
    );

    # validate required data
    $this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[20]');
    $this->form_validation->set_rules('surname', 'surname', 'required|min_length[2]|max_length[20]');
    $this->form_validation->set_rules('phone_number', 'phone number', 'required|min_length[2]|max_length[10]');
    $this->form_validation->set_rules('subject', 'subject', 'required, required|callback_subject_exist');
    $this->form_validation->set_rules('email', 'email address', 'valid_email');
    $this->form_validation->set_rules('message', 'message', 'required|min_length[10]|max_length[2500]');

    # check if data is valid
    if($this->form_validation->run() === false)
    {
      $this->view('create', $page_details);

      return;
    }

    // client data
    $message = array(
      'name'         => $this->input->post('name'),
      'surname'      => $this->input->post('surname'),
      'phone_number' => $this->input->post('phone_number'),
      'email'        => $this->input->post(''),
      '' => $this->input->post('')
    );

  }

  /**
   * Check If Message Subject Is Valid
   * 
   * @param   int
   * @return  boolean
   */
  public function subject_exist($key)
  {

  }
}
