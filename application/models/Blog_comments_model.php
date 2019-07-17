<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_comments_model extends CI_Model
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
      'blog_id'   => $where['blog_id'],
      'parent_id' => $where['parent_id'] ?? 0,
      'user_id'   => $where['user_id'],
      'comment'   => $where['comment']
    );

    return $this->db->insert('blog_comments', $data);
  }

  /**
   * Select Comments Fields
   */
  private function select()
  {
    return $this->db->select('
      blog_comments.*,
      (SELECT picture FROM accounts WHERE blog_comments.user_id = accounts.id) as picture,
      (SELECT username FROM accounts WHERE blog_comments.user_id = accounts.id) as username,
      (SELECT email FROM accounts WHERE blog_comments.user_id = accounts.id) as email,
      (SELECT name FROM accounts WHERE blog_comments.user_id = accounts.id) as name,
      (SELECT surname FROM accounts WHERE blog_comments.user_id = accounts.id) as surname
    ');
  }

  /**
   * Get Comment In Database
   *
   * @param   array
   * @return  boolean
   */
  public function get(array $where)
  {
    return $this->select()->where($where)->get('blog_comments')->result_array();
  }

  /**
   * Delete Comment in Database
   *
   * @param   array
   * @return  boolean
   */
  public function delete(array $where)
  {
    return $this->db->where($where)->delete('blog_comments');
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
