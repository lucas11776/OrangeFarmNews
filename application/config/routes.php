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
$route['default_controller']      = 'home';                            # access (all)
$route['register']                = 'register/index';                  # access (guest)
$route['login']                   = 'login/index';                     # access (guest)
$route['news']                    = 'news/index';                      # access (all)
$route['news/category/(:any)']    = 'news/category/$1';                # access (all)
$route['news/comment']            = 'news_comment/comment';            # access (user,editor,administrator)
$route['news/comment/reply']      = 'news_comment/reply';              # access (user,editor,administrator)
$route['news/(:any)']             = 'news/single/$1';                  # access (all)
$route['search']                  = 'search/index';                    # access (all)
$route['news/comment/delete']     = 'news_comment/delete';             # access (user,editor,administrator)
$route['dashboard']               = 'administrator/index';             # access (administrator)
$route['my/account']              = 'account/index';                   # access (user,editor,administrator)
$route['account/(:any)']          = 'account/single/$1';               # access (user,editor,administrator)
$route['dashboard/my/account']    = 'account/index';                   # access (user,editor,administrator)
$route['dashboard/accounts']      = 'administrator/accounts';          # access (administrator)
$route['dashboard/news']          = 'administrator/news';              # access (administrator)
$route['dashboard/newsletter']    = 'administrator/newsletter';        # access (administrator)
$route['dashboard/inbox']         = 'message/index';          # access (administrator)
$route['dashboard/inbox/(:any)']  = 'message/single_message/$1'; # access (administrator)
$route['dashboard/inbox/delele']  = 'message/delete_message';    # access (administrator)
$route['dashboard/search']        = 'administrator/search';            # access (administrator)
$route['dashboard/upload/news']   = 'upload_news/index';               # access (editor,administrator)
$route['dashboard/upload/blog']   = 'upload_/index';                   # access (editor,administrator)
$route['newsletter/subscribe']    = 'newsletter/subscribe';            # access (all)
$route['newsletter/unsubscribe']  = 'newsletter/unsubscribe';          # access (all)
$route['contect']                 = 'contect/index';                   # access (all)
$route['logout']                  = 'logout/index';                    # access (all)
$route['404_override']            = 'page_not_found';                  # access (all)
$route['translate_uri_dashes']    = FALSE;
