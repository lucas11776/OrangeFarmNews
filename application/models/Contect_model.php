<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contect_model extends CI_Controller
{
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

  public function view(int $id)
  {
    $message = $this->db->where(array('id' => $id))->get('contect')->result_array()[0] ?? false;

    // set message to seen if not seen
    if(($message['seen'] ?? 'no') == 0)
    {

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
