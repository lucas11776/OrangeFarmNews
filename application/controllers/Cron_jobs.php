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

    // check if the are article to send
    if(count($data['posts']) !== 0)
    {
      # mail data
      $data = array(
        'subject' => 'Morning News Updated',
        'email'   => $this->newsletter->subscribed(),
        'html'    => $this->newsletter_template->html($data, 'news')
      );

      # send mails
      $this->mail->send($data);
    }
  }

    /**
   * @Route (cron_jobs/blog/newsletter)
   *
   * Send Blog To NewsLetter (Subscribed)
   */
  public function blog_newsletter_cron_job()
  {
    # reset time 12Hours back
    $time = date('Y-m-d', time()-(((60*60*12)*2) * 10));

    # search news by date (required newsletter details)
    $data = array(
      'title'        => 'Morning Blog Update',
      'posts'        => $this->blog->latest(5),#$this->news->search(array('news.date' => $time)),
      'article_type' => 'news'
    );

    // check if the are article to send
    if(count($data['posts']) !== 0)
    {
      # mail data
      $data = array(
        'subject' => 'Morning Blog Updated',
        'email'   => $this->newsletter->subscribed(),
        'html'    => $this->newsletter_template->html($data, 'blog')
      );

      # send mails
      $this->mail->send($data);
    }
  }
}
