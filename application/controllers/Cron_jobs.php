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

    # search news by date (required newsletter details)
    $data = array(
      'title'        => 'Morning News Update',
      'posts'        => $this->news->latest(5),#$this->news->search(array('news.date' => $time)),
      'article_type' => 'news'
    );

    # mail data
    $data = array(
      'subject' => 'Morning News Updated',
      'email'   => $this->newsletter->subscribed(),
      'html'    => $this->newsletter_template->html($data)
    );

    # send message
    if($this->mail->send($data))
    {
      echo 'Mail Sent';
    }
    else
    {
      echo 'Mail Not Sent';
    }
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
