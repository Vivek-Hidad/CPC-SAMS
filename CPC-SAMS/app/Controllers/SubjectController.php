<?php

namespace App\Controllers;
use App\Models\ProgramModel;
use App\Models\FacultyModel;
use App\Models\SubjectModel;
use App\Models\StudentModel;
use App\Models\SemesterModel;

class SubjectController extends BaseController
{
    
        public function subjects()
        {

            $subjectmmodel= new SubjectModel();
            $data['subject']=$subjectmmodel->getSubjectDetails();
            return view('subject-crud/allSubjects',$data);
        }
    
        public function add_subject()
        {
            
            $programmodel= new ProgramModel();
            $data['program']=$programmodel->findAll();
            $semestermodel= new SemesterModel();
            $data['semester']=$semestermodel->findAll();
            return view('subject-crud/addSubject',$data);
        }
    
        public function update_subject($id)
        {
            $subjectmmodel = new Subjectmodel();
            $data['subject']=$subjectmmodel->find($id);
            $programmodel= new ProgramModel();
            $data['program']=$programmodel->findAll();
            $semestermodel= new SemesterModel();
            $data['semester']=$semestermodel->findAll();
            return view('subject-crud/updateSubject',$data);
        }


        public function subject_store()
        {
            
            $rules = [
                'sub_name'=>'required|min_length[5]|max_length[100]|is_unique[subjects.sub_name]',
               
            ];
    
            if($this->validate($rules)){
                    $subjectmmodel = new Subjectmodel();
                    $data = [
                    'sub_name'=>$this->request->getVar('sub_name'),
                    'program_id'=>$this->request->getVar('program_id'),
                    'semester_id'=>$this->request->getVar('semester_id'),
                    'allocated'=>false,
                ];
                $subjectmmodel->save($data);
                
                return redirect()->to(base_url('/subjects'));
            }
            else{
                $data["validation"] = $this->validator;
                $programmodel= new ProgramModel();
                $data['program']=$programmodel->findAll();
                $semestermodel= new SemesterModel();
                $data['semester']=$semestermodel->findAll();
                return view('subject-crud/addSubject',$data);
            }
        }

        public function update_subjectstore($id)
        {
            
            $rules = [
                'sub_name'=>'required|min_length[5]|max_length[100]',
               
            ];
    
            if($this->validate($rules)){
                    $subjectmodel = new Subjectmodel();
                    $subjectmodel->find($id);

                    $data = [
                    'sub_name'=>$this->request->getVar('sub_name'),
                    'program_id'=>$this->request->getVar('program_id'),
                    'semester_id'=>$this->request->getVar('semester_id'),
                   
                ];
                $subjectmodel->update($id,$data);
                
                return redirect()->to(base_url('/subjects'));
            }
            else{
                $data["validation"] = $this->validator;
                $programmodel= new ProgramModel();
                $data['program']=$programmodel->findAll();
                $semestermodel= new SemesterModel();
                $data['semester']=$semestermodel->findAll();
                return view('subject-crud/addSubject',$data);
            }
        }

        public function delete_subject($id)
        {
            $subjectmmodel = new Subjectmodel();
            $data=$subjectmmodel->delete($id);
            return redirect()->to(base_url('/subjects'));
        }
}
