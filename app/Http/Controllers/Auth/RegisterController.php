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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|email_domain:' . $data['email'] . '|unique:users',
            'password' => 'required|min:6|confirmed',
            'secondary_email' => 'required|email|max:191',
            'mobile_no' => 'required|min:10|max:10',
            'office_extension' => 'required|min:10|max:10',
            'next_of_kin' => 'required|max:191',
            'relationship_with_next_of_kin' => 'required|max:255',
            'next_of_kin_phone_number' => 'required|min:10|max:10',
            'address' => 'required|max:191',
            'city_town' => 'required',
            'country' => 'required',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
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
            'city_town' => $data['city_town'],
            'country' => $data['country'],
            'mobile_no_country' => $data['mobile_no_country'],
            'role' => '3',
        ]);
    }
}
