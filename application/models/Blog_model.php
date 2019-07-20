<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
  /**
   * blog category
   *
   * @param array
   */
  public const CATEGORY = array(
    0  => 'music',
    1  => 'fashion',
    2  => 'movie',
    3  => 'education',
    4  => 'health',
    5  => 'business',
    6  => 'technology',
    7  => 'sport',
    8  => 'fitness',
    9  => 'diy',
    10 => 'food',
    11 => 'otheirs'
  );

  /**
   * Picture Upload Configuration
   *
   * @var array
   */
  public const PICTURE_CONFIG = array(
    'upload_path'   => 'uploads/blog/pictures/',
    'max_size'      => 512, # 0.5mb maximum upload size
    'allowed_types' => array('png','jpeg','jpg')
  );


  /**
   * Select All Table Fields Releted To Blog
   *
   * @return object
   */
  private function select()
  {
    # select blog sql
    $select_sql = 'blog.*, accounts.username, accounts.name, accounts.surname, accounts.role, accounts.picture as profile_picture,
                   (SELECT COUNT(*) FROM blog_comments where blog_comments.blog_id = blog.id) as comments';

    return $this->db->select($select_sql)
                    ->join('accounts', 'accounts.id = blog.user_id', 'left');
  }

  /**
   * Get Latest Blog Post
   *
   * @param  integer
   * @param  integer
   * @return array
   */
  public function latest(int $limit = 10, int $offset = 0)
  {
    return $this->select()
                ->order_by('date','DESC')
                ->get('blog', $limit, $offset)
                ->result_array();
  }

  /**
   * Get Most Viewed blog Post
   *
   * @param  integer
   * @param  integer
   * @return array
   */
  public function most_viewed(int $limit = 10, int $offset = 0)
  {
    return $this->db->order_by('views','DESC')
                    ->order_by('date','DESC')
                    ->get('blog', $limit, $offset)
                    ->result_array();
  }

  /**
   * Get Most Viewed blog Post
   *
   * @param  integer
   * @param  integer
   * @return array
   */
  public function most_commented(int $limit = 10, int $offset = 0)
  {
    return $this->select()->order_by('comments','DESC')
                          ->order_by('views','DESC')
                          ->order_by('date','DESC')
                          ->get('blog', $limit, $offset)
                          ->result_array();
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
                ->get('blog', $limit, $offset)
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
   * Get Single blog Post By Slug
   *
   * @param  string
   * @return array
   */
  public function view(string $slug)
  {
    # get blog by slug
    $blog_item = $this->select()->where('slug', $slug)->get('blog')->result_array()[0] ?? false;

    # check if blog post exist in database
    if($blog_item === false)
    {
      # check if blog exist in ( blog API )
    }
    else
    {
      # check if client has not viewed blog post
      if(true)
      {
        # register a blog view
        $this->db->query("UPDATE `blog` SET `views`=views+1 WHERE id = {$blog_item['id']}");
      }
    }

    return $blog_item;
  }

  /**
   * Get blog
   *
   * @param   array
   * @return  array
   */
  public function get(array $where, int $limit = null, int $offset = null)
  {
    return $this->select()
                ->where($where)
                ->order_by('date', 'DESC')
                ->get('blog', $limit, $offset)
                ->result_array();
  }

  /**
   * Create New blog Item
   *
   * @param    array
   * @return   boolean
   */
  public function create(array $blog)
  {
    $data = array(
      'user_id'  => $blog['id'],
      'slug'     => $blog['slug'],
      'title'    => $blog['title'],
      'picture'  => $blog['picture'],
      'category' => $this::CATEGORY[$blog['category'] ?? count($this::CATEGORY) - 1],
      'post'     => $blog['post']
    );

    return $this->db->insert('blog', $data);
  }

  /**
   * Updated blog Item
   *
   * @param   array
   * @param   array
   * @return  boolean
   */
  public function update(array $where, array $update)
  {
    return $this->db->where($where)->update('blog', $update);
  }

   /**
   * Detele News Post
   * 
   * @param   array
   * @return  boolean
   */
  public function delete(array $where)
  {
    return $this->db->where($where)->delete('blog');
  }
}
