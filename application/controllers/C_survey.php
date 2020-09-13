
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 31/08/2020
 * Time: 2:50 PM
 */

class C_survey extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');
        $this->load->model('M_search_people','m_sp');

        date_default_timezone_set("Asia/Jakarta");

    }


    public function survey()
    {
        if(!$this->session->userdata('portal_SurveyLogin')){
            redirect(base_url('portal-login'));
        }
        $content = $this->load->view('page/survey/survey','',true);
        parent::template($content);
    }

    public function checksurvey($Key){
        // Cek apakah status survey publish
        $dateNow = date('Y-m-d');
        $dataSurvey = $this->db->query('SELECT * FROM db_it.surv_survey ss 
                                        WHERE 
                                        ss.Key = "'.$Key.'"
                                        AND ss.Status = "1" 
                                        AND ss.StartDate <= "'.$dateNow.'"
                                        AND ss.EndDate >= "'.$dateNow.'"')
            ->result_array();

        $data['ValidSurvey'] = 0;
        $data['Key'] = $Key;

        if(count($dataSurvey)>0){
            $data['ValidSurvey'] = 1;
            $data['FormType'] = 'external';
            $data['ID'] = $dataSurvey[0]['ID'];
            $data['Title'] = $dataSurvey[0]['Title'];
        }
        $this->session->sess_destroy();
        $content = $this->load->view('page/survey/checksurvey',$data,true);
        parent::template($content);


    }

    public function submitChecksurvey(){

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);


        if($data_arr['action']=='submitForm'){

            $Username = '';
            $UserType = ''.

            $Status = 0;

            if($data_arr['Participant']=='other'){
                // Input form
                $dataInput = array(
                    'FullName' => $data_arr['FullName'],
                    'Email' => $data_arr['Email'],
                    'Phone' => $data_arr['Phone']
                );

                $this->db->insert('db_it.surv_external_user',$dataInput);

                $UserType = 'other';
                $Username = $this->db->insert_id();
                $Status = 1;

            } else {
                $dataCk = $this->checkUser($data_arr['Username'],$data_arr['Password']);

                if($dataCk['Status']==1 || $dataCk['Status']=='1'){
                    $Status = 1;
                    $UserType = $dataCk['UserType'];
                    $Username = $data_arr['Username'];
                }

            }

            if($Status==1 || $Status=='1'){
                $dataSetSession = array(
                    'portal_Username' => $Username,
                    'portal_SurveyID' => $data_arr['SurveyID'],
                    'portal_FormType' => 'external',
                    'portal_UserType' => $UserType,
                    'portal_Key' => $data_arr['Key'],
                    'portal_SurveyLogin' => true
                );

                $this->session->set_userdata($dataSetSession);
            } else {
                $this->session->sess_destroy();
            }

            return print_r(json_encode(array('Status'=>$Status)));

        }

    }

    function checkUser($Username,$Password){
        $Pass = $this->genratePassword($Username,$Password);
        $checkEmp = $this->db->select('Name')->get_where('db_employees.employees',
            array(
                'NIP' => $Username,
                'Password' => $Pass
            ))->result_array();


        $result = array(
            'Status' => 0
        );

        if(count($checkEmp)<=0){
            $checkStd = $this->db->select('Name')->get_where('db_academic.auth_students',
                array(
                    'NPM' => $Username,
                    'Password' => $Pass
                ))->result_array();

            if(count($checkStd)>0){
                $result = array(
                    'Name' => $checkStd[0]['Name'],
                    'Status' => 1,
                    'UserType' => 'std'
                );
            }
        } else {
            $result = array(
                'Name' => $checkEmp[0]['Name'],
                'Status' => 1,
                'UserType' => 'emp'
            );
        }

        return $result;

    }

    private function genratePassword($Username,$Password){

        $plan_password = $Username.''.$Password;
        $pas = md5($plan_password);
        $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');

        return $pass;
    }

    public function surveyStart(){

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);

        // Cek apakah username sudah pernah ada atau blm
        $dataCkUserName = $this->db->get_where('db_it.surv_direct',
            array('Username' => $data_arr['Username']))->result_array();

        if(count($dataCkUserName)>0){
            $dataIns = array(
                'DetailsData' => $token,
                'LogonBy' => $data_arr['LogonBy'],
                'ExpiredAt' => $data_arr['ExpiredAt'],
                'EntredAt' => $date = date('Y-m-d H:i:s')
            );
            $this->db->where('Username',$data_arr['Username']);
            $this->db->update('db_it.surv_direct',$dataIns);
        } else {
            $dataIns = array(
                'Username' => $data_arr['Username'],
                'DetailsData' => $token,
                'LogonBy' => $data_arr['LogonBy'],
                'ExpiredAt' => $data_arr['ExpiredAt']
            );

            $this->db->insert('db_it.surv_direct',$dataIns);
        }

        $dataSetSession = array(
            'portal_Username' => $data_arr['Username'],
            'portal_SurveyID' => $data_arr['SurveyID'],
            'portal_UserType' => $data_arr['UserType'],
            'portal_FormType' => 'internal',
            'portal_SurveyLogin' => true
        );

        $this->session->set_userdata($dataSetSession);

        return print_r(json_encode(array('Status'=>1)));

    }



}
