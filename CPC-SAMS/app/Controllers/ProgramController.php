<?php

namespace App\Controllers;
use App\Models\ProgramModel;
use App\Models\SubjectModel;


class ProgramController extends BaseController
{
   

    //  Programssss Crud
    // -----------------------------------------------------------------------------------
    public function program()
    {
        $programmodel= new ProgramModel();
        // $data['program']=$programmodel->findAll();
        $data['program']=$programmodel->getProgramwithCoor();

        return view('program-crud/allProgram',$data);
        
    }

    public function add_program()
    {
        return view('program-crud/addProgram');
    }


    public function delete_program($id)
    {
        $subjectmmodel = new Subjectmodel();
        $data=$subjectmmodel->where('program_id',$id)->delete();
        $programmodel = new Programmodel();
        $data=$programmodel->delete($id);
        return redirect()->to(base_url('/programs'));
    }

    public function update_program($id)
    {
        $programmodel = new Programmodel();
        $data['program']=$programmodel->find($id);
        return view('program-crud/updateProgram',$data);
    }


    public function program_store()
    {
        
        $rules = [
            'program_name'=>'required|min_length[5]|max_length[100]|is_unique[programs.program_name]',
           
        ];

        if($this->validate($rules)){
                $programmodel = new ProgramModel();
                $data = [
                'program_name'=>$this->request->getVar('program_name'),
                
            ];
            $programmodel->save($data);
            
            return redirect()->to(base_url('/programs'));
        }
        else{
            $data["validation"] = $this->validator;
            return view('program-crud/addProgram',$data);
        }
    }

    public function update_programstore($id)
    {
        
        $rules = [
            'program_name'=>'required|min_length[5]|max_length[100]',
           
        ];

        $data['program']=[
            'id'=>$id,
            'program_name'=>$this->request->getVar('program_name')
        ];
        if($this->validate($rules)){
                $programmodel = new ProgramModel();
                $programmodel->find($id);

                $data = [
                'program_name'=>$this->request->getVar('program_name'),
                
                 ];
                
                try{

                    $programmodel->update($id,$data);
                    return redirect()->to(base_url('/programs'));
          
                }catch(\Exception $e){
                  
              
                  
                    $data["validationdup"] = "Already exists";
                    return view('program-crud/updateProgram',$data);
                }
        }
        else{
            $data["validation"] = $this->validator;
            return view('program-crud/updateProgram',$data);
        }
    }

}
