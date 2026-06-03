<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* ================= DEFAULT ================= */
$route['default_controller'] = 'Sign_in/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* ================= AUTH ================= */
$route['sign_in'] = 'Sign_in/index';
$route['sign_in/login'] = 'Sign_in/login';
$route['emp/logout'] = 'Sign_in/logout';

/* ================= ADMIN ================= */

$route['admin/login'] = 'admin/Admin_login/index';
$route['admin/login/check'] = 'admin/Admin_login/login';
$route['admin/logout'] = 'Sign_in/logout';




$route['admin'] = 'admin/Dashboard/index';
$route['admin/dashboard'] = 'admin/Dashboard/index';
$route['admin/manual-logs'] = 'admin/Dashboard/manual_logs';

$route['admin/employee'] = 'admin/Employee/index';
$route['admin/employee/add'] = 'admin/Employee/add';

$route['admin/leave'] = 'admin/Leave/index';
$route['admin/leave/approve/(:num)'] = 'admin/Leave/approve/$1';
$route['admin/leave/reject/(:num)'] = 'admin/Leave/reject/$1';

$route['admin/history'] = 'admin/History/index';
$route['admin/profile'] = 'admin/Dashboard/profile';
$route['admin/profile/update'] = 'admin/Dashboard/update_profile';

$route['admin/holidays/add'] = 'admin/Holidays/add';
$route['admin/save-fcm-token'] = 'admin/Dashboard/save_fcm_token';

/* ================= SALES ================= */
$route['sales'] = 'sales/Dashboard/index';
$route['sales/dashboard'] = 'sales/Dashboard/index';
$route['sales/profile'] = 'sales/Dashboard/profile';
$route['sales/profile/update'] = 'sales/Dashboard/update_profile';
$route['sales/save-fcm-token'] = 'sales/Dashboard/save_fcm_token';
$route['sales/logout'] = 'Sign_in/logout';

/* ================= EMP ================= */
$route['emp'] = 'emp/Dashboard/index';
$route['emp/dashboard'] = 'emp/Dashboard/index';

$route['emp/profile'] = 'emp/Dashboard/profile';
$route['emp/profile/update'] = 'emp/Dashboard/update_profile';

$route['emp/attendance_add'] = 'emp/Add_attendance/index';
$route['emp/save_attendance'] = 'emp/Add_attendance/save';
$route['emp/attendance_list'] = 'emp/Attendance/attendance_list';

$route['emp/leave'] = 'emp/Leave/index';
$route['emp/leave/add'] = 'emp/Leave/add';
$route['emp/leave/store'] = 'emp/Leave/store';

$route['emp/holidays'] = 'emp/Holidays/index';
$route['emp/holidays/(:num)'] = 'emp/Holidays/index/$1';

$route['save-fcm-token'] = 'emp/Dashboard/save_fcm_token';



$route['admin/employee/edit/(:num)'] = 'admin/Employee/edit/$1';
$route['admin/employee/update/(:num)'] = 'admin/Employee/update/$1';
$route['admin/employee/delete/(:num)'] = 'admin/Employee/delete/$1';









$route['emp/profile'] = 'emp/Profile/index';
$route['emp/profile/update'] = 'emp/Profile/update_profile';

$route['emp/change-password'] = 'emp/Profile/change_password';
$route['emp/change-password/save'] = 'emp/Profile/save_password';





$route['admin/announcements'] = 'admin/Announcements/index';
$route['admin/announcements/add'] = 'admin/Announcements/add';
$route['admin/announcements/store'] = 'admin/Announcements/store';

// Payment Management
$route['admin/payments'] = 'admin/Payments/index';
$route['admin/payments/store'] = 'admin/Payments/store';
$route['admin/transactions'] = 'admin/Payments/transactions';
$route['admin/transactions/store'] = 'admin/Payments/store_transaction';
$route['admin/transactions/delete/(:num)'] = 'admin/Payments/delete_transaction/$1';



$route['admin/(:any)/(:any)'] = 'admin/$1/$2';
$route['admin/(:any)'] = 'admin/$1';
$route['admin'] = 'admin/dashboard';



$route['admin/holidays/update/(:num)'] = 'admin/holidays/update/$1';
$route['admin/holidays/delete/(:num)'] = 'admin/holidays/delete/$1';



