<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'c_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['navigation/(:num)'] = 'c_departement/navigation/$1';
$route['profile'] = 'c_dashboard/profile';


// === AUTH ===
$route['uath/getAuthSSOLogin'] = 'c_login/getAuthSSOLogin';

$route['uath/__checkPassword'] = 'c_login/checkPassword';
$route['uath/__checkUsername'] = 'c_login/checkUsername';

$route['uath/updatePassword'] = 'c_login/updatePassword';
$route['uath/authUserPassword'] = 'c_login/authUserPassword';
$route['auth/authGoogle'] = 'c_login/authGoogle';
// $route['auth/gen_pass'] = 'c_login/gen_pass';
$route['auth/logMeOut'] = 'c_login/logMeOut';
$route['sendmail'] = 'c_login/sendmail';
$route['callback'] = 'c_login/callback';

// ===== Reset Password
$route['uath/resetPassword'] = 'c_login/resetPassword';
$route['resetPasswordpage'] = 'c_login/resetPasswordpage';
$route['resetPasswordAction'] = 'c_login/resetPasswordAct';

// ===== New Reset Password ====
$route['resetpassword/(:any)'] = 'c_reset_password/loadpageReset/$1';
$route['updatepassword'] = 'c_reset_password/updatepassword';


