<?php

namespace App\Controllers;
use App\Models\FacultyModel;
use App\Models\ProgramModel;
use App\Models\SubjectModel;
use App\Models\StudentModel;
use App\Models\SemesterModel;
use App\Models\CoordinatorModel;

use App\Models\SubjectallocationModel;

class AttendanceController extends BaseController
{
    

    public function allsubjects()
    {
        $id=$_COOKIE['id'];
       
        $subjectallocationmodel= new SubjectallocationModel();       
        $data['subject']=$subjectallocationmodel->getOneFacAllocatedSubjectDetails($id);
       
        $coordinatormodel= new CoordinatorModel();
        $data['coordinator_sub']=$coordinatormodel->getAllCoordinatorSubjects($id);
      
         return view('attendance-crud/allsubjoffac',$data);
    }

    public function allstudents($p_id,$s_id,$sub_id)
    {

        $studentmodel= new Studentmodel();
        $data['student']=$studentmodel->where('program_id', $p_id)->Where('semester_id', $s_id)->findAll();;

        $data['sub_id']=$sub_id;
       
        
         return view('attendance-crud/allstudentlist',$data);
    }

   
}
