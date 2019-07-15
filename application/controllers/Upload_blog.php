<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_blog extends CI_Controller
{
  /**
   * Uploaded blog Picture Full Path
   *
   * @var string
   */
  private $picture;

  /**
   * Upload blog Pages View
   *
   * @param   string
   * @return  array
   * @return  void
   */
  private function view(string $page, array $details)
  {
    $this->load->view('template/_navbar', $details);
    $this->load->view('blog/'.$page);
    $this->load->view('template/_footer');
  }

  /**
   * @Route (upload/blog)
   */
  public function index()
  {
    # check if client is editor
    $this->auth->editor();

    # page details
    $details = array(
      'title'       => 'Upload blog At OrangeFarmblog And Keep Community Up To Date.',
      'description' => null,    # defualt description
      'active'      => 'upload', # active navbar link
      'summary'         => $this->stats->summary(),
      'unread_messages' => $this->contect->get(array('seen' => 0), $this->contect::UNREAD_MESSAGES_LIMIT)
    );

    # validate required data
    $this->form_validation->set_rules('picture', 'picture', 'callback_upload_picture');
    $this->form_validation->set_rules('title', 'title', 'required|min_length[5]|max_length[150]');
    $this->form_validation->set_rules('category', 'category', 'callback_category_exist');
    $this->form_validation->set_rules('post', 'content', 'required');

    # check if required data is valid
    if($this->form_validation->run() === false)
    {
      # page
      $this->view('create', $details);

      # delete picture if picture is uploaded
      if($this->picture !== null)
      {
        unlink($this->upload->data('file_name'));
      }

      return;
    }

    # blog details
    $blog = array(
      'id'       => $this->auth->account('id'),
      'picture'  => base_url($this->blog::PICTURE_CONFIG['upload_path'] . $this->upload->data('file_name')), # uploaded picture
      'slug'     => url_title($this->input->post('title') . ' ' . date('l d M Y h a s i')), # slug by time
      'title'    => $this->input->post('title'),
      'category' => $this->input->post('category'),
      'post'     => $this->input->post('post')
    );

    # create blog item
    if($this->blog->create($blog) === false)
    {
      # overwrite page title
      $details['title'] = 'Something went wrong when tring to connect to database.';
      # set upload blog error
      $this->session->set_flashdata('upload_blog_error', $details['title']);
      # page
      $this->view('create', $details);

      return;
    }

    # redirect or uploaded blog
    redirect("blog/{$blog['slug']}");
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
    $config = $this->blog::PICTURE_CONFIG;

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

    return true;
  }

  /**
   * Check if Category Exist In blog Category
   *
   * @param   int
   * @return  boolean
   */
  public function category_exist($id)
  {
    # check if category isset
    if(empty($id))
    {
      $this->form_validation->set_message('category_exist', 'The {field} field is required.');
      
      return false;
    }

    # check if category id exist
    if(isset($this->blog::CATEGORY[$id]) === false)
    {
      $this->form_validation->set_message('category_exist', 'Sorry {field} does not exist please select correct {field}.');

      return false;
    }

    return true;
  }
}
