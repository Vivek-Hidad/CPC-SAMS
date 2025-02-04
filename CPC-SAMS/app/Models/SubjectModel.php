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



    public function setAllocateOnFacultyDelete($id)
    {
        return $this->set('allocated',false)
                    ->where('subjects.id IN (SELECT subject_id FROM subjectallocation WHERE faculty_id = ' . (int) $id . ')', null, false)  // Use the $id parameter dynamically
                    ->update();  // Execute the update query

                                
                            
    }


    public function getStudentAttendanceCount(){
        // return $this->select('subjects.id AS sub_id,subjects.sub_name ,topics.batch,(SELECT COUNT(*) FROM topics WHERE subjects.id = topics.subject_id AND topics.batch = attendance.batch)  AS total_lecture')
        //         ->join('topics', 'topics.subject_id = subjects.id ', 'right')
        //         ->join('attendance', 'attendance.topic_id = topics.id ', 'left')
        //         ->groupBy('topics.batch')
        //         ->findAll();
        // return $this->select('subjects.id AS sub_id, subjects.sub_name, 
        //               COALESCE(topics.batch, "No Batch") AS batch, 
        //               (SELECT COUNT(*) FROM topics 
        //                WHERE subjects.id = topics.subject_id 
        //                AND topics.batch = attendance.batch) AS total_lecture')
        //     ->join('topics', 'topics.subject_id = subjects.id', 'left') // Change to 'left' to include subjects without topics
        //     ->join('attendance', 'attendance.topic_id = topics.id', 'left')
        //     ->groupBy('subjects.id, topics.batch')
        //     ->union(
        //         $this->select('subjects.id AS sub_id, subjects.sub_name, NULL AS batch, 0 AS total_lecture')
        //              ->whereNotIn('subjects.id', function ($builder) {
        //                  return $builder->select('subject_id')->from('topics');
        //              })
        //     )
        //     ->findAll();

        // return $this->db->table('subjects')
        //         ->select('subjects.id AS sub_id, subjects.sub_name, 
        //                 COALESCE(topics.batch, "No Batch") AS batch, 
        //                 COUNT(DISTINCT topics.id) AS total_lecture')
        //         ->join('topics', 'topics.subject_id = subjects.id', 'left')
        //         ->join('attendance', 'attendance.topic_id = topics.id', 'left')
        //         ->groupBy('subjects.id, topics.batch')

        //         ->union(
        //             $this->db->table('subjects')
        //                 ->select('subjects.id AS sub_id, subjects.sub_name, NULL AS batch, 0 AS total_lecture')
        //                 ->whereNotIn('subjects.id', function ($builder) {
        //                     return $builder->select('subject_id')->from('topics');
        //                 })
        //         )
        //         ->get()
        //         ->getResultArray();


        // return $this->db->table('subjects')
        //     ->select('subjects.id AS sub_id, subjects.sub_name, 
        //             COALESCE(topics.batch, "No Batch") AS batch, 
        //             COUNT(DISTINCT topics.id) AS total_lecture,  -- Count unique topics (lectures)
        //             COUNT(CASE WHEN attendance.attendance = "Present" THEN attendance.student_id END) AS total_present, 
        //             COUNT(CASE WHEN attendance.attendance = "Absent" THEN attendance.student_id END) AS total_absent')
        //     ->join('topics', 'topics.subject_id = subjects.id', 'left')
        //     ->join('attendance', 'attendance.topic_id = topics.id', 'left')
        //     ->groupBy('subjects.id, topics.batch')

        //     ->union(
        //         $this->db->table('subjects')
        //             ->select('subjects.id AS sub_id, subjects.sub_name, NULL AS batch, 0 AS total_lecture, 0 AS total_present, 0 AS total_absent')
        //             ->whereNotIn('subjects.id', function ($builder) {
        //                 return $builder->select('subject_id')->from('topics');
        //             })
        //     )
        //     ->get()
        //     ->getResultArray();

        }
   

}

?>
