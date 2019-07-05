<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
  public function index()
  {
    # clear session token
    $this->session->unset_userdata('token');

    # clear cookie session
    delete_cookie('token');

    # redirect to home page
    redirect('');
  }
}
