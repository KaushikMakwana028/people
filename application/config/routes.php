<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Sign_in';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* ================= AUTH ================= */

$route['sign_in'] = 'Sign_in/index';

$route['sign_in/login'] = 'Sign_in/login';
$route['emp/logout'] = 'Sign_in/logout';


/* ================= ADMIN ================= */
$route['admin']                 = 'admin/Dashboard/index';
$route['admin/dashboard']        = 'admin/Dashboard/index';

$route['admin/employee']  = 'admin/Employee/index'; 
$route['admin/employee/add']   = 'admin/Employee/add';      

$route['admin/leave']                 = 'admin/Leave/index';
$route['admin/leave/approve/(:num)']  = 'admin/Leave/approve/$1';
$route['admin/leave/reject/(:num)']   = 'admin/Leave/reject/$1';

$route['admin/history'] = 'admin/History/index';
$route['admin/profile'] = 'admin/Dashboard/profile';
$route['admin/profile/update'] = 'admin/Profile/update';
$route['admin/profile/update'] = 'admin/Dashboard/update_profile';


/* ================= EMP ================= */
// $route['emp']                   = 'EMP/Dashboardd/index';
$route['emp/dashboardd']         = 'EMP/Dashboardd/index';
// $route['emp/attendance_add'] = 'EMP/attendance_add/index';
$route['admin/employee_list'] = 'admin/Employee/index';
$route['emp/profile'] = 'EMP/Dashboardd/profile';
$route['emp/profile/update'] = 'EMP/Profile/update';
$route['emp/profile/update'] = 'EMP/Dashboardd/update_profile';

$route['emp/attendance_add'] = 'EMP/Add_attendance/index';
$route['emp/save_attendance'] = 'EMP/Add_attendance/save';
$route['emp/attendance_list'] = 'EMP/Attendance/attendance_list';


$route['emp/leave']       = 'EMP/Leave/index';
$route['emp/leave/add']   = 'EMP/Leave/add';
$route['emp/leave/store'] = 'EMP/Leave/store';


$route['emp/(:any)'] = 'EMP/$1';   


$route['emp/holidays'] = 'EMP/Holidays/index';
$route['emp/holidays/(:num)'] = 'EMP/Holidays/index/$1';
$route['admin/holidays/add'] = 'admin/holidays/add';







$route['admin/save-fcm-token'] = 'admin/dashboard/save_fcm_token';



$route['save-fcm-token'] = 'emp/dashboardd/save_fcm_token';
