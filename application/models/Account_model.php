<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model
{
  /**
   * Picture Director Reference
   *
   * @var string
   */
  public const PICTURE_PATH = '/upload/news/picture/';

  /**
   * Defualt Picture
   *
   * @var string
   */
  public const PICTURE = 'user.png';

  /**
   * Account Roles
   *
   * @var array
   */
  public const ROLE = array(0 => 'guest', 1 => 'user', 2 => 'editor', 3 => 'administrator');

  /**
   * Get Account From Databae
   *
   * @param   array
   * @return  array
   */
  public function get(array $where)
  {
    return $this->db->where($where)->get('accounts')->result_array();
  }

  /**
   * Get Account By Username Or Email Or User_ID
   *
   * @param   string
   * @return  false
  */
  public function get_account(string $uid)
  {
    return $this->db->where('username', $uid)->or_where('email', $uid)->get('accounts')->result_array()[0] ?? false;
  }

  /**
   * Add Account To Database
   *
   * @param   array
   * @return  boolean
   */
  public function create(array $account)
  {
    $data = array(
      'username' => $account['username'],
      'email'    => $account['email'],
      'picture'  => $account['picture'] ?? $this::PICTURE_PATH.$this::PICTURE,
      'role'     => 1, # set user role to user on account create
      'name'     => $account['name']    ?? '',
      'surname'  => $account['surname'] ?? '',
      'password' => $account['password']
    );

    return $this->db->insert('accounts', $data);
  }

  /**
   * Change/Update Account
   *
   * @param   array
   * @param   array
   * @return  boolean
   */
  public function update(array $where,array $account)
  {
    $data = array(
      'name'     => $account['name']    ?? '',
      'surname'  => $account['surname'] ?? ''
    );

    return $this->db->where($where)
                    ->update('accounts', $account);
  }

  /**
   * Change/Update Account Password
   *
   * @param   array
   * @param   array
   * @return  boolean
   */
  public function change_password(array $where, string $password)
  {
    return $this->db->where($where)
                    ->update('accounts', array('password' => $password));
  }

  /**
   * Delete Account
   *
   * @param   array
   * @return  boolean
   */
  public function delete(array $where)
  {
    return $this->db->where($where)->delete('accounts');
  }

}
