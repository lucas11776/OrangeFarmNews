<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model
{
  /**
   * Picture Director Reference
   *
   * @var string
   */
  public const PICTURE_PATH = '/upload/accounts/picture/';

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
  public function accounts(array $where, int $limit = null, int $offset = null)
  {
    return $this->db->where($where)->order_by('id','DESC')->get('accounts', $limit, $offset)->result_array();
  }

  /**
   * Get Account From Databae
   *
   * @param   array
   * @return  array
   */
  public function get(array $where, int $limit = null, int $offset = null)
  {
    return $this->db->where($where)->get('accounts', $limit, $offset)->result_array();
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
   * Get Account Full Name Or Username
   *
   * @param   array
   * @return  string
   */
  public function get_account_name(array $account)
  {
    return empty($account['name']) || empty($account['surname']) ? $account['username'] : $account['name'] . ' ' . $account['surname'];
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
      'picture'  => base_url($account['picture'] ?? $this::PICTURE_PATH.$this::PICTURE),
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
   * Count Number Of Result In Database
   *
   * @param   string
   * @param   array
   * @return  integer
   */
  public function count(string $type = '', array $data = array())
  {
    switch ($type) {
      case 'like':
        $this->like($data);
        break;
      case 'where':
        $this->where($data);
        break;
    }

    return $this->db->count_all_results('blog');
  }

  /**
   * Search Term In Title Field Of blog Table
   *
   * @param   array
   * @param   integer
   * @param   integer
   * @return  array
   */
  public function search(array $like, int $limit = 10, int $offset = 0)
  {
    $this->like($like);

    return $this->select()
                ->order_by('id', 'DESC')
                ->get('accounts', $limit, $offset)
                ->result_array();
  }

  /**
   * Multi Where Cluea
   *
   * @param array
   * @return void
   */
  private function where(array $where)
  {
    foreach ($where as $key => $value)
    {
      $this->db->where($key, $value);
    }
  }

  /**
   * Multi Like Cluea
   *
   * @param array
   * @return void
   */
  private function like(array $like)
  {
    # loop count
    $index = 0;

    foreach ($like as $key => $value)
    {
      # check if first loop
      if($index == 0)
      {
        $this->db->like($key, $value);
      }
      else
      {
        $this->db->or_like($key, $value);
      }

      # add one to loop count
      ++$index;
    }
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
