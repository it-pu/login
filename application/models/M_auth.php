<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {


    private $VariableClass= array('text' => null,
        'smtp_host' => null,
        'smtp_port' => null,
        'smtp_user' => null,
        'smtp_pass' => null
    );


    public function loadEmailConfig()
    {
        $config_email_db = $this->config_email_db();
        return $config_email_db;
    }

    public function config_email_db()
    {

        if ($this->VariableClass['smtp_host'] != null) {
            $config = array('setting' => array(
                'protocol' => 'smtp',
                'smtp_host' => $this->VariableClass['smtp_host'],
                'smtp_port' => $this->VariableClass['smtp_port'],
                'smtp_user' => $this->VariableClass['smtp_user'],
                'smtp_pass' => $this->VariableClass['smtp_pass'],
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            ),
                'text' => $this->VariableClass['text'],

            );
        }
        else
        {
            $sql = "select * from db_admission.email_set as a limit 1";
            $query=$this->db->query($sql, array())->result_array();
            $config = array('setting' => array(
                'protocol' => 'smtp',
                'smtp_host' => $query[0]['smtp_host'],
                'smtp_port' => $query[0]['smtp_port'],
                'smtp_user' => $query[0]['email'],
                'smtp_pass' => $query[0]['pass'],
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            ),
                'text' => $query[0]['text'],

            );
        }

        return $config;
    }

    public function textEmail($text = null, $title = null)
    {

        $titleHead = ($title!=null) ? $title : '';

        if ($text == null) {
            $text1 = '<div style="margin:0;padding:10px ;background-color:#ebebeb;font-size:14px;line-height:20px;font-family:Helvetica,sans-serif;width:100%;">
    <div class="adM">
        <br>
    </div>
    <table style="width:600px;margin:0 auto;background-color:#ebebeb" border="0" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <td></td>
            <td style="background-color:#fff;padding:0 30px;color:#333;vertical-align:top;border:1px solid #cccccc;">
                <br>
                <div style="text-align: center;">
                    <img src="https://lh3.googleusercontent.com/mkqZdtpCm7IfWWrPdfxJBETqOTiEU09s3cr4tzfFwAGRl3WqH_pyo3yDGPKmpSHfMw1mSFU0JTRk-3yX9M7xAG5KiVHzuMS1DPHzFg=w500-h144-rw-no" style="max-width: 250px;">
                    <hr style="border-top: 1px solid #cccccc;"/>
                    <div style="font-family:Proxima Nova Semi-bold,Helvetica,sans-serif;font-weight:bold;font-size:24px;line-height:24px;color:#607D8B">Registration</div>
                </div>
                <br/>
                Dear <strong>Tono</strong>,
                <br/>
                <br/>
                To get a full formulir registration.
                <br/>
                Please transfer to :
                <br/>
                <br/>
                <div style="background: #00bcd414;border: 1px solid #2196f36e;min-height: 50px;width: 270px;margin: 0 auto;text-align: center;padding: 10px;">
                    <b style="color: blue;">BNI Virtual Account</b>
                    <br/>
                    <div style="color: red;"><b>9880020200000006</b></div>
                    <br/>
                    <span style="color: #827f7f;">Due date : 9 January 2019</span>
                </div>

                <div style="background: #ffeb3b47;border: 1px solid #2196f36e;min-height: 10px;width: 270px;margin: 0 auto;text-align: center;padding: 10px;margin-top: 10px;">
                    <b style="color: #333;font-size: 16px;">Rp. 200.000, -</b>
                </div>
                <br/>

                <b>Please wait next step after your payment.</b>
                <br/>
                <br/>

                <div style="background: #efefef; padding: 10px;border: 1px solid #cccccc;">
                    <strong>Note :</strong>
                    If we do not receive your payment until the time limit specified then Your Account will be suspended
                </div>
                <br><br>
                <p style="color:#EB6936;"><i>*) Do not reply, this email is sent automatically</i> </p>

            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="background-color:#fff;border-top:1px solid #ddd; ">
                </div>
            </td>
        </tbody>
    </table>
</div>';
        }
        else
        {
            $text1 = '<div style="margin:0;padding:10px 0;background-color:#ebebeb;font-size:14px;line-height:20px;font-family:Helvetica,sans-serif;width:100%;text-align:center">
                    <div class="adM">
                    <br>
                    </div>
                    <table style="width:600px;margin:0 auto;background-color:#ebebeb" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                        <tr>
                            <td></td>
                            <td style="background-color:#fff;padding:0 30px;color:#333;vertical-align:top;border:1px solid #cccccc;">
                            <br>
                            <div style="text-align: center;">
                                <img src="https://lh3.googleusercontent.com/mkqZdtpCm7IfWWrPdfxJBETqOTiEU09s3cr4tzfFwAGRl3WqH_pyo3yDGPKmpSHfMw1mSFU0JTRk-3yX9M7xAG5KiVHzuMS1DPHzFg=w500-h144-rw-no" style="max-width: 250px;">
                                <hr style="border-top: 1px solid #cccccc;"/>
                                <div style="font-family:Proxima Nova Semi-bold,Helvetica,sans-serif;font-weight:bold;font-size:24px;line-height:24px;color:#607D8B">Notification '.$titleHead.'</div>
                            </div>
                            <br/>
                            <div style="font-family:Proxima Nova Reg,Helvetica,sans-serif">
                            <div style="max-width:600px;margin:30px 0;display:block;font-size:14px;text-align:left!important">
                            '.$text.'
                            <br><br>Best Regard, <br> IT Podomoro University
                            <br><br><br>
                            <p style="color:#EB6936;"><i>*) Do not reply, this email is sent automatically</i> </p>
                            </div>
                            </td>
                            <td></td>
                            </tr>
                            <tr>
                            <td colspan="3">
                            <div style="background-color:#fff;border-top:1px solid #ddd; ">';
        }

        return $this->VariableClass['text'] = $text1;

    }

    public function sendEmail($to = null,$subject = null,$smtp_host = null,$smtp_port = null,$smtp_user = null,$smtp_pass = null,$text = null)
    {   
        $arr = array(
            'status' => 1,
            'msg'=>''
            );
        $this->VariableClass['smtp_host'] = $smtp_host;
        $this->VariableClass['smtp_port'] = $smtp_port;
        $this->VariableClass['smtp_user'] = $smtp_user;
        $this->VariableClass['smtp_pass'] = $smtp_pass;
        $this->VariableClass['text'] = $text;

        $config_email = $this->loadEmailConfig();
        $textEmail = $this->textEmail($this->VariableClass['text']);
        $max_execution_time = 630;
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', $max_execution_time); //60 seconds = 1 minutes

        $this->load->library('email', $config_email['setting']);
        $this->email->set_newline("\r\n");
        $this->email->from('it@podomorouniversity.ac.id','IT Podomoro');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($this->VariableClass['text']);
        if($this->email->send())
        {
          $arr['status'] = 1;
          $arr['msg'] = "Email Send";
        }
        else
        {
            $arr['status'] = 0;
            $arr['msg'] = $this->email->print_debugger();
        }
        return $arr;
    }

    public function __getUserByEmailPU($emailpu)
    {

        date_default_timezone_set("Asia/Jakarta");

        // Cek Apakah Student
        $dataStd = $this->db->query('SELECT * FROM db_academic.auth_students WHERE EmailPU LIKE "'.$emailpu.'" LIMIT 1')->result_array();

        $url_direct=[];
        if(count($dataStd)>0){

            $db_ = 'ta_'.$dataStd[0]['Year'];
            $dataStdDetail = $this->db->get_where($db_.'.students', array('NPM' => $dataStd[0]['NPM']),1)->result_array();

            $token_passwd = array(
                'Username' => $dataStd[0]['NPM'],
                'Token' => $dataStd[0]['Password'],
                'dueDate' => date("Y-m-d")
            );
            $token = $this->jwt->encode($token_passwd,'s3Cr3T-G4N');

            $arp = array(
                'url' => url_students.'?token='.$token,
                'url_login' => url_students,
                'token' => $token,
                'Name' => $dataStdDetail[0]['Name'],
                'Username' => $dataStd[0]['NPM'],
                'Url_photo' => url_pas.'uploads/students/'.$db_.'/'.$dataStdDetail[0]['Photo'],
                'flag' => 'std'
            );
            array_push($url_direct,$arp);

        }
        else {
            $dataEmp = $this->db->query('SELECT * FROM db_employees.employees 
                                                WHERE emailpu LIKE "'.$emailpu.'" LIMIT 1')->result_array();

            if(count($dataEmp)>0){

                $token_passwd = array(
                    'Username' => $dataEmp[0]['NIP'],
                    'Token' => $dataEmp[0]['Password'],
                    'dueDate' => date("Y-m-d")
                );

                $token = $this->jwt->encode($token_passwd,'s3Cr3T-G4N');

                $Main = explode('.',$dataEmp[0]['PositionMain']);
                if($dataEmp[0]['PositionMain']!=null && $dataEmp[0]['PositionMain']!='' && count($Main)>0){
                    $urlp = ($Main[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $url_login = ($Main[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $url_login,
                        'token' => $token,
                        'Name' => $dataEmp[0]['Name'],
                        'Username' => $dataEmp[0]['NIP'],
                        'Url_photo' => url_pas.'uploads/employees/'.$dataEmp[0]['Photo'],
                        'flag' => ($Main[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }

                $Ot1 = explode('.',$dataEmp[0]['PositionOther1']);
                if($dataEmp[0]['PositionOther1']!=null && $dataEmp[0]['PositionOther1']!='' && count($Ot1)>0){
                    $urlp = ($Ot1[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $url_login = ($Ot1[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $url_login,
                        'token' => $token,
                        'Name' => $dataEmp[0]['Name'],
                        'Username' => $dataEmp[0]['NIP'],
                        'Url_photo' => url_pas.'uploads/employees/'.$dataEmp[0]['Photo'],
                        'flag' => ($Ot1[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }

                $Ot2 = explode('.',$dataEmp[0]['PositionOther2']);
                if($dataEmp[0]['PositionOther2']!=null && $dataEmp[0]['PositionOther2']!='' && count($Ot2)>0){
                    $urlp = ($Ot2[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $url_login = ($Ot2[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $url_login,
                        'token' => $token,
                        'Name' => $dataEmp[0]['Name'],
                        'Username' => $dataEmp[0]['NIP'],
                        'Url_photo' => url_pas.'uploads/employees/'.$dataEmp[0]['Photo'],
                        'flag' => ($Ot2[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }

                $Ot3 = explode('.',$dataEmp[0]['PositionOther3']);
                if($dataEmp[0]['PositionOther3']!=null && $dataEmp[0]['PositionOther3']!='' && count($Ot3)>0){
                    $urlp = ($Ot3[0]==14) ? url_lecturers.'?token='.$token : url_pcam.'?token='.$token ;
                    $url_login = ($Ot3[0]==14) ? url_lecturers : url_pcam ;
                    $arp = array(
                        'url' => $urlp,
                        'url_login' => $url_login,
                        'token' => $token,
                        'Name' => $dataEmp[0]['Name'],
                        'Username' => $dataEmp[0]['NIP'],
                        'Url_photo' => url_pas.'uploads/employees/'.$dataEmp[0]['Photo'],
                        'flag' => ($Ot3[0]==14) ? 'lec' : 'emp'
                    );
                    array_push($url_direct,$arp);
                }



            }
        }

        $result = array(
            'url_direct' => $url_direct
        );

        return $result;
    }

    public function __getUserAuth($ID,$NIP){
        $data = $this->db->query('SELECT e.*,

        d.ID AS IDDivision, d.Division, d.MenuNavigation,
        p.ID AS IDPosition, p.Position,
        
        d1.ID AS IDDivisionOther1, d1.Division AS DivisionOther1,
        p1.ID AS IDPositionOther1, p1.Position AS PositionOther1,
        
        d2.ID AS IDDivisionOther2, d2.Division AS DivisionOther2,
        p2.ID AS IDPositionOther2, p2.Position AS PositionOther2,
        
        d3.ID AS IDDivisionOther3, d3.Division AS DivisionOther3,
        p3.ID AS IDPositionOther3, p3.Position AS PositionOther3
        
        FROM db_employees.employees e
        LEFT JOIN db_employees.division d ON (d.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionMain, \'.\', 1), \'.\', -1))
        LEFT JOIN db_employees.position	p ON (p.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionMain, \'.\', -1), \'.\', 1))
        
        LEFT JOIN db_employees.division d1 ON (d1.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionOther1, \'.\', 1), \'.\', -1))
        LEFT JOIN db_employees.position	p1 ON (p1.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionOther1, \'.\', -1), \'.\', 1))
        
        LEFT JOIN db_employees.division d2 ON (d2.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionOther2, \'.\', 1), \'.\', -1))
        LEFT JOIN db_employees.position	p2 ON (p2.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionOther2, \'.\', -1), \'.\', 1))
        
        LEFT JOIN db_employees.division d3 ON (d3.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionOther3, \'.\', 1), \'.\', -1))
        LEFT JOIN db_employees.position	p3 ON (p3.ID = SUBSTRING_INDEX(SUBSTRING_INDEX(e.PositionOther3, \'.\', -1), \'.\', 1))
        WHERE e.NIP LIKE "'.$NIP.'" AND e.ID = "'.$ID.'" ');

        return $data->result_array();
    }

    public function __getTimePerCredits(){
        $data = $this->db->query('SELECT t.time FROM db_academic.time_per_credits t');
        return $data->result_array()[0];
    }

    public function __getauthUserPassword($NIP,$Password){
        $data = $this->db->query('SELECT e.ID,e.NIP FROM db_employees.employees e 
                                    WHERE e.NIP like "'.$NIP.'" AND e.Password = "'.$Password.'" ');

        return $data->result_array();
    }

    public function __getRuleUser($NIP){
        $data = $this->db->query('SELECT * FROM db_employees.rule_users WHERE NIP LIKE "'.$NIP.'"');
        return $data->result_array();
    }


    public function getDataUser2LoginStudent($year,$table,$NPM) {
        $data = $this->db->query('SELECT s.*, ast.Password AS Token, ast.EmailPU, ma.NIP AS AcademicMentor, e.Name AS MentorName, e.EmailPU AS MentorEmailPU, 
                                    ps.Code AS ProdiCode, fc.Name AS Faculty FROM 
                                    '.$table.' s
                                    LEFT JOIN db_academic.auth_students ast ON (s.NPM = ast.NPM)
                                    LEFT JOIN db_academic.mentor_academic ma ON (ma.NPM = s.NPM AND ma.Status="1")
                                    LEFT JOIN db_employees.employees e ON (e.NIP = ma.NIP)
                                    LEFT JOIN db_academic.program_study ps ON (ps.ID = s.ProdiID)
                                    LEFT JOIN db_academic.faculty fc ON (fc.ID = ps.FacultyID)
                                    WHERE s.NPM = "'.$NPM.'"')->result_array();

        $dataSemester = $this->db->query('SELECT ID FROM db_academic.curriculum 
                                              WHERE Year = "'.$year.'" LIMIT 1')->result_array()[0];

        $dataTotalSmt = $this->db->query('SELECT s.* FROM db_academic.semester s 
                                                    WHERE s.ID >= (SELECT ID FROM db_academic.semester s2 
                                                    WHERE s2.Year="'.$year.'" 
                                                    LIMIT 1)')->result_array();

        $smt = 0;
        $Year='';
        $SemesterCode='';
        $SemesterID = 0;
        for($s=0;$s<count($dataTotalSmt);$s++){
            if($dataTotalSmt[$s]['Status']=='1'){
                $smt += 1;
                $Year = $dataTotalSmt[$s]['Name'];
                $SemesterCode=$dataTotalSmt[$s]['Code'];
                $SemesterID = $dataTotalSmt[$s]['ID'];
                break;
            } else {
                $smt += 1;
            }
        }

        $data[0]['CurriculumID'] = $dataSemester['ID'];
        $data[0]['SemesterNow'] = $smt;
        $data[0]['SemesterID'] = $SemesterID;
        $data[0]['Year'] = $Year;
        $data[0]['SemesterCode'] = $SemesterCode;

        return $data;
    }

    public function getDataUser2LoginLecturer($username){

        $data = $this->db->query('SELECT em.*,ps.FacultyID FROM db_employees.employees em
                                        LEFT JOIN db_academic.program_study ps ON (ps.ID = em.ProdiID)
                                        WHERE em.NIP="'.$username.'"  LIMIT 1')->result_array();


        if(count($data)>0){
            $d = $data[0];

            $data[0]['Address'] = trim($data[0]['Address']);

            $data[0]['MainPositionID'] = $d['PositionMain'];
            $data[0]['MainPosition']=[];
            if ($data[0]['MainPositionID'] != null && $data[0]['MainPositionID'] != ''){

                $idP = explode('.',$d['PositionMain']);
                $divisionID = $idP[0];
                $positionID = $idP[1];

                $data[0]['MainPosition'] = array(
                    'ID' => $data[0]['MainPositionID'],
                    'Division' => $this->getdataDivision($divisionID),
                    'Position' => $this->getdataPosition($positionID)
                );
            }

            $data[0]['PositionOther1ID'] =$d['PositionOther1'];
            if ($data[0]['PositionOther1'] != null && $data[0]['PositionOther1'] != '') {
                $data[0]['PositionOther1ID'] = $d['PositionOther1'];

                $a = explode('.', $d['PositionOther1']);
                $divisionID = $a[0];
                $positionID = $a[1];
//                $ProdiID = $a[2];

                $data[0]['PositionOther1'] = array(
                    'ID' => $data[0]['PositionOther1ID'],
                    'Division' => $this->getdataDivision($divisionID),
                    'Position' => $this->getdataPosition($positionID)
                );
            }
            $data[0]['PositionOther2ID'] = $data[0]['PositionOther2'];
            if ($data[0]['PositionOther2'] != null && $data[0]['PositionOther2'] != '') {
                $data[0]['PositionOther2ID'] = $d['PositionOther2'];

                $a = explode('.', $d['PositionOther2']);
                $divisionID = $a[0];
                $positionID = $a[1];
//                $ProdiID = $a[2];

                $data[0]['PositionOther2'] = array(
                    'ID' => $d['PositionMain'],
                    'Division' => $this->getdataDivision($divisionID),
                    'Position' => $this->getdataPosition($positionID)
                );
            }
            $data[0]['PositionOther3ID'] = $d['PositionOther2'];
            if ($data[0]['PositionOther3'] != null && $data[0]['PositionOther3'] != '') {
                $data[0]['PositionOther3ID'] = $d['PositionOther3'];

                $a = explode('.', $d['PositionOther3']);
                $divisionID = $a[0];
                $positionID = $a[1];
//                $ProdiID = $a[2];

                $data[0]['PositionOther3'] = array(
                    'ID' => $data[0]['PositionOther3ID'],
                    'Division' => $this->getdataDivision($divisionID),
                    'Position' => $this->getdataPosition($positionID)
                );
            }

            $dataSmt = $this->db->select('ID')->get_where('db_academic.semester',array('Status'=>'1'),1)->result_array()[0];
            $data[0]['SemesterID']=$dataSmt['ID'];

        }

//        print_r(json_encode($data));


        return $data;
    }

    private function getdataDivision($divisionID){
        $dataDivision = $this->db
            ->get_where('db_employees.division', array('ID' => $divisionID), 1)
            ->result_array()[0];

        return $dataDivision;
    }

    private function getdataPosition($positionID){
        $dataPosition = $this->db
            ->get_where('db_employees.position', array('ID' => $positionID), 1)
            ->result_array()[0];

        return $dataPosition;
    }

    public function getUserToResetPassword($username,$email){

        $dataMhs = $this->db->query('SELECT ast.Password AS Token FROM db_academic.auth_students ast 
                                            WHERE ast.NPM = "'.$username.'" AND ast.EmailPU LIKE "'.$email.'"  LIMIT 1')->result_array();



        $result = $dataMhs;
        if(count($dataMhs)<=0){
            $dataLecturer = $this->db->query('SELECT em.Password AS Token FROM db_employees.employees em 
                                                      WHERE em.NIP = "'.$username.'" 
                                                          AND em.EmailPU LIKE "'.$email.'" LIMIT 1')->result_array();
            $result = $dataLecturer;
        }

        if(count($result)>0){

            date_default_timezone_set("Asia/Jakarta");


            $label = (count($dataMhs)>0) ? 'st' : 'em';
            $result[0]['Date'] = date("Y-m-d H:m:s");
            $result[0]['Flag'] = $label;
        }

        return $result;

    }

    public function apiservertoserver($url,$token = '')
    {
        $rs = array();
        $Input = $token;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "token=".$Input);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $pr = curl_exec($ch);
        curl_close ($ch);
        $rs = (array) json_decode($pr,true);
        return $rs;
    }

    public function UpdatePwdAD($data_arr)
    {
        $TypeUser = $data_arr['User'];
        switch ($TypeUser) {
            case 'Students':
                $data = array(
                    'auth' => 's3Cr3T-G4N',
                    'Type' => 'Student',
                    'UserID' => $data_arr['Username'],
                    'Password' => $data_arr['NewPassword'],
                );

                $url = URLAD.'__api/ChangePWD';
                $token = $this->jwt->encode($data,"UAP)(*");
                $this->apiservertoserver($url,$token);
                break;
            case 'Employees':
                // find email karena email = user ad
                $sql = 'select * from db_employees.employees where NIP = ?';
                $query=$this->db->query($sql, array($data_arr['Username']))->result_array();
                $EmailPU = $query[0]['EmailPU'];
                // get 
                    $ex = explode('@', $EmailPU);
                    $UserID = $ex[0];
                // end
                $data = array(
                    'auth' => 's3Cr3T-G4N',
                    'Type' => 'Employee',
                    'UserID' => $UserID,
                    'Password' => $data_arr['NewPassword'],
                );

                $url = URLAD.'__api/ChangePWD';
                $token = $this->jwt->encode($data,"UAP)(*");
                $this->apiservertoserver($url,$token);
                break;
            default:
                # code...
                break;
        }
    }

}
