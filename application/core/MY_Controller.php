<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function template($content)
    {
        $NPM = $this->uri->segment(2);
        $style = $this->db->query('SELECT sp.ColorPrimary as ColorPrimary, sp.ColorSecond as ColorSecond, sp.ColorBG as ColorBG, sp.ColorBGHeaderPage as ColorHeader
                                                    FROM db_academic.auth_students ats                                                     
                                                    LEFT JOIN db_prodi.style_prodi sp ON (sp.ProdiID = ats.ProdiID)
                                                    WHERE ats.NPM = "' . $NPM . '"')->result_array();
        $data['style'] = (count($style) > 0) ? $style[0] : $style;
        $data['content'] = $content;
        $this->load->view('page/template/blank', $data);
    }

    public function template_b4($content)
    {
        $data['content'] = $content;
        $this->load->view('page/template/blank_b4', $data);
    }

    public function dateTimeNow()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dataTime = date('Y-m-d H:i:s');
        return $dataTime;
    }

    public function config_pagination_default_ajax($total_rows = 999, $per_page = 10, $uri_segment = 6)
    {
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] =  $total_rows;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $uri_segment;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;

        return $config;
    }

    public function is_url_exist($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }

    public function getInputToken()
    {
        $token = $this->input->post('token');
        $key = "UAP)(*";
        $data_arr = (array) $this->jwt->decode($token, $key);
        return $data_arr;
    }
}
