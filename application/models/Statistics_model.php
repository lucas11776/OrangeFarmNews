<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_model extends CI_Model
{
  /**
   * Count Number Of rows in (news,blog,accounts)
   *
   * @return  array
   */
  public function summary()
  {
    # select table to count data
    $query = "SELECT
                (SELECT COUNT(*) FROM news) as news,
                (SELECT COUNT(*) FROM accounts) as accounts,
                (SELECT COUNT(*) FROM blog) as blog,
                (SELECT COUNT(*) FROM contect WHERE seen = 0) as message,
                (SELECT COUNT(*) FROM newsletter) as newsletter,
                (SELECT COUNT(*) FROM newsletter WHERE subscribed) as subscribed_newsletter
              FROM DUAL";
    # use fake table (use count table)
    return $this->db->query($query)->result_array()[0];
  }

  /**
   * Count
   *
   */
}
