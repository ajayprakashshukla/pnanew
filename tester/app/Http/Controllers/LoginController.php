<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Reg_review;
 use App\Document;
use Illuminate\Support\Facades\Validator;
use App\Common\Common;

class LoginController extends Controller
{
    

    public function __construct()
    {    
    }
   
    function adminlogin(Request $request){
  

    
          $data= $request->input();
       


if(count($data)>0){

          if(empty($data['otp'])){
      
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

                            if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 1])) { 
                                 return redirect('/dashboard');
                            }elseif(Auth::attempt(['email' => $email, 'password' => $password, 'role' => 2])){
                             return redirect('/dashboard');
                            }
                            else{
                              return view('admin.login')->with('error' , 'These credentials do not match our records');
                         }
                      }else{
                        print_r($data);

                         return view('admin.login')->with('error' , 'These credentials do not match our records');
                      }
                 }
          }

         }else{
           return view('admin.login');

         } 
 }


 function userlogin(Request $request){
    


          $data= $request->input();
if(count($data)):
if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) { 
                                 return redirect('/dashboard');}

endif;
    if(empty($data['otp'])){
                 $otp=Common::sendLoginOtp($data);
                 if($otp){
                  $otp= base64_encode ($data['email']).'#1#'.base64_encode($data['password']).'#1#'.base64_encode($otp);
                  return view('auth.login')->with('otp',$otp); 
                 }else{
                   return view('auth.login')->with('error' , 'These credentials do not match our records');

                 }
    }else{

           if(isset($data['auth_data'])){
                $auth_data= explode('#1#', $data['auth_data']);
                 $email=base64_decode($auth_data['0']);
                 $password=base64_decode($auth_data['1']);
                 $otp=base64_decode($auth_data['2']);
                if($otp==$data['otp']){
                      if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 3])) { 
                           return redirect('/dashboard');
                      }else{
                         return view('auth.login')->with('error' , 'These credentials do not match our records');
                   }
                }else{
                   return view('auth.login')->with('error' , 'These credentials do not match our records');
                }
           }
    }
 }


function preview(Request $request){
 $data=$request->input();
 $this->validate($request, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|email_domain:' . $data['email'] . '|unique:users|unique:reg_reviews',
                    'sharp_id' => 'required|unique:users',
                    'mobile_no' => 'required|min:10|max:11|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'secondary_email' => 'required|email|max:191',
                    'office_extension' => 'required|max:5',
                    'next_of_kin' => 'required|max:191',
                    'relationship_with_next_of_kin' => 'required|max:255',
                    'next_of_kin_phone_number' => 'required|max:11',
                    'address' => 'required|max:191',
                    'state' => 'required',
                    'country' => 'required',
                    'lastname' => 'required',
                    'identity_proof' => 'required',
                    'proposed_monthly_income' => 'required',
                ]);



   $filesArray=array();
   $files=isset($request->identity_proof)?$request->identity_proof:NULL;
   if(isset($files) && (count($files)>0)){
   $data['identity_proof']=Common::upload('review',$files,'payslip');
   }
$insert_id='';
  if(isset($data)){
    $Reg_review=  Reg_review::where('mobile_no',$data['mobile_no'])->where('email',$data['email'])->where('sharp_id',$data['sharp_id'])->first();


          if(isset($Reg_review['id'])){
            unset($data['_token']);
             $insert= Reg_review::where('id',$Reg_review['id'])->update($data);
             $insert_id=$Reg_review['id'];
          }
          else{
            $insert= Reg_review::create($data);
              $insert_id= $insert->id;
          }
  }

    if(isset($insert_id) &&(($insert_id)>0)){
               $eotp=mt_rand(100000, 999999);
               $motp=mt_rand(100000, 999999);
              $url= '<a href="'.url('verify/'.base64_encode($insert_id)).'">Verify </a>';
              $msg= '<h4>Dear '.$data['name'].',<h4>';
              $msg=$msg.'<h4>Your Procoop.net Company email verification code is: '.$eotp.' </h4>';
              $msg=$msg.'<h4>Please click on link below to verify your mobile no and company email
</h4>';
              $msg=$msg.'<h4>'.$url.'</h4>';
               $msg=$msg.'<br><br><h4>Thanks</h4>Procoop.net admin';
              $subject='Procoop : User Registration email and mobile no. verification';

               Common::sendMail(['message'=>$msg,'subject'=>$subject,'recipients[]'=>$data['email']]);
                             $mobile_no= (91).(ltrim($data['mobile_no'],'0'));
                             $message= 'Dear '.$data['name'].',';
                             $message= $message.' your mobile no verification OTP is '.$motp;
                              $smsreturn= Common::SendSms(['sms_message'=>$message,'recipients[]'=>ltrim($mobile_no,"0")]);
                             $smsreturn = json_decode($smsreturn);
                             if(isset($smsreturn->STATUS) && ($smsreturn->STATUS)=='SUCCESS'){
                                 Reg_review::where('mobile_no',$data['mobile_no'])->where('email',$data['email'])->where('sharp_id',$data['sharp_id'])->update(['mobile_otp'=>$motp,'email_otp'=>$eotp]);
                             }
       return redirect('verify/'.base64_encode($insert_id));
    }
       return redirect('register');
}


