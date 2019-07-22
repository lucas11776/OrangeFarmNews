<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_api_model extends CI_Model
{
  public const API_KEY = '6f5a22da84764f66a110244397782353';

  public function local_news(int $limit = 9)
  {
    # request url
    $url = "https://newsapi.org/v2/top-headlines?country=za&pageSize={$limit}&apiKey=" . $this::API_KEY;

    # make api request
    $news = $this->rest_api->get($url);

    # check if request success
    if(($news['status'] ?? null) != 'ok')
    {
      return false;
    }

    return $news['articles'];
  }

  public function internation_news()
  {

  }
}
