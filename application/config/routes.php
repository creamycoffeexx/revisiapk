<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['login'] = 'Login/index';
$route['logout'] = 'Logout/logout';
#admin
$route['admin/dashboard'] = 'Dashboard';
$route['admin/petshop'] = 'Objects';
$route['admin/petshop/add'] = 'Objects/add';
$route['admin/petshop/edit/(:num)'] = 'Objects/edit/$1';
$route['admin/petshop/delete/(:num)'] = 'Objects/delete/$1';
$route['admin/petshop/ajax/list'] = 'Objects/ajaxlist';
$route['admin/petshop/ajax/data'] = 'Objects/ajaxdata';
$route['admin/node'] = 'Node';
$route['admin/node/add'] = 'Node/add';
$route['admin/node/edit/(:num)'] = 'Node/edit/$1';
$route['admin/node/delete/(:num)'] = 'Node/delete/$1';
$route['admin/node/ajax/list'] = 'Node/ajaxlist';
$route['admin/node/ajax/data'] = 'Node/ajaxdata';
$route['admin/graph'] = 'Graph';
$route['admin/graph/add'] = 'Graph/add';
$route['admin/graph/edit/(:num)'] = 'Graph/edit/$1';
$route['admin/graph/delete/(:num)'] = 'Graph/delete/$1';
$route['admin/graph/ajax/list'] = 'Graph/ajaxlist';
$route['admin/graph/ajax/listID/(:num)'] = 'Graph/ajaxlistID/$1';
$route['admin/graph/ajax/data'] = 'Graph/ajaxdata';
$route['admin/graph/ajax/datajoin'] = 'Graph/ajaxdatajoin';
$route['admin/user'] = 'User';
$route['admin/user/add'] = 'User/add';
$route['admin/user/edit/(:num)'] = 'User/edit/$1';
$route['admin/user/delete/(:num)'] = 'User/delete/$1';
$route['admin/user/ajax/list'] = 'User/ajaxlist';


#user
$route['dashboard'] = 'Dashboard';
$route['petshop'] = 'Front/petshop';
$route['petshop/(:num)'] = 'Front/petshop/$1';
$route['petshop/detail/(:num)'] = 'Front/detailpetshop/$1';
$route['galeri'] = 'Front/galeri';
$route['djikstra'] = 'Front/djikstra';
$route['djikstra2'] = 'Front/djikstra2';
$route['about'] = 'Front/about';
$route['pedoman'] = 'Front/pedoman';
$route['getShortestPath'] = 'Front/getShortestPath';
$route['getMarker'] = 'Front/getAllMarker';

// $route['test'] = 'Front/about';


$route['default_controller'] = 'Login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
