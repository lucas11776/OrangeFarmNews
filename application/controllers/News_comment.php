<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_comment extends CI_Controller
{
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
      # error to dislay
      $error = isset($this->form_validation->error_array['comment']) == false ? form_error('comment','<span>','</span>') : form_error('news_id','<span>','</span>');

      $this->session->set_flashdata('alert-danger', $error);

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
    $news_item = $this->news->get(array('id', $news_id));

    # check if news exist
    if(count($news_item) === false)
    {
      $this->form_validation->set_message('news_exist', 'News your are trying to comment to do not exist.');

      return false;
    }

    return true;
  }
}
