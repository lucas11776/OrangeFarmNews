<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication
{
  /**
   * CodeIgniter Super Global Object
   *
   * @var object
   */
   protected $CI;

  /**
   * Client/User Account
   *
   * @var array
   */
   private $client_account;

  /**
   * Get Client Token Form Session Or Cookie And Decrypt Token
   *
   * @// NOTE: Please notice validation is done per request
   */
  public function __construct()
  {
    # codeigniter super global
    $this->CI =& get_instance();

    # get token from session or cookie
    $token = $this->CI->session->userdata('token') ?? $this->CI->input->cookie('token');

    # check if token if valid
    $this->client_account = $this->validate_token($token ?? '');
  }

  /**
   * Check If Token Is Valid
   *
   * @// NOTE: If token is valid it will be decrypted and return array formant
   *
   * @param   string
   * @return  array
   */
  public function validate_token(string $token)
  {
    # decrypt token
    $token = $this->CI->encryption->decrypt($token);

    # decode token to php array
    $token = json_decode($token, true);

    # check if token if valid
    if(!is_array($token))
    {
      return false;
    }

    # check if token ip address matches client ip address
    if($token['ip_address'] != $this->CI->input->ip_address())
    {
      return false;
    }

    # load account model
    $this->CI->load->model(array('account_model' => 'account'));

    # get client account from database
    return $this->CI->account->get(array('id' => $token['id']))[0];
  }

  /**
   * Get Current User Account Details
   *
   * @param   string
   * @return  array
   */
  public function account(string $field = null)
  {
    if($field !== null)
    {
      return isset($this->client_account[$field]) ? $this->client_account[$field] : null;
    }

    return $this->client_account;
  }

  /**
   * Check If Client If Guest
   *
   * @param   boolean
   * @return  boolean
   */
  public function guest($redirect = true)
  {
    # check if client is guest
    $status = $this->account('role') === null;

    # check if required to be guest
    $this->redirect($redirect, $status);

    return $status;
  }

  /**
   * Check If Client If User
   *
   * @param   boolean
   * @return  boolean
   */
  public function user($redirect = true)
  {
    # check if client is user
    $status = $this->account('role') >= 1;

    # check if required to be user
    $this->redirect($redirect, $status, 'login');

    return $status;
  }

  /**
   * Check If Client If Editor
   *
   * @param   boolean
   * @return  boolean
   */
  public function editor($redirect = true)
  {
    # check if client is editor
    $status = $this->account('role') >= 2;

    # check if required to be editor
    $this->redirect($redirect, $status, 'login');

    return $status;
  }

  /**
   * Check If Client If Administrator
   *
   * @param   boolean
   * @return  boolean
   */
  public function administrator($redirect = true)
  {
    # check if client is administrator
    $status  = $this->account('role') == 3;

    # check if required to be administrator
    $this->redirect($redirect, $status, 'login');

    return $status;
  }

  protected function redirect(bool $redirect, bool $status, string $location = '')
  {
    if($redirect && $status === false)
    {
      redirect($location . '?r=' . uri_string());
    }
  }

}
