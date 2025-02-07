<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/logout', 'Home::logout');
$routes->match(['get', 'post'], '/f-login', 'Home::facultylogin');

// $routes->get('/programs', 'ProgramController::program');
// $routes->get('/add-program', 'ProgramController::add_program');
// $routes->get('/update-program/(:num)', 'ProgramController::update_program/$1');
// $routes->get('/delete-program/(:num)', 'ProgramController::delete_program/$1');
// $routes->match(['get', 'post'], '/programstore', 'ProgramController::program_store');
// $routes->match(['get', 'post'], '/update-programstore/(:num)', 'ProgramController::update_programstore/$1');

# new program 
$routes->get('programs', 'ProgramController::index');
$routes->get('programs/add', 'ProgramController::add');
$routes->post('programs/store', 'ProgramController::store');
$routes->get('programs/edit/(:num)', 'ProgramController::edit/$1');
$routes->post('programs/update/(:num)', 'ProgramController::update/$1');
$routes->get('programs/delete/(:num)', 'ProgramController::delete/$1');




$routes->get('/faculties', 'FacultyController::faculties');
$routes->get('/add-faculty', 'FacultyController::add_faculty');
$routes->get('/update-faculty/(:num)', 'FacultyController::update_faculty/$1');
$routes->match(['get', 'post'], '/facultystore', 'FacultyController::faculty_store');
$routes->match(['get', 'post'], '/update-facultystore/(:num)', 'FacultyController::update_facultystore/$1');
$routes->get('/delete-faculty/(:num)', 'FacultyController::delete_faculty/$1');


$routes->get('/students', 'StudentController::students');
$routes->get('/add-student', 'StudentController::add_student');
$routes->get('/update-student/(:num)', 'StudentController::update_student/$1');
$routes->match(['get', 'post'], '/studentstore', 'StudentController::student_store');
$routes->match(['get', 'post'], '/update-studentstore/(:num)', 'StudentController::update_studentstore/$1');
$routes->get('/delete-student/(:num)', 'StudentController::delete_student/$1');


$routes->get('/subjects', 'SubjectController::subjects');
$routes->get('/add-subject', 'SubjectController::add_subject');
$routes->get('/update-subject/(:num)', 'SubjectController::update_subject/$1');
$routes->match(['get', 'post'], '/subjectstore', 'SubjectController::subject_store');
$routes->match(['get', 'post'], '/update-subjectstore/(:num)', 'SubjectController::update_subjectstore/$1');
$routes->get('/delete-subject/(:num)', 'SubjectController::delete_subject/$1');



$routes->get('/allocatesubjects', 'SubjectallocationController::allocatesubjects');
$routes->get('/allocate-subject', 'SubjectallocationController::allocate_subject');
$routes->get('/update-allocatesubject/(:num)', 'SubjectallocationController::update_allocatesubject/$1');
$routes->match(['get', 'post'], '/allocatesubjectstore', 'SubjectallocationController::allocatesubject_store');
$routes->match(['get', 'post'], '/update-allocatesubjectstore/(:num)', 'SubjectallocationController::update_allocatesubjectstore/$1');
$routes->get('/delete-allocatesubject/(:num)', 'SubjectallocationController::delete_allocatesubject/$1');


$routes->get('/allsubjects', 'AttendanceController::allsubjects');
$routes->get('/alltopics/(:num)/(:num)/(:num)', 'AttendanceController::alltopics/$1/$2/$3/$4');
$routes->get('/delete-topic/(:num)/(:num)/(:num)/(:num)', 'AttendanceController::delete_topic/$1/$2/$3/$4/$5');
$routes->match(['get', 'post'], '/topicstore/(:num)/(:num)/(:num)', 'AttendanceController::topic_store/$1/$2/$3/$4');
$routes->get('/attendance/(:num)/(:num)/(:num)/(:num)/(:num)', 'AttendanceController::allstudents/$1/$2/$3/$4/$5');
$routes->match(['get', 'post'], '/attendancestore/(:num)/(:num)/(:num)/(:num)/(:num)', 'AttendanceController::attendance_store/$1/$2/$3/$4/$5');



$routes->get('/coordinators', 'CoordinatorController::allcoordinators');
$routes->get('/add-coordinator', 'CoordinatorController::add_coordinator');
$routes->match(['get', 'post'], '/coordinatorstore', 'CoordinatorController::coordinatorstore');
$routes->get('/delete-coordinator/(:num)', 'CoordinatorController::delete_coordinator/$1');
$routes->get('/update-coordinator/(:num)', 'CoordinatorController::update_coordinator/$1');
$routes->match(['get', 'post'], '/update-coordinatorstore/(:num)', 'CoordinatorController::update_coordinatorstore/$1');




$routes->get('/timeslots', 'TimeslotController::timeslots');
$routes->get('/add-timeslot', 'TimeslotController::add_timeslot');
$routes->match(['get', 'post'], '/timeslotstore', 'TimeslotController::timeslot_store');
$routes->get('/delete-timeslot/(:num)', 'TimeslotController::delete_timeslot/$1');
$routes->get('/update-timeslot/(:num)', 'TimeslotController::update_timeslot/$1');
$routes->match(['get', 'post'], '/update-timeslotstore/(:num)', 'TimeslotController::update_timeslotstore/$1');



$routes->get('colleges', 'CollegeController::index');
$routes->get('colleges/add', 'CollegeController::add');
$routes->post('colleges/store', 'CollegeController::store');
$routes->get('colleges/edit/(:num)', 'CollegeController::edit/$1');
$routes->post('colleges/update/(:num)', 'CollegeController::update/$1');
$routes->get('colleges/delete/(:num)', 'CollegeController::delete/$1');
