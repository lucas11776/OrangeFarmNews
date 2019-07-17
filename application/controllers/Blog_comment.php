<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_comment extends CI_Controller
{
  /**
   * blog Comment
   *
   * @var array
   */
  public $blog = null;

  /**
   * User Reply Comment
   *
   * @var array
   */
  public $comment = null;


  /**
   *  @Route (blog/comment)
   */
  public function comment()
  {
    # check required data
    $this->form_validation->set_rules('blog_id', 'blog', 'required|integer|callback_blog_exist');
    $this->form_validation->set_rules('comment', 'comment', 'required|max_length[200]');

    # validate data
    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', validation_errors('<span>','</span> '));

      redirect($this->input->get('redirect') ?? '');
    }

    # comment data
    $comment = array(
      'blog_id' => $this->input->post('blog_id'),
      'user_id' => $this->auth->account('id'),
      'comment' => $this->input->post('comment')
    );

    # insert comment to database
    $this->insert_comment($comment);
  }

  /**
   * @Route (blog/comment/reply)
   */
  public function reply()
  {
    # check required data
    $this->form_validation->set_rules('blog_id', 'blog id', 'required|integer|callback_blog_exist');
    $this->form_validation->set_rules('comment_id', 'comment id', 'required|integer|callback_comment_exist');
    $this->form_validation->set_rules('comment', 'comment', 'required|max_length[200]');

    # check data id valid
    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', implode(' ', $this->form_validation->error_array()));

      redirect($this->input->get('r') ?? '');
    }

    # reply comment
    $comment = array(
      'blog_id'   => $this->blog['id'],
      'user_id'   => $this->auth->account('id'),
      'parent_id' => $this->comment['id'],
      'comment'   => $this->input->post('comment')
    );

    # insert comment to database
    $this->insert_comment($comment);
  }

  private function insert_comment(array $comment)
  {
    if($this->blog_comments->create($comment) === false)
    {
      $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to databse.');
    }
    else
    {
      $this->session->set_flashdata('alert-success', 'Thank you for your comment.');
    }

    // user comment
    $this->session->set_flashdata('user_comment', $this->db->insert_id());

    redirect("{$this->input->post('redirect')}#comment-by-me");
  }

  /**
   * @Route (blog/comment/delete)
   */
  public function delete()
  {

  }

  /**
   * Check If blog Exist By ID
   *
   * @param   integer
   * @return  boolean
   */
  public function blog_exist($blog_id)
  {
    # get blog by id
    $this->blog = $this->blog->get(array('blog.id' => $blog_id))[0] ?? false;

    # check if blog exist
    if($this->blog === false)
    {
      $this->form_validation->set_message('blog_exist', 'blog your are trying to comment to do not exist.');

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
    # get comment
    $this->comment = $this->blog_comments->get(array('id' => $comment_id))[0] ?? false;

    # check if reply comment exist
    if($this->comment === false)
    {
      $this->form_validation->set_message('comment_exist', 'Comment your are trying to reply to does not exist.');

      return false;
    }

    return true;
  }
}
