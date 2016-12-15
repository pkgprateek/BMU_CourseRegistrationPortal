<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Subject;

class SemesterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
    	return view('pages.semester');
    }

    public function storeSemester(Request $request)
    {
        $cores = $request->coreCode;
        $electives = $request->electiveCode;
        $semester = new Semester;
        $semester->year = $request->semYear;
        $semester->number = $request->semName;
        $semester->branch = $request->semBranch;
        $semester->save();
        if($cores != null)
        {
            $cores = count($cores);
            for ($i=0; $i < $cores; $i++) { 
                $subject = new Subject;
                $subject->code = $request->coreCode[$i];
                $subject->name = $request->coreName[$i];
                if ($request->coretc[$i] == '') 
                {
                    $subject->tc = 0;
                }
                else {
                    $subject->tc = $request->coretc[$i];
                }
                if ($request->corepc[$i] == '') 
                {
                    $subject->pc = 0;
                }
                else 
                {
                    $subject->pc = $request->corepc[$i];
                }
                $subject->type = "Core";
                $subject->sem_code = $semester->id;
                $subject->save();
            }
        }
        if($electives != null)
        {
            $electives = count($electives);
            for ($i=0; $i < $electives; $i++) { 
                $subject = new Subject;
                $subject->code = $request->electiveCode[$i];
                $subject->name = $request->electiveName[$i];
                if ($request->electivetc[$i] == '') 
                {
                    $subject->tc = 0;
                }
                else {
                    $subject->tc = $request->electivetc[$i];
                }
                if ($request->electivepc[$i] == '') 
                {
                    $subject->pc = 0;
                }
                else 
                {
                    $subject->pc = $request->electivepc[$i];
                }
                $subject->type = "Elective";
                $subject->sem_code = $semester->id;
                $subject->save();
            }
        }
        return redirect()->route('viewSemester');
    }

    public function viewSemester()
    {
        $semesters = Semester::all();
        $sno = 1;
        return view('semester.viewsem')->with('semesters', $semesters)->with('sno', $sno);
    }

    public function editSemester($id)
    {
        $semester = Semester::where('id', '=', $id)->first();
        $subjects = Subject::where('sem_code', '=', $id)->get();
        return view('semester.editsem')->with('semester', $semester)->with('subjects', $subjects);
    }

    public function updateSemester(Request $request, $id)
    {   
        $cores = count($request->coreCode);
        $electives = count($request->electiveCode);
        $semester = Semester::where('id', '=', $id)->first();
        $semester->year = $request->input('year');
        $semester->number = $request->input('name');
        $semester->branch = $request->input('branch');
        $semester->save();

        Subject::where('sem_code', '=', $id)->delete();
        if($cores != 0)
        {
            for ($i=0; $i < $cores; $i++) { 
                $subject = new Subject;
                $subject->code = $request->input('coreCode')[$i];
                $subject->name = $request->input('coreName')[$i];
                if ($request->input('coretc')[$i] == '') 
                {
                    $subject->tc = 0;
                }
                else {
                    $subject->tc = $request->input('coretc')[$i];
                }
                if ($request->input('corepc')[$i] == '') 
                {
                    $subject->pc = 0;
                }
                else 
                {
                    $subject->pc = $request->input('corepc')[$i];
                }
                $subject->type = "Core";
                $subject->sem_code = $semester->id;
                $subject->save();
            }
        }
        if($electives != 0)
        {
            for ($i=0; $i < $electives; $i++) { 
                $subject = new Subject;
                $subject->code = $request->input('electiveCode')[$i];
                $subject->name = $request->input('electiveName')[$i];
                if ($request->input('electivetc')[$i] == '') 
                {
                    $subject->tc = 0;
                }
                else {
                    $subject->tc = $request->input('electivetc')[$i];
                }
                if ($request->input('electivepc')[$i] == '') 
                {
                    $subject->pc = 0;
                }
                else 
                {
                    $subject->pc = $request->input('electivepc')[$i];
                }
                $subject->type = "Elective";
                $subject->sem_code = $semester->id;
                $subject->save();
            }
        }

        return redirect()->route('viewSemester');
    }

    public function deleteSemester($id)
    {
        dd("adwad");
    }
}
