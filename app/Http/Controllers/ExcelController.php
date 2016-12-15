<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;

use Input;
use App\Student;
use App\Faculty;
use Excel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Role;
use DB;
use App\User;
use Mail;
use App\Mail\EmailVerification;

class ExcelController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function importExport()
    {
        return view('pages.importExport');
    }
    
    public function downloadExcel($type)
	{
		$data = Student::get()->toArray();
		return Excel::create('', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
    
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(URL::previous() == URL::to('/add-faculty')){
						if(!empty($value)){
							$insert[] = [
										'name' => $value['name'], 
										'email' => $value['email'],
										'contact' => $value['contact']
										];	
							$this->register($value);	
						}			
					}
					else if(URL::previous() == URL::to('/add-students')){
						if(!empty($value['registration'])){
							$insert[] = [
										'registration_id' => $value['registration'],
										'name' => $value['name'],
										'email' => $value['email'],
										'batch_year' => $value['batch'],
										'specialization' => $value['specialization'],
										'contact' => $value['contact']
										];
							$this->register($value);	
						}

					}
				}
								
				if(!empty($insert)){				
					if(URL::previous() == URL::to('/add-faculty')){
						Faculty::insert($insert);
					}
					else if(URL::previous() == URL::to('/add-students')){
						Student::insert($insert);
					}
					return back()->with('success','Insert Record successfully.');
				}
			}
		}
		return back()->with('error','Please Check your file, Something is wrong there.');
	}

	protected function create($data)
    {
    	// dd($data['name']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(explode(' ', $data['name'], 10)[0].'123crp'),
            'email_token' => str_random(64),
        ]);
    }

    public function register($request)
    {
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            $user = $this->create($request);
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token]));
            Mail::to($user->email)->send($email);
            if(URL::previous() == URL::to('/add-faculty')){
            	$user->assign('faculty');
            }
            else if(URL::previous() == URL::to('/add-students')) {
            	$user->assign('student');
            }
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }
}
