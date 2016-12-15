<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;
use App\Assign;
use App\Faculty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('pages.welcome');
    }

    public function assignedStudents()
    {
        if(!(Auth::user()->hasRole('faculty')))
        {
            return redirect()->route('home');
        }
        $userName = Auth::user()->name;
        $faculty = Faculty::where('name', 'LIKE', $userName)->first();
        $students = Student::where('faculty_id', '=', $faculty->id)->paginate(20);
        $sno = 1; 
        return view('facultyUser.assigned')->with('students', $students)->with('sno', $sno);
    }
}
