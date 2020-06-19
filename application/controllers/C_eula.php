
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

//        if(!$this->session->userdata('portal_Login')){
//            redirect(base_url('portal-login'));
//        }

    }


    public function eula()
    {
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

        $dataIns = array(
            'Username' => $dataEULA['Username'],
            'DetailsData' => $token,
            'ExpiredAt' => $dataEULA['ExpiredAt']
        );

        $this->db->insert('db_it.eula_direct',$dataIns);

        $dataSetSession = array(
            'portal_Username' => $dataEULA['Username'],
            'portal_EDID' => $dataEULA['EDID'],
            'portal_UserType' => $dataEULA['UserType'],
            'portal_Login' => true
        );

        $this->session->set_userdata($dataSetSession);

        return print_r(json_encode(array('Status'=>1)));


    }

}
