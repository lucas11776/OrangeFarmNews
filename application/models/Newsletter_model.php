<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
  /**
   * Get All Emails Subscribed To Newletter
   * 
   * @return array
   */
  public function subscribed()
  {
    # get all email
    $subscribed_email = $this->db->select('email')->where(array('subscribed' => 1))->get('newsletter')->result_array();

    $emails = array();
    
    for($i = 0; $i < count($subscribed_email); $i++)
    {
      array_push($emails, $subscribed_email[$i]['email']);
    }

    return $emails;
  }

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
