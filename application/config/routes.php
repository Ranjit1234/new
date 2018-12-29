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
$route['default_controller'] = 'welcome';
$route['login']='welcome/login';
$route['get_user_log_data']='Dashborad/getLogData';
$route['get_user_data']='Dashborad/getUserData';

//shra
$route['add_new_user']='Dashborad/add_new_user';
$route['get_all_users']='Dashborad/get_all_users';
$route['update_password']='Dashborad/update_password';
$route['delete_user']='Dashborad/delete_user';

//stock
$route['get_stock']='Dashborad/get_stock';
$route['update_stock']='Dashborad/update_stock';
//location
$route['add_new_location']='Dashborad/add_new_location';
$route['get_all_location']='Dashborad/get_all_location';
$route['delete_country']='Dashborad/delete_country';
$route['getcountrybyletter']='Dashborad/getcountrybyletter1';
$route['getlocationsbyid']='Dashborad/getlocationsbyid';
$route['update_location']='Dashborad/update_location';
$route['delete_location']='Dashborad/delete_location';
$route['update_country']='Dashborad/update_country';
$route['add_new_loc_country']='Dashborad/add_new_loc_country';
$route['save_order_data']='Dashborad/saveOrderData';
$route['get_report_data']='Dashborad/getReportData';
$route['download_excel_file']='Dashborad/downloadExcelFile';
$route['send_mail_user']='Dashborad/sendMail';
$route['update_report']='Dashborad/update_report';
$route['check_username_add']='Dashborad/checkUsername';
$route['check_stock_data']='Dashborad/checkStockData';




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
