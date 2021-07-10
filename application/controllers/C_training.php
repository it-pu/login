
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 17/02/2019
 * Time: 16:23 PM
 */

class C_training extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');
        $this->load->model('M_search_people','m_sp');

        date_default_timezone_set("Asia/Jakarta");

    }



    public function training_login()
    {
        $content = $this->load->view('page/training/training_login','',true);
        parent::template($content);
    }

    private function extractTokenPost(){
        $token = $this->input->post('token');
        $key = 'L0G1N-S50-3R0';
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;

    }

}
