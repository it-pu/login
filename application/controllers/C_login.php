
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 07/06/2018
 * Time: 1:41 PM
 */

class C_login extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');

        date_default_timezone_set("Asia/Jakarta");

    }


    public function loadDataParent($Year){

        $db_ = 'ta_'.$Year;

        $data = $this->db->query('SELECT s.NPM,s.ProgramID,s.ProdiID,s.DateOfBirth, s.StatusStudentID, aus.ProdiGroupID, s.Father, s.Mother FROM '.$db_.'.students s
                                    LEFT JOIN db_academic.auth_students aus ON (aus.NPM = s.NPM)
                                    ORDER BY s.NPM ASC ')->result_array();

        if(count($data)>0){
            for($i=0;$i<count($data);$i++){
                $d = $data[$i];
                $d_explode = explode('-',$d['DateOfBirth']);

                $Paasord = null;
                $Status = '0';
                if(count($d_explode)==3){

                    if($d_explode[0]!='0000'){
                        $Paasord = md5($d_explode[2].''.$d_explode[1].''.substr($d_explode[0],2,2));
                        $Status = '-1';
                    }

                }

                $arr = array(
                    'NPM' => $d['NPM'],
                    'ProgramID' => $d['ProgramID'],
                    'ProdiID' => $d['ProdiID'],
                    'ProdiGroupID' => $d['ProdiGroupID'],
                    'Year' => $Year,
                    'FatherName' => ucwords(strtolower($d['Father'])),
                    'MotherName' => ucwords(strtolower($d['Mother'])),
                    'Password_Old' => $Paasord,
                    'StatusStudentID' => $d['StatusStudentID'],
                    'Status' => $Status
                );
                $this->db->insert('db_academic.auth_parents', $arr);
            }
        }


    }


    public function index()
    {

        $data['CalendarAcademic'] = $this->db->get_where('db_academic.calendar_academic',
            array('StatusPublish' => '2'))->result_array();

        $data['loginURL'] = $this->google->loginURL();
        $this->load->view('login',$data);
//        $this->load->view('login3',$data);
    }

    public function dashboard()
    {

        $data['CalendarAcademic'] = $this->db->get_where('db_academic.calendar_academic',
            array('StatusPublish' => '2'))->result_array();

        $data['loginURL'] = $this->google->loginURL();
        $content = $this->load->view('page/dashboard/dashboard',$data,true);
        parent::template($content);
//        $this->load->view('template/dashboard',$data);
//        $this->load->view('login3',$data);
    }

    public function index2()
    {
        $data['loginURL'] = $this->google->loginURL();
        $this->load->view('login3',$data);
    }

    public function portal_login()
    {
        $data['CalendarAcademic'] = $this->db->get_where('db_academic.calendar_academic',
            array('StatusPublish' => '2'))->result_array();
        $data['loginURL'] = $this->google->loginURL();
//        $this->load->view('login4',$data);
        $content = $this->load->view('page/login/login_portal',$data,true);
        parent::template($content);
    }

    public function meet_our_team()
    {
        $data['loginURL'] = $this->google->loginURL();
        $this->load->view('meet_our_team',$data);
    }

    public function authGoogle(){

        if(isset($_GET['code'])){

            try{
                //authenticate user
                $this->google->getAuthenticate();

                //get user info from google
                $gpInfo = $this->google->getUserInfo();

                //preparing data for database insertion
                $userData['oauth_provider'] = 'google';
                $userData['oauth_uid'] 		= $gpInfo['id'];
                $userData['first_name'] 	= $gpInfo['given_name'];
                $userData['last_name'] 		= $gpInfo['family_name'];
                $userData['email'] 			= $gpInfo['email'];
                $userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
                $userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
                $userData['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';
                $userData['picture_url'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';


                // Cek Userdata
                $dataUser = $this->m_auth->__getUserByEmailPU($userData['email'] );

//                print_r($dataUser);


                if(count($dataUser['url_direct'])>0) {

                    if(count($dataUser['url_direct'])==1){
//                        header("Location : ".$dataUser['url_direct'][0]);
                        $data['Url_photo'] = $dataUser['url_direct'][0]['Url_photo'];
                        $data['Name'] = $dataUser['url_direct'][0]['Name'];
                        $data['Username'] = $dataUser['url_direct'][0]['Username'];
                        $data['url'] = $dataUser['url_direct'][0]['url'];
                        $data['url_login'] = $dataUser['url_direct'][0]['url_login'];
                        $data['token'] = $dataUser['url_direct'][0]['token'];
                        $data['User'] = 1;
                        $this->load->view('landingPage',$data);
                    } else {
                        $data['User']=2;
                        $data['url_login']='-';
                        $data['token']='-';

                        $data['DataUser'] = $dataUser['url_direct'];
                        $this->load->view('landingPage',$data);
                    }


                } else {

                    $this->load->view('errorPageLoginGoogle','');
                }

            } catch (Exception $err){
                redirect(base_url());
            }


        }
    }


    private function genratePassword($Username,$Password){

        $plan_password = $Username.''.$Password;
        $pas = md5($plan_password);
        $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');

        return $pass;
    }

    // ========= LOGIN SSO =========

    public function checkUsername(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "L0G1N-S50-3R0";
        $data_arr = (array) $this->jwt->decode($token,$key);

        $result = array(
            'Status' => '0',
            'Message' => 'User Not Exist'
        );

        if($data_arr['userType']!='' && $data_arr['userType']=='P'){
            $dataparent = $this->db->query('SELECT aup.*,aus.Name,aus.Year  FROM db_academic.auth_parents aup 
                                                          LEFT JOIN db_academic.auth_students aus ON (aus.NPM = aup.NPM)
                                                          WHERE aup.NPM = "'.$data_arr['Username'].'" LIMIT 1')->result_array();

            if(count($dataparent)>0){
                $dataMhs = $this->get_dataStd($dataparent[0]['Year'],$dataparent[0]['NPM']);
                $DataUser = array(
                    'Name' => $dataMhs['Name'],
                    'Username' => $dataMhs['NPM'],
                    'User' => 'Parent',
                    'Year' => $dataparent[0]['Year'],
                    'Status' => $dataparent[0]['Status'],
                    'PathPhoto' => url_pas.'uploads/students/ta_'.$dataparent[0]['Year'].'/'.$dataMhs['Photo']
                );
                $result = array(
                    'DataUser' => $DataUser,
                    'Status' => '1',
                    'Message' => 'User Exist'
                );
            }


        } else {

            $dataStudents = $this->db->query('SELECT * FROM db_academic.auth_students
                                                  WHERE NPM = "'.$data_arr['Username'].'" LIMIT 1')->result_array();

            if(count($dataStudents)>0){

                $dataMhs = $this->get_dataStd($dataStudents[0]['Year'],$dataStudents[0]['NPM']);

                $DataUser = array(
                    'Name' => $dataMhs['Name'],
                    'Username' => $dataStudents[0]['NPM'],
                    'User' => 'Students',
                    'Year' => $dataStudents[0]['Year'],
                    'Status' => $dataStudents[0]['Status'],
                    'PathPhoto' => url_pas.'uploads/students/ta_'.$dataStudents[0]['Year'].'/'.$dataMhs['Photo']
                );
                $result = array(
                    'DataUser' => $DataUser,
                    'Status' => '1',
                    'Message' => 'User Exist'
                );

            } else {

                // Cek Apakah karyawan atau bukan
                $dataEmploy = $this->db->get_where('db_employees.employees',
                    array('NIP' => $data_arr['Username']),1)->result_array();

                if(count($dataEmploy)>0){
                    $DataUser = array(
                        'Name' => $dataEmploy[0]['TitleAhead'].' '.$dataEmploy[0]['Name'].' '.$dataEmploy[0]['TitleBehind'],
                        'Username' => $dataEmploy[0]['NIP'],
                        'User' => 'Employees',
                        'Year' => 0,
                        'Status' => $dataEmploy[0]['Status'],
                        'PathPhoto' => url_pas.'uploads/employees/'.$dataEmploy[0]['Photo']
                    );
                    $result = array(
                        'DataUser' => $DataUser,
                        'Status' => '1',
                        'Message' => 'User Exist'
                    );
                }


            }

        }


        return print_r(json_encode($result));
    }

    public function checkPassword(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "L0G1N-S50-3R0";
        $data_arr = (array) $this->jwt->decode($token,$key);

        // check DevelopMode
        $dataMode = $this->db->get_where('db_it.m_config',array(
            'ID' => 3
        ))->result_array();
            // print_r($data_arr['Status']);die();
        if($data_arr['User']=='Students'){
//            $db_ = 'ta_'.$data_arr['Year'];
            if($data_arr['Status']=='-1'){
                $dataMhs = $this->db->get_where('db_academic.auth_students',
                    array('NPM' => $data_arr['Username'],'Password_Old' => md5($data_arr['Password'])),1)
                    ->result_array();

                if(count($dataMhs)>0){
                    $dataMhsDetail = $this->get_dataStd($dataMhs[0]['Year'],$dataMhs[0]['NPM']);

                    $DataUser = array(
                        'Name' => $dataMhsDetail['Name'],
                        'Username' => $dataMhsDetail['NPM'],
                        'User' => 'Students',
                        'Year' => $dataMhs[0]['Year'],
                        'Status' => $dataMhs[0]['Status'],
                        'LastPassword' => $dataMhs[0]['Password_Old'],
                        'PathPhoto' => url_pas.'uploads/students/ta_'.$dataMhs[0]['Year'].'/'.$dataMhsDetail['Photo']
                    );

                    $result = array(
                        'DataUser' => $DataUser,
                        'Status' => -1,
                        'Message' => 'Pleace, change your password'
                    );
                } else {
                    $result = array(
                        'Status' => 0,
                        'Message' => 'Password is wrong'
                    );
                }

            }
            else if($data_arr['Status']=='1'){
                $pass = $this->genratePassword($data_arr['Username'],$data_arr['Password']);
                $dataMhs = $this->db->get_where('db_academic.auth_students',
                    array('NPM' => $data_arr['Username'],'Password' => $pass),1)
                    ->result_array();

                if(count($dataMhs)>0){

                    $logon = $this->loadData_UserLogin('Students',$dataMhs[0]['Year'],$data_arr['Username'],$data_arr['TypeUser']);
                    $result = array(
                        'Status' => 1,
                        'Message' => 'Login success',
                        'url_direct' => $logon['url_direct']
                    );

                } else {
                    $DevelopMode = $dataMode[0]['DevelopMode'];
                    if ($DevelopMode == '1' && $data_arr['Password'] == $dataMode[0]['GlobalPassword']) {
                        $dataMhs = $this->db->get_where('db_academic.auth_students',
                        array('NPM' => $data_arr['Username']),1)
                        ->result_array();
                        $logon = $this->loadData_UserLogin('Students',$dataMhs[0]['Year'],$data_arr['Username'],$data_arr['TypeUser']);
                        $result = array(
                            'Status' => 1,
                            'Message' => 'Login success',
                            'url_direct' => $logon['url_direct']
                        );
                    }
                    else{
                        $result = array(
                            'Status' => 0,
                            'Message' => 'Password is wrong'
                        );
                    }
                   
                }
            }
        }
        else if($data_arr['User']=='Employees') {


            if($data_arr['Status']=='-1'){
                $dataEm = $this->db->get_where('db_employees.employees',
                    array(
                        'NIP' => $data_arr['Username'],
                        'Password_Old' => md5($data_arr['Password'])))->result_array();

                if(count($dataEm)>0){
                    $DataUser = array(
                        'Name' => $dataEm[0]['TitleAhead'].' '.$dataEm[0]['Name'].' '.$dataEm[0]['TitleBehind'],
                        'Username' => $dataEm[0]['NIP'],
                        'User' => 'Employees',
                        'Year' => 0,
                        'Status' => $dataEm[0]['Status'],
                        'PathPhoto' => url_pas.'uploads/employees/'.$dataEm[0]['Photo']
                    );

                    $result = array(
                        'DataUser' => $DataUser,
                        'Status' => -1,
                        'Message' => 'Pleace, change your password'
                    );
                } else {
                    $result = array(
                        'Status' => 0,
                        'Message' => 'Password is wrong'
                    );
                }
            }
            else if($data_arr['Status']=='1'){
                $pass = $this->genratePassword($data_arr['Username'],$data_arr['Password']);
                $dataEm = $this->db->get_where('db_employees.employees',
                    array(
                        'NIP' => $data_arr['Username'],
                        'Password' => $pass))->result_array();
                if(count($dataEm)>0){
                    $logon = $this->loadData_UserLogin('Employees',0,$data_arr['Username'],$data_arr['TypeUser']);
                    $result = array(
                        'Status' => 1,
                        'Message' => 'Login success',
                        'url_direct' => $logon['url_direct']
                    );
                } else {

                    $DevelopMode = $dataMode[0]['DevelopMode'];
                    if ($DevelopMode == '1' && $data_arr['Password'] == $dataMode[0]['GlobalPassword']) {
                        $logon = $this->loadData_UserLogin('Employees',0,$data_arr['Username'],$data_arr['TypeUser']);
                        $result = array(
                            'Status' => 1,
                            'Message' => 'Login success',
                            'url_direct' => $logon['url_direct']
                        );
                    }
                    else{
                        $result = array(
                            'Status' => 0,
                            'Message' => 'Password is wrong'
                        );
                    }

                }
            }
        }
        else if($data_arr['User']=='Parent'){
            if($data_arr['Status']=='-1'){
                $dataMhs = $this->db->get_where('db_academic.auth_parents',
                    array('NPM' => $data_arr['Username'],'Password_Old' => md5($data_arr['Password'])),1)
                    ->result_array();

                if(count($dataMhs)>0){
                    $dataMhsDetail = $this->get_dataStd($dataMhs[0]['Year'],$dataMhs[0]['NPM']);

                    $DataUser = array(
                        'Name' => $dataMhsDetail['Name'],
                        'Username' => $dataMhsDetail['NPM'],
                        'User' => 'Parent',
                        'Year' => $dataMhs[0]['Year'],
                        'Status' => $dataMhs[0]['Status'],
                        'LastPassword' => $dataMhs[0]['Password_Old'],
                        'PathPhoto' => url_pas.'uploads/students/ta_'.$dataMhs[0]['Year'].'/'.$dataMhsDetail['Photo']
                    );

                    $result = array(
                        'DataUser' => $DataUser,
                        'Status' => -1,
                        'Message' => 'Pleace, change your password'
                    );
                } else {

                    $DevelopMode = $dataMode[0]['DevelopMode'];
                    
                    if ($DevelopMode == '1' && $data_arr['Password'] == $dataMode[0]['GlobalPassword']) {
                        $dataMhs = $this->db->get_where('db_academic.auth_students',
                        array('NPM' => $data_arr['Username']),1)
                        ->result_array();
                        $logon = $this->loadData_UserLogin('Parent',$dataMhs[0]['Year'],$data_arr['Username'],$data_arr['TypeUser']);
                        $result = array(
                            'Status' => 1,
                            'Message' => 'Login success',
                            'url_direct' => $logon['url_direct']
                        );
                    }
                    else{
                        $result = array(
                            'Status' => 0,
                            'Message' => 'Password is wrong'
                        );
                    }
                }
            }
            else if($data_arr['Status']=='1'){

                $pass = $this->genratePassword($data_arr['Username'],$data_arr['Password']);
                $dataMhs = $this->db->get_where('db_academic.auth_parents',
                    array('NPM' => $data_arr['Username'],'Password' => $pass),1)
                    ->result_array();

                if(count($dataMhs)>0){

                    $logon = $this->loadData_UserLogin('Parent',$dataMhs[0]['Year'],$data_arr['Username'],$data_arr['TypeUser']);
                    $result = array(
                        'Status' => 1,
                        'Message' => 'Login success',
                        'url_direct' => $logon['url_direct']
                    );

                } else {

                    $DevelopMode = $dataMode[0]['DevelopMode'];
                    
                    if ($DevelopMode == '1' && $data_arr['Password'] == $dataMode[0]['GlobalPassword']) {
                        $dataMhs = $this->db->get_where('db_academic.auth_students',
                        array('NPM' => $data_arr['Username']),1)
                        ->result_array();
                        $logon = $this->loadData_UserLogin('Parent',$dataMhs[0]['Year'],$data_arr['Username'],$data_arr['TypeUser']);
                        $result = array(
                            'Status' => 1,
                            'Message' => 'Login success',
                            'url_direct' => $logon['url_direct']
                        );
                    }
                    else{
                        $result = array(
                            'Status' => 0,
                            'Message' => 'Password is wrong'
                        );
                    }
                }
            }

//            print_r($data_arr);
//            exit;
        }


        return print_r(json_encode($result));

    }

    private function get_dataStd($Year,$NPM){
        $db_ = 'ta_'.$Year;
        $data = $this->db->get_where($db_.'.students', array('NPM'=>$NPM),1);

        return $data->result_array()[0];
    }


    public function updatePassword(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "L0G1N-S50-3R0";
        $data_arr = (array) $this->jwt->decode($token,$key);

        $pass = $this->genratePassword($data_arr['Username'],$data_arr['NewPassword']);
        $data = array(
            'Password' => $pass,
            'Status' => '1'
        );

        if($data_arr['User']=='Students'){
            $this->db->where('NPM', $data_arr['Username']);
            $this->db->update('db_academic.auth_students', $data);
        }
        else if($data_arr['User']=='Employees'){
            $this->db->where('NIP', $data_arr['Username']);
            $this->db->update('db_employees.employees', $data);
        }
        else if($data_arr['User']=='Parent'){
            $this->db->where('NPM', $data_arr['Username']);
            $this->db->update('db_academic.auth_parents', $data);
        }

        $TypeUser = (isset($data_arr['TypeUser'])) ? $data_arr['TypeUser'] : '';

        $result = $this->loadData_UserLogin($data_arr['User'],$data_arr['Year'],$data_arr['Username'],$TypeUser);

        if($_SERVER['SERVER_NAME']=='portal.podomorouniversity.ac.id') {
            // update for AD
            $this->m_auth->UpdatePwdAD($data_arr);
        }

        return print_r(json_encode($result));

    }

    private function loadData_UserLogin($User,$Year,$Username,$TypeUser){
        $url_direct = [];
        if($User=='Students'){
            $dataStd = $this->db->get_where('db_academic.auth_students',
                array('NPM' => $Username),1)->result_array();

            $token_passwd = array(
                'Username' => $Username,
                'Token' => $dataStd[0]['Password'],
                'dueDate' => date("Y-m-d")
            );

            $token = $this->jwt->encode($token_passwd,'s3Cr3T-G4N');

            $arp = array(
                'url' => url_students.'?token='.$token,
                'url_login' => url_students,
                'token' => $token,
                'flag' => 'std'
            );
            array_push($url_direct,$arp);
        }
        else if ($User=='Employees') {
            $dataEmp = $this->db->get_where('db_employees.employees',
                array('NIP' => $Username),1)->result_array();

            $token_passwd = array(
                'Username' => $dataEmp[0]['NIP'],
                'TypeUser' => $TypeUser,
                'Token' => $dataEmp[0]['Password'],
                'dueDate' => date("Y-m-d")
            );

            $token = $this->jwt->encode($token_passwd,'s3Cr3T-G4N');

            if($TypeUser=='I' || $TypeUser=='i'){
                $urlp = '';
                $urlLogin = url_pcam ;
                $arp = array(
                    'url' => $urlp,
                    'url_login' => $urlLogin,
                    'token' => $token,
                    'flag' => 'emp'
                );
                array_push($url_direct,$arp);
            }
            else {
                $Main = explode('.',$dataEmp[0]['PositionMain']);
                if($dataEmp[0]['PositionMain']!=null && $dataEmp[0]['PositionMain']!='' && count($Main)>0){
                    $urlp = ($Main[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $urlLogin = ($Main[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $urlLogin,
                        'token' => $token,
                        'flag' => ($Main[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }

                $Ot1 = explode('.',$dataEmp[0]['PositionOther1']);
                if($dataEmp[0]['PositionOther1']!=null && $dataEmp[0]['PositionOther1']!='' && count($Ot1)>0){
                    $urlp = ($Ot1[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $urlLogin = ($Ot1[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $urlLogin,
                        'token' => $token,
                        'flag' => ($Ot1[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }

                $Ot2 = explode('.',$dataEmp[0]['PositionOther2']);
                if($dataEmp[0]['PositionOther2']!=null && $dataEmp[0]['PositionOther2']!='' && count($Ot2)>0){
                    $urlp = ($Ot2[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $urlLogin = ($Ot2[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $urlLogin,
                        'token' => $token,
                        'flag' => ($Ot2[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }

                $Ot3 = explode('.',$dataEmp[0]['PositionOther3']);
                if($dataEmp[0]['PositionOther3']!=null && $dataEmp[0]['PositionOther3']!='' && count($Ot3)>0){
                    $urlp = ($Ot3[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $urlLogin = ($Ot3[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $urlLogin,
                        'token' => $token,
                        'flag' => ($Ot3[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }
            }



        }
        else if($User=='Parent'){
            $dataStd = $this->db->get_where('db_academic.auth_parents',
                array('NPM' => $Username),1)->result_array();

            $token_passwd = array(
                'Username' => $Username,
                'Token' => $dataStd[0]['Password'],
                'dueDate' => date("Y-m-d")
            );

            $token = $this->jwt->encode($token_passwd,'s3Cr3T-G4N');

            $arp = array(
                'url' => url_parents.'?token='.$token,
                'url_login' => url_parents,
                'token' => $token,
                'flag' => 'std'
            );
            array_push($url_direct,$arp);
        }

        $result = array(
            'url_direct' => $url_direct
        );



        return $result;
    }

    // ======= Reset Password ========
    public function resetPassword(){

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $Username = $this->input->get('username');
        $Email = $this->input->get('email');

        if($Username!='' && $Username!=null && $Email!='' && $Email!=null){

            // Cek apakah user ada
            $dataUser = $this->m_auth->getUserToResetPassword($Username,$Email.'@podomorouniversity.ac.id');

            return print_r(json_encode($dataUser));

        }

    }

    public function resetPasswordpage(){

        $token = $this->input->get('token');
        $key = "chPass";
        $data_arr = (array) $this->jwt->decode($token,$key);

        $data['data_arr'] = $data_arr;

        $this->load->view('resetPassword',$data);

    }

    public function resetPasswordAct(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "L0G1N-3R0";
        $data_arr = (array) $this->jwt->decode($token,$key);

        $pass = $this->genratePassword($data_arr['Username'],$data_arr['NewPassword']);

        if($data_arr['Flag']=='em'){
            $this->db->set('Password', $pass);
            $this->db->where('NIP',$data_arr['Username']);
            $this->db->update('db_employees.employees');
            $data_arr['User']='Employees';
        } else if($data_arr['Flag']=='st'){
            $this->db->set('Password', $pass);
            $this->db->where('NPM',$data_arr['Username']);
            $this->db->update('db_academic.auth_students');
            $data_arr['User']='Students';
        }

        // update for AD
        // $this->UpdatePwdAD($data_arr);

        return print_r(1);

    }


    public function checkloginwithAd()
    {
        error_reporting(0);
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $arr_result = array('Status' => false,'msg'=> '','desc' => '','data' => array());
        $bool = false;
        $total = 0;
        $token = $this->input->post('token');
        $key = "L0G1N-S50-3R0";
        $Input = (array) $this->jwt->decode($token,$key);
        $user_email = '';

        $server = "ldap://10.1.30.2";
        $user = $Input['Username'].'@pu.local';
        $usernameAD = $Input['Username'];
        $psw = $Input['Password'];
        $dn = "CN=users,DC=pu,DC=local";
        $data = '';

        $filter="(|(sAMAccountName=$usernameAD))";
        $justthese = array("ou","sAMAccountName","mail");

        $ds=ldap_connect($server);
        if ($bind = ldap_bind($ds, $user , $psw)) {
          // performing search
          $sr=ldap_search($ds, $dn,  $filter, $justthese);
          $data = ldap_get_entries($ds, $sr);
          // print_r($data); 
          $total =  $data["count"];  
        } else {
          $arr_result['msg'] = 'Login invalid';
        }


        if ($total == 0) { // student 
            $dn = "OU=ldap,DC=pu,DC=local";
            $filter="(|(sAMAccountName=$usernameAD))";
            $justthese = array("ou","sAMAccountName","mail");

            $ds=ldap_connect($server);
            if ($r=ldap_bind($ds, $user , $psw)) {
                // performing search
                 $sr=ldap_search($ds, $dn,  $filter, $justthese);
                $data = ldap_get_entries($ds, $sr);
                $total =  $data["count"];
                if ($total == 1) {
                   // action to login
                    $dataStudents = $this->db->query('SELECT * FROM db_academic.auth_students
                                                                      WHERE NPM = "'.$Input['Username'].'" LIMIT 1')->result_array();
                    $dataMhs = $this->get_dataStd($dataStudents[0]['Year'],$dataStudents[0]['NPM']);

                    $DataUser = array(
                        'Name' => $dataMhs['Name'],
                        'Username' => $dataStudents[0]['NPM'],
                        'User' => 'Students',
                        'Year' => $dataStudents[0]['Year'],
                        'Status' => $dataStudents[0]['Status'],
                        'PathPhoto' => url_pas.'uploads/students/ta_'.$dataStudents[0]['Year'].'/'.$dataMhs['Photo']
                    );

                    $logon = $this->loadData_UserLogin('Students',0,$DataUser['Username'],'');
                    $arr_result = array('Status' => true,'msg'=> '','desc' => '','data' => $logon);

                }
                else
                {
                    if ($total>1) {
                        $arr_result['msg'] = 'Your username is duplicated with another user <br> !!please contact administrator';
                    }
                    else
                    {
                        $arr_result['msg'] = 'Student username doesn\'t exist';
                    }
                    
                }

            }
            else
            {
                $arr_result['msg'] = 'Login invalid';
            }
          
        }
        else
        {
            // action to login excep student
            if ($total == 1) {
               // action to login
                // Cek Apakah karyawan atau bukan
                $dataEmploy = $this->db->get_where('db_employees.employees',
                    array('EmailPU' => $Input['Username'].'@podomorouniversity.ac.id'),1)->result_array();
                if(count($dataEmploy)>0){
                    $DataUser = array(
                        'Name' => $dataEmploy[0]['TitleAhead'].' '.$dataEmploy[0]['Name'].' '.$dataEmploy[0]['TitleBehind'],
                        'Username' => $dataEmploy[0]['NIP'],
                        'User' => 'Employees',
                        'Year' => 0,
                        'Status' => $dataEmploy[0]['Status'],
                        'PathPhoto' => url_pas.'uploads/employees/'.$dataEmploy[0]['Photo']
                    );

                    $logon = $this->loadData_UserLogin('Employees',0,$DataUser['Username'],'');
                    $arr_result = array('Status' => true,'msg'=> '','desc' => '','data' => $logon);
                }
                else
                {
                    $arr_result['msg'] = 'Your username doesn\'t exist';
                }
                
            }
            else
            {
                if ($total>1) {
                    $arr_result['msg'] = 'Your username is duplicated with another user <br> !!please contact administrator';
                }
                else
                {
                    $arr_result['msg'] = 'Your username doesn\'t exist';
                }
            }
        }
        
        echo json_encode($arr_result);

    }

    public function maintenance(){
        $this->load->view('maintenance','');
    }

}
