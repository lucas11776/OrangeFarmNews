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
    0  => 'breaking-news',
    1  => 'sport',
    2  => 'community',
    3  => 'crime',
    4  => 'jobs',
    5  => 'international',
    6  => 'health',
    7  => 'education',
    8  => 'politics',
    9  => 'finance',
    10 => 'otheirs'
  );

  /**
   * Picture Upload Configuration
   *
   * @var array
   */
  public const PICTURE_CONFIG = array(
    'upload_path'   => 'uploads/news/pictures/',
    'max_size'      => 512, # 0.5mb maximum upload size
    'allowed_types' => array('png','jpeg','jpg')
  );

  /**
   * Select All Table Fields Releted To News
   *
   * @return object
   */
  private function select()
  {
    # select news sql
    $select_sql = 'news.*, accounts.username, accounts.name, accounts.surname,
                   (SELECT COUNT(*) FROM news_comments where news_comments.news_id = news.id) as comments';

    return $this->db->select($select_sql)
                    ->join('accounts', 'accounts.id = news.user_id', 'left');
  }

  /**
   * Get Latest News Post
   *
   * @param  integer
   * @param  integer
   * @return array
   */
  public function latest(int $limit = 10, int $offset = 0)
  {
    return $this->select()->order_by('date','DESC')->get('news', $limit, $offset)->result_array();
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

  public function search(array $like, int $limit = 10, int $offset = 0)
  {
    $this->like($like);

    return $this->db->order_by('id', 'DESC')->get('news', $limit, $offset)->result_array();
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
      if(true)
      {
        # register a news view
        $this->db->query("UPDATE `news` SET `views`=views+1 WHERE id = {$news_item['id']}");
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
      'category' => $this::CATEGORY[$news['category'] ?? count($this::CATEGORY) - 1],
      'post'     => $news['post']
    );

    return $this->db->insert('news', $data);
  }

  /**
   * Updated News Item
   *
   * @param   array
   * @param   array
   * @return  boolean
   */
  public function update(array $where, array $update)
  {
    return $this->db->where($where)->update('news', $update);
  }
}
