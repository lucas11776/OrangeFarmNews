<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model
{
  /**
   * Defualt Picture
   *
   * @var string
   */
  public const PICTURE = 'user.png';

  /**
   * Picture Upload Configuration
   *
   * @var array
   */
  public const PICTURE_CONFIG = array(
    'upload_path'   => 'uploads/accounts/pictures/',
    'max_size'      => 512, # 0.5mb maximum upload size
    'allowed_types' => array('png','jpeg','jpg')
  );


  /**
   * Account Roles
   *
   * @var array
   */
  public const ROLE = array(0 => 'blocked', 1 => 'user', 2 => 'editor', 3 => 'administrator');

  /**
   * Accounts With Super Administrator Privileges
   *
   * @var array
   */
  private const SUPER_ADMIN = array('thembangubeni04@gmail.com');


  /**
   * Check if user account is super administrator
   *
   * @param   array
   * @return  boolean
   */
  public function user_super_admin(array $account)
  {
    return in_array($account['email'] ?? '', $this::SUPER_ADMIN) && !in_array($this->auth->account('email'), $this::SUPER_ADMIN);
  }

  private function select()
  {
    return $this->db->select('accounts.*, newsletter.subscribed')
                    ->join('newsletter', 'newsletter.email = accounts.email', 'LEFT');
  }

  /**
   * Get Account From Databae
   *
   * @param   array
   * @return  array
   */
  public function accounts(array $where, int $limit = null, int $offset = null)
  {
    return $this->select()->where($where)->order_by('id','DESC')->get('accounts', $limit, $offset)->result_array();
  }

  /**
   * Get Account From Databae
   *
   * @param   array
   * @return  array
   */
  public function get(array $where, int $limit = null, int $offset = null)
  {
    return $this->select()
                ->where($where)
                ->get('accounts', $limit, $offset)
                ->result_array();
  }

  /**
   * Get Account By Username Or Email Or User_ID
   *
   * @param   string
   * @return  false
  */
  public function get_account(string $uid)
  {
    return $this->select()
                ->where('accounts.username', $uid)
                ->or_where('accounts.email', $uid)
                ->get('accounts')
                ->result_array()[0] ?? false;
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
      'picture'  => $account['picture'] ?? base_url($this::PICTURE_CONFIG['upload_path'].$this::PICTURE),
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

    # check if profile picture isset
    if(isset($data['picture']))
    {
      $data['picture'] = $account['picture'];
    }

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
    return $this->select()->like($like)
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

    return $this->db;
  }

  /**
   * Change/Update Account Password
   *
   * @param   int
   * @param   string
   * @return  boolean
   */
  public function change_password(int $uid, string $password)
  {
    return $this->db->where(array('id' => $uid))->update('accounts', array('password' => $password));
  }

  /**
   * Change User Role
   *
   * @param   integer
   * @param   integer
   * @return  boolean
   */
  public function change_role(int $id, int $role)
  {
    return $this->db->where(array('id' => $id))
                    ->update('accounts', array('role' => $role));
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
