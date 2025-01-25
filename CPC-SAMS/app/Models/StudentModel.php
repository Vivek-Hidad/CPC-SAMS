<?php

namespace App\Models;
use CodeIgniter\Model;


class StudentModel extends Model{
    
    protected $table = 'students';
    protected $allowedFields = [
        'id',
        'enroll_no',
        'stud_name',
        'program_id',
        'semester_id',
       
    ];

    public function getStudentsDetails()
    {
        return $this->select('students.id AS id,enroll_no, stud_name,programs.program_name, semesters.semester')
                    ->join('programs', 'students.program_id = programs.id', 'inner')
                    ->join('semesters', 'students.semester_id = semesters.id', 'inner')
                    ->findAll();
    }

}

?>
