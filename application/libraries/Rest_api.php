<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api
{
  /**
   * GET Request Using Curl
   *
   * @param   string
   * @param   array
   * @return string
   */
  public function get(string $url)
  {
    # create curl resource
    $ch = curl_init();

    # set url
    curl_setopt($ch, CURLOPT_URL, $url);

    # return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    # $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);

    return json_decode($output, true);
  }

  /**
   * GET Request Using Curl
   *
   * @param   string
   * @param   array
   * @return string
   */
  public function post(string $url, array $data)
  {
    // initailze curl
    $ch = curl_init($url);

    // set up curl options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // add post data to curl
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    # $output contains the output string
    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);

    return json_decode($response, true);
  }
}
