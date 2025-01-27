<?php

namespace App\Models;
use CodeIgniter\Model;


class ProgramModel extends Model{
    
    protected $table = 'programs';
    protected $allowedFields = [
        'id',
        'program_name',
    ];

    public function getNotAllotedPrograms() {
        return $this->select('programs.id AS id, programs.program_name')
            ->where('programs.id NOT IN (SELECT program_id FROM coordinators)', null, false)
            ->findAll();
    }

    public function getProgramwithCoor()  {
        return $this->select('programs.id AS id, programs.program_name,faculties.name AS faculty_name')
                    ->join('coordinators', 'programs.id = coordinators.program_id', 'left')
                    ->join('faculties', 'coordinators.faculty_id = faculties.id ', 'left')
                    ->findAll();
        
    }
}

?>
