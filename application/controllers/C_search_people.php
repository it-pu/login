
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 04/02/2019
 * Time: 2:50 PM
 */

class C_search_people extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');
        $this->load->model('M_search_people','m_sp');

        date_default_timezone_set("Asia/Jakarta");

    }

//    private function temp($content){
//
//        $data['content'] = $content;
//        $this->load->view('template/template_search_people',$data);
//
//    }



    public function search_people()
    {
        $content = $this->load->view('page/search_people/search_people','',true);
        parent::template($content);
    }

    private function extractTokenPost(){
        $token = $this->input->post('token');
        $key = 'L0G1N-S50-3R0';
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;

    }

    public function getPeople(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->get('token');

        $dataToken = (array) $this->jwt->decode($token,'L0G1N-S50-3R0');


        $key = $dataToken['key'];
        $IP_Public = $dataToken['IPPublic'];

        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $IP_Local = ($hostname!='') ? $hostname : $this->input->ip_address();

        $dataInsrt = array(
            'Key' => $key,
            'IP_Public' => $IP_Public,
            'IP_Local' => $IP_Local
        );

        $this->db->insert('db_it.search_people_key',$dataInsrt);

        $dataEmp = $this->db->query('SELECT em.NIP, em.Name, em.Photo, em.PositionMain FROM db_employees.employees em
                                                WHERE (em.StatusEmployeeID != "-1" AND em.StatusEmployeeID != "-2") AND (em.Name LIKE "%'.$key.'%" 
                                                OR em.NIP LIKE "%'.$key.'%" ) 
                                                ORDER BY em.Name ASC LIMIT 24')->result_array();

        $dataStd = $this->db->query('SELECT ats.NPM, ats.Name, ps.NameEng AS Prodi, ats.Year FROM db_academic.auth_students ats 
                                                LEFT JOIN db_academic.program_study ps ON (ps.ID = ats.ProdiID)
                                                WHERE ats.Name LIKE "%'.$key.'%" 
                                                OR ats.NPM LIKE "%'.$key.'%"
                                                 ORDER BY ats.Name LIMIT 24')->result_array();

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

        if(count($dataStd)>0){
            for($s=0;$s<count($dataStd);$s++){
                $NPM = $dataStd[$s]['NPM'];
                $db = 'ta_'.$dataStd[$s]['Year'];

                $dataPhoto = $this->db->select('Photo')->get_where($db.'.students',array('NPM' => $NPM))->result_array();

                $imgPhoto = (count($dataPhoto)>0)
                    ? 'https://pcam.podomorouniversity.ac.id/uploads/students/'.$db.'/'.$dataPhoto[0]['Photo']
                    : 'https://pcam.podomorouniversity.ac.id/images/icon/no_image.png';
                $dataStd[$s]['Photo'] = $imgPhoto;

                $Name = explode(' ',$dataStd[$s]['Name']);

                $viewName = (count($Name)>2) ? $Name[0].' '.$Name[1] : $dataStd[$s]['Name'];

                $dataStd[$s]['Name'] = ucwords(strtolower($viewName));
            }
        }


        $result = array(
            'Employees' => $dataEmp,
            'Students' => $dataStd
        );

        return print_r(json_encode($result));

    }


    // ============ Detail Employees ============
    public function detail_people_employees($NIP)
    {

        $dataEmployees = $this->db->query('SELECT em.NIP, em.Name, em.NIDN, ps.NameEng AS ProdiName, em.Address, em.EmailPU,  
                                                            ems2.Description AS StatusLecturer,
                                                            em.Photo, em.PositionMain, psd.Host 
                                                            FROM db_employees.employees em
                                                            LEFT JOIN db_academic.program_study ps ON (ps.ID = em.ProdiID)
                                                            LEFT JOIN db_academic.program_study_detail psd ON (ps.ID = psd.ProdiID)
                                                            LEFT JOIN db_employees.employees_status ems2 ON (ems2.IDStatus = em.StatusLecturerID)
                                                            WHERE em.NIP = "'.$NIP.'"')->result_array();

        $data['dataEmployees'] = $dataEmployees ;

        // Total Mentor FP
        $data['TotalFP'] =  $this->m_sp->getTotalMentoring($NIP);
        $data['TotalResaerch'] =  $this->m_sp->getTotalResaerch($NIP);
        $data['TotalPublikasi'] =  $this->m_sp->getTotalPublikasi($NIP);
        $data['TotalDedication'] =  $this->m_sp->getTotalDedication($NIP);
        $data['TotalHKI'] =  $this->m_sp->getTotalHKI($NIP);

        $Division = '';
        $Position = '';

        if(count($dataEmployees)>0){

            if($dataEmployees[0]['PositionMain']!='' && $dataEmployees[0]['PositionMain']!=null){
                $DivID = explode('.',$dataEmployees[0]['PositionMain'])[0];
                $PosID = explode('.',$dataEmployees[0]['PositionMain'])[1];

                $dataDiv = $this->db->select('Division')->get_where('db_employees.division',array(
                    'ID' => $DivID
                ))->result_array();

                $Division = (count($dataDiv)>0) ? $dataDiv[0]['Division'] : '';

                $dataPos = $this->db->select('Position')->get_where('db_employees.position',array(
                    'ID' => $PosID
                ))->result_array();

                $Position = (count($dataPos)>0) ? $dataPos[0]['Position'] : '';
            }

        }

        $data['Division'] =  $Division;
        $data['Position'] =  $Position;

        $content = $this->load->view('page/search_people/detail_people_employees',$data,true);
        parent::template($content);
    }

    public function getDetailsPeople(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $data_arr = $this->extractTokenPost();

        if($data_arr['action']=='getDPTimetable'){

            $data = $this->m_sp->getTimetables($data_arr['NIP']);

            return print_r(json_encode($data));

        }
        else if($data_arr['action']=='getMentoring'){

            $data = $this->m_sp->getMentoring($data_arr['NIP']);
            return print_r(json_encode($data));
        }
        else if($data_arr['action']=='getResearch'){
            $data = $this->m_sp->getResearch($data_arr['NIP']);
            return print_r(json_encode($data));
        }
        else if($data_arr['action']=='getPublikasi'){
            $data = $this->m_sp->getPublikasi($data_arr['NIP']);
            return print_r(json_encode($data));
        }
        else if($data_arr['action']=='getDedication'){
            $data = $this->m_sp->getDedication($data_arr['NIP']);
            return print_r(json_encode($data));
        }
        else if($data_arr['action']=='getHKI'){
            $data = $this->m_sp->getHKI($data_arr['NIP']);
            return print_r(json_encode($data));
        }
        else if($data_arr['action']=='setDataLogging'){

            $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $IP_Local = ($hostname!='') ? $hostname : $this->input->ip_address();

            $dataInsert = array(
                "NIP" => $data_arr['NIP'],
                "IP_Public" => $data_arr['IP_Public'],
                "IP_Local" => $IP_Local
            );

            $data = $this->db->insert('db_it.search_people_employees',$dataInsert);
            return print_r(1);
        }
        else if($data_arr['action']=='setDataLoggingStudent'){

            $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $IP_Local = ($hostname!='') ? $hostname : $this->input->ip_address();

            $dataInsert = array(
                "NPM" => $data_arr['NPM'],
                "IP_Public" => $data_arr['IP_Public'],
                "IP_Local" => $IP_Local
            );

            $data = $this->db->insert('db_it.search_people_student',$dataInsert);
            return print_r(1);
        }

    }


    // =========== Detail Student ========
    public function detail_people_student($NPM){
        $data['NPM'] = $NPM;

        $student = $this->db->query('SELECT ats.Name, ats.NPM, ats.Year,ats.EmailPU , ps.NameEng AS ProdiEng, j.JudiciumsDate, ats.StatusStudentID,     
                                                    ss.Description AS StatusStudent, em.NIP AS MentorNIP, em.Name AS Mentor, em.TitleAhead, em.TitleBehind,
                                                    psd.Host, ats.Password AS Token
                                                    FROM db_academic.auth_students ats 
                                                    LEFT JOIN db_academic.program_study ps ON (ps.ID = ats.ProdiID)
                                                    LEFT JOIN db_academic.program_study_detail psd ON (ps.ID = psd.ProdiID)
                                                    LEFT JOIN db_academic.status_student ss ON (ss.ID = ats.StatusStudentID)
                                                    LEFT JOIN db_academic.judiciums_list jl ON (jl.NPM = ats.NPM)
                                                    LEFT JOIN db_academic.judiciums j ON (j.ID = jl.JID)
                                                    LEFT JOIN db_academic.mentor_academic ma ON (ma.NPM = ats.NPM)
                                                    LEFT JOIN db_employees.employees em ON (em.NIP = ma.NIP)
                                                    WHERE ats.NPM = "'.$NPM.'"')->result_array();


        if(count($student)>0){
            $d = $student[0];
            $db = 'ta_'.$d['Year'];

            $dataDetails = $this->db->select('Photo,Gender')->get_where($db.'.students',array('NPM' => $NPM))
                ->result_array();

            $student[0]['Gender'] = $dataDetails[0]['Gender'];
            $student[0]['Photo'] = $dataDetails[0]['Photo'];
            $student[0]['DB'] = $db;


            $dataAch_1 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$NPM.'" AND (sa.CategID = 1 OR sa.CategID = 5) ')
                ->result_array();

            $student[0]['Achievement'] = $dataAch_1;

            $dataAch_3 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$NPM.'" AND sa.CategID = 3 ')
                ->result_array();

            $student[0]['Participation'] = $dataAch_3;

            $dataAch_2 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$d['NPM'].'" AND sa.CategID = 2 ')
                ->result_array();

            $student[0]['Training'] = $dataAch_2;

            $dataAch_4 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$d['NPM'].'" AND sa.CategID = 6 ')
                ->result_array();

            $student[0]['Internship'] = $dataAch_4;

        }

        $data['dataStd'] = $student;

        $content = $this->load->view('page/search_people/detail_people_student',$data,true);
        parent::template($content);
    }

}
