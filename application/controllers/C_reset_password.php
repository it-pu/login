
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
        $maxURL = 300; // 5 minutes
        $DecodeToken = $this->jwt->decode($token,'UAP)(*');
        $dateTimeRequest =  new DateTime( $DecodeToken->DueDate );
        $dateNow = new DateTime( date('Y-m-d H:i:s') );
        $diff = $dateNow->getTimestamp() - $dateTimeRequest->getTimestamp(); // max 300 sec or 5 minutes
        $data['expired'] = 0;
        if (!($diff <= $maxURL) ) {
            $data['expired'] = 1;
        }

        $this->load->view('page/resetPassword',$data);
        
    }

    public function loadpageReset_intake($token)
    {
        $data['token'] = $token;
        $this->load->view('page/resetPassword_intake',$data);
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

        if ($data_arr['Type']=='std') {
            $data_arr['User']='Students';
        }
        else
        {
            $data_arr['User']='Employees';
        }
        $data_arr['NewPassword'] = $data_arr['Password'];
        if($_SERVER['SERVER_NAME']=='portal.podomorouniversity.ac.id') {
            // update for AD
            $this->m_auth->UpdatePwdAD($data_arr);
        }

        return print_r(1);

    }

    public function updatepassword_intake(){

        $token = $this->input->post('token');

        $data_arr = (array) $this->jwt->decode($token,'L0G1N-S50-3R0');
        $data_arr_ = $data_arr['data_arr'];
        $data_arr_ = json_decode(json_encode($data_arr_),true);
        
        // cek aktivasi token
            $DateToken = $data_arr_['date'];
            $__checkTglNow = function($tglInput){
                $sql = 'select * from (
                        select CURDATE() as skrg
                        ) aa where "'.$tglInput.'" = skrg ';
                $query=$this->db->query($sql, array())->result_array();
                if (count($query) > 0) {
                    return true;
                }     
                else
                {
                    return false;
                }
            };

            if ($__checkTglNow($DateToken)) {
               // process reset pwd
                $Email = $data_arr_['Email'];
                $Password = $data_arr['Password'];
                $dataUpdate = array(
                    'Password' => $this->genratePassword($Email,$Password),
                );
                $this->db->where('Email', $Email);
                $this->db->update('db_admission.register',$dataUpdate);
                return print_r(1);
            }
            else
            {
                return print_r(0);
            }

        return print_r(0);

    }

    private function genratePassword($Username,$Password){

        $plan_password = $Username.''.$Password;
        $pas = md5($plan_password);
        $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');

        return $pass;
    }

}
