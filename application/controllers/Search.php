<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
  /**
   * Search Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('search/'.$page,   $details);
    $this->load->view('template/footer', $details);
  }

  /**
   * @Route (search)
   */
  public function index()
  {
    $term = $this->input->get('term') ?? '';
    $page = $this->input->get('page');
    $type = $this->input->get('type') ?? '';

    if($type != '' && in_array(strtolower($type ?? ''), array('news','blog')) == false)
    {
      # 404 page details
      $page_details = array(
        'title'       => '(<span class="color">' . $type . '</span>) search type does not exist in OrangeFarmNews.',
        'description' => '',
        'message'     => 'The search type you are trying to search deos not exist please select correct search type.',
        'active'      => '',
        'navbar_adv'  => false
      );

      $this->view('../404', $page_details);
    }

    # check search type defualt news
    switch ($type) {
      case 'blog':
        $this->search_blog($term, $page);
        break;

      default:
        $this->search_news($term, $page);
        break;
    }

  }

  /**
   * Search Form News Post
   *
   * @param   integer
   * @param   string
   * @return  array
   */
  private function search_news($term, $page)
  {
    # count number of result for search  term
    $total = $this->news->count('like', array('title' => $term));

    # get page number
    $page = is_numeric($this->input->get('page')) ? $this->input->get('page') : 0;

    # per page result
    $per_page = 7;

    # initialize pagination
    $this->custom_pagination->user_pagination($total, $per_page);

    $page_details = array(
      'title'         => '',
      'description'   => '',
      'active'        => '',
      'navbar_adv'    => '',
      'search_result' => $this->news->search(array('title' => $term), $per_page, $page)
    );

    $this->view('news', $page_details);
  }

  /**
   * Search For Blog Post
   *
   * @param   integer
   * @return  array
   */
  private function search_blog($term, $page)
  {
    $page_details = array(

    );
  }
}
