<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['(:any)'] = 'main/home';
$route['main'] = 'main/home/index';
$route['home'] = 'main/home/index';
$route['about'] = 'main/home/about';
$route['contact'] = 'main/home/contact';
$route['signup'] = 'main/users/signup';
$route['login'] = 'main/users/login';
$route['logout'] = 'main/users/logout';

$route['basketball'] = 'basketball/home/index';

$route['football/team'] = 'football/team/display/1';
$route['football'] = 'football/home/index';

//use 404_override to redirect to home page if page not found
//don't use locally while debugging because it will hide page not found error
$route['404_override'] = 'override';
$route['default_controller'] = 'main/home/index';

/* End of file routes.php */
/* Location: ./application/config/routes.php */