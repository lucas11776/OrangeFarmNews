<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_template extends CI_Model
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
    $this->comments = is_array($comments) ? $comments : array();

    # print comment
    $this->comments(0);
  }

  private function comments($index)
  {
    # number of comments
    $number_comment = count($this->comments);

    # print comment details
    echo '
    <!-- Comment Area Start -->
    <div class="comment_area clearfix" data-spy="scroll" data-offset="0">
        <h5 class="title">'
          .($number_comment == 1 ? "{$number_comment} Comment" : "{$number_comment} Comments").
        '</h5>
        <ol>';

    # no comment available
    if(count($this->comments) === 0)
    {
      echo '
      <li>
        <div class="alert alert-info col-12">
          <strong class="text-info">
            Be the first one to <i class="fa fa-commenting-o color"></i> comment on this news comment now.
          </strong>
        </div>
      </li>';
    }

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

          # user comment
          $user_comment_active = $this->session->flashdata('user_comment') == $this->comments[$i]['id'] ? 'comment-by-me' : 'comment-' . $this->comments[$i]['id'];

          #print comment
          echo '
          <!-- Single Comment Area -->
          <li class="single_comment_area" id="'. $user_comment_active .'">
              <!-- Comment Content -->
              <div class="comment-content d-flex">
                  <!-- Comment Author -->
                  <div class="comment-author">
                    <a href="'.base_url(uri_string()."#comment{$this->comments[$i]['id']}").'">
                      <img src="'. $this->comments[$i]['picture'] .'" alt="'. $this->account->get_account_name($this->comments[$i]) .'">
                    </a>
                  </div>
                  <!-- Comment Meta -->
                  <div class="comment-meta">
                      <a href="#" class="post-author">
                        '. $this->account->get_account_name($this->comments[$i]) .'
                        <button type="button"
                                value="'. $this->comments[$i]['id'] .'"
                                data-toggle="modal"
                                data-target="#reply-comment-model"
                                class="btn btn-sm btn-outline-dark ml-4 btn-reply-comment '.(!$this->auth->user(false) ? 'd-none' : '').'">
                          <span class="fa fa-reply color"></span>
                        </button>
                      </a>
                      <a href="#" class="post-date">'. date('h:i a F d, y', strtotime($this->comments[$i]['date'])) .'</a>
                      <p>'. $this->comments[$i]['comment'] .'</p>
                  </div>
              </div>
              ';
          # print sub comments
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

          # user comment
          $user_comment_active = $this->session->flashdata('user_comment') == $this->comments[$i]['id'] ? 'comment-by-me' : 'comment-' . $this->comments[$i]['id'];

          # print sub comment
          echo '
          <ol class="children">
              <li class="single_comment_area" id="'. $user_comment_active .'">
                  <!-- Comment Content -->
                  <div class="comment-content d-flex">
                      <!-- Comment Author -->
                      <div class="comment-author">
                        <a href="'.base_url(uri_string()."#comment{$this->comments[$i]['id']}").'">
                          <img src="'. $this->comments[$i]['picture'] .'" alt="'. $this->account->get_account_name($this->comments[$i]) .'">
                        </a>
                      </div>
                      <!-- Comment Meta -->
                      <div class="comment-meta">
                          <a href="#" class="post-author">
                            '. $this->account->get_account_name($this->comments[$i]) .'
                            <button type="button"
                                    value="'. $this->comments[$i]['id'] .'"
                                    data-toggle="modal"
                                    data-target="#reply-comment-model"
                                    class="btn btn-sm btn-outline-dark ml-4 btn-reply-comment '.(!$this->auth->user(false) ? 'd-none' : '').'">
                              <span class="fa fa-reply color"></span>
                            </button>
                          </a>
                          <a href="#" class="post-date">'. date('h:i a F d, y', strtotime($this->comments[$i]['date'])) .'</a>
                          <p>'. $this->comments[$i]['comment'] .'</p>
                      </div>
                  </div>';
          # print sub comments
          $this->sub_comments($index+1,$this->comments[$i]['id']);
          echo '</li></ol>';

        }
      }
    }
  }
}
