<?php defined("BASEPATH") OR exit("No direct script access allowed");
class C_cv extends  MY_Controller {
    function __construct()
        {
            parent::__construct();
            $this->load->library('JWT');
            $this->load->library('google');
            // $this->load->library('pdfgenerator');
            $this->load->model('m_auth');
            $this->load->model('m_cv');
            date_default_timezone_set("Asia/Jakarta");

        }
    
    
        private function extractTokenPost(){
        $token = $this->input->post('token');
        $key = 'L0G1N-S50-3R0';
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;

    }
             

    // =========== Detail cv ========
    public function index(){        
        $content = $this->load->view('page/cv/V_cv','', true);        
        parent::template($content);
    }
    public function data($NPM){ 
        // $data = $student;
        $data = $this->m_cv->data($NPM);
        echo json_encode($data);
    }
    
    

}

?>