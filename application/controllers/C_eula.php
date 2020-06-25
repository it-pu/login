
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 04/02/2019
 * Time: 2:50 PM
 */

class C_eula extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');
        $this->load->model('M_search_people','m_sp');

        date_default_timezone_set("Asia/Jakarta");



    }


    public function eula()
    {
        if(!$this->session->userdata('portal_Login')){
            redirect(base_url('portal-login'));
        }
        $content = $this->load->view('page/eula/eula','',true);
        parent::template($content);
    }


    public function eulaStart(){

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "L0G1N-S50-3R0";
        $data_arr = (array) $this->jwt->decode($token,$key);

//        print_r($data_arr);
//        exit();

        $dataEULA = (array) $data_arr['dataEULA'];

        // Cek apakah username sudah pernah ada atau blm
        $dataCkUserName = $this->db->get_where('db_it.eula_direct',array('Username' => $dataEULA['Username']))->result_array();

        if(count($dataCkUserName)>0){
            $dataIns = array(
                'DetailsData' => $token,
                'LogonBy' => $dataEULA['LogonBy'],
                'ExpiredAt' => $dataEULA['ExpiredAt'],
                'EntredAt' => $date = date('Y-m-d H:i:s')
            );
            $this->db->where('Username',$dataEULA['Username']);
            $this->db->update('db_it.eula_direct',$dataIns);
        } else {
            $dataIns = array(
                'Username' => $dataEULA['Username'],
                'DetailsData' => $token,
                'LogonBy' => $dataEULA['LogonBy'],
                'ExpiredAt' => $dataEULA['ExpiredAt']
            );

            $this->db->insert('db_it.eula_direct',$dataIns);
        }



        $dataSetSession = array(
            'portal_Username' => $dataEULA['Username'],
            'portal_EDID' => $dataEULA['EDID'],
            'portal_UserType' => $dataEULA['UserType'],
            'portal_Login' => true
        );

        $this->session->set_userdata($dataSetSession);

        return print_r(json_encode(array('Status'=>1)));


    }

    public function destroySessionEULA(){
        $this->session->sess_destroy();
        return print_r(1);
    }

}
