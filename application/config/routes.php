<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'logincontroller/index';
$route['404_override'] = '';

// Login
$route['admin']['GET'] = 'logincontroller/index';
$route['login']['GET'] = 'logincontroller/index';
$route['login-user']['POST'] = 'logincontroller/login';
$route['register']['GET'] = 'user/Registercontroller/index';
$route['register-check']['POST'] = 'user/Registercontroller/register_check';

// Danh sách gửi bài
$route['posting-list']['GET'] = 'PostingList/index';
$route['posting-creat']['GET'] = 'PostingList/creat';
$route['posting-add']['POST'] = 'PostingList/add';
$route['posting-view/(:any)']['GET'] = 'PostingList/view/$1';
$route['posting-edit/(:any)']['GET'] = 'PostingList/edit/$1';
$route['posting-delete/(:any)']['GET'] = 'PostingList/delete/$1';
$route['posting-repaste/(:any)/(:any)/(:any)']['GET'] = 'PostingList/repaste/$1/$2/$3';
$route['posting-repaste-add']['POST'] = 'PostingList/repaste_add/$1/$2';

$route['all-post']['GET'] = 'AllpostController/index';
$route['all-post-status/(:any)/(:any)']['GET'] = 'AllpostController/status/$1/$2';
$route['all-post-counter/(:any)/(:any)']['GET'] = 'AllpostController/counter/$1/$2';
$route['all-post-view/(:any)']['GET'] = 'AllpostController/view/$1';
$route['all-post-edit/(:any)']['GET'] = 'AllpostController/edit/$1';
$route['all-post-delete/(:any)']['GET'] = 'AllpostController/delete/$1';

$route['user-counter']['GET'] = 'CounterController/index';
$route['user-counter-check/(:any)']['GET'] = 'CounterController/checkcounter/$1';
$route['user-counter-status/(:any)/(:any)']['GET'] = 'CounterController/status/$1/$2';
$route['counter-argument/(:any)/(:any)']['GET'] = 'CounterController/counter_argument/$1/$2';
$route['user-counter-add/(:any)/(:any)']['POST'] = 'CounterController/add/$1/$2';

// Menu Backend
$route['menu-backend']['GET'] = 'user/MenuBackendController/index';
$route['menu-backend-creat']['GET'] = 'user/MenuBackendController/create';
$route['menu-backend-add']['POST'] = 'user/MenuBackendController/add';
$route['menu-backend-add']['get'] = 'DashboardController/index';
$route['menu-backend-edit/(:any)']['GET'] = 'user/MenuBackendController/edit/$1';
$route['menu-backend-update']['POST'] = 'user/MenuBackendController/update';
$route['menu-backend-update']['get'] = 'DashboardController/index';
$route['menu-backend-delete/(:any)']['get'] = 'user/MenuBackendController/delete/$1';

// User
$route['user']['GET'] = 'user/UserController/index';
$route['user-creat']['GET'] = 'user/UserController/create';
$route['user-add']['POST'] = 'user/UserController/add';
$route['user-edit/(:any)']['GET'] = 'user/UserController/edit/$1';
$route['user-update']['POST'] = 'user/UserController/update';
$route['user-delete/(:any)']['GET'] = 'user/UserController/delete/$1';
$route['edit-password']['GET'] = 'user/UserController/editpass';
$route['change-password']['GET'] = 'DashboardController/index
';
$route['change-password']['POST'] = 'user/UserController/changepass';
$route['logout']['GET'] = 'user/UserController/logout';
$route['decentralization/(:any)']['GET'] = 'user/UserController/decentralization/$1';
$route['decentralization-update']['POST'] = 'user/UserController/decentralization_update';
$route['decentralization-group']['GET'] = 'user/UserController/decentralization_group';
$route['decentralization-group-creat']['GET'] = 'user/UserController/decentralization_group_creat';
$route['decentralization-group-add']['POST'] = 'user/UserController/decentralization_group_add';
$route['decentralization-group-edit/(:any)']['GET'] = 'user/UserController/decentralization_group_edit/$1';
$route['decentralization-group-update']['POST'] = 'user/UserController/decentralization_group_update';
$route['decentralization-group-delete/(:any)']['GET'] = 'user/UserController/decentralization_group_delete/$1';
$route['decentralization-group-setting/(:any)']['GET'] = 'user/UserController/decentralization_group_setting/$1';
$route['decentralization-group-setting-update']['POST'] = 'user/UserController/decentralization_group_setting_update';

// DashBoard
$route['dashboard']['GET'] = 'DashboardController/index';
$route['comment']['GET'] = 'CommentController/index';