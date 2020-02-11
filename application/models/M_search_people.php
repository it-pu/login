<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search_people extends CI_Model {


    public function getTimetables($NIP){

        $dataSmt = $this->db->query('SELECT * FROM db_academic.semester WHERE Status = "1"')->result_array();



        $dataCo = $this->db->query('SELECT sdc.ScheduleID, s.ClassGroup, mk.NameEng AS CourseEng, mk.Name AS Course  
                                            FROM db_academic.schedule s
                                            LEFT JOIN db_academic.schedule_details_course sdc ON (sdc.ScheduleID = s.ID)
                                            LEFT JOIN db_academic.mata_kuliah mk ON (mk.ID = sdc.MKID)
                                            WHERE s.Coordinator = "'.$NIP.'" AND s.SemesterID = "'.$dataSmt[0]['ID'].'" 
                                            GROUP BY s.ID ')->result_array();

        $dataTeam = $this->db->query('SELECT sdc.ScheduleID, s.ClassGroup, mk.NameEng AS CourseEng, mk.Name AS Course  
                                            FROM db_academic.schedule s
                                            LEFT JOIN db_academic.schedule_team_teaching stt ON (stt.ScheduleID = s.ID)
                                            LEFT JOIN db_academic.schedule_details_course sdc ON (sdc.ScheduleID = s.ID)
                                            LEFT JOIN db_academic.mata_kuliah mk ON (mk.ID = sdc.MKID)
                                            WHERE stt.NIP = "'.$NIP.'" AND s.SemesterID = "'.$dataSmt[0]['ID'].'" 
                                            GROUP BY s.ID')->result_array();

        if(count($dataTeam)>0){
            for($i=0;$i<count($dataTeam);$i++){
                array_push($dataCo,$dataTeam[$i]);
            }
        }

        if(count($dataCo)>0){
            for($c=0;$c<count($dataCo);$c++){
                $dataCo[$c]['Schedule'] = $this->db->query('SELECT sd.StartSessions, sd.EndSessions, d.NameEng AS Dayname, cl.Room FROM db_academic.schedule_details sd 
                                                                    LEFT JOIN db_academic.days d ON (d.ID = sd.DayID)
                                                                    LEFT JOIN db_academic.classroom cl ON (cl.ID = sd.ClassRoomID)
                                                                    WHERE sd.ScheduleID = "'.$dataCo[$c]['ScheduleID'].'" ')->result_array();
            }
        }


        $result = array(
            'Semester' => $dataSmt,
            'Timetables' => $dataCo

        );

        return $result;

    }

    public function getMentoring($NIP){

        $dataFP= $this->db->query('SELECT ats.NPM,ats.Name, CONCAT("1") AS Mentor, ats.Year FROM db_academic.auth_students ats WHERE ats.MentorFP1 = "'.$NIP.'"
                                    UNION 
                                    SELECT ats.NPM, ats.Name, CONCAT("2") AS Mentor, ats.Year FROM db_academic.auth_students ats WHERE ats.MentorFP2 = "'.$NIP.'"')->result_array();

        return $dataFP;

    }

    public function getResearch($NIP){
        $data = $this->db->query('SELECT Judul_litabmas AS Title FROM db_research.litabmas WHERE NIP = "'.$NIP.'" ORDER BY ID_litabmas DESC')->result_array();
        return $data;
    }

    public function getPublikasi($NIP){
        $data = $this->db->query('SELECT Judul AS Title FROM db_research.publikasi WHERE NIP = "'.$NIP.'" ORDER BY ID_publikasi DESC')->result_array();
        return $data;
    }

    public function getDedication($NIP){
        $data = $this->db->query('SELECT Judul_PKM AS Title FROM db_research.pengabdian_masyarakat WHERE NIP = "'.$NIP.'" ORDER BY ID_PKM DESC')->result_array();
        return $data;
    }

    public function getHKI($NIP){
        $data = $this->db->query('SELECT Judul_hki AS Title FROM db_research.hak_kekayaan_intelektual WHERE NIP = "'.$NIP.'" ORDER BY ID_HKI DESC')->result_array();
        return $data;
    }

    public function getTotalMentoring($NIP){
        $dataFP= $this->db->query('SELECT COUNT(*) AS Total FROM 
                                                        (SELECT ats.NPM,ats.Name, CONCAT("1") AS Mentor, ats.Year FROM db_academic.auth_students ats WHERE ats.MentorFP1 = "'.$NIP.'"
                                                        UNION SELECT ats.NPM, ats.Name, CONCAT("2") AS Mentor, ats.Year FROM db_academic.auth_students ats WHERE ats.MentorFP2 = "'.$NIP.'") xx')
            ->result_array();

        return $dataFP[0]['Total'];
    }

    public function getTotalResaerch($NIP){
        $dataFP= $this->db->query('SELECT COUNT(*) AS Total FROM db_research.litabmas WHERE NIP = "'.$NIP.'" ')
            ->result_array();

        return $dataFP[0]['Total'];
    }

    public function getTotalPublikasi($NIP){
        $dataFP= $this->db->query('SELECT COUNT(*) AS Total FROM db_research.publikasi WHERE NIP = "'.$NIP.'" ')
            ->result_array();

        return $dataFP[0]['Total'];
    }

    public function getTotalDedication($NIP){
        $dataFP= $this->db->query('SELECT COUNT(*) AS Total FROM db_research.pengabdian_masyarakat WHERE NIP = "'.$NIP.'" ')
            ->result_array();

        return $dataFP[0]['Total'];
    }

    public function getTotalHKI($NIP){
        $dataFP= $this->db->query('SELECT COUNT(*) AS Total FROM db_research.hak_kekayaan_intelektual WHERE NIP = "'.$NIP.'" ')
            ->result_array();

        return $dataFP[0]['Total'];
    }



}
