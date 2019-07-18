<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_newsletter_template extends CI_Model
{
  /**
   * Template Css File Path
   * 
   * @var string
   */
  public const TEMPLATE_CSS = 'assets/mail/newsletter.css';

  /**
   * Generate Newsleter View Template using (News/blog) result
   * 
   * 
   */
  public function html(array $data)
  {
    // check all required fields
    $data_copy = array(
      'title' => $data['title'] ?? 'Orange Farm News',
      'type'  => $data['article_type'],
      'posts' => $data['posts']
    );

    # check if type are post
    if(count($data_copy['posts']) === 0)
    {
      return false;
    }

    # newletter template
    $template  = $this->header($data_copy);
    $template .= $this->body($data_copy);
    $template .= $this->footer($data_copy);

    return $template;
  } 

  /**
   * Template Header 
   */
  private function header(array $data)
  {
    $title = $data['title'];
    return <<<EOF
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
      <meta charset="utf-8"> <!-- utf-8 works for most cases -->
      <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
      <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
      <title>Orange Farm News</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700|Lato:300,400,700" rel="stylesheet">
      <link href="http://localhost/assets/mail/newsletter.css" rel="stylesheet">
    </head>
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
      <center style="width: 100%; background-color: #f1f1f1;">
        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
          &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <!-- BEGIN BODY -->
          <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
              <td class="bg_white email-section">
                <div class="heading-section" style="text-align: center; padding: 0 30px;">
                  <h2>$title</h2>
                </div>
    EOF;
  }

  /**
   * Template Body
   * 
   * @param   array
   * @return  string
   */
  private function body(array $data)
  {
    $template = '';

    for($i = 0; $i < count($data['posts']); $i++)
    {
      # article details
      $picture  = $data['posts'][$i]['picture'];
      $title    = word_limiter($data['posts'][$i]['title']);
      $post     = word_limiter($data['posts'][$i]['post'], 25);
      $url      = base_url($data['type'] . '/' . $data['posts'][$i]['slug']);
      $picture  = $data['posts'][$i]['picture'];
      $category = $data['posts'][$i]['category'];
      $date     = date('h:ia, F d, Y', strtotime($data['posts'][$i]['date']));

      $template .= <<<EOF
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td style="padding-bottom: 30px;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <td valign="middle" width="100%">
                <a href="$url">
                  <img src="$picture" alt="$title" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                </a>
              </td>
              <td valign="middle" width="100%">
                <div class="text-blog" style="text-align: left; padding-left:25px;">
                  <p class="meta"><span>Posted on $date</span> <span>$category</span></p>
                  <a href="$url">
                    <h3>$title</h3>
                  </a>
                  <p>$post</p>
                  <p><a href="$url" class="btn btn-primary">Read more</a></p>
                </div>
              </td>
            </table>
          </td>
        </tr>
      </table>
      EOF;
    }

    return $template;
  }

  /**
   * Template Footer
   * 
   * @param   array
   * @return  string
   */
  private function footer(array $data)
  {
    return <<<EOF
        </td>
        </tr><!-- end: tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_black footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="heading">About</h3>
                        <p>Orange Farm New the voice of the people since 2012.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                        <h3 class="heading">Contact Info</h3>
                        <ul>
                          <li><span class="text">Aticles <a href="tel:0862639988">086 263 9988</a></span></li>    
                          <li><span class="text">Adverts <a href="tel:0118501160">011 850 1160</a></span></li>    
                          <li><span class="text">Aticles <a href="tel:0783297240">078 329 7240</a></span></li>    
                        </ul>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                        <h3 class="heading">+Links</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contect</a></li>
                          </ul>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <tr>
          <td valign="middle" class="bg_black footer email-section">
            <table>
              <tr>
                <td valign="top" width="100%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <p>&copy; 2018. All Rights Reserved | Orange Farm News</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
    </center>
    </body>
    </html>
    EOF;
  }
}