<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_notify_template extends CI_Model
{
  /**
   * Template Css File Path
   * 
   * @var string
   */
  public const TEMPLATE_CSS = 'assets/mail/notify.css';

  /**
   * Email Image
   * 
   * @var string
   */
  public const IMAGE_PATH = 'assets/mail/images/email.png';

  /**
   * Generate Newsleter View Template using (News/blog) result
   * 
   * 
   */
  public function html(array $data)
  {
    // check all required fields
    $data_copy = array(
      'title'    => $data['title'],
      'text'     => $data['text'],
      'btn_text' => $data['btn_text'],
      'url'      => $data['url'] 
    );

    # newletter template
    $template  = $this->header($data_copy);
    $template .= $this->body($data_copy);
    $template .= $this->footer($data_copy);

    return $template;
  } 

  /**
   * Template Header
   * 
   * @param   array
   * @return  boolean
   */
  private function header(array $data)
  {
    # header details
    $css   = base_url($this::TEMPLATE_CSS);
    $title = $data['title'];
    $image = base_url($this::IMAGE_PATH);
    return <<<EOF
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="utf-8"> <!-- utf-8 works for most cases -->
        <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
        <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
        <title>$title</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <link href="http://localhost/assets/mail/notify.css" rel="stylesheet">
    </head>
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
      <center style="width: 100%; background-color: #f1f1f1;">
        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
          &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
          <!-- BEGIN BODY -->
          <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
              <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td class="logo" style="text-align: center;">
                      <h1><a href="#">Orange Farm News</a></h1>
                    </td>
                  </tr>
                </table>
              </td>
            </tr><!-- end tr -->
            <tr>
              <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                <img src="$image" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
              </td>
            </tr><!-- end tr -->
              <tr>
              <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
    EOF;
  }

  /**
   * Template Header
   * 
   * @param   array
   * @return  boolean
   */
  private function body(array $data)
  {
    // details
    $title    = $data['title'];
    $text     = $data['text'];
    $link     = $data['url'];
    $btn_text = $data['btn_text'];

    return <<<EOF
    <table>
      <tr>
        <td>
          <div class="text" style="padding: 0 2.5em; text-align: center;">
            <h2>$title</h2>
            <h3>$text</h3>
            <p><a href="$link" class="btn btn-primary"><strong>$btn_text</strong></a></p>
          </div>
        </td>
      </tr>
    </table>
    EOF;
  }

  /**
   * Template Header
   * 
   * @param   array
   * @return  boolean
   */
  private function footer(array $data)
  {
    return <<<EOF
        </td>
        </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="heading"><strong>About</strong></h3>
                        <p>Orange Farm New the voice of the people since 2012.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                        <h3 class="heading"><strong>Contact Info</strong></h3></h3>
                        <ul>
                            <li><span class="text">Aticles&ensp; <a href="tel:0862639988">086 263 9988</a></span></li>
                            <li><span class="text">Adverts <a href="tel:0118501160">011 850 1160</a></span></li>
                            <li><span class="text">Aticles&ensp; <a href="tel:0783297240">078 329 7240</a></span></li>
                          </ul>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                        <h3 class="heading"><strong>+Links</strong></h3>
                        <ul>
                          <li><a href="">Home</a></li>
                          <li><a href="">News</a></li>
                          <li><a href="">Blog</a></li>
                          <li><a href="">Contect</a></li>
                        </ul>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <!--<tr>
          <td class="bg_light" style="text-align: center;">
            <p>No longer want to receive these email? You can <a href="#" style="color: rgba(0,0,0,.8);">Unsubscribe here</a></p>
          </td>-->
        </tr>
      </table>
    </div>
    </center>
    </body>
    </html>
    EOF;
  }
}