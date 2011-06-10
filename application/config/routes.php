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
| Tcohere area two reserved routes:
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
$route['default_controller'] = 'blog';
$route['^((?!category|customize|update|tools|create|about|blog|tag|login|logout|contact|feed|rss|error|edit|delete|archive|admin|reblog)\S*)'] = "blog/posts/$1";
$route['tag/(:any)'] = 'blog/tag/$1';
$route['category/(:any)'] = 'blog/category/$1';
$route['feed.xml$'] = "feed";
$route['rss.xml$'] = "feed";
$route['rss'] = "feed";
$route['delete/(:any)'] = "admin/delete/$1";
$route['edit/(:any)'] = "admin/edit/$1";
$route['reblog/(:any)'] = "admin/reblog/$1";
$route['reblog'] = "admin/reblog";
$route['customize'] = "admin/customize";
$route['new_post'] = "admin/new_post";
$route['update'] = "admin/update";
$route['create'] = "admin/create";
$route['logout'] = "admin/logout";
$route['login'] = "admin/login";
$route['combined.css'] = "tools/combine_css";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
