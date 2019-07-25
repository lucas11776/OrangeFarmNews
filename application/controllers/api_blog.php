<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_blog extends CI_Controller
{
  /**
   * @Route (api/blog)
   */
  public function blog_request()
  {
    # page
    $page = is_numeric($_GET['page'] ?? null) ? $_GET['page'] : 0;

    # data limit
    $limit = is_numeric($_GET['limit'] ?? null) ? $_GET['limit'] : 10;

    # count number of blog in database
    $total = $this->blog->count();

    # get latest blog
    $blog = $this->blog->latest($limit, $page);

    # clean blog post
    $blog = $this->clean_data($blog);

    echo json_encode(array('total' => $total, 'articles' => $blog));
  }

  /**
   * Check New Result From Database
   * 
   * @param   array
   * @return  array
   */
  public function clean_data(array $data)
  {
    $data_copy = array();

    for($i = 0; $i < count($data); $i++)
    {
      $data_copy[] = array(
        'title'       => $data[$i]['title'],
        'picture'     => $data[$i]['picture'],
        'category'    => $data[$i]['category'],
        'author'      => $data[$i]['username'],
        'description' => word_limiter(strip_tags($data[$i]['post']), 35),
        'post'        => $data[$i]['post'],
        'comments'    => $data[$i]['comments'],
        'views'       => $data[$i]['views']
      );
    }

    return $data_copy;
  }
}