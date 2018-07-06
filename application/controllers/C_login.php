
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 07/06/2018
 * Time: 1:41 PM
 */

class C_login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');


    }



    public function index()
    {
        $data['loginURL'] = $this->google->loginURL();
        $this->load->view('login',$data);
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

                if(count($dataUser)>0) {
                    $this->setSession($dataUser[0]['ID'],$dataUser[0]['NIP']);
                    redirect(base_url('dashboard'));
                } else {
                    redirect(base_url());
                }

            } catch (Exception $err){
                redirect(base_url());
            }


        }
    }

//    public function authUserPassword(){
//        $token = $this->input->post('token');
//        $key = "L06M31N";
//        $data_arr = (array) $this->jwt->decode($token,$key);
//
//        if(count($data_arr)>0){
//
//            $NIP = $data_arr['nip'];
//            $Password = $this->genratePassword($NIP,$data_arr['password']);
//
//            $dataUser = $this->m_auth->__getauthUserPassword($NIP,$Password);
//
//            if(count($dataUser)>0){
//                $this->setSession($dataUser[0]['ID'],$dataUser[0]['NIP']);
//                return print_r(1);
//            } else {
//                return print_r(0);
//            }
//        } else {
//            return print_r(0);
//        }
//    }

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

        $dataStudents = $this->db->query('SELECT * FROM db_academic.auth_students
                                                  WHERE NPM = "'.$data_arr['Username'].'" LIMIT 1')->result_array();

        if(count($dataStudents)>0){

            $dataMhs = $this->get_dataStd($dataStudents[0]['Year'],$dataStudents[0]['NPM']);

            $DataUser = array(
                'Name' => $dataMhs['Name'],
                'Username' => $dataMhs['NPM'],
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

        }
        else {

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
            } else {
                $result = array(
                    'Status' => '0',
                    'Message' => 'User Not Exist'
                );
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

                    $logon = $this->loadData_UserLogin('Students',$dataMhs[0]['Year'],$data_arr['Username']);
                    $result = array(
                        'Status' => 1,
                        'Message' => 'Login success',
                        'url_direct' => $logon['url_direct']
                    );
//                    $result = array(
//                        'Status' => 1,
//                        'Message' => 'Login Success',
//                        'url_direct' => url_students
//                    );
                } else {
                    $result = array(
                        'Status' => 0,
                        'Message' => 'Password is wrong'
                    );
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
                    $logon = $this->loadData_UserLogin('Employees',0,$data_arr['Username']);
                    $result = array(
                        'Status' => 1,
                        'Message' => 'Login success',
                        'url_direct' => $logon['url_direct']
                    );
                } else {
                    $result = array(
                        'Status' => 0,
                        'Message' => 'Password is wrong'
                    );
                }
            }
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

        $result = $this->loadData_UserLogin($data_arr['User'],$data_arr['Year'],$data_arr['Username']);
        return print_r(json_encode($result));

    }

    private function loadData_UserLogin($User,$Year,$Username){
        $url_direct = [];
        if($User=='Students'){
            $this->setUserSession_Students($Year,$Username);

            $arp = array(
                'url' => url_students,
                'flag' => 'std'
            );
            array_push($url_direct,$arp);

        } else if ($User=='Employees') {
            $dataEmp = $this->db->get_where('db_employees.employees',
                array('NIP' => $Username),1)->result_array();



            $Main = explode('.',$dataEmp[0]['PositionMain']);
            if($dataEmp[0]['PositionMain']!=null && $dataEmp[0]['PositionMain']!='' && count($Main)>0){
                $urlp = ($Main[0]==14) ? url_lecturers : url_pcam ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Main[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

            $Ot1 = explode('.',$dataEmp[0]['PositionOther1']);
            if($dataEmp[0]['PositionOther1']!=null && $dataEmp[0]['PositionOther1']!='' && count($Ot1)>0){
                $urlp = ($Ot1[0]==14) ? url_lecturers : url_pcam ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Ot1[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

            $Ot2 = explode('.',$dataEmp[0]['PositionOther2']);
            if($dataEmp[0]['PositionOther2']!=null && $dataEmp[0]['PositionOther2']!='' && count($Ot2)>0){
                $urlp = ($Ot2[0]==14) ? url_lecturers : url_pcam ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Ot2[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

            $Ot3 = explode('.',$dataEmp[0]['PositionOther3']);
            if($dataEmp[0]['PositionOther3']!=null && $dataEmp[0]['PositionOther3']!='' && count($Ot3)>0){
                $urlp = ($Ot3[0]==14) ? url_lecturers : url_pcam ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Ot3[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }


            if(count($url_direct)>0){
                for($s=0;$s<count($url_direct);$s++){
                    if($url_direct[$s]['flag']=='emp'){
                        $this->setSession($dataEmp[0]['ID'],$dataEmp[0]['NIP']);
                    }
                    else if($url_direct[$s]['flag']=='lec'){
                        $this->setUserSession_Lecturer($dataEmp[0]['NIP']);
                    }
                }
            }


        }

        $result = array(
            'url_direct' => $url_direct
        );



        return $result;
    }


    // ========= Session Students =========
    private function setUserSession_Students($Year,$NPM){

        $table = 'ta_'.$Year.'.students';
        $dataUser = $this->m_auth->getDataUser2LoginStudent($Year,$table,$NPM);

        $newdata = array(
            'student_NPM'  => $dataUser[0]['NPM'],
            'student_Name'  => $dataUser[0]['Name'],
            'student_Gender'  => $dataUser[0]['Gender'],
            'student_EmailPU'  => $dataUser[0]['EmailPU'],
            'student_Faculty'  => $dataUser[0]['Faculty'],
            'student_ProdiID'  => $dataUser[0]['ProdiID'],
            'student_ProdiCode'  => $dataUser[0]['ProdiCode'],
            'student_CurriculumID'  => $dataUser[0]['CurriculumID'],
            'student_ProgramCampusID'  => $dataUser[0]['ProgramID'],
            'student_SemesterID'  => $dataUser[0]['SemesterID'],
            'student_Semester'  => $dataUser[0]['SemesterNow'],
            'student_Year'  => $dataUser[0]['Year'],
            'student_SemesterCode'  => $dataUser[0]['SemesterCode'],
            'student_Photo'  => $dataUser[0]['Photo'],
            'student_StatusStudentID'  => $dataUser[0]['StatusStudentID'],
            'student_ClassOf'  => $Year,
            'student_AcademicMentor'  => $dataUser[0]['AcademicMentor'],
            'student_MentorName'  => $dataUser[0]['MentorName'],
            'student_MentorEmailPU'  => $dataUser[0]['MentorEmailPU'],
            'student_Token'  => $dataUser[0]['Token'],
            'student_DB'  => 'ta_'.$Year,
            'student_loggedIn' => TRUE
        );

        $this->session->set_userdata($newdata);
    }

    // ========= Session Lecturer =========
    private function setUserSession_Lecturer($NIP){

        $dataUser = $this->m_auth->getDataUser2LoginLecturer($NIP);

        $newdata = array(
            'lecturer_ID'  => $dataUser[0]['ID'],
            'lecturer_NIP'  => $dataUser[0]['NIP'],
            'lecturer_NIDN'  => $dataUser[0]['NIDN'],
            'lecturer_Name'  => $dataUser[0]['Name'],
            'lecturer_TitleAhead'  => $dataUser[0]['TitleAhead'],
            'lecturer_TitleBehind'  => $dataUser[0]['TitleBehind'],
            'lecturer_FacultyID'  => $dataUser[0]['FacultyID'],
            'lecturer_ProdiID'  => $dataUser[0]['ProdiID'],

            'lecturer_MainPositionID'  => $dataUser[0]['MainPositionID'],
            'lecturer_MainPosition'  => $dataUser[0]['MainPosition'],

            'lecturer_PositionOther1ID'  => $dataUser[0]['PositionOther1ID'],
            'lecturer_PositionOther1'  => $dataUser[0]['PositionOther1'],

            'lecturer_PositionOther2ID'  => $dataUser[0]['PositionOther2ID'],
            'lecturer_PositionOther2'  => $dataUser[0]['PositionOther2'],

            'lecturer_PositionOther3ID'  => $dataUser[0]['PositionOther3ID'],
            'lecturer_PositionOther3'  => $dataUser[0]['PositionOther3'],

            'lecturer_Email'  => $dataUser[0]['Email'],
            'lecturer_EmailPU'  => $dataUser[0]['EmailPU'],
            'lecturer_Token'  => $dataUser[0]['Password'],
            'lecturer_Photo'  => $dataUser[0]['Photo'],
            'lecturer_StatusEmployeeID'  => $dataUser[0]['StatusEmployeeID'],
            'lecturer_SemesterID'  => $dataUser[0]['SemesterID'],
//            'lecturer_DB'  => 'ta_'.$dataAuth['Year'],
            'lecturer_loggedIn' => TRUE
        );

        $this->session->set_userdata($newdata);
    }

    // ========= Session Employees ========
    private function setSession($ID,$NIP){

        $dataSession = $this->m_auth->__getUserAuth($ID,$NIP);
        $timePerCredits = $this->m_auth->__getTimePerCredits();

        $ruleUser = $this->m_auth->__getRuleUser($NIP);

        // Super Divisi -- Lihat ID Di table db_employees.division
        // 1 (Yayasan), 2 (Rectore) , 12 (IT)
        $superDivision = [1,2,12];

        $setSession = array(
            'ID'  => $dataSession[0]['ID'],
            'NIP'  => $dataSession[0]['NIP'],
            'Name'  => $dataSession[0]['Name'],
            'FullNameTitle'  => $dataSession[0]['TitleAhead'].' '.$dataSession[0]['Name'].' '.$dataSession[0]['TitleBehind'],
            'Email'  => $dataSession[0]['Email'],
            'EmailPU'  => $dataSession[0]['EmailPU'],
            'Address'  => $dataSession[0]['Address'],
            'Photo'  => $dataSession[0]['Photo'],
            'PositionMain'  => array(
                'IDDivision' => $dataSession[0]['IDDivision'],
                'Division' => $dataSession[0]['Division'],
                'IDPosition' => $dataSession[0]['IDPosition'],
                'Position' => $dataSession[0]['Position']
            ),
            'PositionOther1' => array(
                'IDDivisionOther1' => $dataSession[0]['IDDivisionOther1'],
                'DivisionOther1' => $dataSession[0]['DivisionOther1'],
                'IDPositionOther1' => $dataSession[0]['IDPositionOther1'],
                'PositionOther1' => $dataSession[0]['PositionOther1']
            ),
            'PositionOther2' => array(
                'IDDivisionOther2' => $dataSession[0]['IDDivisionOther2'],
                'DivisionOther2' => $dataSession[0]['DivisionOther2'],
                'IDPositionOther2' => $dataSession[0]['IDPositionOther2'],
                'PositionOther2' => $dataSession[0]['PositionOther2']
            ),
            'PositionOther3' => array(
                'IDDivisionOther3' => $dataSession[0]['IDDivisionOther3'],
                'DivisionOther3' => $dataSession[0]['DivisionOther3'],
                'IDPositionOther3' => $dataSession[0]['IDPositionOther3'],
                'PositionOther3' => $dataSession[0]['PositionOther3']
            ),
            'timePerCredits' => $timePerCredits['time'],
            'ruleUser' => $ruleUser,
            'menuDepartement' => (count($ruleUser)>1) ? false : true ,
            'departementNavigation' => $dataSession[0]['MenuNavigation'],
            'IDdepartementNavigation' => $dataSession[0]['IDDivision'],
            'loggedIn' => true
        );

        $this->session->set_userdata($setSession);
    }

}
