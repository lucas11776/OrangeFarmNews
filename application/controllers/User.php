<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
  public function search()
  {
    $term = strtolower($this->input->post('search') ?? '');

    echo $term;
  }
}
