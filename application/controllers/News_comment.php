<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_comment extends CI_Controller
{
  /**
   * News Comment
   *
   * @var array
   */
  public $news = null;

  /**
   *  @Route (news/comment)
   */
  public function comment()
  {
    # check required data
    $this->form_validation->set_rules('news_id', 'news', 'required|integer|callback_news_exist');
    $this->form_validation->set_rules('comment', 'comment', 'required|max_length[200]');

    # validate data
    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', display_errors('<span>','</span><br/>'));

      redirect($this->input->get('r') ?? '');
    }

    # comment data
    $comment = array(
      'news_id' => $this->input->post('news_id'),
      'user_id' => $this->auth->account('id'),
      'comment' => $this->input->post('comment')
    );

    # insert comment to database
    if($this->news_comments->create($comment) === false)
    {
      $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to databse.');
    }
    else
    {
      $this->session->set_flashdata('alert-success', 'Thank you for your comment.');
    }

    redirect($this->input->get('r') ?? '');
  }

  /**
   * @Route (news/comment/reply)
   */
  public function reply()
  {
    # check required data
    $this->form_validation->set_rules('news_id', 'news id', 'required|integer|callback_news_exist');
    $this->form_validation->set_rules('comment_id', 'comment id', 'required|integer|callback_comment_exist');
    $this->form_validation->set_rules('comment', 'comment', 'required|max_length[200]');

    # check data id valid
    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', implode(' ', $this->form_validation->error_array()));

      redirect($this->input->get('r') ?? '');
    }

  }

  /**
   * @Route (news/comment/delete)
   */
  public function delete()
  {

  }

  /**
   * Check If News Exist By ID
   *
   * @param   integer
   * @return  boolean
   */
  public function news_exist($news_id)
  {
    # get news by id
    $this->news = $this->news->get(array('id', $news_id));

    # check if news exist
    if(count($this->news) === false)
    {
      $this->form_validation->set_message('news_exist', 'News your are trying to comment to do not exist.');

      return false;
    }

    return true;
  }

  /**
   * Check if comment exist
   *
   * @param   integer
   * @return  boolean
   */
  public function comment_exist($comment_id)
  {
    return true;
  }
}
