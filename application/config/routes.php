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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about-us']='welcome/about_us';
$route['sign-up']='welcome/sign_up';
$route['account']='welcome/account';
$route['maintenance']='welcome/maintenance';   
$route['maintenance/(:any)']='welcome/maintenance/$1';
$route['services']='welcome/services';
$route['logout']='welcome/logout';
$route['checkout']='welcome/checkout';
$route['cart/(:any)']='welcome/cart/$1';
// $route['update_cart']='welcome/update_cart';







//admin routes
$route['admin']="admin/index";
$route['admin/logout']="admin/logout";

//admin AMC routes
$route['admin/amc']="admin/amc/view";
$route['admin/amc/add']="admin/amc/add";
$route['admin/amc/edit/(:any)']="admin/amc/edit/$1";


//admin one time service 
$route['admin/one_time_service']="admin/one_time_service/view";
$route['admin/one_time_service/add']="admin/one_time_service/add";
$route['admin/one_time_service/edit/(:any)']="admin/one_time_service/edit/$1";
//admin customer
$route['admin/customer']="admin/customer/view";
$route['admin/customer/add']="admin/customer/add";
$route['admin/customer/details/(:any)']="admin/customer/details/$1";
$route['admin/customer/edit/(:any)']="admin/customer/edit/$1";
$route['admin/customer/delete/(:any)']="admin/customer/delete/$1";
$route['admin/customer/active/(:any)']="admin/customer/active/$1";
$route['admin/customer/inactive/(:any)']="admin/customer/inactive/$1";

//admin bookings
$route['admin/bookings']="admin/bookings/view";
$route['admin/bookings/add']="admin/bookings/add";
$route['admin/bookings/edit/(:any)']="admin/bookings/edit/$1";
$route['admin/bookings/delete/(:any)']="admin/bookings/delete/$1";
$route['admin/bookings/active/(:any)']="admin/bookings/active/$1";
$route['admin/bookings/inactive/(:any)']="admin/bookings/inactive/$1";

//admin Engineers
$route['admin/engineer']="admin/engineer/view";
$route['admin/engineer/add']="admin/engineer/add";
$route['admin/engineer/edit/(:any)']="admin/engineer/edit/$1";
$route['admin/engineer/delete/(:any)']="admin/engineer/delete/$1";
$route['admin/engineer/active/(:any)']="admin/engineer/active/$1";
$route['admin/engineer/inactive/(:any)']="admin/engineer/inactive/$1";

//admin categories
$route['admin/category']="admin/category/view";
$route['admin/category/add']="admin/category/add";
$route['admin/category/edit/(:any)']="admin/category/edit/$1";
$route['admin/category/delete/(:any)']="admin/category/delete/$1";
$route['admin/category/active/(:any)']="admin/category/active/$1";
$route['admin/category/inactive/(:any)']="admin/category/inactive/$1";

//admin category products
$route['admin/category_products']="admin/category_products/view";
$route['admin/category_products/add']="admin/category_products/add";
$route['admin/category_products/edit/(:any)']="admin/category_products/edit/$1";
$route['admin/category_products/delete/(:any)']="admin/category_products/delete/$1";
$route['admin/category_products/active/(:any)']="admin/category_products/active/$1";
$route['admin/category_products/inactive/(:any)']="admin/category_products/inactive/$1";

//admin Subcategories
$route['admin/subcategory']="admin/subcategory/view";
$route['admin/subcategory/add']="admin/subcategory/add";
$route['admin/subcategory/edit/(:any)']="admin/subcategory/edit/$1";
$route['admin/subcategory/delete/(:any)']="admin/subcategory/delete/$1";
$route['admin/subcategory/active/(:any)']="admin/subcategory/active/$1";
$route['admin/subcategory/inactive/(:any)']="admin/subcategory/inactive/$1";

//admin Subcategories
$route['admin/plans']="admin/plans/view";
$route['admin/plans/add']="admin/plans/add";
$route['admin/plans/edit/(:any)']="admin/plans/edit/$1";
$route['admin/plans/delete/(:any)']="admin/plans/delete/$1";
$route['admin/plans/active/(:any)']="admin/plans/active/$1";
$route['admin/plans/inactive/(:any)']="admin/plans/inactive/$1";




