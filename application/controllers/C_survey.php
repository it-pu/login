
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
            'portal_SurveyLogin' => true
        );

        $this->session->set_userdata($dataSetSession);

        return print_r(json_encode(array('Status'=>1)));

    }



}
