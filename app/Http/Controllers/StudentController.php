<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use DB;
use Mail;
use App\Mail\EmailVerification;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getStudents()
    {
        $students = Student::orderBy('name', 'asc')->paginate(20);
        return view('pages.search')->with('students', $students);
    }

    public function studentManually(Request $request)
    {
    	$this->validate($request, array(
            'registration_id' => 'required|max:8',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'batch_year' => 'required|',
            'specialization' => 'required',
            'contact' => 'required|max:10'
        ));

        $students = new Student;
        $students->registration_id = $request->registration_id;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->batch_year = $request->batch_year;
        $students->specialization  = $request->specialization;
        $students->contact = $request->contact;
        $students->save();

        $this->register($request);

        return redirect('/view-students')->with('success', 'Student succesfully inserted.');
    }

    public function deleteStudents($id)
    {
        $del = Student::where('registration_id', '=', $id)->first();
        $user = User::where('name', 'LIKE', $del->name)->first();
        $del->delete();
        $user->delete();
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(explode(' ', $data['name'], 10)[0].'123crp'),
            'email_token' => str_random(64),
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }
        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());
            $user->assign('student');
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token]));
            Mail::to($user->email)->send($email);
            DB::commit();
            return redirect()->route('login');
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    public function profileStudent($id)
    {
        $student = Student::where('registration_id', '=', $id)->first();
        if($student->faculty_id != null)
        {
            $faculty = Faculty::where('id', '=', $student->faculty_id)->first();
            return view('studentUser.profile')->with('student', $student)->with('faculty', $faculty);
        }
        else
        {
            return view('studentUser.profile')->with('student', $student);
        }
    }
}
