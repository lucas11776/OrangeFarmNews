<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_model extends CI_Model
{
  /**
   * Page That Do Not Require Panel Navbar
   *
   * @var   array
   */
  public const PAGES_HIDE_NAVBAR = array('register','login','password');
}
