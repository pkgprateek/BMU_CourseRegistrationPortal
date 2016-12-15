<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/********Faculty*********/
Route::get('add-faculty', ['as' => 'add-faculty', 'uses' => 'ExcelController@importExport']);
Route::get('view-faculty', ['as' => 'view-faculty', 'uses' => 'FacultyController@getFaculty']);
Route::get('view-faculty/fsearch', 'SearchController@fsearch');
Route::get('deleteFaculty/{id}', ['as' => 'deleteFaculty', 'uses' => 'FacultyController@deletefaculty']);
Route::get('assignFaculty', ['as' => 'getAssign', 'uses' => 'AssignFacultyStudentController@getAssign']);
Route::post('assignFaculty', ['as' => 'assignFaculty', 'uses' => 'AssignFacultyStudentController@assignFaculty']);
Route::post('facultyManually',['as' => 'facultyManually', 'uses' => 'FacultyController@facultyManually']);

/********Students********/
Route::get('add-students', ['as' => 'add-students', 'uses' => 'ExcelController@importExport']);
Route::get('view-students', ['as' => 'view-students', 'uses' => 'StudentController@getStudents']);
Route::get('view-students/search', 'SearchController@search');
Route::get('deleteStudents/{id}', ['as' => 'deleteStudents', 'uses' => 'StudentController@deleteStudents']);
Route::post('studentManually',['as' => 'studentManually', 'uses' => 'StudentController@studentManually']);

Route::post('importExcel', 'ExcelController@importExcel');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::get('createSemester', ['as' => 'createSemester', 'uses' => 'SemesterController@index']);
Route::post('createSemester', ['as' => 'storeSemester', 'uses' => 'SemesterController@storeSemester']);
Route::get('viewSemester', ['as' => 'viewSemester', 'uses' => 'SemesterController@viewSemester']);
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@dashboard']);

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 
Route::get('semesterEdit/{id}', ['as' => 'semesterEdit', 'uses' => 'SemesterController@editSemester']);
Route::get('updateSemester/{id}', ['as' => 'updateSemester', 'uses' => 'SemesterController@updateSemester']);
Route::get('deleteSemester/{id}', ['as' => 'deleteSemester', 'uses' => 'SemesterController@deleteSemester']);
Route::get('assignedStudents', ['as' => 'assignedStudents', 'uses' => 'HomeController@assignedStudents']);
Route::get('profileStudent/{id}', ['as' => 'profileStudent', 'uses' => 'StudentController@profileStudent']);
Route::get('profileFaculty/{id}', ['as' => 'profileFaculty', 'uses' => 'FacultyController@profileFaculty']);

Route::get('semesterRegistration', ['as' => 'semesterRegistration', 'uses' => 'SemesterRegistrationController@getForm']);
Route::post('semesterRegistration', ['as' => 'semesterRegistration', 'uses' => 'SemesterRegistrationController@registerForm']);
Route::get('validateForm', ['as' => 'validateForm', 'uses' => 'SemesterRegistrationController@validateForm']);
Route::get('validateForm/{id}', ['as' => 'openForm', 'uses' => 'SemesterRegistrationController@openForm']);
Route::get('confirmForm/{id}', ['as' => 'confirmForm', 'uses' => 'SemesterRegistrationController@confirmForm']);
Route::get('viewStatus', ['as' => 'viewStatus', 'uses' => 'SemesterRegistrationController@viewStatus']);