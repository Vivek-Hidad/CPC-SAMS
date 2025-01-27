<?php

namespace App\Controllers;
use App\Models\ProgramModel;
use App\Models\FacultyModel;
use App\Models\SubjectModel;
use App\Models\SubjectallocationModel;
use App\Models\StudentModel;
use App\Models\SemesterModel;
use App\Models\CoordinatorModel;

class CoordinatorController extends BaseController
{
    
        public function allcoordinators()
        {

            $coordinatormodel= new CoordinatorModel();
            $data['coordinator']=$coordinatormodel->getAllCoordinatorDetails();
            return view('coordinator-crud/allcoordinator',$data);
        }

        public function add_coordinator()
        {

            $facultyModel= new FacultyModel();
            $data['faculty']=$facultyModel->where('coordinator', true)->findAll();
            $programmodel= new ProgramModel();
            $data['program']=$programmodel->getNotAllotedPrograms();
         return view('coordinator-crud/addcoordinator',$data);
        }
    
        public function coordinatorstore()
        {
            
            $rules = [
                'faculty_id'=>'required',
               'program_id'=>'required',
              
            ];
    
           
            if($this->validate($rules)){
                    $coordinatormodel = new CoordinatorModel();
                   
                    $data = [
                        'faculty_id'=>$this->request->getVar('faculty_id'),
                        'program_id'=>$this->request->getVar('program_id'),
                       
                    ];
                  
                    $coordinatormodel->save($data);

                   
                    return redirect()->to(base_url('/coordinators'));
            }
            else{
                $data["validation"] = $this->validator;
                return view('coordinator-crud/addcoordinator',$data);
            }
        }


        public function delete_coordinator($id)
        {
            $coordinatormodel= new CoordinatorModel();
            $coordinatormodel->delete($id);

            

            return redirect()->to(base_url('/coordinators'));
        }

       
        public function  update_coordinator($id)
        {
            $coordinatormodel= new CoordinatorModel();
            $data['coordinator']=$coordinatormodel->find($id);

            $facultyModel= new FacultyModel();
            $data['faculty']=$facultyModel->where('coordinator', true)->findAll();
            $programmodel= new ProgramModel();
            $data['program']=$programmodel->getNotAllotedPrograms();

            $data['coordinator_program']=$programmodel->find($data['coordinator']['program_id']);
            
            return view('coordinator-crud/updatecoordinator',$data);
        }

        public function  update_coordinatorstore($id)
        {
            $rules = [
                'faculty_id'=>'required',
               'program_id'=>'required',
              
            ];
    
           
            if($this->validate($rules)){
                    $coordinatormodel = new CoordinatorModel();
                    $coordinatormodel->find($id);
                    $data = [
                        'faculty_id'=>$this->request->getVar('faculty_id'),
                        'program_id'=>$this->request->getVar('program_id'),
                       
                    ];
                  
                    $coordinatormodel->update($id,$data);

                   
                    return redirect()->to(base_url('/coordinators'));
            }
            else{
                $data["validation"] = $this->validator;
                return view('coordinator-crud/updatecoordinator',$data);
            }
           
        }
       
}
