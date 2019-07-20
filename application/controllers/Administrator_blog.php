<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_blog extends CI_Controller
{
  /**
   * Dashboard blog View Pages
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
   * @Route (dashboard/blog)
   */
  public function index()
  {
    # check if user administrator
    $this->auth->administrator();

    # get number of blog in database
    $total = $this->blog->count();

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage Blog Post',
      'description'     => 'OrangeFarmblog Dashboard',
      'active'          => 'Blog Posts',
      'summary'         => $this->stats->summary(),
      'blog'            => $this->blog->latest($per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('blog', $page_details);
  }

  /**
   * @Route (dashboard/blog/search)
   */
  public function search()
  {
    # check if user administrator
    $this->auth->administrator();

    # get number of blog in database
    $total = $this->stats->search_result($this->input->get('term'))['blog'] ?? 0;

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage Blog Posts',
      'description'     => 'OrangeFarmblog Dashboard',
      'active'          => 'Blog Posts',
      'summary'         => $this->stats->summary(),
      'blog'            => $this->blog->search(array('title' => $this->input->get('term')), $per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('blog', $page_details);
  }

  /**
   * @Route (dashboard/blog/search)
   */
  public function my_posts()
  {
    # check if user administrator
    $this->auth->user();

    # get number of blog in database
    $total = $this->blog->count('where', array('blog.user_id' => $this->auth->account('id')));

    # number of result to be show per page
    $per_page = 15;

    # config pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    # get page page
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # page details
    $page_details = array(
      'title'           => 'Manage Blog Posts',
      'description'     => 'OrangeFarmblog Dashboard',
      'active'          => 'Blog Posts',
      'summary'         => $this->stats->summary(),
      'blog'            => $this->blog->get(array('blog.user_id' => $this->auth->account('id')), $per_page, $page),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('blog', $page_details);
  }

    /**
   * 
   */
  public function delete()
  {
    $this->form_validation->set_rules('blog_id', 'blog id', 'required|integer|callback_blog_exist');

    if($this->form_validation->run() === false)
    {
      $this->session->set_flashdata('alert-danger', $this->form_validation->error_array()['blog_id'] ?? '');

      $this->redirect($this->input->post('redirect'));
    }

    // blog post to detele
    $delete = array(
      'id' => $this->blog_post['id']
    );

    // add user id if user not administator
    if($this->auth->administrator(false) === false)
    {
      $delete['user_id'] = $this->auth->account('id');
    }

    // detele account
    if($this->blog->delete($delete) === false)
    {
      $this->session->set_flashdata('alert-danger', 'Something went wrong when tring to connect to database.');

      # delete blog post from database
      $this->redirect($this->input->post('redirect'));
    }
    else
    {
      $this->session->set_flashdata('alert-sucess', 'blog post deleted.');
    }
    
    # remove base url
    $picture = './' . trim($this->blog_post['picture'], base_url());

    // delete picture
    if(file_exists($picture))
    {
      // delete blog picture
      unlink($picture);
    }

    // delete blog comments
    $this->blog_comments->delete(array('blog_id' => $this->blog_post['id']));

    # delete blog post from database
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
   * Check If Blog Exist
   * 
   * @param   integer
   * @return  boolean
   */
  public function blog_exist($blog_id)
  {
    # get blog post by id
    $this->blog_post = $this->blog->get(array('blog.id' => $blog_id))[0] ?? false;

    if($this->blog_post === false)
    {
      $this->form_validation->set_message('blog_exist', 'The {field} does not exist.');

      return false;
    }

    return true;
  }
}
