<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contect_model extends CI_Model
{
  /**
   * Phone Number Regex Express (South Africa)
   *
   * @var string
   */
  public const PHONE_NUMBER_REGEX = "/(\+27|0)(6|7|8)[0-9]{8}/";

  /**
   * Telephone Number Regex Express (South Africa)
   *
   * @var string
   */
  public const TELEPHONE_NUMBER_REGEX = '';

  /**
   * Message Category
   *
   * @var array
   */
  public const SUBJECT_CATEGORY = array(
    0 => 'report-news',
    1 => 'message',
    2 => 'advertisement',
    3 => 'personal',
    4 => 'report-bug',
    5 => 'otheirs'
  );

  /**
   * Add Message To Database
   *
   * @param   array
   * @return  boolean
   */
  public function create(array $message)
  {
    $data = array(
      'name'         => $message['name'],
      'surname'      => $message['surname'],
      'email'        => $message['email'],
      'phone_number' => $message['phone_number'],
      'message'      => $message['message']
    );

    return $this->db->insert('contect', $data);
  }

  /**
   * View A Single Message By Id
   *
   * @param   integer
   * @return  array
   */
  public function view(int $id)
  {
    $message = $this->db->where(array('id' => $id))->get('contect')->result_array()[0] ?? false;

    // set message to seen if not seen
    if(($message['seen'] ?? 'no-seen') == 0)
    {
      $this->db->where('id', $message['id'])->update('contect' , array('seen' => 1));
    }

    return $message;
  }

  /**
   * Delete Message In Contect
   *
   * @param  array
   * @return boolean
   */
  public function delete(array $where)
  {
    return $this->db->where($where)->delete('contect');
  }
}
