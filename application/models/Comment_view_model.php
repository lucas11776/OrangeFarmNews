<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_view_model extends CI_Model
{
  /**
   * Page Comments
   *
   * @var array
   */
  private $comments = array();

  /**
   * View/Printed Comments
   *
   * @param array
   */
  private $viewed = array();

  /**
   * Print Comments
   *
   * @param   array
   * @return  string
   */
  public function view(array $comments)
  {
    # populate
    $this->comments = $comments;

    # print comment
    $this->comments(0);
  }

  private function comments($index)
  {
    # print comment details
    echo '
    <!-- Comment Area Start -->
    <div class="comment_area clearfix">
        <h5 class="title">' . count($this->comments) . ' Comments</h5>

        <ol>
    ';

    # loop throw main comments
    for($i = $index; $i < count($this->comments); $i++)
    {
      # check if comment is avalible
      if(isset($this->comments[$i]))
      {
        # check if comment was not printed
        if(in_array($this->comments[$i]['id'], $this->viewed) === false)
        {
          # register comment as printed
          array_push($this->viewed, $this->comments[$i]['id']);


          #print comment
          echo '
          <!-- Single Comment Area -->
          <li class="single_comment_area">
              <!-- Comment Content -->
              <div class="comment-content d-flex">
                  <!-- Comment Author -->
                  <div class="comment-author">
                      <img src="'. $this->comments[$i]['picture'] .'" alt="'. $this->account->get_account_name($this->comments[$i]) .'">
                  </div>
                  <!-- Comment Meta -->
                  <div class="comment-meta">
                      <a href="#" class="post-author">
                        '. $this->account->get_account_name($this->comments[$i]) .'
                        <button type="button" data-toggle="modal" data-target="#reply-comment-model" class="btn btn-sm btn-outline-dark ml-4">
                          <span class="fa fa-reply color"></span>
                        </button>
                      </a>
                      <a href="#" class="post-date">'. date('h:i a F d, y', strtotime($this->comments[$i]['date'])) .'</a>
                      <p>'. $this->comments[$i]['comment'] .'</p>
                  </div>
              </div>
              ';
          # check comment sub comments
          $this->sub_comments($index + 1, $this->comments[$i]['id']);
          echo '</li>';
        }
      }
    }

    echo '
        </ol>
    </div>';
  }


  private function sub_comments($index, $id)
  {
    # loop throw all remaning comments
    for($i = $index; $i < count($this->comments); $i++)
    {
      # check if comment is available
      if(isset($this->comments[$i]))
      {
        # check if comment is subcomment of id (current loop comment)
        if($this->comments[$i]['parent_id'] == $id)
        {
          # mark comment as print
          array_push($this->viewed, $this->comments[$i]['id']);

          # print sub comment
          echo '
          <ol class="children">
              <li class="single_comment_area">
                  <!-- Comment Content -->
                  <div class="comment-content d-flex">
                      <!-- Comment Author -->
                      <div class="comment-author">
                          <img src="'. $this->comments[$i]['picture'] .'" alt="'. $this->account->get_account_name($this->comments[$i]) .'">
                      </div>
                      <!-- Comment Meta -->
                      <div class="comment-meta">
                          <a href="#" class="post-author">
                            '. $this->account->get_account_name($this->comments[$i]) .'
                            <button type="button" class="btn btn-sm btn-outline-dark ml-4 reply-comment-model"><span class="fa fa-reply color"></span></button>
                          </a>
                          <a href="#" class="post-date">'. date('h:i a F d, y', strtotime($this->comments[$i]['date'])) .'</a>
                          <p>'. $this->comments[$i]['comment'] .'</p>
                      </div>
                  </div>';
          $this->sub_comments($index+1,$this->comments[$i]['id']);
          echo '</li></ol>';

        }
      }
    }
  }
}
