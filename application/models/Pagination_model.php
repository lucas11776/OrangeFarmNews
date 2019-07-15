<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_model extends CI_Model
{
  /**
   * Initialize Pagination
   *
   * @param   integer
   * @param   integer
   * @return  boolean
   */
  public function user_pagination(int $total, int $per_page = 10)
  {
    # pagination configuration
    $config = array(
      'page_query_string'    => true,
      'query_string_segment' => 'page',
      'base_url'             => base_url(uri_string()),
      'total_rows'           => $total,
      'per_page'             => $per_page,
      # pagination markup
      'full_tag_open'        => '<ul class="pagination mt-50">',
      'full_tag_close'       => '</ul>',
      //'first_tag_open'       => '<li class="page-item">',
      //'first_tag_close'      => '</li>',
      'next_tag_open'        => '<li class="page-item">',
      'next_tag_close'       => '</li>',
      'prev_tag_open'        => '<li class="page-item">',
      'prev_tag_close'       => '</li>',
      'cur_tag_open'         => '<li class="page-item active"><a class="page-link" href="#">',
      'cur_tag_close'        => '</a></li>',
      'num_tag_open'         => '<li class="page-item">',
      'num_tag_close'        => '</li>',
      'attributes'           => array('class' => 'page-link')
    );

    # initialize pagination class
    $this->pagination->initialize($config);
  }

  public function admin_pagination(int $total, int $per_page = 10)
  {

  }
}
