<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
  /**
   * Get Newsletter From Database
   *
   * @param   array
   * @return  array
   */
  public function get(array $where)
  {
    return $this->db->where($where)->get('newsletter')->result_array();
  }

  /**
   * Insert NewsLetter Iterm In Database
   *
   * @param   array
   * @return  boolean
   */
  public function create(array $newsletter)
  {
    $data = array(
      'email'      => $newsletter['email'],
      'subscribed' => $newsletter['subscribed'] ?? 1 # default is_subscribed
    );

    return $this->db->insert('newsletter', $data);
  }

  /**
   * Updated NewsLetter Item In Database
   *
   * @param   array
   * @param   array
   * @return  array
   */
  public function update(array $where, array $update)
  {
    return $this->db->where($where)->update('newsletter', $update);
  }

  /**
   * Delete Newsletter Item In Database
   *
   * @param   array
   * @return  boolean
   */
  public function delete(array $where)
  {

  }

}
