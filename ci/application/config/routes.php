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
//$route['news/create'] = 'news/create';
//$route['news/(:any)'] = 'news/view/$1';
//$route['news'] = 'news';
//$route['default_controller'] = 'News';
$route['welcome'] = 'Welcome/index';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
//$route['default_controller'] = 'pages/view';
//$route['(:any)'] = 'pages/view/$1';
//$route['blog'] = 'article';
//$route['blog/login'] = 'blog/login';
$route['login'] = 'blog/login'; //登录页面
$route['register'] ='blog/register';//注册页面
$route['reg'] = 'blog/register';//注册成功页面
$route['sign_out'] = 'blog/sign_out';
$route['blog/create'] = 'blog/create';//创建博客页面
$route['page/(:any)'] = 'blog/page/$1';
$route['blog/login1'] = 'blog/login1';
$route['blog/picture'] = 'blog/picture';
$route['blog/pic_succ'] = 'blog/pic_succ';
$route['blog/forget'] = 'blog/forget';
$route['blog/find_ps'] = 'blog/find_ps';
$route['blog/view/(:any)'] = 'blog/view/$1';

$route['Admin/(:any)'] = 'Admin/login/$1';
$route['Admin/index/(:any)'] = 'Admin/index/$1';
$route['admin_page/(:any)'] = 'Admin/admin_page/$1';
$route['admin/delete/(:any)'] = 'admin/delete/$1';

$route['default_controller'] = 'blog';//默认主页
$route['topical/(:any)'] = 'blog/topical/$1';

$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';

$route['pages/(:any)'] = 'pages/views/$1';
$route['pages/views'] = 'pages/views';
$route['test/(:any)'] = 'test/hello';