$route['admin/announcements/delete/(:num)'] = 'admin/announcements/delete/$1';


$route['admin/change_password'] = 'admin/change_password';
$route['admin/change_password/save'] = 'admin/change_password/save';


$route['emp/view-profile/(:num)'] = 'emp/dashboard/view_profile/$1';





/* ================= AUTH ================= */
// $route['login'] = 'login';

/* ================= DASHBOARD ================= */
// $route['dashboard'] = 'dashboard';
// $route['sw.js'] = 'welcome/sw';

/* ================= PROJECT ================= */
$route['project'] = 'project/index';
$route['project/add'] = 'project/add';
$route['project/store'] = 'project/store';
$route['project/add_requirement'] = 'project/add_requirement';
$route['project/add_payment'] = 'project/add_payment';
$route['project/project_data/(:num)'] = 'project/project_data/$1';
$route['project/all_project/(:num)'] = 'project/all_project/$1';
$route['project/all_projects'] = 'project/all_projects';
$route['project/clients'] = 'project/clients';
$route['project/view/(:num)'] = 'project/view/$1';
$route['project/edit/(:num)'] = 'project/edit/$1';
$route['project/update/(:num)'] = 'project/update/$1';

/* ================= USER ================= */
// $route['user'] = 'user/index';
// $route['user/add'] = 'user/add';
// $route['user/store'] = 'user/store';
// $route['user/edit/(:num)'] = 'user/edit/$1';        // ✅ FIX
// $route['user/update/(:num)'] = 'user/update/$1';    // ✅ FIX
// $route['user/delete/(:num)'] = 'user/delete/$1';

/* ================= TASK ================= */
$route['task'] = 'task/index';
$route['task/add'] = 'task/add';
$route['task/save'] = 'task/save';

$route['task/delete/(:num)'] = 'task/delete/$1';


// Lead Management

$route['admin/leads']               = 'admin/Leads/index';
$route['admin/leads/create'] = 'admin/Leads/create';
$route['admin/leads/store']         = 'admin/Leads/store';
$route['admin/leads/view/(:num)']   = 'admin/Leads/view/$1';
$route['admin/leads/edit/(:num)']   = 'admin/Leads/edit/$1';
$route['admin/leads/update/(:num)'] = 'admin/Leads/update/$1';
$route['admin/leads/delete/(:num)'] = 'admin/Leads/delete/$1';
$route['admin/leads/update_status'] = 'admin/Leads/update_status';

// Salary Management
$route['admin/salaries']               = 'admin/Salaries/index';
$route['admin/salaries/store']          = 'admin/Salaries/store';
$route['admin/salaries/delete/(:num)']  = 'admin/Salaries/delete/$1';
$route['admin/salaries/get_developer_stats'] = 'admin/Salaries/get_developer_stats';
$route['admin/salaries/update_base_salary']  = 'admin/Salaries/update_base_salary';

// Expense Management
$route['admin/expenses'] = 'admin/Expenses/index';
$route['admin/expenses/store'] = 'admin/Expenses/store';
$route['admin/expenses/update/(:num)'] = 'admin/Expenses/update/$1';
$route['admin/expenses/delete/(:num)'] = 'admin/Expenses/delete/$1';

// Payment Management
$route['admin/payments'] = 'admin/Payments/index';
$route['admin/payments/store'] = 'admin/Payments/store';
$route['admin/transactions'] = 'admin/Payments/transactions';
$route['admin/transactions/store'] = 'admin/Payments/store_transaction';
$route['admin/transactions/delete/(:num)'] = 'admin/Payments/delete_transaction/$1';

// Quotations & Proposals
$route['admin/quotations'] = 'admin/quotations/index';
$route['admin/quotations/create'] = 'admin/quotations/create';
$route['admin/quotations/store'] = 'admin/quotations/store';
$route['admin/quotations/edit/(:num)'] = 'admin/quotations/edit/$1';
$route['admin/quotations/update/(:num)'] = 'admin/quotations/update/$1';
$route['admin/quotations/delete/(:num)'] = 'admin/quotations/delete/$1';
$route['admin/quotations/view/(:num)'] = 'admin/quotations/view/$1';
