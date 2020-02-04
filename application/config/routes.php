<?php
defined('BASEPATH') OR exit('No direct script access allowed');



require_once( BASEPATH .'database/DB.php' );
$db =& DB();

$dataMode = $db->get_where('db_it.m_config',array(
    'ID' => 3
))->result_array();

if($dataMode[0]['MaintenanceMode']=='1'){
    $s = '(:any)';
    for ($i=1;$i<=10;$i++){
        $route[$s] = 'c_login/maintenance';
        $s = $s.'/(:any)';
    }

}

$route['default_controller'] = ($dataMode[0]['MaintenanceMode']=='1') ? 'c_login/maintenance' : 'c_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['loadDataParent/(:num)'] = 'c_login/loadDataParent/$1';

$route['navigation/(:num)'] = 'c_departement/navigation/$1';
$route['profile'] = 'c_dashboard/profile';

$route['newlogin'] = 'c_login/index2';
$route['newlogin2'] = 'c_login/index3';
$route['meet-our-team'] = 'c_login/meet_our_team';


$route['search-people'] = 'c_search_people/search_people';
$route['__getPeople'] = 'c_search_people/getPeople';




// === AUTH ===
$route['uath/getAuthSSOLogin'] = 'c_login/getAuthSSOLogin';

$route['uath/__checkPassword'] = 'c_login/checkPassword';
$route['uath/__checkUsername'] = 'c_login/checkUsername';
$route['uath/__checkloginwithAd'] = 'c_login/checkloginwithAd';


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
$route['resetpassword_intake/(:any)'] = 'c_reset_password/loadpageReset_intake/$1';
$route['updatepassword'] = 'c_reset_password/updatepassword';
$route['updatepassword_intake'] = 'c_reset_password/updatepassword_intake';

// ======= Digital SKPI ========= //
$route['skpi'] = 'c_skpi';

