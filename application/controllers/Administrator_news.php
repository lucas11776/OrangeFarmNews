<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_news extends CI_Controller
{
  /**
   * News Post To Delete
   * 
   * @var array
   */
  public $news_post;

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
    $total = $this->stats->search_result($this->input->get('term') ?? '')['news'] ?? 0;

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

  /**
   * 
   */
  public function delete()
  {
    $this->form_validation->set_rules('news_id', 'news id', 'required|integer|callback_news_exist');

    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', $this->form_validation->error_array()['news_id'] ?? '');

      $this->redirect($this->input->post('redirect'));
    }

    // news post to detele
    $delete = array(
      'id' => $this->news_post['id']
    );

    // add user id if user not administator
    if($this->auth->administrator(false) === false)
    {
      $delete['user_id'] = $this->auth->account('id');
    }

    // detele account
    if($this->news->delete($delete) === false)
    {
      $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to database.');

      # delete news post from database
      $this->redirect($this->input->post('redirect'));
    }
    else
    {
      $this->session->set_flashdata('alert-sucess', 'News post deleted.');
    }
    
    # remove base url
    $picture = './' . trim($this->news_post['picture'], base_url());

    // delete picture
    if(file_exists($picture))
    {
      // delete news picture
      unlink($picture);
    }

    // delete news comments
    $this->news_comments->delete(array('news_id' => $this->news_post['id']));

    # delete news post from database
    $this->redirect($this->input->post('redirect'));
  }

  /**
   * Redirect With GET params
   * 
   * @param   string
   * @return  void
   */
  private function redirect(string $url)
  {
    # get params
    $params = '';

    # check if the search term
    if($this->input->post('term'))
    {
      $params .= '?term=' . $this->input->post('term');
    }

    # check if the page
    if(is_numeric($this->input->post('page')))
    {
      $params = empty($params) ? '?' : $params;
      $params .= '&page=' . $this->input->post('page');
    }

    redirect($url . $params);
  }

  /**
   * Check If News Exist
   * 
   * @param   integer
   * @return  boolean
   */
  public function news_exist($news_id)
  {
    # get news post by id
    $this->news_post = $this->news->get(array('news.id' => $news_id))[0] ?? false;

    if($this->news_post === false)
    {
      $this->form_validation->set_message('news_exist', 'The {field} does not exist.');

      return false;
    }

    return true;
  }
}
