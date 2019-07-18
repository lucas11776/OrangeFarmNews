<?php

class Mail_newsletter_model extends CI_Model
{

  /**
   * Mail newsletter
   *
   * @param   string
   * @param   array
   * @param   string
   * @return  string
   */
  public function view(string $title, array $data, string $type = 'news')
  {
    # Newletter Header
    $letter = $this->header($title);
    
    #newsletter body or content
    $letter .= $this->body($data, $type);
    
    # newsletter footer
    $letter .= $this->footer();

    return $letter;
  }

  /**
   * Newsletter Body
   * 
   * @param   array
   * @param   string
   * @return  string
   */
  private function body(array $data, string $type)
  {
    $items = '';

    for($i = 0; $i < count($data); $i++)
    {
      # item details
      $title    = word_limiter($data[$i]['title'], 10);
      $picture  = $data[$i]['picture'];
      $category = $data[$i]['category'];
      $date     = date('F d, Y', strtotime($data[$i]['date']));
      $text     = word_limiter(strip_tags($data[$i]['post']), 25);
      $link     = base_url($type . '/' . $data[$i]['slug']);

      $items .= <<<EOF
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td style="padding-bottom: 30px;">
          <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            <td valign="middle" width="100%">
              <img src="$picture" alt="$title" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
            </td>
            <td valign="middle" width="100%">
              <div class="text-blog" style="text-align: left; padding-left:25px;">
                <p class="meta"><span>Posted on $date</span> <span>$category</span></p>
                <h3>$title</h3>
                <p>$text</p>
                <p><a href="$link" target="_blank" class="btn btn-primary">Read more</a></p>
              </div>
            </td>
          </table>
        </td>
      </tr>
      </table>

      EOF;
    }
    
    return $items;
  }

  /**
   * Newletter Header
   *
   * @param   string
   * @return  string
   */
  private function header($title = '')
  {
    // Newsletter Css
    $css = base_url('assets/newsletter/news.css');

    $header = <<<EOF
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
      <head>
        <meta charset="utf-8"> <!-- utf-8 works for most cases -->
        <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
        <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
        <title>$title</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700|Lato:300,400,700" rel="stylesheet">
        <link href="$css" rel="stylesheet">
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
                  <h2>News Updated</h2>
                </div>

    EOF;

    return $header;
  }

  /**
   * Newsletter Footer 
   * 
   * @return string
   */
  private function footer()
  {
    #links
    $home    = base_url('');
    $news    = base_url('news');
    $blog    = base_url('blog');
    $contect = base_url('contect');

    $footer = <<<EOF
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
                            <li><span class="text">Aticles&ensp; <a href="tel:0862639988">086 263 9988</a></span></a></li>
                            <li><span class="text">Adverts <a href="tel:0118501160">011 850 1160</a></span></a></li>
                            <li><span class="text">Aticles&ensp; <a href="tel:0783297240">078 329 7240</a></span></a></li>
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
                            <li><a href="$home">Home</a></li>
                            <li><a href="$news">News</a></li>
                            <li><a href="$blog">Blog</a></li>
                            <li><a href="$contect">Contect</a></li>
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
                          <p style="color: #fff">&copy; 2018. All Rights Reserved | <a style="color: #fff" href="$home">Orange Farm News</a></p>
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

    return $footer;
  }


}