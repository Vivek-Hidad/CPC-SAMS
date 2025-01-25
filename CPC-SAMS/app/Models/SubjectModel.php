<?php

namespace App\Models;
use CodeIgniter\Model;


class SubjectModel extends Model{
    
    protected $table = 'subjects';
    protected $allowedFields = [
        'id',
        'sub_name',
        'program_id',
        'semester_id',
        'allocated',
       
    ];

    public function getSubjectDetails()
    {
        return $this->select('subjects.id AS id,allocated, sub_name,programs.program_name, semesters.semester')
                    ->join('programs', 'subjects.program_id = programs.id', 'inner')
                    ->join('semesters', 'subjects.semester_id = semesters.id', 'inner')
                    ->findAll();
    }

   

}

?>
