<?php defined("BASEPATH") OR exit("No direct script access allowed");

    class C_skpi extends  MY_Controller {

        function index(){

            $data["pageTitle"] = "Dashboard";
            $content = $this->load->view('page/V_skpi',$data,true);
            parent::template($content);
        }
        

    }

?>