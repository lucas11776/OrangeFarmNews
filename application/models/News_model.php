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
     'upload_path'   => '/uploads/news/pictures/',
     'max_size'      => 512, # 0.5mb maximum upload size
     'allowed_types' => array('png','jpeg','jpg')
   );

   /**
    * Get Latest News Post
    */
   public function latest($limit = 10, $offset = 0)
   {
     return $this->db->order_by('date','DESC')->get('news', $limit, $offset)->result_array();
   }

   /**
    * Get Most Viewed News Post
    */
   public function most_viewed($limit = 10, $offset = 0)
   {
     return $this->db->order_by('views','DESC')->order_by('date','DESC')->get('news', $limit, $offset)->result_array();
   }

   /**
    * Random Pick News Post
    */
   public function random_pick($limit = 10, $offset = 0)
   {

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
        'category' => $news['category'],
        'post'     => $news['post']
      );

      return $this->db->insert('news', $data);
    }
}