function verify(Request $request, $id){
   $id= base64_decode($id);
  $check=  Reg_review::where('id',$id)->first();
 if(isset($check['id'])){
   $data=$request->input();
   if(count($data)){
          $this->validate($request, [
                    'email_otp' => 'required|max:6|min:6',
                    'mobile_otp' => 'required|max:6|min:6'
                    ]);

     $Reg_review=  Reg_review::where('id',$id)->first();
 /*======================================================*/

         if(isset($Reg_review['mobile_otp']) && isset($Reg_review['mobile_otp']) && ($Reg_review['mobile_otp']==$data['mobile_otp']) && ($Reg_review['email_otp']==$data['email_otp'])){

         $Users=  User::where('mobile_no',$data['mobile_no'])->orWhere('email',$data['email'])->orWhere('sharp_id',$data['sharp_id'])->first();
          if(isset($Users['id'])){

              Reg_review::where('id',$Reg_review['id'])->delete();
             return redirect('success')->with('success','Your Account is already created , contact with Procoop support' );
          }else{
              $data['password']=bcrypt($data['password']);
             $user_id= User::create($data);
             Reg_review::where('id',$Reg_review['id'])->delete();
             Document::where('id',$Reg_review['identity_proof'])->update(['user_id'=> $user_id->id]);
             unset($request);
             unset($data);
          }
            $msg="Welcome to Procoop Online.
            Your account creation/activation is complete.
            Your account is under review and you will receive an email when the review process is complete";

             return redirect('success')->with('success',$msg );
         }else{
          $mobile_otp='';
             if($Reg_review['mobile_otp']!=$data['mobile_otp']){
               $mobile_otp='Please enter valid otp ,sent on your mobile no';
             }
             if($Reg_review['email_otp']!=$data['email_otp']){
               $email_otp='Please enter valid otp ,sent on your email';
             }

     $data=Reg_review::where('id',$id)
     ->select('id', 'name', 'middle_name', 'lastname', 'email', 'secondary_email', 'mobile_no', 'mobile_no_country', 'office_extension', 'office_extension_country', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'next_of_kin_phone_number_country', 'address', 'state', 'country', 'password', 'password_match', 'role', 'img', 'remember_token', 'identity_proof', 'sharp_id', 'proposed_monthly_income',  'created_at', 'updated_at')
     ->first();
     return view('auth.verify',compact('data'))->with('mobile_otp',$mobile_otp)->with('email_otp',$email_otp);
         }
 /*=======================================================*/


   }else{
     $data=Reg_review::where('id',$id)
     ->select('id', 'name', 'middle_name', 'lastname', 'email', 'secondary_email', 'mobile_no', 'mobile_no_country', 'office_extension', 'office_extension_country', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'next_of_kin_phone_number_country', 'address', 'state', 'country', 'password', 'password_match', 'role', 'img', 'remember_token', 'identity_proof', 'sharp_id', 'proposed_monthly_income',  'created_at', 'updated_at')
     ->first();
     return view('auth.verify',compact('data'));
   }

 }//check end
 else{  return redirect('register');}
}

function review(Request $request){
$data=$request->input();
$this->validate($request, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'sharp_id' => 'required',
                    'mobile_no' => 'required|min:10|max:11',
                    'password' => 'required|min:6',
                    'secondary_email' => 'required|email|max:191',
                    'office_extension' => 'required|max:5',
                    'next_of_kin' => 'required|max:191',
                    'relationship_with_next_of_kin' => 'required|max:255',
                    'next_of_kin_phone_number' => 'required|max:11',
                    'address' => 'required|max:191',
                    'state' => 'required',
                    'country' => 'required',
                    'lastname' => 'required',
                    'identity_proof' => 'required',
                    'proposed_monthly_income' => 'required',
                ]);






