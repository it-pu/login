<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_cv extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function data($NPM){
        
        // $NPM = $this->uri->segment(2);

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


            $dataAch_1 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement, sa.Year FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$NPM.'" AND (sa.CategID = 1 OR sa.CategID = 5) ')
                ->result_array();

            $student[0]['Achievement'] = $dataAch_1;

            $dataAch_3 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement, sa.Year FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$NPM.'" AND sa.CategID = 3 ')
                ->result_array();

            $student[0]['Participation'] = $dataAch_3;

            $dataAch_2 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement, sa.Year FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$d['NPM'].'" AND sa.CategID = 2 ')
                ->result_array();

            $student[0]['Training'] = $dataAch_2;

            $dataAch_4 = $this->db->query('SELECT sa.Event, sa.Level, sa.Location, sa.Achievement, sa.Year FROM db_studentlife.student_achievement_student sas
                                                              LEFT JOIN db_studentlife.student_achievement sa ON (sa.ID = sas.SAID)
                                                              WHERE sa.isSKPI = 1 AND sas.NPM = "'.$d['NPM'].'" AND sa.CategID = 6 ')
                ->result_array();

            $student[0]['Internship'] = $dataAch_4;

            
            $dataAch_5 = $this->db->select('Phone, Address, GraduationYear, PlaceOfBirth, DateOfBirth, HighSchool, MajorsHighSchool')->get_where($db.'.students',array('NPM' => $NPM))
                ->result_array();

            $student[0]['Phone'] = $dataAch_5[0]['Phone'];
            $student[0]['GraduationYear'] = $dataAch_5[0]['GraduationYear'];
            $student[0]['PlaceOfBirth'] = ucwords(strtolower($dataAch_5[0]['PlaceOfBirth']));
            $student[0]['DateOfBirth'] = ucwords(strtolower($dataAch_5[0]['DateOfBirth']));
            $student[0]['HighSchool'] = ucwords(strtoupper($dataAch_5[0]['HighSchool']));
            $student[0]['MajorsHighSchool'] = ucwords(strtoupper($dataAch_5[0]['MajorsHighSchool']));
            $student[0]['Address'] = ucwords(strtolower($dataAch_5[0]['Address']));
            $data['dataStd'] = $student;
            
        }
        return $data;
        
    }
}