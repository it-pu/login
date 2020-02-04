
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 04/02/2019
 * Time: 2:50 PM
 */

class C_search_people extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');

        date_default_timezone_set("Asia/Jakarta");

    }



    public function search_people()
    {

        $data['CalendarAcademic'] = $this->db->get_where('db_academic.calendar_academic',
            array('StatusPublish' => '2'))->result_array();

        $data['loginURL'] = $this->google->loginURL();
        $this->load->view('search_people/search_people',$data);
//        $this->load->view('login3',$data);
    }

    public function getPeople(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $key = $this->input->get('key');

        $dataEmp = $this->db->query('SELECT em.NIP, em.Name, em.Photo, em.PositionMain FROM db_employees.employees em
                                                WHERE em.Name LIKE "%'.$key.'%" 
                                                OR em.NIP LIKE "%'.$key.'%" 
                                                ORDER BY em.Name ASC LIMIT 24')->result_array();

        if(count($dataEmp)>0){
            for ($e=0;$e<count($dataEmp);$e++){
                $DivID = ($dataEmp[$e]['PositionMain']!='' && $dataEmp[$e]['PositionMain']!=null)
                    ? explode('.',$dataEmp[$e]['PositionMain'])[0] : '';

                if($DivID!=''){
                    $Dvision = $this->db->get_where('db_employees.division',array('ID' => $DivID))->result_array();
                    $dataEmp[$e]['Dvision'] = (count($Dvision)>0) ? $Dvision[0]['Division'] : '' ;
                }


            }
        }


        $result = array(
            'Employees' => $dataEmp
        );

        return print_r(json_encode($result));

    }

}
