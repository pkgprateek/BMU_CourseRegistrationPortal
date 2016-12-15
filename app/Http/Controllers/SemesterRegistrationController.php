<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;
use App\Faculty;
use App\User;
use App\Semester;
use App\Subject;
use App\FormRegistration;

class SemesterRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getForm()
    {
    	$user = Auth::user()->email;
    	$student = Student::where('email', '=', $user)->first();
    	$semester = Semester::where('year', '=', $student->batch_year)->where('branch', '=', $student->specialization)->first();
    	$subjects = Subject::where('sem_code', '=', $semester->id)->get();
    	return view('semester.registrationForm')->with('student', $student)->with('semester', $semester)->with('subjects', $subjects);
    }

    public function registerForm(Request $request)
    {
    	$form = new FormRegistration;
    	$form->registration_id  = $request->registration_id;
    	$form->name = $request->name;
    	$form->batch = $request->semYear;
    	$form->branch = $request->semBranch;
    	$form->semester = $request->semName;
    	$form->verify_status = 0;
    	$form->save();

    	return redirect()->route('home');
    }

    public function validateForm()
    {
        $forms = FormRegistration::where('verify_status', '=', 0)->get();
        $sno = 1;
        return view('semester.validatelist')->with('sno', $sno)->with('forms', $forms);
    }

    public function openForm($id)
    {
        $form = FormRegistration::where('registration_id', '=', $id)->first();
        $semester = Semester::where('year', '=', $form->batch)->where('branch', '=', $form->branch)->first();
        $subjects = Subject::where('sem_code', '=', $semester->id)->get();
        return view('facultyUser.form')->with('form', $form)->with('subjects', $subjects);
    }

    public function confirmForm(Request $request, $id)
    {
        $form = FormRegistration::where('registration_id', '=', $id)->first();
        if($request->cgpa >= 4.5 && $request->attendance >= 75 && $request->fees == 'paid')
        {
            $form->verify_status = 1;
            $form->save();
        }

        return redirect()->route('validateForm');
    }

    public function viewStatus()
    {
        $user = Auth::user()->email;
        $student = Student::where('email', '=', $user)->first();
        $form = FormRegistration::where('registration_id', '=', $student->registration_id)->first();
        return view('studentUser.formstatus')->with('form', $form);
    }
}
