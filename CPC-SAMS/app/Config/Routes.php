<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/logout', 'Home::logout');
$routes->match(['get','post'],'/f-login','Home::facultylogin');

$routes->get('/programs', 'ProgramController::program');
$routes->get('/add-program', 'ProgramController::add_program');
$routes->get('/update-program/(:num)', 'ProgramController::update_program/$1');
$routes->get('/delete-program/(:num)', 'ProgramController::delete_program/$1');
$routes->match(['get','post'],'/programstore','ProgramController::program_store');
$routes->match(['get','post'],'/update-programstore/(:num)','ProgramController::update_programstore/$1');


$routes->get('/faculties', 'FacultyController::faculties');
$routes->get('/add-faculty', 'FacultyController::add_faculty');
$routes->get('/update-faculty/(:num)', 'FacultyController::update_faculty/$1');
$routes->match(['get','post'],'/facultystore','FacultyController::faculty_store');
$routes->match(['get','post'],'/update-facultystore/(:num)','FacultyController::update_facultystore/$1');
$routes->get('/delete-faculty/(:num)', 'FacultyController::delete_faculty/$1');


$routes->get('/students', 'StudentController::students');
$routes->get('/add-student', 'StudentController::add_student');
$routes->get('/update-student/(:num)', 'StudentController::update_student/$1');
$routes->match(['get','post'],'/studentstore','StudentController::student_store');
$routes->match(['get','post'],'/update-studentstore/(:num)','StudentController::update_studentstore/$1');
$routes->get('/delete-student/(:num)', 'StudentController::delete_student/$1');


$routes->get('/subjects', 'SubjectController::subjects');
$routes->get('/add-subject', 'SubjectController::add_subject');
$routes->get('/update-subject/(:num)', 'SubjectController::update_subject/$1');
$routes->match(['get','post'],'/subjectstore','SubjectController::subject_store');
$routes->match(['get','post'],'/update-subjectstore/(:num)','SubjectController::update_subjectstore/$1');
$routes->get('/delete-subject/(:num)', 'SubjectController::delete_subject/$1');



$routes->get('/allocatesubjects', 'SubjectallocationController::allocatesubjects');
$routes->get('/allocate-subject', 'SubjectallocationController::allocate_subject');
$routes->get('/update-allocatesubject/(:num)', 'SubjectallocationController::update_allocatesubject/$1');
$routes->match(['get','post'],'/allocatesubjectstore','SubjectallocationController::allocatesubject_store');
$routes->match(['get','post'],'/update-allocatesubjectstore/(:num)','SubjectallocationController::update_allocatesubjectstore/$1');
$routes->get('/delete-allocatesubject/(:num)', 'SubjectallocationController::delete_allocatesubject/$1');


$routes->get('/allsubjects', 'AttendanceController::allsubjects');
$routes->get('/suballstudents/(:num)/(:num)/(:num)', 'AttendanceController::allstudents/$1/$2/$3/$4');



$routes->get('/coordinators', 'CoordinatorController::allcoordinators');
$routes->get('/add-coordinator', 'CoordinatorController::add_coordinator');
$routes->match(['get','post'],'/coordinatorstore','CoordinatorController::coordinatorstore');
$routes->get('/delete-coordinator/(:num)', 'CoordinatorController::delete_coordinator/$1');
$routes->get('/update-coordinator/(:num)', 'CoordinatorController::update_coordinator/$1');
$routes->match(['get','post'],'/update-coordinatorstore/(:num)','CoordinatorController::update_coordinatorstore/$1');


