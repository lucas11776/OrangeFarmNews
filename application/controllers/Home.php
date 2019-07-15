<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
  /**
   * Home Page View
   *
   * @param   string
   * @param   array
   * @return  void
   */
  public function view(string $page, array $details)
  {
    $this->load->view('template/navbar', $details);
    $this->load->view('home/'.$page, $details);
    $this->load->view('template/footer', $details);
  }

  public function index()
  {

    # get latest news
    $news = $this->news->latest(12);

    # page details
    $page_details = array(
      'title'         => 'OrangeFarmNews news report for the community.',
      'description'   => `Orange Farm News is a FREE BI - monthly NEWSPAPER, printed at Mid Month (15th) and Month end (25-31).
                          We distribute 60 000 copies FREE door to door in Orange Farm, Drieziek, Stretford, Palm Springs, Migson Manor,
                          Lakeside and Evaton. We circulate 60 000 copies boasting a readership of close to 350 000 and increasing every month.
                          For all your advertising needs please call 078 329 7240 or 011 850 1160.
                          For any articles or community notices please fax to 086 263 9988 and we will publish for free. Established February 2012,
                          we are an Independent Publication and members of AIP (Associated Independent Publishers) and Capro.
                          Orange Farm News is ABC Grassroots certified Feel free to visit our FACEBOOK page, where past issues can be downloaded.`,
      'active'        => 'home',
      'latest_news'   => $news,
      'news_updated'  => $news,
      'blog_updated'  => $news
    );


    #page
    $this->view('index', $page_details);
  }

}
