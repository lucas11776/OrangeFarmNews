<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']              = 'home';                               # access (all)
$route['register']                        = 'register/index';                     # access (guest)
$route['login']                           = 'login/index';                        # access (guest)
$route['news']                            = 'news/index';                         # access (all)
$route['news/category/(:any)']            = 'news/category/$1';                   # access (all)
$route['news/comment']                    = 'news_comment/comment';               # access (user,editor,administrator)
$route['news/comment/reply']              = 'news_comment/reply';                 # access (user,editor,administrator)
$route['news/(:any)']                     = 'news/single/$1';                     # access (all)
$route['blog']                            = 'blog/index';                         # access (all)
$route['blog/category/(:any)']            = 'blog/category/$1';                   # access (all)
$route['blog/comment']                    = 'blog_comment/comment';               # access (user,editor,administrator)
$route['blog/comment/reply']              = 'blog_comment/reply';                 # access (user,editor,administrator)
$route['blog/(:any)']                     = 'blog/single/$1';                     # access (all)
$route['search']                          = 'search/index';                       # access (all)
$route['news/comment/delete']             = 'news_comment/delete';                # access (user,editor,administrator)
$route['dashboard']                       = 'administrator/index';                # access (administrator)
$route['my/account']                      = 'account/index';                      # access (user,editor,administrator)
$route['account/(:any)']                  = 'account/single/$1';                  # access (user,editor,administrator)
$route['dashboard/my/account']            = 'account/index';                      # access (user,editor,administrator)
$route['dashboard/accounts']              = 'administrator_accounts/index';       # access (administrator)
$route['dashboard/accounts/search']       = 'administrator_accounts/search';      # access (administrator)
$route['dashboard/accounts/(:any)']       = 'administrator_accounts/single/$1';   # access (administrator)
$route['dashboard/blog']                  = 'administrator_blog/index';           # access (administrator)
$route['dashboard/blog/delete']           = 'administrator_blog/delete';           # access (editor,administrator)
$route['dashboard/my/blog']               = 'administrator_blog/my_posts';        # access (administrator)
$route['dashboard/blog/search']           = 'administrator_blog/search';          # access (administrator)
$route['dashboard/news']                  = 'administrator_news/index';           # access (administrator)
$route['dashboard/news/delete']           = 'administrator_news/delete';           # access (editor,administrator)
$route['dashboard/my/news']               = 'administrator_news/my_posts';        # access (administrator)
$route['dashboard/news/search']           = 'administrator_news/search';          # access (administrator)
$route['dashboard/newsletter']            = 'administrator/newsletter';           # access (administrator)
$route['dashboard/inbox']                 = 'message/index';                      # access (administrator)
$route['dashboard/inbox/delete']          = 'message/delete';                     # access (administrator)
$route['dashboard/inbox/(:any)']          = 'message/single_message/$1';          # access (administrator)
$route['dashboard/search']                = 'administrator_search/index';         # access (administrator)
$route['dashboard/upload/news']           = 'upload_news/index';                  # access (editor,administrator)
$route['dashboard/upload/blog']           = 'upload_blog/index';                  # access (editor,administrator)
$route['newsletter/subscribe']            = 'newsletter/subscribe';               # access (all)
$route['newsletter/unsubscribe']          = 'newsletter/unsubscribe';             # access (all)
$route['contect']                         = 'contect/index';                      # access (all)
$route['logout']                          = 'logout/index';                       # access (all)
# cron jobs
$route['cron-job/newsletter/news']        = 'cron_jobs/news_newsletter_cron_job';  # access (all)
$route['404_override']                    = 'page_not_found';                     # access (all)
$route['translate_uri_dashes']            = FALSE;
