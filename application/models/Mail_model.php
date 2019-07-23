<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model
{
  /**
   * Email Address
   * 
   * @var string
   */
  public const EMAIL = 'testm2697@gmail.com';

  /**
   * Email Address Password
   * 
   * @var string
   */
  private const PASSWORD = 'qwerty@360';

  public function __construct()
  {
    $this->config = array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => $this::EMAIL,     // email address (main website email)
      'smtp_pass' => $this::PASSWORD,  // email password
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

    # initialize 
    $this->email->initialize($config);
  }

  public function send(array $data)
  {
    # check all required data
    $data = array(
      'email'   => $data['email'],
      'subject' => $data['subject'],
      'html'    => $data['html']
    );

    print_r($data);

    $this->email->set_newline("\r\n");
    $this->email->from($this::EMAIL, 'Orange Farm News');
    $this->email->to($data['email']);
    $this->email->subject($data['subject']); 
    $this->email->message('Hello World…');
  }

}