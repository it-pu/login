
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

        date_default_timezone_set("Asia/Jakarta");

    }



    public function index()
    {
        $data['loginURL'] = $this->google->loginURL();
        $this->load->view('login',$data);
    }

    public function landingPage()
    {
        $this->load->view('landingPage','');
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

                    if(count($dataUser['url_direct'])==1){
//                        header("Location : ".$dataUser['url_direct'][0]);
                        $data['Url_photo'] = $dataUser['url_direct'][0]['Url_photo'];
                        $data['Name'] = $dataUser['url_direct'][0]['Name'];
                        $data['Username'] = $dataUser['url_direct'][0]['Username'];
                        $data['url'] = $dataUser['url_direct'][0]['url'];
                        $this->load->view('landingPage',$data);
                    } else {
                        print_r($dataUser);
                    }


                } else {

                    print_r($dataUser);
//                    redirect(base_url());
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
//            $this->setUserSession_Students($Year,$Username);
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
                'flag' => 'std'
            );
            array_push($url_direct,$arp);

        }
        else if ($User=='Employees') {
            $dataEmp = $this->db->get_where('db_employees.employees',
                array('NIP' => $Username),1)->result_array();

            $token_passwd = array(
                'Username' => $dataEmp[0]['NIP'],
                'Token' => $dataEmp[0]['Password'],
                'dueDate' => date("Y-m-d")
            );

            $token = $this->jwt->encode($token_passwd,'s3Cr3T-G4N');

            $Main = explode('.',$dataEmp[0]['PositionMain']);
            if($dataEmp[0]['PositionMain']!=null && $dataEmp[0]['PositionMain']!='' && count($Main)>0){
                $urlp = ($Main[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Main[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

            $Ot1 = explode('.',$dataEmp[0]['PositionOther1']);
            if($dataEmp[0]['PositionOther1']!=null && $dataEmp[0]['PositionOther1']!='' && count($Ot1)>0){
                $urlp = ($Ot1[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Ot1[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

            $Ot2 = explode('.',$dataEmp[0]['PositionOther2']);
            if($dataEmp[0]['PositionOther2']!=null && $dataEmp[0]['PositionOther2']!='' && count($Ot2)>0){
                $urlp = ($Ot2[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Ot2[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

            $Ot3 = explode('.',$dataEmp[0]['PositionOther3']);
            if($dataEmp[0]['PositionOther3']!=null && $dataEmp[0]['PositionOther3']!='' && count($Ot3)>0){
                $urlp = ($Ot3[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                $arp = array(
                    'url' => $urlp,
                    'flag' => ($Ot3[0]==14) ? 'lec' : 'emp'
                );
                array_push($url_direct,$arp);
            }

        }

        $result = array(
            'url_direct' => $url_direct
        );



        return $result;
    }

}
