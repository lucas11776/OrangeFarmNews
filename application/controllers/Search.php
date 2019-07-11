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
   * Page Pagination Configuration
   *
   * @param   integer
   * @return  array
   */
  private function page_pagination(int $total, int $per_page = 6)
  {
    # pagination configuration
    $config = array(
      'page_query_string'    => true,
      'query_string_segment' => 'page',
      'base_url'             => base_url(uri_string()),
      'total_rows'           => $total,
      'per_page'             => $per_page
    );

    # initialize pagination class
    $this->pagination->initialize($config);
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

    if(strtolower($type) == 'blog')
    {
      $this->search_blog($term, $page);
    }
    else
    {
      $this->search_news($term, $page);
    }
  }

  /**
   * Search Form News Post
   *
   * @param   integer
   * @return  array
   */
  private function search_news($term, $page)
  {
    $page_details = array(
      'title'         => '',
      'description'   => '',
      'active'        => '',
      'navbar_adv'    => '',
      'search_result' => $this->news->search(array('title' => $term))
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
