<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output="";
            $info = Student::orderBy('name', 'asc');
            if($request->batch != "")
            {
                $info = $info->where('batch_year', 'LIKE', $request->batch);
            }
            if($request->branch != "")
            {
                $info = $info->where('specialization', 'LIKE', $request->branch);
            }
            if($request->search != "")
            {
                $info = $info->where('name', 'LIKE', $request->search.'%')->orWhere('registration_id', 'LIKE', '%'.$request->search.'%');
            }
            $students=$info->paginate(20);
            return response()->json($students);
        }
    }

    public function fsearch(Request $request)
    {
        if ($request->ajax()) {
            $output="";
            $faculties=Faculty::orderBy('name','asc')->where('name', 'LIKE', $request->search.'%')->orWhere('email', 'LIKE', $request->search.'%')->paginate(20);
            return response()->json($faculties); 
        }
    }
}
