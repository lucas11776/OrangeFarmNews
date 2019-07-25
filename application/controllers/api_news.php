<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_news extends CI_Controller
{
  /**
   * @Route (api/news)
   */
  public function news_request()
  {
    # page
    $page = is_numeric($_GET['page'] ?? null) ? $_GET['page'] : 0;

    # data limit
    $limit = is_numeric($_GET['limit'] ?? null) ? $_GET['limit'] : 10;

    # count number of news in database
    $total = $this->news->count();

    # get latest news
    $news = $this->news->latest($limit, $page);

    # clean news post
    $news = $this->clean_data($news);

    echo json_encode(array('total' => $total, 'articles' => $news));
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