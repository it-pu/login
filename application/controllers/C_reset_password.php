
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 07/06/2018
 * Time: 1:41 PM
 */

class C_reset_password extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');

        date_default_timezone_set("Asia/Jakarta");

    }

    public function loadpageReset($token){

        $data['token'] = $token;
        $this->load->view('page/resetPassword',$data);
    }

    public function updatepassword(){

        $token = $this->input->post('token');

        $data_arr = (array) $this->jwt->decode($token,'L0G1N-S50-3R0');

        $dataUpdate = array(
            'Password' => $this->genratePassword($data_arr['Username'],$data_arr['Password']),
            'Status' => '1'
        );
        $w = ($data_arr['Type']=='std') ? 'NPM' : 'NIP';
        $this->db->where($w, $data_arr['Username']);
        $this->db->update($data_arr['DB'],$dataUpdate);

        return print_r(1);

    }

    private function genratePassword($Username,$Password){

        $plan_password = $Username.''.$Password;
        $pas = md5($plan_password);
        $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');

        return $pass;
    }

}
