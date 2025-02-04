<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\ProgramModel;
use App\Models\FacultyModel;
use App\Models\SubjectModel;
use App\Models\SemesterModel;

class StudentController extends BaseController
{
    public function students()
      {
          $studentmodel= new Studentmodel();
            $data['student']=$studentmodel->getStudentsDetails();
          return view('student-crud/allStudent',$data);
      }
  
      public function add_student()
      {
        $programmodel= new ProgramModel();
        $data['program']=$programmodel->findAll();
        $semestermodel= new SemesterModel();
        $data['semester']=$semestermodel->findAll();
        return view('student-crud/addStudent',$data);
      }
  
      public function update_student($id)
      {
        $studentmodel = new Studentmodel();
        $data['student']=$studentmodel->find($id);
        $programmodel= new ProgramModel();
        $data['program']=$programmodel->findAll();
        $semestermodel= new SemesterModel();
        $data['semester']=$semestermodel->findAll();
        return view('student-crud/updateStudent',$data);
      }


      public function delete_student($id)
      {
          $studentmodel = new Studentmodel();
          $data=$studentmodel->delete($id);
          return redirect()->to(base_url('/students'));
      }

      public function student_store()
      {
         
            $rules = [
              'enroll_no'=>'required|numeric|min_length[2]|max_length[100]|is_unique[students.enroll_no]',
              'stud_name'=>'required|min_length[2]|max_length[100]',
            
          ];

          if($this->validate($rules)){
                  $studentmodel = new Studentmodel();
                  $data = [
                  'stud_name'=>$this->request->getVar('stud_name'),
                  'enroll_no'=>$this->request->getVar('enroll_no'),
                  'program_id'=>$this->request->getVar('program_id'),
                  'semester_id'=>$this->request->getVar('semester_id'),
                  'batch'=>$this->request->getVar('batch'),
              ];
              $studentmodel->save($data);
              
              return redirect()->to(base_url('/students'));
          }
          else{
              $data["validation"] = $this->validator;
              $programmodel= new ProgramModel();
              $data['program']=$programmodel->findAll();
              $semestermodel= new SemesterModel();
              $data['semester']=$semestermodel->findAll();
              return view('student-crud/addStudent',$data);
          }
      }


      public function update_studentstore($id)
      {
         
            $rules = [
              'enroll_no'=>'required|min_length[2]|max_length[100]',
              'stud_name'=>'required|min_length[2]|max_length[100]',
            
          ];

         
          $programmodel= new ProgramModel();
          $data['program']=$programmodel->findAll();
          $semestermodel= new SemesterModel();
          $data['semester']=$semestermodel->findAll();

          $data['student']=[
                'id'=>$id,
                'stud_name'=>$this->request->getVar('stud_name'),
              'enroll_no'=>$this->request->getVar('enroll_no'),
              'program_id'=>$this->request->getVar('program_id'),
              'semester_id'=>$this->request->getVar('semester_id'),
              'batch'=>$this->request->getVar('batch'),

            ];

          if($this->validate($rules)){
                  $studentmodel = new Studentmodel();
                  $studentmodel->find($id);
                  $studentdata = [
                  'stud_name'=>$this->request->getVar('stud_name'),
                  'enroll_no'=>$this->request->getVar('enroll_no'),
                  'program_id'=>$this->request->getVar('program_id'),
                  'semester_id'=>$this->request->getVar('semester_id'),
                  'batch'=>$this->request->getVar('batch'),

                  ];

                
                 try{

                      $studentmodel->update($id,$studentdata);
                      return redirect()->to(base_url('/students'));
            
                  }catch(\Exception $e){
                    
                
                    
                      $data["validationdup"] = "User Already exists";
                      
                      return view('student-crud/updateStudent',$data);
                  }
             
              
              
          }
          else{
            $data["validation"] = $this->validator;
              return view('student-crud/updateStudent',$data);
          }
      }

      
    
}
