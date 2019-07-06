<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_news extends CI_Controller
{
  /**
   * Uploaded News Picture Full Path
   *
   * @var string
   */
  private $picture;

  /**
   * Upload News Pages View
   *
   * @param   string
   * @return  array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('news/'.$page);
    $this->load->view('template/_footer');
  }

  /**
   * @Route (upload/news)
   */
  public function index()
  {
    # check if client is editor
    $this->auth->editor();

    # page details
    $details = array(
      'title'       => 'Upload News At OrangeFarmNews And Keep Community Up To Date.',
      'description' => null,    # defualt description
      'active'      => 'upload' # active navbar link
    );

    # validate required data
    $this->form_validation->set_rules('picture', 'picture', 'callback_upload_picture');
    $this->form_validation->set_rules('title', 'title', 'required|min_length[5]|max_length[100]');
    $this->form_validation->set_rules('category', 'category', 'required|callback_category_exist');
    $this->form_validation->set_rules('post', 'post', 'required');

    # check if required data is valid
    if($this->form_validation->run() === false)
    {
      # page
      $this->view('create', $details);

      # delete picture if picture is uploaded
      if($this->picture !== null)
      {
        unlink($this->picture);
      }

      return;
    }

    # news details
    $news = array(
      'id'       => $this->auth->account('id'),
      'picture'  => $this->picture, # uploaded picture
      'slug'     => url_title($this->input->post('title') . ' ' . date('l d M Y h a s i')), # slug by time
      'title'    => $this->input->post('title'),
      'category' => $this->input->post('category'),
      'post'     => $this->input->post('post')
    );

    # create news item
    if($this->news->create($news) === false)
    {
      # overwrite page title
      $details['title'] = 'Something went wrong when tring to connect to database.';
      # set upload news error
      $this->session->set_flashdata('upload_news_error', $details['title']);
      # page
      $this->view('create', $details);

      return;
    }

    # redirect or uploaded news
    redirect("news/{$news['slug']}");
  }

  /**
   * Upload Picture
   *
   * @// NOTE: If file title does not exist temp picture will be deleted in index
   *
   * @return boolean
   */
  public function upload_picture()
  {
    # upload picture configuration
    $config = $this->news::PICTURE_CONFIG;

    # add title as picture file name
    $config['file_name'] = url_title($this->input->post('title') ?? 'TEMP-'.uniqid());

    # initialize upload configuration
    $this->upload->initialize($config);

    # upload picture
    if($this->upload->do_upload('picture') === false)
    {
      $this->form_validation->set_message('upload_picture', $this->upload->display_errors('',''));

      return false;
    }

    # uploaded picture
    $this->picture = base_url($this->news::PICTURE_CONFIG['upload_path'] . $this->upload->data('file_name'));

    return true;
  }

  /**
   * Check if Category Exist In News Category
   *
   * @param   int
   * @return  boolean
   */
  public function category_exist($id)
  {
    # check if category id exist
    if(isset($this->news::CATEGORY[$id]) === false)
    {
      $this->form_validation->set_message('category_exist', 'Sorry {field} does not exist please select correct {field}.');

      return false;
    }

    return true;
  }
}
