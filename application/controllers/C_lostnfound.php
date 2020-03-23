
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 20/02/2019
 * Time: 09:02 AM
 */

class C_lostnfound extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model(array('m_general_affair'));

        date_default_timezone_set("Asia/Jakarta");

    }


    public function lost_and_found()
    {
        $content = $this->load->view('page/lost_and_found/list_barang','',true);
        parent::template($content);
    }


    public function fetchLostAndFound(){
        $json_data=null;
        $reqdata = $this->input->post();
        if($reqdata){
            $key = "UAP)(*";
            $data_arr = (array) $this->jwt->decode($reqdata['token'],$key);
            $param = array();

            if(!empty($reqdata['search']['value']) ) {
                $search = $reqdata['search']['value'];

                $param[] = array("field"=>"(Code","data"=>" like '%".$search."%' ","filter"=>"AND",);
                $param[] = array("field"=>"Name","data"=>" like '%".$search."%' ","filter"=>"OR",);
                $param[] = array("field"=>"Name","data"=>" like '%".$search."%' ","filter"=>"OR",);
                $param[] = array("field"=>"Location","data"=>" like '%".$search."%' ","filter"=>"OR",);
                $param[] = array("field"=>"Receivedby","data"=>" like '%".$search."%' )","filter"=>"OR",);
            }

            $param[] = array("field"=>"(DATE_ADD(DateDiscover, INTERVAL 1 MONTH))","data"=>" > now() ","filter"=>"AND",);

            $totalData = $this->m_general_affair->fetchLostNFound(true,$param)->row();
            $TotalData = (!empty($totalData) ? $totalData->Total : 0);
            if(!empty($reqdata['start']) && !empty($reqdata['length'])){
                $result = $this->m_general_affair->fetchLostNFound(false,$param,$reqdata['start'],$reqdata['length'],$orderBy)->result();
            }else{
                $result = $this->m_general_affair->fetchLostNFound(false,$param)->result();
            }

            $json_data = array(
                "draw"            => intval( (!empty($reqdata['draw']) ? $reqdata['draw'] : null) ),
                "recordsTotal"    => intval($TotalData),
                "recordsFiltered" => intval($TotalData),
                "data"            => (!empty($result) ? $result : 0)
            );

        }
        $response = $json_data;
        echo json_encode($response);
    }


    public function lostAndFoundInfo(){
        $data=$this->input->post();
        $json = array();
        if($data){
            $key = "UAP)(*";
            $data_arr = (array) $this->jwt->decode($data['token'],$key);
            $isExist = $this->m_general_affair->fetchData("db_general_affair.lost_n_found_information",$data_arr)->row();
            $json = $isExist;
        }
        echo json_encode($json);
    }

}
