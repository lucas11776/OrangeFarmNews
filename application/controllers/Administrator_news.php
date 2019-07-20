<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_news extends CI_Controller
{
  /**
   * Dashboard News View Pages
   *
   * @param   string
   * @param   array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('administrator/' . $page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Route (dashboard/news)
   */
  public function index()
  {
    # check if user administrator
    $this->auth->administrator();

    # get number of news in database
    $total = $this->news->count();

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage News Posts',
      'description'     => 'OrangeFarmNews Dashboard',
      'active'          => 'Newsl Posts',
      'summary'         => $this->stats->summary(),
      'news'            => $this->news->latest($per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('news', $page_details);
  }

  /**
   * @Route (dashboard/news/search)
   */
  public function search()
  {
    # check if user administrator
    $this->auth->administrator();

    # get number of news in database
    $total = $this->stats->search_result($this->input->get('term'))['news'] ?? 0;

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage News Posts',
      'description'     => 'OrangeFarmNews Dashboard',
      'active'          => 'Newsl Posts',
      'summary'         => $this->stats->summary(),
      'news'            => $this->news->search(array('title' => $this->input->get('term')), $per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('news', $page_details);
  }

  /**
   * @Route (dashboard/news/search)
   */
  public function my_posts()
  {
    # check if user administrator
    $this->auth->user();

    # get number of news in database
    $total = $this->news->count('where', array('news.user_id' => $this->auth->account('id')));

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage News Posts',
      'description'     => 'OrangeFarmNews Dashboard',
      'active'          => 'News Posts',
      'summary'         => $this->stats->summary(),
      'news'            => $this->news->get(array('news.user_id' => $this->auth->account('id')), $per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('news', $page_details);
  }
}
