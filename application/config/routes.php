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

$route['default_controller'] = ($dataMode[0]['MaintenanceMode']=='1')
    ? 'c_login/maintenance'
    : 'c_login/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['loadDataParent/(:num)'] = 'c_login/loadDataParent/$1';

$route['navigation/(:num)'] = 'c_departement/navigation/$1';
$route['profile'] = 'c_dashboard/profile';

$route['newlogin'] = 'c_login/index2';

$route['portal-login'] = 'c_login/portal_login';
$route['meet-our-team'] = 'c_login/meet_our_team';

$route['forget-password'] = 'c_login/forget_password';

$route['setLogLogin'] = 'c_login/setLogLogin';

// ++++++++ Search people ++++++++
$route['search-people'] = 'c_search_people/search_people';
$route['search-people/detail-employees/(:any)'] = 'c_search_people/detail_people_employees/$1';
$route['search-people/detail-student/(:any)'] = 'c_search_people/detail_people_student/$1';
$route['__getPeople'] = 'c_search_people/getPeople';
$route['__getDetailsPeople'] = 'c_search_people/getDetailsPeople';

$route['mobile'] = 'c_mobile/mobile_page';

$route['lost-and-found'] = 'c_lostnfound/lost_and_found';
$route['fetch-lost-and-found'] = 'c_lostnfound/fetchLostAndFound';
$route['info-lost-and-found'] = 'c_lostnfound/lostAndFoundInfo';


// ++++++++ EULA ++++++++
$route['eula'] = 'c_eula/eula';

$route['survey'] = 'c_survey/survey';
$route['survey/my-answer/(:any)'] = 'c_survey/my_answer/$1';
$route['form/(:any)'] = 'c_survey/checksurvey/$1';
$route['submitChecksurvey'] = 'c_survey/submitChecksurvey';


$route['list-survey'] = 'c_survey/list_survey';
$route['data-survey'] = 'c_survey/crudSurvey';

// === AUTH ===
$route['uath/getAuthSSOLogin'] = 'c_login/getAuthSSOLogin';

$route['uath/__checkPassword'] = 'c_login/checkPassword';
$route['uath/__checkUsername'] = 'c_login/checkUsername';
$route['uath/__checkloginwithAd'] = 'c_login/checkloginwithAd';
$route['uath/__eulaStart'] = 'c_eula/eulaStart';
$route['uath/__destroySessionEULA'] = 'c_eula/destroySessionEULA';

$route['uath/__surveyStart'] = 'c_survey/surveyStart';


$route['getPublicIP'] = 'c_login/getPublicIP';

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

// ======= CV ========= //

$route['cv/(:any)'] = 'c_cv/index/$1';
$route['data/(:any)'] = 'c_cv/data/$1';

