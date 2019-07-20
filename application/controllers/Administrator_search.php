<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_search extends CI_Controller
{
  /**
   * Administrator View Pages
   * 
   * @param   string
   * @param   array
   * @return  void
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('administrator/' . $page, $details);
    $this->load->view('template/_footer', $details);
  }

  /**
   * @Router (dashboard/search)
   */
  public function index()
  {
    # check if user admin
    $this->auth->administrator();

    # search term
    $term = empty($this->input->get('term')) === false ? $this->input->get('term') : '';

    # number of result for each search
    $page_details = array(
      'result'          => '',
      'active'          => 'Search Result',
      'summary'         => $this->stats->search_result($term),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # page
    $this->view('search_result', $page_details);
  }
}