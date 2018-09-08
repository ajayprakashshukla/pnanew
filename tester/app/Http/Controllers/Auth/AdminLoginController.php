<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Common\Common;
class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
      return view('auth.login');
    }
    public function login(Request $request)
    {

/*=========================================================================================*/
      
          $data=$request->input();
          if(empty($data['otp'])){
            $this->validate($request, [
              'email'   => 'required|email',
              'password' => 'required|min:6'
            ]);

           if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'],'role'=>1], $request->remember)) {
                                 
                                  return redirect('admin/dashboard');
                             }


            $data['user_type']='admin';
                       $otp=Common::sendLoginOtp($data);
                       if($otp){
                        $otp= base64_encode ($data['email']).'#1#'.base64_encode($data['password']).'#1#'.base64_encode($otp);
                        return view('admin.login')->with('otp',$otp); 
                       }else{
                         return view('admin.login')->with('error' , 'These credentials do not match our records');

                       }
          }else{

                 if(isset($data['auth_data'])){
                      $auth_data= explode('#1#', $data['auth_data']);
                        $email=base64_decode($auth_data['0']);
                        $password=base64_decode($auth_data['1']);
                       $otp=base64_decode($auth_data['2']);

                      if($otp==$data['otp']){

                            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password,'role'=>1], $request->remember)) {
                                 
                                  return redirect('admin/dashboard');
                                 
                               

                            }elseif (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password,'role'=>2], $request->remember)) {
                            return redirect('admin/app_loans');
                            }
                            else{
                              return view('admin.login')->with('error' , 'These credentials do not match our records');
                         }
                      }else{
                         return view('admin.login')->with('error' , 'These credentials do not match our records');
                      }
                 }
          }
 






    }
}