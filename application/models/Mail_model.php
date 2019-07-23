<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model
{
  /**
   * Email Address
   * 
   * @var string
   */
  public const EMAIL = 'thembangubeni04@gmail.com';

  /**
   * Email Address Password
   * 
   * @var string
   */
  private const PASSWORD = '11776@1999th';

  /**
   * initialize email
   */
  public function __construct()
  {
    $config = array(
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

    $this->email->set_newline("\r\n");
    $this->email->from($this::EMAIL);
    $this->email->to($data['email']);   
    $this->email->subject($data['subject']);
    $this->email->message($data['html']);

    # send email
    $mail_sent = $this->email->send();

    # email error (debugging)
    # show_error($this->email->print_debugger());

    return $mail_sent;
  }

}