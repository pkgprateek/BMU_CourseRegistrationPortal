<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use DB;
use App\Student;
use Mail;
use App\Mail\EmailVerification;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function getFaculty()
    {
        $faculties = Faculty::orderBy('name', 'asc')->paginate(20);
        return view('pages.fsearch')->with('faculties', $faculties);
    }

    public function deleteFaculty($id)
    {        
        $del = Faculty::where('name', 'LIKE', '%'.$id.'%')->first();
        $user = User::where('name', 'LIKE', $del->name)->first();
        $del->delete();
        $user->delete();
    }

    public function facultyManually(Request $request)
    {
        $faculty = new Faculty;
        $faculty->name = $request->name;
        $faculty->email = $request->email;
        $faculty->contact = $request->contact;
        $faculty->save();

        $this->register($request);

        return redirect('view-faculty')->with('success', 'Faculty succesfully added');
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
            $user->assign('faculty');
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

    public function profileFaculty($id)
    {
        $faculty = Faculty::where('name', 'LIKE', '%'.$id.'%')->first();
        $students = Student::where('faculty_id', '=', $faculty->id)->get();
        $sno = 1;
        return view('facultyUser.profile')->with('faculty', $faculty)->with('students', $students)->with('sno', $sno);
    }
}
