<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_notify_template extends CI_Model
{
  /**
   * Template Css File Path
   * 
   * @var string
   */
  public const TEMPLATE_CSS = 'assets/mail/notify.css';

  /**
   * Generate Newsleter View Template using (News/blog) result
   * 
   * 
   */
  public function html(array $data)
  {
    // check all required fields
    $data_copy = array(
      'title' => $data['title'] ?? 'Orange Farm News',
      'type'  => $data['article_type'],
      'posts' => $data['posts']
    );

    # check if type are post
    if(count($data_copy['posts']) === 0)
    {
      return false;
    }

    # newletter template
    $template  = $this->header($data_copy);
    $template .= $this->body($data_copy);
    $template .= $this->footer($data_copy);

    return $template;
  } 
}