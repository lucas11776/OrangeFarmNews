<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_jobs extends CI_controller
{
  /**
   * @Route (cron_jobs/news/newsletter)
   *
   * Send News To NewsLetter (Subscribed)
   */
  public function news_newsletter_cron_job()
  {
    # reset time 12Hours back
    $time = date('Y-m-d', time()-(((60*60*12)*2) * 10));

    # search news by date
    $data = array(
      'title'        => 'Morning News Update',
      'posts'        => $this->news->search(array('news.date' => $time)),
      'article_type' => 'news'
    );

    # email html template
    $html = $this->newsletter_template->html($data);

    $url = 'https://newsapi.org/v2/top-headlines?country=za&apiKey=6f5a22da84764f66a110244397782353';


    # check if they are news

    # send newsletter to emails
  }

    /**
   * @Route (cron_jobs/blog/newsletter)
   *
   * Send Blog To NewsLetter (Subscribed)
   */
  public function news_newsletter_cron_blog()
  {

  }
}
