<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class c_team extends  MY_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function data(){
        
        // $NPM = $this->uri->segment(2);

        $dataEmp = $this->db->query('SELECT em.NIP, em.Name, em.Photo, em.PositionMain FROM db_employees.employees em
                                    WHERE (em.StatusEmployeeID != "-1" AND em.StatusEmployeeID != "-2") AND ( em.PositionMain=2.3 OR em.PositionMain=12.13 OR em.PositionMain=12.11 OR em.PositionMain=12.12)
                                    ORDER BY em.PositionMain DESC')->result_array();
        if(count($dataEmp)>0){
            for ($e=0;$e<count($dataEmp);$e++){
                $DivID = ($dataEmp[$e]['PositionMain']!='' && $dataEmp[$e]['PositionMain']!=null)
                    ? explode('.',$dataEmp[$e]['PositionMain'])[0] : '';

                if($DivID!=''){
                    $Dvision = $this->db->get_where('db_employees.division',array('ID' => $DivID))->result_array();
                    $dataEmp[$e]['Dvision'] = (count($Dvision)>0) ? $Dvision[0]['Division'] : '' ;
                }

                $imgPhoto = ($dataEmp[$e]['Photo']!='' && $dataEmp[$e]['Photo']!=null)
                    ? 'https://pcam.podomorouniversity.ac.id/uploads/employees/'.$dataEmp[$e]['Photo']
                    : 'https://pcam.podomorouniversity.ac.id/images/icon/no_image.png';

                $dataEmp[$e]['Photo'] = $imgPhoto;
                $dataEmp[$e]['Name'] = ucwords(strtolower($dataEmp[$e]['Name']));


            }
        }           
        
        return print_r(json_encode($dataEmp));
        
    }
}