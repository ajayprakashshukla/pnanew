<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {





print_r($data);

      if(!empty($data['id'])):

         return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
                'secondary_email' => 'required|email|max:191',
                'mobile_no' => 'required|min:11|max:11',
                'office_extension' => 'required|max:5',
                'next_of_kin' => 'required|max:191',
                'relationship_with_next_of_kin' => 'required|max:255',
                'next_of_kin_phone_number' => 'required|max:11',
                'address' => 'required|max:191',
                'state' => 'required',
                'country' => 'required',
                'lastname' => 'required',
                'sharp_id' => 'required|unique:users',
                'proposed_monthly_income' => 'required',


            ]);
      else:
           return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|email_domain:' . $data['email'] . '|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'secondary_email' => 'required|email|max:191',
                    'mobile_no' => 'required|min:10|max:11',
                    'office_extension' => 'required|max:5',
                    'next_of_kin' => 'required|max:191',
                    'relationship_with_next_of_kin' => 'required|max:255',
                    'next_of_kin_phone_number' => 'required|max:11',
                    'address' => 'required|max:191',
                    'state' => 'required',
                    'country' => 'required',
                    'lastname' => 'required',
                    'identity_proof' => 'required',
                    'sharp_id' => 'required|unique:users',
                    'proposed_monthly_income' => 'required',
                ]);
      endif;

     print_r($data);
die();
exit();
    }
    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
print_r($data);
    $filesArray=array();
    $files=isset($data['identity_proof'])?$data['identity_proof']:NULL;
        if(isset($files) && (count($files)>0))
          foreach ($files as $key => $file) {
            $filetitle= isset($data['file_name'][$key])?$data['file_name'][$key]:$file->getClientOriginalName();
            $fileName = rand(5,15).time().'.'.$file->getClientOriginalExtension();
               $path=$file->move(public_path('upload'), $fileName);
               $filesArray[]=array('title'=>$filetitle,'name'=>$fileName);
            }

     if(!empty($data['id'])):
                        return User::where('id',$data['id'])
                             ->update([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                            'secondary_email' => $data['secondary_email'],
                            'mobile_no' => $data['mobile_no'],
                            'office_extension' => $data['office_extension'],
                            'next_of_kin' => $data['next_of_kin'],
                            'relationship_with_next_of_kin' => $data['relationship_with_next_of_kin'],
                            'next_of_kin_phone_number' => $data['next_of_kin_phone_number'],
                            'address' => $data['address'],
                            'state' => $data['state'],
                            'country' => $data['country'],
                            'lastname' => $data['lastname'],
                            'middle_name' => $data['middle_name'],
                            'sharp_id' => $data['sharp_id'],
                            'proposed_monthly_income' => $data['proposed_monthly_income'],
                            'role' => '3',
                           
                        ]);
          

      else:
          return User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                            'secondary_email' => $data['secondary_email'],
                            'mobile_no' => $data['mobile_no'],
                            'office_extension' => $data['office_extension'],
                            'next_of_kin' => $data['next_of_kin'],
                            'relationship_with_next_of_kin' => $data['relationship_with_next_of_kin'],
                            'next_of_kin_phone_number' => $data['next_of_kin_phone_number'],
                            'address' => $data['address'],
                            'state' => $data['state'],
                            'country' => $data['country'],

                            'lastname' => $data['lastname'],
                            'middle_name' => $data['middle_name'],
                            'role' => '3',
                            'sharp_id' => $data['sharp_id'],
                            'proposed_monthly_income' => $data['proposed_monthly_income'],
                            'identity_proof' => json_encode($filesArray),
                        ]);
     endif;


    }
}
