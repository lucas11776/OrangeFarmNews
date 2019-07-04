<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{
  /**
   * News category
   *
   * @param array
   */
  public const CATEGORY = array(
    0  => 'sport',
    1  => 'breaking-news',
    2  => 'community',
    3  => 'international',
    4  => 'crime',
    5  => 'health',
    6  => 'politics',
    7  => 'education',
    8  => 'finaci',
    9  => '',
    10 => ''
  );

  /**
   * Picture Upload Configuration
   *
   * @var array
   */
  public const PICTURE_CONFIG = array(
    'upload_path'   => './uploads/',
    'max_size'      => 512, # 0.5mb maximum upload size
    'allowed_types' => array('png','jpeg','jpg')
  );

  /**
   * Get Latest News Post
   *
   * @param  integer
   * @param  integer
   * @return array
   */
  public function latest(int $limit = 10, int $offset = 0)
  {
    return $this->db->order_by('date','DESC')->get('news', $limit, $offset)->result_array();
  }

  /**
   * Get Most Viewed News Post
   *
   * @param  integer
   * @param  integer
   * @return array
   */
  public function most_viewed(int $limit = 10, int $offset = 0)
  {
    return $this->db->order_by('views','DESC')->order_by('date','DESC')->get('news', $limit, $offset)->result_array();
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

    return $this->db->count_all_results('news');
  }

  private function where(array $where)
  {
    foreach ($where as $key => $value)
    {
      $this->db->where($key, $value);
    }
  }

  /**
   * Multi
   */
  private function like(array $like)
  {
    # loop count
    $index = 0;

    foreach ($data as $key => $value)
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
   * Random Pick News Post
   *
   * @param  integer
   * @return array
   */
  public function random_pick(int $limit = 10)
  {
    return $this->db->order_by(50, 'RANDOM')->get('news', $limit)->result_array();
  }

  /**
   * Get Single News Post By Slug
   *
   * @param  string
   * @return array
   */
  public function view(string $slug)
  {
    # get news by slug
    $news_item = $this->db->where('slug', $slug)->get('news')->result_array()[0] ?? false;

    # check if news post exist in database
    if($news_item === false)
    {
      # check if news exist in ( News API )
    }
    else
    {
      # check if client has not viewed news post
      if(false)
      {
        # register a news view
        $this->update(array('id' => $news_item['id']), array('views' => 'views+1'));
      }
    }

    return $news_item;
  }

  /**
   * Create New News Item
   *
   * @param    array
   * @return   boolean
   */
  public function create(array $news)
  {
    $data = array(
      'user_id'  => $news['id'],
      'slug'     => $news['slug'],
      'title'    => $news['title'],
      'picture'  => $news['picture'],
      'category' => $news['category'],
      'post'     => $news['post']
    );

    return $this->db->insert('news', $data);
  }
}
