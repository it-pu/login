
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
//        if(!$this->session->userdata('portal_Login')){
//            redirect(base_url('portal-login'));
//        }
        $content = $this->load->view('page/survey/survey','',true);
        parent::template($content);
    }



}
