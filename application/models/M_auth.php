<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

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
                'Name' => $dataStdDetail[0]['Name'],
                'Username' => $dataStd[0]['NPM'],
                'url_photo' => url_pas.'uploads/students/'.$db_.'/'.$dataStdDetail[0]['Photo'],
                'flag' => 'std'
            );
            array_push($url_direct,$arp);

        } else {
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
                    $arp = array(
                        'url' => $urlp,
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
                    $arp = array(
                        'url' => $urlp,
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
                    $arp = array(
                        'url' => $urlp,
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
                    $arp = array(
                        'url' => $urlp,
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

}
