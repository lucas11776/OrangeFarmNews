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
    // current date

    // search news by date

    // check if they are news

    // send newsletter to emails
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