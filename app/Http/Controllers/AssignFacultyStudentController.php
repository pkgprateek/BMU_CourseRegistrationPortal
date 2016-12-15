<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;

class AssignFacultyStudentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function getAssign()
    {
        $faculties = Faculty::orderBy('name', 'asc')->get();
        return view('pages.assign')->with('faculties', $faculties);
    }

    public function assignFaculty(Request $request)
    {
        if($request->ajax())
        {
            $student = Student::where('registration_id', '=', $request->stu)->first();
            $faculty = Faculty::where('name', 'LIKE', $request->fac.'%')->first();
            $student->faculty_id = $faculty->id;
            $student->save();
            return response()->json();          
        }    	
    }
}
