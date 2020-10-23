
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nandang
 * Date: 31/08/2020
 * Time: 2:50 PM
 */

class C_survey extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
        $this->load->library('google');
        $this->load->model('m_auth');
        $this->load->model('M_search_people','m_sp');

        date_default_timezone_set("Asia/Jakarta");

    }

 public function list_survey()
    {
        $content = $this->load->view('page/survey/list_survey','',true);
        parent::template($content);
    }

     public function crudSurvey(){
        $reqdata = $this->input->post();
         $key = "UAP)(*";
        $data_arr = (array) $this->jwt->decode($reqdata['token'],$key);


                if($data_arr['action']=='getSurvQuestionType'){
                    
                            $monthNow = date("m");
                            $data = $this->db->query('SELECT DISTINCT(DATE_FORMAT(sa.EntredAt, "%d %b %Y")) AS tgl FROM db_it.surv_answer sa JOIN db_it.surv_survey ss ON sa.SurveyID = ss.ID WHERE ss.isPublicSurvey = "1" AND MONTH(sa.EntredAt) = "'.$monthNow.'" AND sa.EntredAt >= ss.StartDate')->result_array();                                           
                            return print_r(json_encode($data));  
                }
                
                else if($data_arr['action']=='getListSurvey'){

            $requestData = $_REQUEST;

            $dataWhere = '';

            $dataSearch = '';
            if( !empty($requestData['search']['value']) ) {
                $search = $requestData['search']['value'];
                $dataSearch = ' AND ( ss.Title LIKE "%'.$search.'%" OR ss.Key LIKE "%'.$search.'%" )';
            }

            $queryDefault = 'SELECT ss.* FROM db_it.surv_survey ss WHERE ss.isPublicSurvey="1" AND
                            ss.DepartmentID = "'.$data_arr['DepartmentID'].'"  '.
                            $dataWhere.$dataSearch;

            $queryDefaultTotal = 'SELECT COUNT(*) AS Total FROM ('.$queryDefault.') xx';

            $sql = $queryDefault.' LIMIT '.$requestData['start'].','.$requestData['length'].' ';

            $query = $this->db->query($sql)->result_array();
            $queryDefaultRow = $this->db->query($queryDefaultTotal)->result_array()[0]['Total'];

            $no = $requestData['start'] + 1;
            $data = array();

            for($i=0;$i<count($query);$i++) {

                $nestedData = array();
                $row = $query[$i];

                $Range = date('d M Y',strtotime($row['StartDate'])).' - '.
                    date('d M Y',strtotime($row['EndDate']));
                $dateNow = date("Y-m-d");
                $dateExpired = $row['EndDate'];

                if ($dateNow<=$dateExpired) {

                    $tokenBtn = $this->jwt->encode(array('ID' => $row['ID']),"UAP)(*");

                    $showBtnAddNewDate = ($row['Status']=='2')
                    ? '<li class="" id="li_btn_Close_'.$row['ID'].'">
                                        <a href="javascript:void(0);" class="btnAddNewDate" data-id="'.$row['ID'].'">Add new date 
                                            <i style="color: #FFC107;padding-top: 3px;" class="fa fa-circle pull-right"></i></a>
                                 </li>'
                    : '';


                    // Cek jumlah yang sudah mengisi survey

                    // ketika survey blm close dan sudah close

                    $whereAnswerSurvey = ($row['Status']=='2') ? ' AND RecapID = (SELECT MAX(RecapID) FROM db_it.surv_answer WHERE SurveyID= "'.$row['ID'].'")'
                    : ' AND Status = "1" ';
                    $TotalYgUdahIsiSurvey = $this->db->query('SELECT COUNT(*) AS Total FROM db_it.surv_answer 
                                                                    WHERE SurveyID= "'.$row['ID'].'" AND 
                                                                      FormType = "internal" '.$whereAnswerSurvey)->result_array()[0]['Total'];
                    //                $TotalYgUdahIsiSurvey = $this->db->from('db_it.surv_answer')
                    //                    ->where(array('SurveyID' => $row['ID'],
                    //                        'FormType' => 'internal',
                    //                        'Status' => '1'))->count_all_results();
                    $btnTotalAlreadyFillOut = ($TotalYgUdahIsiSurvey>0)
                    ? '<a href="javascript:void(0)" class="showAlreadyFillIn" onclick="intlist('.$row['ID'].');" data-type="internal" data-status="'.$row['Status'].'" data-id="'.$row['ID'].'">'.$TotalYgUdahIsiSurvey.'</a>'
                    : '0';

                    // Cek jumlah yang sudah mengisi survey external
                    $TotalYgUdahIsiSurvey_Ext = $this->db->query('SELECT COUNT(*) AS Total FROM db_it.surv_answer 
                                                                    WHERE SurveyID= "'.$row['ID'].'" AND 
                                                                      FormType = "external" '.$whereAnswerSurvey)->result_array()[0]['Total'];
                    //                $TotalYgUdahIsiSurvey_Ext = $this->db->from('db_it.surv_answer')
                    //                    ->where(array('SurveyID' => $row['ID'],
                    //                        'FormType' => 'external',
                    //                        'Status' => '1'))->count_all_results();
                    $btnTotalAlreadyFillOut_ext = ($TotalYgUdahIsiSurvey_Ext>0)
                    ? '<a href="javascript:void(0)" class="showAlreadyFillOut" onclick="ekslist('.$row['ID'].');" data-type="external" data-status="'.$row['Status'].'" data-id="'.$row['ID'].'">'.$TotalYgUdahIsiSurvey_Ext.'</a>'
                    : '0';

                    $TotalQuestion = $this->db->from('db_it.surv_survey_detail')->where('SurveyID',$row['ID'])->count_all_results();
                    $btnShowTotalQuestion = ($TotalQuestion>0) ? '<a href="javascript:void(0)" class="showQuestionList" onclick="questionlist('.$row['ID'].');" data-id="'.$row['ID'].'">'.$TotalQuestion.'</a>' : '0';

                    $TotalFillOut = $TotalYgUdahIsiSurvey + $TotalYgUdahIsiSurvey_Ext;
                    $ShowTotalFillOut = ($TotalFillOut>0)
                    ? '<a href="javascript:void(0)" class="showAlreadyFillTotal" onclick="totallist('.$row['ID'].');" data-status="'.$row['Status'].'" data-type="all" data-id="'.$row['ID'].'">'.$TotalFillOut.'</a>'
                    : '0';

                    $TotalRecap = $this->db->from('db_it.surv_recap')
                                            ->where('SurveyID',$row['ID'])
                                            ->count_all_results();


                    $Key = ($row['Key']!='' && $row['Key']!=null) ? '<div style="margin-top: 10px;"><span class="key">'.$row['Key'].'</span></div>' : '';

                    $nestedData[] = '<div>'.$no.'</div>';
                    $nestedData[] = '<div style="text-align: left;"><b>'.$row['Title'].'</b>'.$Key.'</div>';
                    $nestedData[] = $btnShowTotalQuestion;
                    $nestedData[] = $btnTotalAlreadyFillOut;
                    $nestedData[] = $btnTotalAlreadyFillOut_ext;
                    $nestedData[] = '<b>'.$ShowTotalFillOut.'</b>';
                
                    $nestedData[] = '<div>'.$Range.'</div>';
              

                    $data[] = $nestedData;
                    $no++;
                    

                }
                else{
                    //$dataClose = $this->db->query('SELECT ID FROM db_it.surv_survey WHERE EndDate="'.$dateExpired.'"')->result_array(); 
                    
                    
                    $updates = array(
                        'isPublicSurvey' => '0',
        
                    );
                    //for ($i=0; $i <count($dataClose) ; $i++) { 
                        $this->db->where('ID', $row['ID']);
                        $this->db->update('db_it.surv_survey', $updates);
                        
                    //}
                }
            }
            $json_data = array(
                        "draw"            => intval( $requestData['draw'] ),
                        "recordsTotal"    => intval($queryDefaultRow),
                        "recordsFiltered" => intval( $queryDefaultRow),
                        "data"            => $data,
                        "dataQuery"            => $query
                    );
                    echo json_encode($json_data);

        }


        else if($data_arr['action']=='showQuestionInSurvey'){

            $SurveyID = $data_arr['SurveyID'];

            $data = $this->db->query('SELECT ssd.QuestionID, sq.Question, sq.QTID, sqc.Description AS Category, 
                                                 sqt.Description AS Type
                                                FROM db_it.surv_survey_detail ssd
                                                LEFT JOIN db_it.surv_question sq ON (sq.ID = ssd.QuestionID)
                                                LEFT JOIN db_it.surv_question_category sqc ON (sqc.ID = sq.QCID)
                                                LEFT JOIN db_it.surv_question_type sqt ON (sqt.ID = sq.QTID)
                                                WHERE ssd.SurveyId = "'.$SurveyID.'" ORDER BY ssd.Queue ASC ')
                                    ->result_array();

            if(count($data)>0){
                for($i=0;$i<count($data);$i++){

                    $AverageRate = '';

                    $dataWhere = ' sad.SurveyID = "'.$SurveyID.'" 
                                    AND sad.QuestionID = "'.$data[$i]['QuestionID'].'"
                                     AND sad.QTID = "'.$data[$i]['QTID'].'"
                                      AND sa.Status = "1" ';

                    if($data[$i]['QTID']=='4' || $data[$i]['QTID']==4){
                        // Cek berapa yang udah jawab
//                        $dataTotalJawaban = $this->db->get_where('db_it.surv_answer_detail',$dataWhere)->result_array();

                        $whereRate = ' AND sad.Rate = 1';
                        $R_1 = $this->db->query('SELECT COUNT(*) AS Total 
                                                        FROM db_it.surv_answer_detail sad 
                                                        LEFT JOIN db_it.surv_answer sa 
                                                        ON (sa.ID = sad.AnswerID) 
                                                        WHERE '.$dataWhere.$whereRate)
                            ->result_array()[0]['Total'];

                        $whereRate = ' AND sad.Rate = 2';
                        $R_2 = $this->db->query('SELECT COUNT(*) AS Total 
                                                        FROM db_it.surv_answer_detail sad 
                                                        LEFT JOIN db_it.surv_answer sa 
                                                        ON (sa.ID = sad.AnswerID) 
                                                        WHERE '.$dataWhere.$whereRate)
                            ->result_array()[0]['Total'];

                        $whereRate = ' AND sad.Rate = 3';
                        $R_3 = $this->db->query('SELECT COUNT(*) AS Total 
                                                        FROM db_it.surv_answer_detail sad 
                                                        LEFT JOIN db_it.surv_answer sa 
                                                        ON (sa.ID = sad.AnswerID) 
                                                        WHERE '.$dataWhere.$whereRate)
                            ->result_array()[0]['Total'];

                        $whereRate = ' AND sad.Rate = 4';
                        $R_4 = $this->db->query('SELECT COUNT(*) AS Total 
                                                        FROM db_it.surv_answer_detail sad 
                                                        LEFT JOIN db_it.surv_answer sa 
                                                        ON (sa.ID = sad.AnswerID) 
                                                        WHERE '.$dataWhere.$whereRate)
                            ->result_array()[0]['Total'];

                        $AverageRate = '<div>B1 : '.$R_1.'</div>
                                        <div>B2 : '.$R_2.'</div>
                                        <div>B3 : '.$R_3.'</div>
                                        <div>B4 : '.$R_4.'</div>';

                    }
                    else if($data[$i]['QTID']=='5' || $data[$i]['QTID']==5){

                        $dataWhere = $dataWhere.' AND IsTrue = "1"';

                        $TotalYes = $this->db->query('SELECT COUNT(*) AS Total FROM db_it.surv_answer_detail sad LEFT JOIN db_it.surv_answer sa 
                                                        ON (sa.ID = sad.AnswerID) WHERE '.$dataWhere)->result_array()[0]['Total'];

                        $dataWhere = $dataWhere.' AND IsTrue = "0"';
                        $TotalNo = $this->db->query('SELECT COUNT(*) AS Total FROM db_it.surv_answer_detail sad LEFT JOIN db_it.surv_answer sa 
                                                        ON (sa.ID = sad.AnswerID) WHERE '.$dataWhere)->result_array()[0]['Total'];

                        $AverageRate = '<div>Y : '.$TotalYes.'</div><div>N : '.$TotalNo.'</div>';


                    }

                    $data[$i]['AverageRate'] = '<div style="text-align: left;">'.$AverageRate.'</div>';
                }
            }


            return print_r(json_encode($data));


        }

        else if($data_arr['action']=='showUserAlreadyFill'){

            $requestData = $_REQUEST;
            $filterType = $data_arr['filterType'];
            
            $dataWhere = ($data_arr['Type']=='all') ? '' : ' AND sa.FormType = "'.$data_arr['Type'].'" ';

            $dataWhereType = '';
            if($filterType!=''){
                $w_Type = ($filterType!='')
                    ? 'AND DATE_FORMAT(sa.EntredAt, "%d %b %Y") = "'.$filterType.'" ' : '';
                

                $dataWhereType = $w_Type;
            }

            $dataSearch = '';
            if( !empty($requestData['search']['value']) ) {
                $search = $requestData['search']['value'];
                $dataScr = ' AND (sa.Username LIKE "%'.$search.'%" OR 
                                em.Name LIKE "%'.$search.'%"  OR 
                                ats.Name LIKE "%'.$search.'%")';
                $dataSearch = $dataScr;
            }


            $whereAnswerSurvey = ($data_arr['Status']=='2') ?
                ' AND sa.RecapID = (SELECT MAX(RecapID) FROM db_it.surv_answer WHERE SurveyID= "'.$data_arr['SurveyID'].'")'
                : ' AND sa.Status = "1" ';

            $queryDefault = 'SELECT sa.*,  CASE WHEN  sa.Type = "emp" THEN em.Name
                                                WHEN  sa.Type = "std" THEN ats.Name
                                                ELSE exu.FullName END AS "Name" FROM db_it.surv_answer sa 
                                                LEFT JOIN db_employees.employees em ON (em.NIP = sa.Username)
                                                LEFT JOIN db_academic.auth_students ats ON (ats.NPM = sa.Username)
                                                LEFT JOIN db_it.surv_external_user exu ON (exu.ID = sa.Username)
                                        WHERE sa.SurveyID = "'.$data_arr['SurveyID'].'" '.$whereAnswerSurvey.
                                        $dataWhere.$dataSearch.$dataWhereType;

            $queryDefaultTotal = 'SELECT COUNT(*) AS Total FROM ('.$queryDefault.') xx';

            $sql = $queryDefault.' LIMIT '.$requestData['start'].','.$requestData['length'].' ';

            $query = $this->db->query($sql)->result_array();
            $queryDefaultRow = $this->db->query($queryDefaultTotal)->result_array()[0]['Total'];

            $no = $requestData['start'] + 1;
            $data = array();

            for($i=0;$i<count($query);$i++) {

                $nestedData = array();
                $row = $query[$i];

//                $Type = ($row['Type']=='std')
//                    ? '<span class="label label-primary">Student</span>'
//                    : '<span class="label label-success">Emp / Lec</span>';
                $Type = '<span class="label label-warning">Other</span>';
                if($row['Type'] == 'std') {
                    $Type = '<span class="label label-primary">Std</span>';
                } else if($row['Type'] == 'emp'){
                    $Type = '<span class="label label-success">Emp / Lec</span>';
                }

                $nestedData[] = '<div>'.$no.'</div>';
                $nestedData[] = '<div style="text-align: left;"><b>'.$row['Name'].'</b><br/>'.$row['Username'].'</div>';
                $nestedData[] = '<div>'.$Type.'</div>';
                $nestedData[] = '<div>'.date('d M Y H:i',strtotime($row['EntredAt'])).'</div>';

                $data[] = $nestedData;
                $no++;

            }

            $json_data = array(
                "draw"            => intval( $requestData['draw'] ),
                "recordsTotal"    => intval($queryDefaultRow),
                "recordsFiltered" => intval( $queryDefaultRow),
                "data"            => $data,
                "dataQuery"            => $query
            );
            echo json_encode($json_data);


        }

    }


    public function survey()
    {
        if(!$this->session->userdata('portal_SurveyLogin')){
            redirect(base_url('portal-login'));
        }
        $content = $this->load->view('page/survey/survey','',true);
        parent::template($content);
    }

    public function my_answer($token){

        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);
        $AnswerID = $data_arr['AnswerID'];

        $data = $this->db->query('SELECT sa.SurveyID, sa.RecapID, sa.Username, sa.Type, sa.Status, ss.Title,  
                                            sa.EntredAt,
                                            CASE 
                                            WHEN  em.Name IS NOT NULL THEN em.Name
                                            WHEN  ats.Name IS NOT NULL THEN ats.Name
                                            ELSE seu.FullName END AS "Name"
                                            
                                            FROM db_it.surv_answer sa
                                            LEFT JOIN db_it.surv_survey ss ON (ss.ID = sa.SurveyID)
                                            LEFT JOIN db_employees.employees em ON (em.NIP = sa.Username)
                                            LEFT JOIN db_academic.auth_students ats ON (ats.NPM = sa.Username)
                                            LEFT JOIN db_it.surv_external_user seu ON (seu.ID = sa.Username)
                            WHERE sa.ID = "'.$AnswerID.'" ')->result_array();

        if(count($data)>0){
            $d = $data[0];
            if($d['Status']=='1'){

                $SurveyID = $d['SurveyID'];
                $QuesryQuestion = 'SELECT sq.Question, sq.QTID, sad.Rate, sad.Answer, sad.IsTrue  
                                                            FROM db_it.surv_survey_detail ssd
                                                            LEFT JOIN db_it.surv_question sq 
                                                            ON (sq.ID = ssd.QuestionID)
                                                            LEFT JOIN db_it.surv_answer_detail sad
                                                            ON (sad.AnswerID = "'.$AnswerID.'"
                                                            AND sad.SurveyID = ssd.SurveyID 
                                                                AND sad.QuestionID = sq.ID)
                                                            WHERE ssd.SurveyID = "'.$SurveyID.'"';


            } else {
                $RecapID = $d['RecapID'];
                $QuesryQuestion = 'SELECT sq.Question, sq.QTID, sad.Rate, sad.Answer, sad.IsTrue  
                                                            FROM db_it.surv_recap_question srq
                                                            LEFT JOIN db_it.surv_question sq 
                                                            ON (sq.ID = srq.QuestionID)
                                                            LEFT JOIN db_it.surv_answer_detail sad
                                                            ON (sad.AnswerID = "'.$AnswerID.'"
                                                            AND sad.SurveyID = srq.SurveyID 
                                                                AND sad.QuestionID = sq.ID)
                                                            WHERE srq.RecapID = "'.$RecapID.'"';
            }

            $dataQuestion = $this->db->query($QuesryQuestion)->result_array();

//            if(count($dataQuestion)>0){
//                for($i=0;$i<count($dataQuestion);$i++){
//
//                }
//            }

            $result = array(
                'Survey' => $d,
                'MyAnswer' => $dataQuestion,
                'Status' => 1
            );

        } else {
            $result = array('Status'=>0);
        }

//        print_r($result);
//        exit();

        $content = $this->load->view('page/survey/my_answer',$result,true);
        parent::template($content);


    }

    public function checksurvey($Key){
        // Cek apakah status survey publish
        $dateNow = date('Y-m-d');
        $dataSurvey = $this->db->query('SELECT * FROM db_it.surv_survey ss 
                                        WHERE 
                                        ss.Key = "'.$Key.'"
                                        AND ss.Status = "1" 
                                        AND ss.StartDate <= "'.$dateNow.'"
                                        AND ss.EndDate >= "'.$dateNow.'"')
            ->result_array();

        $data['ValidSurvey'] = 0;
        $data['Key'] = $Key;

        if(count($dataSurvey)>0){
            $data['ValidSurvey'] = 1;
            $data['FormType'] = 'external';
            $data['ID'] = $dataSurvey[0]['ID'];
            $data['Title'] = $dataSurvey[0]['Title'];
        }
        $this->session->sess_destroy();
        $content = $this->load->view('page/survey/checksurvey',$data,true);
        parent::template($content);


    }

    public function submitChecksurvey(){

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);


        if($data_arr['action']=='submitForm'){

            $Username = '';
            $UserType = ''.

            $Status = 0;

            if($data_arr['Participant']=='other'){
                // Input form
                $dataInput = array(
                    'FullName' => $data_arr['FullName'],
                    'Email' => $data_arr['Email'],
                    'Phone' => $data_arr['Phone']
                );

                $this->db->insert('db_it.surv_external_user',$dataInput);

                $UserType = 'other';
                $Username = $this->db->insert_id();
                $Status = 1;

            } else {
                $dataCk = $this->checkUser($data_arr['Username'],$data_arr['Password']);

                if($dataCk['Status']==1 || $dataCk['Status']=='1'){
                    $Status = 1;
                    $UserType = $dataCk['UserType'];
                    $Username = $data_arr['Username'];
                }

            }

            if($Status==1 || $Status=='1'){
                $dataSetSession = array(
                    'portal_Username' => $Username,
                    'portal_SurveyID' => $data_arr['SurveyID'],
                    'portal_FormType' => 'external',
                    'portal_UserType' => $UserType,
                    'portal_Key' => $data_arr['Key'],
                    'portal_SurveyLogin' => true
                );

                $this->session->set_userdata($dataSetSession);
            } else {
                $this->session->sess_destroy();
            }

            return print_r(json_encode(array('Status'=>$Status)));

        }

    }

    function checkUser($Username,$Password){
        $Pass = $this->genratePassword($Username,$Password);
        $checkEmp = $this->db->select('Name')->get_where('db_employees.employees',
            array(
                'NIP' => $Username,
                'Password' => $Pass
            ))->result_array();


        $result = array(
            'Status' => 0
        );

        if(count($checkEmp)<=0){
            $checkStd = $this->db->select('Name')->get_where('db_academic.auth_students',
                array(
                    'NPM' => $Username,
                    'Password' => $Pass
                ))->result_array();

            if(count($checkStd)>0){
                $result = array(
                    'Name' => $checkStd[0]['Name'],
                    'Status' => 1,
                    'UserType' => 'std'
                );
            }
        } else {
            $result = array(
                'Name' => $checkEmp[0]['Name'],
                'Status' => 1,
                'UserType' => 'emp'
            );
        }

        return $result;

    }

    private function genratePassword($Username,$Password){

        $plan_password = $Username.''.$Password;
        $pas = md5($plan_password);
        $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');

        return $pass;
    }

    public function surveyStart(){

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');

        $token = $this->input->post('token');
        $key = "s3Cr3T-G4N";
        $data_arr = (array) $this->jwt->decode($token,$key);

        // Cek apakah username sudah pernah ada atau blm
        $dataCkUserName = $this->db->get_where('db_it.surv_direct',
            array('Username' => $data_arr['Username']))->result_array();

        if(count($dataCkUserName)>0){
            $dataIns = array(
                'DetailsData' => $token,
                'LogonBy' => $data_arr['LogonBy'],
                'ExpiredAt' => $data_arr['ExpiredAt'],
                'EntredAt' => $date = date('Y-m-d H:i:s')
            );
            $this->db->where('Username',$data_arr['Username']);
            $this->db->update('db_it.surv_direct',$dataIns);
        } else {
            $dataIns = array(
                'Username' => $data_arr['Username'],
                'DetailsData' => $token,
                'LogonBy' => $data_arr['LogonBy'],
                'ExpiredAt' => $data_arr['ExpiredAt']
            );

            $this->db->insert('db_it.surv_direct',$dataIns);
        }

        $dataSetSession = array(
            'portal_Username' => $data_arr['Username'],
            'portal_SurveyID' => $data_arr['SurveyID'],
            'portal_UserType' => $data_arr['UserType'],
            'portal_FormType' => 'internal',
            'portal_SurveyLogin' => true
        );

        $this->session->set_userdata($dataSetSession);

        return print_r(json_encode(array('Status'=>1)));

    }



}
