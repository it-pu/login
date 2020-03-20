
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
        $this->load->model('m_auth');
        $this->load->model('M_search_people','m_sp');

        date_default_timezone_set("Asia/Jakarta");

    }


    public function lost_and_found()
    {
        $content = $this->load->view('page/lost_and_found/list_barang','',true);
        parent::template($content);
    }


}