if(isset($data)){


  $Reg_review=  Reg_review::where('mobile_no',$data['mobile_no'])->where('email',$data['email'])->where('sharp_id',$data['sharp_id'])->first();

$insert_id='';
if(isset($Reg_review['id'])){
  unset($data['_token']);
   $insert= Reg_review::where('id',$Reg_review['id'])->update($data);
   $insert_id=$Reg_review['id'];
}
else{
  $insert= Reg_review::create($data);
    $insert_id= $insert->id;
}



    if(isset($insert_id) &&(($insert_id)>0)){
               $eotp=mt_rand(100000, 999999);
               $motp=mt_rand(100000, 999999);
              $url= '<a href="'.url('review/'.$insert_id).'">Verify email and mobile no. </a>';
              $msg= '<h4>Dear '.$data['name'].',<h4>';
              $msg= $msg.'Please verify your registered mobile no and company email';
              $msg=$msg.'<h4>Your Company email verification code is : '.$eotp.' </h4>';
              $msg=$msg.'please click on link to verify mobile no and company email';
              $msg=$msg.'<h4>'.$url.'</h4>';
               $msg=$msg.'<br><br><h4>Thanks</h4>';
              $subject='Procoop : User Registration email and mobile no. verification';

               Common::sendMail(['message'=>$msg,'subject'=>$subject,'recipients[]'=>$data['email']]);
                             $mobile_no= (91).(ltrim($data['mobile_no'],'0'));
                             $message= 'Dear '.$data['name'].',  ';
                             $message= $message.' Your mobile no verification OTP is '.$motp;
                              $smsreturn= Common::SendSms(['sms_message'=>$message,'recipients[]'=>ltrim($mobile_no,"0")]);
                             $smsreturn = json_decode($smsreturn);
                             if(isset($smsreturn->STATUS) && ($smsreturn->STATUS)=='SUCCESS'){
                                 
                                 Reg_review::where('mobile_no',$data['mobile_no'])->where('email',$data['email'])->where('sharp_id',$data['sharp_id'])->update(['mobile_otp'=>$motp,'email_otp'=>$eotp]);
                             }

       return view('auth.review',compact('data'));
    }

}
}

  
function review_by_email($id=null){
 
     $data=Reg_review::where('id',$id)
     ->select('id', 'name', 'middle_name', 'lastname', 'email', 'secondary_email', 'mobile_no', 'mobile_no_country', 'office_extension', 'office_extension_country', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'next_of_kin_phone_number_country', 'address', 'state', 'country', 'password', 'password_match', 'role', 'img', 'remember_token', 'identity_proof', 'sharp_id', 'proposed_monthly_income',  'created_at', 'updated_at')
     ->first();
     return view('auth.review',compact('data'));
}

  function final_register(Request $request){



       $data= $request->input();
    if(isset($data)){
         $Reg_review=  Reg_review::where('mobile_no',$data['mobile_no'])->where('email',$data['email'])->where('sharp_id',$data['sharp_id'])->first();



         if(isset($Reg_review['mobile_otp']) && isset($Reg_review['mobile_otp']) && ($Reg_review['mobile_otp']==$data['mobile_otp']) && ($Reg_review['email_otp']==$data['email_otp'])){

         $Users=  User::where('mobile_no',$data['mobile_no'])->orWhere('email',$data['email'])->orWhere('sharp_id',$data['sharp_id'])->first();
          if(isset($Users['id'])){

              Reg_review::where('id',$Reg_review['id'])->delete();
             return redirect('success')->with('success','Your Account is already created , contact with Procoop support' );
          }else{
              $data['password']=bcrypt($data['password']);
             $user_id= User::create($data);
             Reg_review::where('id',$Reg_review['id'])->delete();
             Document::where('id',$Reg_review['identity_proof'])->update(['user_id'=> $user_id->id]);
             unset($request);
             unset($data);
          }
   







             return redirect('success')->with('success','Your Account is successfully created , wait till admin approve your login' );


         }else{
          $mobile_otp='';
             if($Reg_review['mobile_otp']!=$data['mobile_otp']){
               $mobile_otp='Please enter valid otp ,sent on your mobile no';
             }
             if($Reg_review['email_otp']!=$data['email_otp']){
               $email_otp='Please enter valid otp ,sent on your email';
             }

           return view('auth.review',compact('data','mobile_otp','email_otp'));
         }

  }

  }


}