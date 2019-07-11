<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_comments extends CI_Model
{
  /**
   * Store Comment In Database
   *
   * @param   array
   * @return  boolean
   */
  public function create(array $where)
  {
    $data = array(
      'news_id'   => $where['news_id'],
      'parent_id' => $where['parent_id'] ?? 0,
      'user_id'   => $where['user_id'],
      'comment'   => $where['comment']
    );

    return $this->db->insert('news_comments', $data);
  }

  /**
   * Get Comment In Database
   *
   * @param   array
   * @return  boolean
   */
  public function get()
  {

  }

  /**
   * Delete Comment in Database
   *
   * @param   array
   * @return  boolean
   */
  public function delete(array $where)
  {
    return $this->db->where($where)->delete('news_comments');
  }

  /**
   * Delete Comment in Database Using or_where
   *
   * @param   array
   * @return  boolean
   */
  public function or_delete(array $where)
  {
    $index = 0;

    foreach ($where as $key => $value)
    {
      if($index === 0)
      {
        $this->db->where($key, $value);
      }
      else
      {
        $this->db->or_where($key, $value);
      }

      ++$index;
    }

    return $this->db->delete();
  }

}
