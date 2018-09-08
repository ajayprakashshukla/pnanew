<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Common\Common;

class OtpController extends Controller
{
    

    public function __construct()
    {    $this->middleware('auth:admin');
    }
   
    function send_otp_user_verification(Request $request){
               $return='';
               $user = Auth::user();
               $otp= mt_rand(100000, 999999);
               $mobile_no= ($user->mobile_no_country).($user->mobile_no);
               $message='Dear '.$user->name.', Your Procoop OTP to approve or reject user registration is : '.$otp;     
                $smsreturn=Common::SendSms(['sms_message'=>$message,'recipients[]'=>$mobile_no]);
                 $smsreturn = json_decode($smsreturn);
                             if(isset($smsreturn->STATUS) && ($smsreturn->STATUS)=='SUCCESS'){
                              $return=$otp;
                             }
             echo   base64_encode($return);                   
    }

    function approve_user_reg(Request $request){
            $user = Auth::user();
            $data=$request->input();
            $return='';
          
            if(trim(base64_decode($data['potp']))==trim($data['otp'])){
              $update= User::where('id',$data['user_id'])
                  ->update([
                              'status'=>$data['status'],
                              'approved_by'=>$user->id,
                    ]);
              echo "User status is successfully changed";  
              $this->emailToUserOnStatusChange($data['user_id'], $data['status']);

            }else{
              echo "Somthing went wrong";    

            }
           
    }

    function emailToUserOnStatusChange($id, $status){
        $user= User::where('id',$id)->first();
        $subject="Procoop Registration";
        $msg='';
        if($status){
              $msg= '<h4>Dear '.$user->name.',<h4>';
              $msg= $msg.' Your Account is apporoved by Procoop Admin, now you can access your account';
              $msg=$msg.'<br><br><h4>Thanks</h4>';
        }else{
              $msg= '<h4>Dear '.$user->name.',<h4>';
              $msg= $msg.' Your Account is not apporoved by Procoop Admin, due to some factors , please contact Procoop adminstration';
              $msg=$msg.'<br><br><h4>Thanks</h4>';

        }
        Common::sendMail(['message'=>$msg,'subject'=>$subject,'recipients[]'=>$user->email]);
    }




}
